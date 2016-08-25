<?php
namespace App\Controller;

use App\Controller\AppController;
use \DateTime;

/**
* Announcements Controller
*
* @property \App\Model\Table\AnnouncementsTable $Announcements
*/
class AnnouncementsController extends AppController
{
    
    public function isAuthorized($user) {
        $action = $this->request->params['action'];
        if(in_array($action, ['index', 'view', 'active'])){
            return true;
        }
        
        if(empty($this->request->params['pass'][0])) {
            return false;
        }
        
        return $user['approved'];
    }
    
    /**
    * Index method
    *
    * @return \Cake\Network\Response|null
    */
    public function index()
    {
        $this->paginate = [
        'contain' => ['Users', 'AnnouncementTypes']
        ];
        $announcements = $this->paginate($this->Announcements);
        
        $this->set(compact('announcements'));
        $this->set('_serialize', ['announcements']);
    }
    
    /**
    * View method
    *
    * @param string|null $id Announcement id.
    * @return \Cake\Network\Response|null
    * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */
    public function view($id = null)
    {
       
        $announcement = $this->Announcements->get($id, [
        'contain' => ['Users', 'AnnouncementTypes']
        ]);
        
        $this->set('announcement', $announcement);
        $this->set('_serialize', ['announcement']);
    }
    
    public function active($locationId = null) {
         $this->viewBuilder()->layout('blank');
        $now = new DateTime('now');
        $query = $this->Announcements->find('all')->where([
            'Announcements.start <=' => $now,
            'Announcements.end >=' => $now
        ]);
        $results = $query->all();
        $announcements = $results->toArray();
        // debug($announcements);
        $this->set('announcements', $announcements);
        $this->set('_serialize', ['announcements']);
    }
    
    /**
    * Add method
    *
    * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
    */
    public function add()
    {
        $announcement = $this->Announcements->newEntity();
        if ($this->request->is('post')) {
            $announcement = $this->Announcements->patchEntity($announcement, $this->request->data);
            if ($this->Announcements->save($announcement)) {
                $this->Flash->success(__('The announcement has been saved.'));
                
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The announcement could not be saved. Please, try again.'));
            }
        }
        $users = $this->Announcements->Users->find('list', ['limit' => 200]);
        $announcementTypes = $this->Announcements->AnnouncementTypes->find('list', ['limit' => 200]);
        $this->set(compact('announcement', 'users', 'announcementTypes'));
        $this->set('_serialize', ['announcement']);
    }
    
    /**
    * Edit method
    *
    * @param string|null $id Announcement id.
    * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
    * @throws \Cake\Network\Exception\NotFoundException When record not found.
    */
    public function edit($id = null)
    {
        $announcement = $this->Announcements->get($id, [
        'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $announcement = $this->Announcements->patchEntity($announcement, $this->request->data);
            if ($this->Announcements->save($announcement)) {
                $this->Flash->success(__('The announcement has been saved.'));
                
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The announcement could not be saved. Please, try again.'));
            }
        }
        $users = $this->Announcements->Users->find('list', ['limit' => 200]);
        $announcementTypes = $this->Announcements->AnnouncementTypes->find('list', ['limit' => 200]);
        $this->set(compact('announcement', 'users', 'announcementTypes'));
        $this->set('_serialize', ['announcement']);
    }
    
    /**
    * Delete method
    *
    * @param string|null $id Announcement id.
    * @return \Cake\Network\Response|null Redirects to index.
    * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $announcement = $this->Announcements->get($id);
        if ($this->Announcements->delete($announcement)) {
            $this->Flash->success(__('The announcement has been deleted.'));
        } else {
            $this->Flash->error(__('The announcement could not be deleted. Please, try again.'));
        }
        
        return $this->redirect(['action' => 'index']);
    }
}