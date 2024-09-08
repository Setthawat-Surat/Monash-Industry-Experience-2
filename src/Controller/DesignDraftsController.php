<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\CampaignsTable;
use App\Model\Table\DesignPhotosTable;
use App\Model\Table\UsersTable;
use Cake\Mailer\Mailer;
use Cake\Routing\Router;

use Cake\ORM\TableRegistry;

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
    private CampaignsTable $campaigns;

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
    public function view($id = null)
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
    public function edit($id = null)
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
    public function delete($id = null)
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

        if ($this->request->is('post')) {
            $designDraft = $this->DesignDrafts->patchEntity($designDraft, $this->request->getData());
            $designDraft->approval_status = 0;
            $designDraft->campaign_id = $campaignId;
            $designDraft->user_id = $this->getRequest()->getAttribute('identity')->get('id');

            // Save the design draft first
            if ($this->DesignDrafts->save($designDraft)) {
                $designDraftId = $designDraft->id;

                // Process file uploads
                $files = $this->request->getData('studentDesigns');

                if (!empty($files)) {
                    foreach ($files as $file) {
                        if ($file->getError() === UPLOAD_ERR_OK) {
                            $image_name = $file->getClientFilename();
                            $targetPath = WWW_ROOT . 'img/student_designs_img' . DS . $image_name;

                            // Move file to target directory
                            $file->moveTo($targetPath);

                            // Create and save design photo entity
                            $designPhotoData = [
                                'photo' => $image_name,
                                'design_draft_id' => $designDraftId,
                            ];

                            $designPhoto = $this->DesignPhotos->newEmptyEntity();
                            $designPhoto = $this->DesignPhotos->patchEntity($designPhoto, $designPhotoData);

                            if (!$this->DesignPhotos->save($designPhoto)) {
                                $this->Flash->error(__('Unable to save some photos. Please try again.'));
                            }
                        }
                    }
                    $this->Flash->success(__('Your design has been saved along with the photos.'));
                    return $this->redirect(['controller' => 'DesignDrafts', 'action' => 'myDesign', '?' => ['cID' => $campaignId]]);
                } else {
                    $this->Flash->error(__('No files were uploaded.'));
                }
            } else {
                $this->Flash->error(__('The design draft could not be saved. Please, try again.'));
            }
        }

        $campaigns = $this->DesignDrafts->Campaigns->find('list', ['limit' => 200])->all();
        $users = $this->DesignDrafts->Users->find('list', ['limit' => 200])->all();
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

    public function adminViewDesign(){

        $campaignTable = TableRegistry::getTableLocator()->get('Campaigns');
        $campaign = $campaignTable->find()->all();

        $this->set(compact('campaign'));


    }

    public function downloadDesigns($designDraftId = null)
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
        $zip = new \ZipArchive();
        $zipFilename = tempnam(sys_get_temp_dir(), 'zip');
        $zip->open($zipFilename, \ZipArchive::CREATE);

        // Add school logo to ZIP
        if ($school->logo) {
            $logoPath = WWW_ROOT . 'img/school_logo_img' . DS . $school->logo;
            if (file_exists($logoPath)) {
                $zip->addFile($logoPath, 'school_logo/' . $school->logo);
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
            }
        }

        // Close ZIP file
        $zip->close();

        // Prepare response
        $response = $this->response->withFile(
            $zipFilename,
            ['download' => true, 'name' => $school->name . '_' . $designDraft->design_yearlevel . '_designs.zip']
        );

        // Clean up
        unlink($zipFilename);

        return $response;
    }

    public function addFinalDesign(){

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


        if ($this->request->is(['post','put'])) {
            $file = $this->request->getData('final_design');
            if ($file->getError() === UPLOAD_ERR_OK) {
                $image_name = $file->getClientFilename();
                $targetPath = WWW_ROOT . 'img/final_design' . DS . $image_name;
                $file->moveTo($targetPath);
                $DesignDrafts->final_design_photo = $image_name;



                // Send a template email

                $subject = 'Contact Request From ' ;

                $mailer = new Mailer('default');
                $mailer->setSubject($subject)
                    ->setEmailFormat('html')
                    ->setTo($toEmail)
                    ->setFrom("123@123.com")
                    ->viewBuilder()
                    ->disableAutoLayout()
                    ->setTemplate('final_design');


                $image_url = Router::url('/img/final_design/' . $image_name, true);
                $year_level = $DesignDrafts->design_yearlevel;
                $description = $DesignDrafts->specifications;

                $mailer->setViewVars([
                    'content' => "this is your final design",
                    'campaign_name' => $campaign_name,
                    'email' => "903199600@qq.com",
                    'final_design' => $image_url,
                    'year_level' => $year_level,
                    'description' => $description,
                    'start_date' => $start_date,
                    'end_date' => $end_date
                ]);



                if ($mailer->deliver() && $this->DesignDrafts->save($DesignDrafts) ) {
                    $this->Flash->success(__('The final design has been uploaded successfully'));

                }
            } else {
                $this->Flash->error(__('Failed to upload the file.'));
            }
        }

        $this->set(compact('DesignDrafts'));

    }

}

