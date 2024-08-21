<?php

namespace App\Controller;

use App\Controller\AppController;

class CreateCampaignController extends AppController
{


    public function index()
    {

    }

    public function create()
    {
        $campaign = $this->Campaigns->newEmptyEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            // Patch the data into the entity
            $campaign = $this->Campaigns->patchEntity($campaign, $data);

            // Save the campaign entity into the database
            if ($this->Campaigns->save($campaign)) {
                $this->Flash->success(__('The campaign has been saved.'));

                return $this->redirect(['action' => 'index']); // Redirect to a desired action after success
            }

            $this->Flash->error(__('The campaign could not be saved. Please, try again.'));
        }

        $this->set(compact('campaign'));
    }


}
