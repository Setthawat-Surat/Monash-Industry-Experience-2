<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * DesignPhotos Controller
 *
 * @property \App\Model\Table\DesignPhotosTable $DesignPhotos
 */
class DesignPhotosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->DesignPhotos->find()
            ->contain(['DesignDrafts']);
        $designPhotos = $this->paginate($query);

        $this->set(compact('designPhotos'));
    }

    /**
     * View method
     *
     * @param string|null $id Design Photo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $designPhoto = $this->DesignPhotos->get($id, contain: ['DesignDrafts']);
        $this->set(compact('designPhoto'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $designPhoto = $this->DesignPhotos->newEmptyEntity();
        if ($this->request->is('post')) {
            $designPhoto = $this->DesignPhotos->patchEntity($designPhoto, $this->request->getData());
            if ($this->DesignPhotos->save($designPhoto)) {
                $this->Flash->success(__('The design photo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The design photo could not be saved. Please, try again.'));
        }
        $designDrafts = $this->DesignPhotos->DesignDrafts->find('list', limit: 200)->all();
        $this->set(compact('designPhoto', 'designDrafts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Design Photo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $designPhoto = $this->DesignPhotos->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $designPhoto = $this->DesignPhotos->patchEntity($designPhoto, $this->request->getData());
            if ($this->DesignPhotos->save($designPhoto)) {
                $this->Flash->success(__('The design photo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The design photo could not be saved. Please, try again.'));
        }
        $designDrafts = $this->DesignPhotos->DesignDrafts->find('list', limit: 200)->all();
        $this->set(compact('designPhoto', 'designDrafts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Design Photo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $designPhoto = $this->DesignPhotos->get($id);
        if ($this->DesignPhotos->delete($designPhoto)) {
            $this->Flash->success(__('The photo has been deleted.'));
        } else {
            $this->Flash->error(__('The photo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function deletephotos($id){

        $campaignId = $this->request->getQuery('cID');
        $designDraftId = $this->request->getQuery('dID');
        $this->request->allowMethod(['post', 'delete']);
        $designPhoto = $this->DesignPhotos->get($id);
        if ($this->DesignPhotos->delete($designPhoto)) {
            $this->Flash->success(__('The photo has been deleted.'));
        } else {
            $this->Flash->error(__('The photo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'DesignDrafts', 'action' => 'editDesign', $designDraftId, '?' => ['dID' => $designDraftId, 'cID' => $campaignId]]);

    }
}
