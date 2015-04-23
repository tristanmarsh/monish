<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EmergencyContacts Controller
 *
 * @property \App\Model\Table\EmergencyContactsTable $EmergencyContacts */
class EmergencyContactsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('emergencyContacts', $this->paginate($this->EmergencyContacts));
        $this->set('_serialize', ['emergencyContacts']);
    }

    /**
     * View method
     *
     * @param string|null $id Emergency Contact id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $emergencyContact = $this->EmergencyContacts->get($id, [
            'contain' => []
        ]);
        $this->set('emergencyContact', $emergencyContact);
        $this->set('_serialize', ['emergencyContact']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $emergencyContact = $this->EmergencyContacts->newEntity();
        if ($this->request->is('post')) {
            $emergencyContact = $this->EmergencyContacts->patchEntity($emergencyContact, $this->request->data);
            if ($this->EmergencyContacts->save($emergencyContact)) {
                $this->Flash->success('The emergency contact has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The emergency contact could not be saved. Please, try again.');
            }
        }
        $this->set(compact('emergencyContact'));
        $this->set('_serialize', ['emergencyContact']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Emergency Contact id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $emergencyContact = $this->EmergencyContacts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $emergencyContact = $this->EmergencyContacts->patchEntity($emergencyContact, $this->request->data);
            if ($this->EmergencyContacts->save($emergencyContact)) {
                $this->Flash->success('The emergency contact has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The emergency contact could not be saved. Please, try again.');
            }
        }
        $this->set(compact('emergencyContact'));
        $this->set('_serialize', ['emergencyContact']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Emergency Contact id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $emergencyContact = $this->EmergencyContacts->get($id);
        if ($this->EmergencyContacts->delete($emergencyContact)) {
            $this->Flash->success('The emergency contact has been deleted.');
        } else {
            $this->Flash->error('The emergency contact could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
