<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;

use App\Model\Table\SchoolsTable;
use App\Model\Table\UsersTable;
use Cake\I18n\DateTime;
use Cake\Log\Log;
use Cake\Mailer\Mailer;
use Cake\Utility\Security;

use Cake\ORM\TableRegistry;

/**
 * Auth Controller
 *
 * @property \Authentication\Controller\Component\AuthenticationComponent $Authentication
 */
class AuthController extends AppController
{
    /**
     * @var \App\Model\Table\UsersTable $Users
     * @var \App\Model\Table\SchoolsTable $Schools
     */
    private UsersTable $Users;
    private SchoolsTable $Schools;

    /**
     * Controller initialize override
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        // By default, CakePHP will (sensibly) default to preventing users from accessing any actions on a controller.
        // These actions, however, are typically required for users who have not yet logged in.
        $this->Authentication->allowUnauthenticated(['login', 'register', 'forgetPassword', 'resetPassword']);

        // CakePHP loads the model with the same name as the controller by default.
        // Since we don't have an Auth model, we'll need to load "Users" model when starting the controller manually.
        $this->Users = $this->fetchTable('Users');
        $this->Schools = $this->fetchTable('Schools');
    }

    /**
     * Generates a school code based on the school name
     *
     * @param string $schoolName The name of the school
     * @return string The generated school code
     */
    protected function generateSchoolCode($schoolName) {
        // Extract the first two characters from the school name
        $nameParts = explode(' ', $schoolName);
        $firstLetter = strtoupper(substr($nameParts[0], 0, 1));
        $secondLetter = strtoupper(substr($nameParts[0], 1, 1));

        // Generate a random 4-digit number excluding 0
        $randomNumber = '';
        while (strlen($randomNumber) < 4) {
            $digit = mt_rand(1, 9); // Random digit between 1 and 9
            $randomNumber .= $digit;
        }

        // Combine the letters and the random number
        $code = $firstLetter . $secondLetter . $randomNumber;

        return $code;
    }

    /**
     * Register method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function register()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $user = $this->Users->patchEntity($user, $data);
            $user->role = 'School';

            if ($this->Users->save($user)) {





                $usersTable = TableRegistry::getTableLocator()->get('Users');
                $savedUser = $usersTable->find()
                    ->where(['email' => $data['email']])
                    ->first();

                $address = $data['schooladdress'] . ' ' . $data['schoolsuburb'] . ' ' . $data['schoolstate'] . ' ' .$data['schoolpostcode'];
                $file = $this->request->getData('schoollogo');
                $image_name = $file->getClientFilename();
                $targetPath = WWW_ROOT . 'img/school_logo_img' . DS . $image_name;

                if ($file->getError() === UPLOAD_ERR_OK) {
                    if ($image_name) {
                        $file->moveTo($targetPath);
                    }
                } else {
                    $image_name = null;
                }

                // After saving the user, get the user ID
                $schoolData = [
                    'name' => $data['schoolname'],
                    'rep_first_name' => $data['repfirstname'],
                    'rep_last_name' => $data['replastname'],
                    'rep_email' => $data['repemail'],
                    'address' => $address,
                    'logo' => $image_name,
                    'approval_status' => 1, // Set default approval status
                ];

                $school = $this->Schools->newEmptyEntity();
                $school = $this->Schools->patchEntity($school, $schoolData);
                $school->id = $savedUser->id;
                $school->code = $this->generateSchoolCode($data['schoolname']);

                if ($this->Schools->save($school)) {
                    $this->Flash->success('You have been registered. Please login.');

                    $toEmail = $user->email;
                    // get email from configure file
                    $from = Configure::read('myEmail.email', ['susy@organicprintstudio.com.au' => 'Organic Print Studio']);

                    if (empty($from)) {
                        // if the address is null show the error message
                        Log::error('The "from" email address is not configured properly.');
                        $this->Flash->error('Registration succeeded, but we could not send the welcome email.');
                        return $this->redirect(['action' => 'login']);
                    }
                    // Send a template email
                    $subject = 'Welcome to Organic Print Studio';
                    $mailer = new Mailer('default');
                    $mailer->setSubject($subject)
                        ->setEmailFormat('html')
                        ->setTo($toEmail)
                        ->setFrom($from)
                        ->viewBuilder()
                        ->disableAutoLayout()
                        ->setTemplate('welcome');

                    $mailer->setViewVars([
                        'content' => 'this is your final design',
                        'to_email' => $toEmail,
                    ]);

                    if (!$mailer->deliver()) {
                        // send a friendly message while fail
                        Log::error('Failed to send email to ' . $toEmail);
                        $this->Flash->error('We were unable to send the welcome email. Please contact support.');
                    }


                    return $this->redirect(['action' => 'login']);
                } else {
                    // Rollback user save if school save fails
                    $this->Users->delete($user);
                    $this->Flash->error('The school details could not be saved. Please, try again.');
                    return;
                }

            } else {
                $this->Flash->error('The user could not be registered. Please, try again.');
            }
        }
        $this->set(compact('user'));
    }


    /**
     * Forget Password method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful email send, renders view otherwise.
     */
    public function forgetPassword()
    {
        if ($this->request->is('post')) {
            // Retrieve the user entity by provided email address
            $user = $this->Users->findByEmail($this->request->getData('email'))->first();
            if ($user) {

                // Set nonce and expiry date
                $user->nonce = Security::randomString(128);
                $user->nonce_expiry = new DateTime('7 days');
                if ($this->Users->save($user)) {
                    // Now let's send the password reset email
                    $mailer = new Mailer('default');

                    // email basic config
                    $mailer
                        ->setEmailFormat('both')
                        ->setTo($user->email)
                        ->setSubject('Reset your account password');

                    // select email template
                    $mailer
                        ->viewBuilder()
                        ->setTemplate('reset_password');

                    // transfer required view variables to email template
                    $mailer
                        ->setViewVars([
                            'first_name' => $user->first_name,
                            'last_name' => $user->last_name,
                            'nonce' => $user->nonce,
                            'email' => $user->email,
                        ]);

                    //Send email
                    if (!$mailer->deliver()) {
                        // Just in case something goes wrong when sending emails
                        $this->Flash->error('We have encountered an issue when sending you emails. Please try again. ');

                        return $this->render(); // Skip the rest of the controller and render the view
                    }
                } else {
                    // Just in case something goes wrong when saving nonce and expiry
                    $this->Flash->error('We are having issue to reset your password. Please try again. ');

                    return $this->render(); // Skip the rest of the controller and render the view
                }
            }

            /*
             * **This is a bit of a special design**
             * We don't tell the user if their account exists, or if the email has been sent,
             * because it may be used by someone with malicious intent. We only need to tell
             * the user that they'll get an email.
             */
            $this->Flash->success('Please check your inbox (or spam folder) for an email regarding how to reset your account password. ');

            return $this->redirect(['action' => 'login']);
        }
    }

    /**
     * Reset Password method
     *
     * @param string|null $nonce Reset password nonce
     * @return \Cake\Http\Response|null|void Redirects on successful password reset, renders view otherwise.
     */
    public function resetPassword(?string $nonce = null)
    {
        $user = $this->Users->findByNonce($nonce)->first();

        // If nonce cannot find the user, or nonce is expired, prompt for re-reset password
        if (!$user || $user->nonce_expiry < DateTime::now()) {
            $this->Flash->error('Your link is invalid or expired. Please try again.');

            return $this->redirect(['action' => 'forgetPassword']);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            // Used a different validation set in Model/Table file to ensure both fields are filled
            $user = $this->Users->patchEntity($user, $this->request->getData(), ['validate' => 'resetPassword']);

            // Also clear the nonce-related fields on successful password resets.
            // This ensures that the reset link can't be used a second time.
            $user->nonce = null;
            $user->nonce_expiry = null;

            if ($this->Users->save($user)) {
                $this->Flash->success('Your password has been successfully reset. Please login with new password. ');

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error('The password cannot be reset. Please try again.');
        }

        $this->set(compact('user'));
    }

    /**
     * Change Password method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function changePassword(?string $id = null)
    {
        $user = $this->Users->get($id, ['contain' => []]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            // Used a different validation set in Model/Table file to ensure both fields are filled
            $user = $this->Users->patchEntity($user, $this->request->getData(), ['validate' => 'resetPassword']);
            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been saved.');

                return $this->redirect(['controller' => 'Users', 'action' => 'index']);
            }
            $this->Flash->error('The user could not be saved. Please, try again.');
        }
        $this->set(compact('user'));
    }

    /**
     * Login method
     *
     * @return \Cake\Http\Response|null|void Redirect to location before authentication
     */
    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        // if user passes authentication, grant access to the system
        if ($result && $result->isValid()) {
            $identity = $this->Authentication->getIdentity();
            $user_role = $identity->get('role');
            $user_id = $identity->get('id');


            if($user_role == 'School'){
                $schoolsTable = TableRegistry::getTableLocator()->get('Schools');
                $school_user_account_status = $schoolsTable->find()
                    ->where(['id' => $user_id])
                    ->first();
                $user_account_status = $school_user_account_status->approval_status;

                if($user_account_status){
                    $this->redirect(['controller' => 'Pages', 'action' => 'display','school_dashboard']);
                }
                else if(!$user_account_status){
                    $this->Flash->error('Your account has not been verified yet. Please wait for our team to verify your account. ');
                    $this->Authentication->logout();
                }
            }

            else if($user_role == 'Admin'){
                $this->redirect(['controller' => 'Pages', 'action' => 'display','admin_dashboard']);
            }


            else{
                // set a fallback location in case user logged in without triggering 'unauthenticatedRedirect'
                $fallbackLocation = ['controller' => 'Pages', 'action' => 'display','home'];

                // and redirect user to the location they're trying to access
                return $this->redirect($this->Authentication->getLoginRedirect() ?? $fallbackLocation);

            }

        }

        // display error if user submitted their credentials but authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Email address and/or Password is incorrect. Please try again. ');
        }
    }

    /**
     * Logout method
     *
     * @return \Cake\Http\Response|null|void
     */
    public function logout()
    {
        // We only need to log out a user when they're logged in
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
            $this->Authentication->logout();

            $this->Flash->success('You have been logged out successfully. ');
        }

        // Otherwise just send them to the login page
        return $this->redirect(['controller' => 'Auth', 'action' => 'login']);
    }
}
