<?php
declare(strict_types=1);

namespace App\Controller;


/**
 * Schools Controller
 *
 * @property \App\Model\Table\SchoolsTable $Schools
 */

class SchoolsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Schools->find();
        $schools = $this->paginate($query);

        $this->set(compact('schools'));
    }

    /**
     * View method
     *
     * @param string|null $id School id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $school = $this->Schools->get($id, contain: ['Campaigns']);
        $this->set(compact('school'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $school = $this->Schools->newEmptyEntity();
        if ($this->request->is('post')) {
            $school = $this->Schools->patchEntity($school, $this->request->getData());
            if ($this->Schools->save($school)) {
                $this->Flash->success(__('The school has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The school could not be saved. Please, try again.'));
        }
        $this->set(compact('school'));
    }

    /**
     * Edit method
     *
     * @param string|null $id School id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $school = $this->Schools->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $school = $this->Schools->patchEntity($school, $this->request->getData());
            if ($this->Schools->save($school)) {
                $this->Flash->success(__('The school has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The school could not be saved. Please, try again.'));
        }
        $this->set(compact('school'));
    }

    /**
     * Delete method
     *
     * @param string|null $id School id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $school = $this->Schools->get($id);
        if ($this->Schools->delete($school)) {
            $this->Flash->success(__('The school has been deleted.'));
        } else {
            $this->Flash->error(__('The school could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function addBankAccount() {
        $userId = $this->Authentication->getIdentity()->get('id');
        $school = $this->Schools->find()
            ->where(['id' => $userId])
            ->first();

        if ($this->request->is('post')) {
            // Patch the bank account details to the existing school entity
            $bank_acc_number = $this->request->getData('bank_acc_number');
            $bank_acc_name = $this->request->getData('bank_acc_name');
            $bank_bsb = $this ->request->getData('bank_bsb');

            $school->bank_account_name = $bank_acc_name;
            $school->bank_account_number = $bank_acc_number;
            $school->bsb = $bank_bsb;

            // Save the updated school record
            if ($this->Schools->save($school)) {
                $this->Flash->success(__('Your bank account details have been saved.'));
                return $this->redirect(['controller'=>'pages','action' => 'display','School_dashboard']);
            }

            $this->Flash->error(__('Unable to add the bank account details. Please, try again.'));
        }

        // Pass the school entity to the view
        $this->set(compact('school'));
    }


    public function updateBankAccount(){
        $userId = $this->Authentication->getIdentity()->get('id');
        $school = $this->Schools->find()
            ->where(['id' => $userId])
            ->first();

        if ($this->request->is('post')) {
            // Patch the bank account details to the existing school entity
            $bank_acc_number = $this->request->getData('bank_acc_number');
            $bank_acc_name = $this->request->getData('bank_acc_name');
            $bank_bsb = $this ->request->getData('bank_bsb');

            $school->bank_account_name = $bank_acc_name;
            $school->bank_account_number = $bank_acc_number;
            $school->bsb = $bank_bsb;

            // Save the updated school record
            if ($this->Schools->save($school)) {
                $this->Flash->success(__('Your bank account details have been updated.'));
                return $this->redirect(['controller'=>'pages','action' => 'display','School_dashboard']);
            }

            $this->Flash->error(__('Unable to update the bank account details. Please, try again.'));
        }

        // Pass the school entity to the view
        $this->set(compact('school'));
    }


    public function addSchoolLogo() {
        $userId = $this->Authentication->getIdentity()->get('id');
        $school = $this->Schools->find()
            ->where(['id' => $userId])
            ->first();



        if ($this->request->is(['post', 'put'])) {
            $file = $this->request->getData('logo');

            // Allowed file types and max file size (2MB)
            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
            $maxFileSize = 2 * 1024 * 1024; // 2MB

            if ($file->getError() === UPLOAD_ERR_OK) {
                $image_name = $file->getClientFilename();
                $fileType = $file->getClientMediaType();
                $fileSize = $file->getSize();

                // Validate file type
                if (!in_array($fileType, $allowedMimeTypes)) {
                    $this->Flash->error(__('Invalid file type. Please upload a JPEG, PNG, or GIF image.'));
                    return $this->redirect(['controller' => 'Schools', 'action' => 'addSchoolLogo']);
                }

                if ($this->request->is(['post', 'put'])) {
                    $file = $this->request->getData('logo');

                    // Allowed file types and max file size (2MB)
                    $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
                    $maxFileSize = 2 * 1024 * 1024; // 2MB

                    if ($file->getError() === UPLOAD_ERR_OK) {
                        $image_name = $file->getClientFilename();
                        $fileType = $file->getClientMediaType();
                        $fileSize = $file->getSize();

                        // Validate file type
                        if (!in_array($fileType, $allowedMimeTypes)) {
                            $this->Flash->error(__('Invalid file type. Please upload a JPEG, PNG, or GIF image.'));
                            return $this->redirect(['controller' => 'Schools', 'action' => 'addSchoolLogo']);
                        }
                        if ($fileSize > $maxFileSize) {
                            $this->Flash->error(__('File size exceeds 2MB. Please upload a smaller image.'));
                            return $this->redirect(['controller' => 'Schools', 'action' => 'addSchoolLogo']);
                        }
                    }
                    $targetPath = WWW_ROOT . 'img/school_logo_img' . DS . $image_name;
                    $file->moveTo($targetPath);
                    $school->logo = $image_name;
                    if ($this->Schools->save($school)) {
                        $this->Flash->success(__('The school logo has been uploaded successfully'));
                        return $this->redirect(['controller'=>'pages','action' => 'display','School_dashboard']);
                    }
                else {
                    $this->Flash->error(__('Failed to upload the file.'));
                }
                }
            }
        }
        $this->set(compact('school'));
    }

    public function updateSchoolLogo(){
        $userId = $this->Authentication->getIdentity()->get('id');
        $school = $this->Schools->find()
            ->where(['id' => $userId])
            ->first();

        $this->set(compact('school'));

        if ($this->request->is(['post', 'put'])) {
            $file = $this->request->getData('logo');

            // Allowed file types and max file size (2MB)
            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
            $maxFileSize = 2 * 1024 * 1024; // 2MB

            if ($file->getError() === UPLOAD_ERR_OK) {
                $image_name = $file->getClientFilename();
                $fileType = $file->getClientMediaType();
                $fileSize = $file->getSize();

                // Validate file type
                if (!in_array($fileType, $allowedMimeTypes)) {
                    $this->Flash->error(__('Invalid file type. Please upload a JPEG, PNG, or GIF image.'));
                    return $this->redirect(['controller' => 'Schools', 'action' => 'updateSchoolLogo']);
                }

                // Validate file size
                if ($fileSize > $maxFileSize) {
                    $this->Flash->error(__('File size exceeds 2MB. Please upload a smaller image.'));
                    return $this->redirect(['controller' => 'Schools', 'action' => 'updateSchoolLogo']);
                }

                // Create a unique file name to avoid conflicts
                $dir = WWW_ROOT . 'img' . DS . 'school_logo_img';
                if (!is_dir($dir)) {
                    mkdir($dir, 0775, true);
                }
                $targetPath = $dir . DS . uniqid() . '-' . $image_name;


                // Move the uploaded file
                $file->moveTo($targetPath);
                // Update school logo in the database
                $school->logo = basename($targetPath);
                if ($this->Schools->save($school)) {
                    $this->Flash->success(__('The school logo has been uploaded successfully'));
                    return $this->redirect(['controller' => 'pages', 'action' => 'display', 'School_dashboard']);
                } else {
                    $this->Flash->error(__('Failed to save the logo to the database. Please try again.'));
                    return;
                }

            }
        }


    }

    public function updateAccountStatus($id = null, $status = null){
        $this->request->allowMethod(['post','get']);
        $School = $this->Schools->get($id);

        if ($status == 1){
            $School->approval_status = 0;
        }
        else {
            $School->approval_status = 1;
        }

        if($this->Schools->save($School)){
            $this->Flash->success(__('The account status of' . ' ' . $School->rep_first_name . ' ' . $School->rep_last_name . ' ' . 'has been changed'));
        }


        return $this->redirect(['controller'=>'Pages', 'action'=>'display','Admin_dashboard']);
    }



}
