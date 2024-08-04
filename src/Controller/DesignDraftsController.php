<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * DesignDrafts Controller
 *
 * @property \App\Model\Table\DesignDraftsTable $DesignDrafts
 */
class DesignDraftsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->DesignDrafts->find()
            ->contain(['Campaigns', 'Admins']);
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
        $designDraft = $this->DesignDrafts->get($id, contain: ['Campaigns', 'Admins', 'DesignPhotos', 'Products']);
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
        $admins = $this->DesignDrafts->Admins->find('list', limit: 200)->all();
        $this->set(compact('designDraft', 'campaigns', 'admins'));
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
        $admins = $this->DesignDrafts->Admins->find('list', limit: 200)->all();
        $this->set(compact('designDraft', 'campaigns', 'admins'));
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
}
