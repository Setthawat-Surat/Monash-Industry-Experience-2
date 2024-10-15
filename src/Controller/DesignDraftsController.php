<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\CampaignsTable;
use App\Model\Table\DesignPhotosTable;
use App\Model\Table\UsersTable;
use Cake\Mailer\Mailer;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Routing\Router;
use ZipArchive;

/**
 * DesignDrafts Controller
 *
 * @property \App\Model\Table\DesignDraftsTable $DesignDrafts
 * @var \App\Model\Table\DesignPhotosTable $DesignPhotos
 * @var \App\Model\Table\CampaignsTable $Campaigns
 * @var \App\Model\Table\UsersTable $Users
 */
class DesignDraftsController extends AppController
{
    private DesignPhotosTable $DesignPhotos;
    private UsersTable $Users;
    private CampaignsTable $Campaigns;

    public function initialize(): void
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->DesignPhotos = $this->fetchTable('DesignPhotos');
        $this->Users = $this->fetchTable('Users');
        $this->Campaigns = $this->fetchTable('Campaigns');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function index()
    {
        $query = $this->DesignDrafts->find()
            ->contain(['Campaigns', 'Users']);
        $designDrafts = $this->paginate($query);

        $this->set(compact('designDrafts'));
    }

    /**
     * View method
     *
     * @param string|null $id Design Draft id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view(?string $id = null)
    {
        $designDraft = $this->DesignDrafts->get($id, contain: ['Campaigns', 'Users', 'DesignPhotos', 'Products']);
        $this->set(compact('designDraft'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $designDraft = $this->DesignDrafts->newEmptyEntity();
        if ($this->request->is('post')) {
            $designDraft = $this->DesignDrafts->patchEntity($designDraft, $this->request->getData());
            if ($this->DesignDrafts->save($designDraft)) {
                $this->Flash->success(__('The design draft has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The design draft could not be saved. Please, try again.'));
        }
        $campaigns = $this->DesignDrafts->Campaigns->find('list', limit: 200)->all();
        $users = $this->DesignDrafts->Users->find('list', limit: 200)->all();
        $this->set(compact('designDraft', 'campaigns', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Design Draft id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit(?string $id = null)
    {
        $designDraft = $this->DesignDrafts->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $designDraft = $this->DesignDrafts->patchEntity($designDraft, $this->request->getData());
            if ($this->DesignDrafts->save($designDraft)) {
                $this->Flash->success(__('The design draft has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The design draft could not be saved. Please, try again.'));
        }
        $campaigns = $this->DesignDrafts->Campaigns->find('list', limit: 200)->all();
        $users = $this->DesignDrafts->Users->find('list', limit: 200)->all();
        $this->set(compact('designDraft', 'campaigns', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Design Draft id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete(?string $id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $designDraft = $this->DesignDrafts->get($id);
        if ($this->DesignDrafts->delete($designDraft)) {
            $this->Flash->success(__('The design draft has been deleted.'));
        } else {
            $this->Flash->error(__('The design draft could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function myDesign()
    {
        // Retrieve the campaign ID from the query parameter
        $campaignId = $this->request->getQuery('cID');

        if (!$campaignId) {
            // Handle the case where campaign_id is not provided
            throw new BadRequestException(__('Campaign ID not provided'));
        }
        $campaignTable = TableRegistry::getTableLocator()->get('Campaigns');
        $campaign = $campaignTable->find()
            ->where(['id' => $campaignId])
            ->first();

        // Fetch design drafts associated with the campaign ID
        $designDrafts = $this->DesignDrafts->find()
            ->where(['campaign_id' => $campaignId])
            ->all();

        // Pass the data to the view
        $this->set(compact('designDrafts', 'campaign'));
    }

    public function create()
    {
        $campaignId = $this->request->getQuery('cID');
        $designDraft = $this->DesignDrafts->newEmptyEntity();

        // by campaign_id find campaign
        $Campaign = $this->Campaigns->find()
            ->where(['id' => $campaignId])
            ->first();

        if ($this->request->is('post')) {
            $designDraft = $this->DesignDrafts->patchEntity($designDraft, $this->request->getData());
            $designDraft->approval_status = 0;
            $designDraft->campaign_id = $campaignId;
            $designDraft->user_id = $this->getRequest()->getAttribute('identity')->get('id');

            $targetPath = '';

            // Save the design draft first
            if ($this->DesignDrafts->save($designDraft)) {
                $designDraftId = $designDraft->id;

            // Process file uploads
                $files = $this->request->getData('studentDesigns');

                // Allowed file types and max file size (100MB)
                $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/webp', 'application/pdf'];
                $maxFileSize = 100 * 1024 * 1024; // 100MB
                $uploadErrors = [];

                if (!empty($files)) {
                    foreach ($files as $file) {
                        // Check for upload errors
                        if ($file->getError() !== UPLOAD_ERR_OK) {
                            $uploadErrors[] = __('Failed to upload one or more files.');
                            continue; // Skip to the next file
                        }

                        $image_name = $file->getClientFilename();
                        $fileType = $file->getClientMediaType();
                        $fileSize = $file->getSize();

                        // Validate file type
                        if (!in_array($fileType, $allowedMimeTypes)) {
                            $uploadErrors[] = __('Invalid file type for file: {0}. Please upload a JPEG, PNG, PDF or GIF image.', $image_name);
                            continue; // Skip to the next file
                        }

                        // Validate file size
                        if ($fileSize > $maxFileSize) {
                            $uploadErrors[] = __('File size for file: {0} exceeds 2MB. Please upload a smaller image.', $image_name);
                            continue; // Skip to the next file
                        }

                        // Set target path
                        $targetPath = WWW_ROOT . 'img/student_designs_img' . DS . uniqid() . '-'. $image_name;

                        // Move file to target directory
                        $file->moveTo($targetPath);
                        // Create and save design photo entity
                        $designPhotoData = [
                            'photo' => basename($targetPath),
                            'design_draft_id' => $designDraftId,
                        ];

                        $designPhoto = $this->DesignPhotos->newEmptyEntity();
                        $designPhoto = $this->DesignPhotos->patchEntity($designPhoto, $designPhotoData);

                        if (!$this->DesignPhotos->save($designPhoto)) {
                            $uploadErrors[] = __('Unable to save some photos. Please try again.');
                        }

                    }

                    if (empty($uploadErrors)) {
                        $this->Flash->success(__('Your design has been saved along with the photos.'));


                        $currentUser = $this->getRequest()->getAttribute('identity');
                        $from = $currentUser->get('email'); // get the current school email

                        // get users' email
                        $toEmail = Configure::read('Email.default.from', ['susy@organicprintstudio.com.au' => 'Organic Print Studio']);;
                        // get campaign start date & end date & campaign name

                        $start_date = $Campaign->start_date;
                        $end_date = $Campaign->end_date;
                        $campaign_name = $Campaign->name;


                        // Send a template email
                        $subject = 'School Upload a design';
                        $mailer = new Mailer('default');
                        $mailer->setSubject($subject)
                            ->setEmailFormat('html')
                            ->setTo($toEmail)
                            ->setFrom($from)
                            ->viewBuilder()
                            ->disableAutoLayout()
                            ->setTemplate('add_design');

                        $image_url = Router::url('/img/student_designs_img/' . basename($targetPath), true);

                        $mailer->setViewVars([
                            'content' => 'this is shcool\'s upload design',
                            'campaign_name' => $campaign_name,
                            'final_design' => $image_url,
                            'year_level' => $designDraft->design_yearlevel,
                            'description' => $designDraft->specifications,
                            'start_date' => $start_date,
                            'end_date' => $end_date,
                        ]);
                        if (!$mailer->deliver()) {
                            $this->Flash->success(__('Your design uploaded email sent failed'));

                        }


                        return $this->redirect(['controller' => 'DesignDrafts', 'action' => 'myDesign', '?' => ['cID' => $campaignId]]);
                    } else {
                        // If there are any upload errors, display them
                        foreach ($uploadErrors as $error) {
                            $this->Flash->error($error);
                        }
                    }
                } else {
                    $this->Flash->error(__('No files were uploaded.'));
                }
            } else {
                $this->Flash->error(__('The design draft could not be saved. Please, try again.'));
            }
        }

        $campaigns = $this->DesignDrafts->Campaigns->find('list', limit: 200)->all();
        $users = $this->DesignDrafts->Users->find('list', limit: 200)->all();
        $this->set(compact('designDraft', 'campaigns', 'users'));
    }

    public function deletedesigns($id = null)
    {
        $campaignId = $this->request->getQuery('cID');
        $this->request->allowMethod(['post', 'delete']);
        $designDraft = $this->DesignDrafts->get($id);
        if ($this->DesignDrafts->delete($designDraft)) {
            $this->Flash->success(__('The design draft has been deleted.'));
        } else {
            $this->Flash->error(__('The design draft could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'DesignDrafts', 'action' => 'myDesign', '?' => ['cID' => $campaignId]]);
    }

    public function adminViewDesign()
    {

        $campaignTable = TableRegistry::getTableLocator()->get('Campaigns');
        $campaign = $campaignTable->find()->all();

        $this->set(compact('campaign'));
    }

    public function downloadDesigns($designDraftId)
    {
        $this->request->allowMethod(['get']);

        // Ensure the designDraftId is valid
        if ($designDraftId === null) {
            throw new BadRequestException(__('Invalid Design Draft ID'));
        }

        $school_table = TableRegistry::getTableLocator()->get('Schools');
        $design_draft_table = TableRegistry::getTableLocator()->get('DesignDrafts');
        $design_photo_table = TableRegistry::getTableLocator()->get('DesignPhotos');

        // Retrieve the design draft information
        $designDraft = $design_draft_table->get($designDraftId);
        $school = $school_table->get($designDraft->user_id);

        // Create a temporary file for the ZIP archive
        $zip = new ZipArchive();
        $zipFilename = tempnam(sys_get_temp_dir(), 'zip');

        // Check if the ZIP file was successfully created
        if ($zip->open($zipFilename, ZipArchive::OVERWRITE|ZipArchive::CREATE) !== true) {
            throw new \RuntimeException(__('Unable to create ZIP file.'));
        }

        // Add school logo to ZIP
        if ($school->logo) {
            $logoPath = WWW_ROOT . 'img/school_logo_img' . DS . $school->logo;
            if (file_exists($logoPath)) {
                $zip->addFile($logoPath, 'school_logo/' . $school->logo);
            } else {
                // Optionally, add a log message or handle missing logo file
            }
        }

        // Add design draft photos to ZIP
        $designPhotos = $design_photo_table->find()
            ->where(['design_draft_id' => $designDraftId])
            ->all();
        foreach ($designPhotos as $designPhoto) {
            $photoPath = WWW_ROOT . 'img/student_designs_img' . DS . $designPhoto->photo;
            if (file_exists($photoPath)) {
                $zip->addFile($photoPath, 'design_photos/' . $designPhoto->photo);
            } else {
                // Optionally, add a log message or handle missing photo file
            }
        }

        // Close ZIP file
        $zip->close();

        // Prepare response
        $response = $this->response->withFile(
            $zipFilename,
            [
                'download' => true,
                'name' => $school->name . '_' . $designDraft->design_yearlevel . '_designs.zip'
            ]
        );

        // Clean up
        unlink($zipFilename);

        return $response;
    }

    public function downloadFinalDesign($designDraftId){
        $designDraft = $this->DesignDrafts->get($designDraftId);

        $filePath = WWW_ROOT . 'img/final_design' . DS . $designDraft->final_design_photo;

        return $this->response->withFile(
            $filePath,
            ['download' => true, 'name' => basename($filePath)] // Force download with the file's original name
        );
    }

    public function addFinalDesign()
    {
        $design_id = $this->request->getQuery('dID');
        $DesignDrafts = $this->DesignDrafts->find()
            ->where(['id' => $design_id])
            ->first();

        // get user_id
        $user_id = $DesignDrafts->user_id;
        // get campaign_id
        $campaign_id = $DesignDrafts->campaign_id;

        // by user_id find user email
        $User = $this->Users->find()
            ->where(['id' => $user_id])
            ->first();
        // by campaign_id find campaign
        $Campaign = $this->Campaigns->find()
            ->where(['id' => $campaign_id])
            ->first();

        if (!$User) {
            $this->Flash->error(__('User not found.'));

            return $this->redirect(['action' => 'index']);
        }

        // get users' email
        $toEmail = $User->email;
        // get campaign start date & end date & campaign name
        $start_date = $Campaign->start_date;
        $end_date = $Campaign->end_date;
        $campaign_name = $Campaign->name;

        if ($this->request->is(['post', 'put'])) {
            $file = $this->request->getData('final_design');

            $targetPath = '';
            // Allowed file types and max file size (2MB)
            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/webp', 'application/pdf'];
            $maxFileSize = 100 * 1024 * 1024; // 2MB
            $uploadErrors = [];

            // Check for upload errors
            if ($file->getError() !== UPLOAD_ERR_OK) {
                $uploadErrors[] = __('Failed to upload the file.');
            } else {
                $image_name = $file->getClientFilename();
                $fileType = $file->getClientMediaType();
                $fileSize = $file->getSize();

                // Validate file type
                if (!in_array($fileType, $allowedMimeTypes)) {
                    $uploadErrors[] = __('Invalid file type for file: {0}. Please upload a JPG, PNG, PDF or WebP image.', $image_name);
                }

                // Validate file size
                if ($fileSize > $maxFileSize) {
                    $uploadErrors[] = __('File size for file: {0} exceeds 2MB. Please upload a smaller image.', $image_name);
                }

                // If there are no errors, move the file
                if (empty($uploadErrors)) {
                    $targetPath = WWW_ROOT . 'img/final_design' . DS . uniqid() . '-' . $image_name;
                    $file->moveTo($targetPath);
                    $DesignDrafts->final_design_photo = basename($targetPath);
                }
            }

            // get email from configure file
            $from = Configure::read('Email.default.from', ['susy@organicprintstudio.com.au' => 'Organic Print Studio']);

            // Send email if no upload errors
            if (empty($uploadErrors)) {

                // Send a template email
                $subject = 'Upload Final Design';
                $mailer = new Mailer('default');
                $mailer->setSubject($subject)
                    ->setEmailFormat('html')
                    ->setTo($toEmail)
                    ->setFrom($from)
                    ->viewBuilder()
                    ->disableAutoLayout()
                    ->setTemplate('final_design');


                $image_url = Router::url('/img/final_design/' . basename($targetPath), true);
                $year_level = $DesignDrafts->design_yearlevel;
                $description = $DesignDrafts->specifications;

                $mailer->setViewVars([
                    'content' => 'this is your final design',
                    'campaign_name' => $campaign_name,
                    'to_email' => $toEmail,
                    'final_design' => $image_url,
                    'year_level' => $year_level,
                    'description' => $description,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                ]);

                if ($mailer->deliver() && $this->DesignDrafts->save($DesignDrafts)) {
                    $this->Flash->success(__('The final design has been uploaded successfully'));
                    return $this->redirect(['controller' => 'design-drafts', 'action' => 'admin-view-design']);
                }
            } else {
                // If there are upload errors, display them
                foreach ($uploadErrors as $error) {
                    $this->Flash->error($error);
                }
            }
        }

        $this->set(compact('DesignDrafts'));
    }



    public function confirmFinalDesign($id){
        $this->request->allowMethod(['post','put']); // Ensure that this action only accepts POST requests
        $campaignId = $this->request->getQuery('cID');

        // Fetch the design by ID
        $design = $this->DesignDrafts->get($id);

        // Set the approval status to 1 (approved)
        $design->approval_status = 1;

        if ($this->DesignDrafts->save($design)) {
            $this->Flash->success(__('The final design has been approved.'));
        } else {
            $this->Flash->error(__('There was an error approving the design.'));
        }

        return $this->redirect([
            'action' => 'myDesign',
            '?' => ['cID' => $campaignId] // Append cID to the query string
        ]);
    }

    public function rejectFinalDesign($id)
    {
        $this->request->allowMethod(['post', 'put']); // Ensure that this action only accepts POST requests

        // Fetch the design draft by ID
        $design = $this->DesignDrafts->get($id);

        // Check if there's a final design photo
        if (!empty($design->final_design_photo)) {
            $photoPath = WWW_ROOT . 'img/final_design' . DS . $design->final_design_photo;

            // Check if the file exists and delete it
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }

            $design->final_design_photo = null;
        }

        // Set the approval status to 0 (rejected)
        $design->approval_status = 0;

        if ($this->DesignDrafts->save($design)) {
            $this->Flash->success(__('The final design has been rejected.'));
        } else {
            $this->Flash->error(__('There was an error rejecting the design.'));
        }

        // Redirect to the appropriate page with cID
        $campaignId = $this->request->getQuery('cID');
        return $this->redirect([
            'action' => 'addFeedback',
            '?' => [
                'dID' => $id,
                'cID' => $campaignId]
        ]);
    }


    public function addFeedback(){
        $campaignId = $this->request->getQuery('cID');
        $designId = $this->request->getQuery('dID');
        $designDraft = $this->DesignDrafts->find()
            ->where(['id' => $designId])
            ->first();


        if ($this->request->is('put')) {
            $feedback = $this->request->getData('feedback');
            $cID = $this->request->getData('cID');

            $designDraft->feedback = $feedback;
            if ($this->DesignDrafts->save($designDraft)) {
                $this->Flash->success(__('Thank you for your feedback and your feedback has been recorded.'));
                return $this->redirect([
                    'action' => 'myDesign',
                    '?' => ['cID' => $cID] // Append cID to the query string
                ]);
            }

            $this->Flash->error(__('Unable to record your feedback. Please, try again.'));
        }

        $this->set(compact('designDraft'));
    }


    public function editDesign($id)
    {
        $campaignId = $this->request->getQuery('cID');
        $designDraftId = $this->request->getQuery('dID');
        // Load the DesignDrafts table
        $designDraftsTable = TableRegistry::getTableLocator()->get('DesignDrafts');

        // Find the specific design draft by ID
        $designDraft = $designDraftsTable->get($id, contain: ['DesignPhotos']); // Load associated design photos

        // Set the design draft data to the view
        $this->set('designDraft', $designDraft);

        // Optionally handle form submission for editing here
        if ($this->request->is(['patch', 'post', 'put'])) {
            // Patch the design draft entity with the request data
            $designDraft = $designDraftsTable->patchEntity($designDraft, $this->request->getData());

            // Check if the photos are being uploaded
            if (!empty($this->request->getData('studentDesigns'))) {
                // Handle file uploads
                $files = $this->request->getData('studentDesigns');

                // Allowed file types and max file size (2MB)
                $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/webp', 'application/pdf'];
                $maxFileSize = 100 * 1024 * 1024; // 2MB
                $uploadErrors = [];

                foreach ($files as $file) {
                    if ($file->getError() === UPLOAD_ERR_OK) {
                        $fileName = $file->getClientFilename();
                        $fileType = $file->getClientMediaType();
                        $fileSize = $file->getSize();

                        // Validate file type
                        if (!in_array($fileType, $allowedMimeTypes)) {
                            $uploadErrors[] = __('Invalid file type for file: {0}. Please upload a JPEG, PNG,PDF or WEBP image.', $fileName);
                            continue; // Skip to the next file
                        }

                        // Validate file size
                        if ($fileSize > $maxFileSize) {
                            $uploadErrors[] = __('File size for file: {0} exceeds 2MB. Please upload a smaller image.', $fileName);
                            continue; // Skip to the next file
                        }

                        // Move the file to the target directory
                        $targetPath = WWW_ROOT . 'img/student_designs_img' . DS . uniqid() . '-' . $fileName;

                        // Move file to target directory
                        $file->moveTo($targetPath);

                        $designPhotoData = [
                            'photo' => basename($targetPath),
                            'design_draft_id' => $designDraftId,
                        ];

                        // Create a new DesignPhoto entity to save in the database
                        $designPhoto = $this->DesignPhotos->newEmptyEntity();
                        $designPhoto = $this->DesignPhotos->patchEntity($designPhoto, $designPhotoData);

                        if (!$this->DesignPhotos->save($designPhoto)) {
                            $this->Flash->error(__('Unable to save some photos. Please try again.'));
                        }
                    } else {
                        $uploadErrors[] = __('Failed to upload file: {0}.', $file->getClientFilename());
                    }
                }

                // If there are any upload errors, display them
                foreach ($uploadErrors as $error) {
                    $this->Flash->error($error);
                }
            }

            // Save the updated design draft
            if ($designDraftsTable->save($designDraft)) {
                $this->Flash->success(__('The design has been updated.'));
                return $this->redirect(['controller' => 'DesignDrafts', 'action' => 'myDesign', '?' => ['cID' => $campaignId]]); // Redirect after saving
            }
            $this->Flash->error(__('The design draft could not be saved. Please, try again.'));
        }
    }
}

