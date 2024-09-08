<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Mailer;
use Cake\ORM\TableRegistry;

class CreateCampaignController extends AppController
{
    private $Campaigns;

    public function initialize(): void
    {
        parent::initialize();
        // use TableRegistry load model
        $this->Campaigns = TableRegistry::getTableLocator()->get('Campaigns');
    }

    public function index()
    {
        $campaign = $this->Campaigns->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            // Patch the data into the entity
            $campaign = $this->Campaigns->patchEntity($campaign, $data);

            if ($campaign->school_id === null) {
                $userId = $this->Authentication->getIdentity()->get('id');
                $school = $this->Campaigns->Schools->find()
                    ->where(['id' => $userId])
                    ->first();

                if ($school) {
                    $campaign->school_id = $school->id;
                }
            }

            if ($campaign->total_fund_raised === null) {
                $campaign->total_fund_raised = 0;
            }

            // Check if the entity is valid
            if ($campaign->getErrors()) {
                // Handle validation errors if needed
            }
/*
            // Send a template email
            $toEmail = 'u24s1014@u24s1014.iedev.org';
            $subject = 'Contact Request From ';

            $mailer = new Mailer('default');
            $mailer->setSubject($subject)
                ->setEmailFormat('html')
                ->setTo($toEmail)
                ->setFrom("123@123.com")
                ->viewBuilder()
                ->disableAutoLayout()
                ->setTemplate('final_design');

            $mailer->setViewVars([
                'content' => "this is the mail content",
                'full_name' => "binZhou",
                'email' => "903199600@qq.com"
            ]);*/


            // Save the campaign entity into the database
            if ($this->Campaigns->save($campaign)) {
                $this->Flash->success(__('The campaign has been saved.'));


                return $this->redirect(['controller' => 'Campaigns', 'action' => 'myCampaign']);
            }

            $this->Flash->error(__('The campaign could not be saved. Please, try again.'));
        }

        $this->set(compact('campaign'));
    }


}

