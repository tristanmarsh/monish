<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Table;
use Cake\ORM\Query;

/**
 * Emergencies Controller
 *
 * @property \App\Model\Table\EmergenciesTable $Emergencies */
class EmergenciesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->loadModel('People');
        $this->loadModel('Users');

        $this->paginate = [
            'contain' => ['People']
        ];
        $this->set('emergencies', $this->paginate($this->Emergencies));
        $this->set('_serialize', ['emergencies']);

        $authid = $this->Auth->user('id');
        $this->set(compact('authid'));
        $userEntity = $this->Users->get($authid);
        $this->set(compact('userEntity'));
        $personEntity = $this->People->get($userEntity->person_id);
        $this->set(compact('personEntity'));

        $query = $this->Emergencies->find('all', ['conditions' => ['person_id' => $personEntity->id]]);
        $this->set(compact('query'));
    }

    /**
     * View method
     *
     * @param string|null $id Emergency id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $emergency = $this->Emergencies->get($id, [
            'contain' => ['EmergencyStudent', 'Students']
        ]);
        $this->set('emergency', $emergency);
        //$lion = $this->Emergencies->Students->get($emergency->students->id, ['contain' => ['Users']]);
        $lion = $this->Emergencies->Students->find('all', ['contain' => ['Users']]);
        $this->set('lion', $lion);
        $this->set('_serialize', ['emergency']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $emergency = $this->Emergencies->newEntity();
        
        $this->loadModel('People');
        $this->loadModel('Users');

        $this->paginate = [
            'contain' => ['People']
        ];
        $this->set('emergencies', $this->paginate($this->Emergencies));
        $this->set('_serialize', ['emergencies']);

        $authid = $this->Auth->user('id');
        $this->set(compact('authid'));
        $userEntity = $this->Users->get($authid);
        $this->set(compact('userEntity'));
        $personEntity = $this->People->get($userEntity->person_id);
        $this->set(compact('personEntity'));

        if ($this->request->is('post')) {
            $emergency = $this->Emergencies->patchEntity($emergency, $this->request->data);
            $emergency->person_id = $personEntity->id;
            if ($this->Emergencies->save($emergency)) {
                $this->Flash->success('The emergency has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The emergency could not be saved. Please, try again.');
            }
        }
        $this->set(compact('emergency'));
        $this->set('_serialize', ['emergency']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Emergency id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $emergency = $this->Emergencies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $emergency = $this->Emergencies->patchEntity($emergency, $this->request->data);
            if ($this->Emergencies->save($emergency)) {
                $this->Flash->success('The emergency has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The emergency could not be saved. Please, try again.');
            }
        }
        $this->set(compact('emergency'));
        $this->set('_serialize', ['emergency']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Emergency id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $emergency = $this->Emergencies->get($id);
        if ($this->Emergencies->delete($emergency)) {
            $this->Flash->success('The emergency has been deleted.');
        } else {
            $this->Flash->error('The emergency could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        // All registered users can add articles
        if (in_array($this->request->action, ['index','add','edit'])) {
            return true;
        }

        return parent::isAuthorized($user);
    }

}
