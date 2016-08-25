<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AnnouncementTypes Controller
 *
 * @property \App\Model\Table\AnnouncementTypesTable $AnnouncementTypes
 */
class AnnouncementTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $announcementTypes = $this->paginate($this->AnnouncementTypes);

        $this->set(compact('announcementTypes'));
        $this->set('_serialize', ['announcementTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Announcement Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $announcementType = $this->AnnouncementTypes->get($id, [
            'contain' => ['Users', 'Announcements']
        ]);

        $this->set('announcementType', $announcementType);
        $this->set('_serialize', ['announcementType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $announcementType = $this->AnnouncementTypes->newEntity();
        if ($this->request->is('post')) {
            $announcementType = $this->AnnouncementTypes->patchEntity($announcementType, $this->request->data);
            if ($this->AnnouncementTypes->save($announcementType)) {
                $this->Flash->success(__('The announcement type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The announcement type could not be saved. Please, try again.'));
            }
        }
        $users = $this->AnnouncementTypes->Users->find('list', ['limit' => 200]);
        $this->set(compact('announcementType', 'users'));
        $this->set('_serialize', ['announcementType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Announcement Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $announcementType = $this->AnnouncementTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $announcementType = $this->AnnouncementTypes->patchEntity($announcementType, $this->request->data);
            if ($this->AnnouncementTypes->save($announcementType)) {
                $this->Flash->success(__('The announcement type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The announcement type could not be saved. Please, try again.'));
            }
        }
        $users = $this->AnnouncementTypes->Users->find('list', ['limit' => 200]);
        $this->set(compact('announcementType', 'users'));
        $this->set('_serialize', ['announcementType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Announcement Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $announcementType = $this->AnnouncementTypes->get($id);
        if ($this->AnnouncementTypes->delete($announcementType)) {
            $this->Flash->success(__('The announcement type has been deleted.'));
        } else {
            $this->Flash->error(__('The announcement type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
