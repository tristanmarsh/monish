<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Properties Controller
 *
 * @property \App\Model\Table\PropertiesTable $Properties */
class PropertiesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->loadModel('Leases');
        $this->loadModel('Properties');
        $this->loadModel('Rooms');
        $this->loadModel('Students');
        $this->loadModel('People');

        $rooms = $this->Rooms->find('all', ['contain' => ['Leases']]);
        $this->set(compact('rooms'));

        $properties = $this->Properties->find('all', ['contain' => ['Rooms']]);
        $this->set(compact('properties'));

        $roomlease = $this->Rooms;
        $this->set(compact('roomlease'));

        $studentTable = $this->Students;
        $this->set(compact('studentTable'));

        $peopleTable = $this->People;
        $this->set(compact('peopleTable'));
    }

    public function archived()
    {
        $this->loadModel('Leases');
        $this->loadModel('Properties');
        $this->loadModel('Rooms');
        $this->loadModel('Students');
        $this->loadModel('People');

        $rooms = $this->Rooms->find('all', ['contain' => ['Leases']]);
        $this->set(compact('rooms'));

        $properties = $this->Properties->find('all', ['contain' => ['Rooms']]);
        $this->set(compact('properties'));

        $roomlease = $this->Rooms;
        $this->set(compact('roomlease'));

        $studentTable = $this->Students;
        $this->set(compact('studentTable'));

        $peopleTable = $this->People;
        $this->set(compact('peopleTable'));
    }

    /**
     * View method
     *
     * @param string|null $id Property id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $property = $this->Properties->get($id, [
            'contain' => ['Rooms']
        ]);
        $this->set('property', $property);
        $this->set('_serialize', ['property']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $entity = $this->Properties->newEntity();
        if ($this->request->is('post')) {
            $entity = $this->Properties->patchEntity($entity, $this->request->data);
            if ($this->Properties->save($entity)) {
                $this->Flash->success('The property has been saved');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The property could not be saved. Please, try again');
            }
        }
        $this->set('entity', $entity);
    }

    /**
     * Edit method
     *
     * @param string|null $id Property id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $entity = $this->Properties->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $entity = $this->Properties->patchEntity($entity, $this->request->data);
            if ($this->Properties->save($entity)) {
                $this->Flash->success('The property has been saved');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The property could not be saved. Please, try again');
            }
        }
        $this->set('entity', $entity);
    }

    /**
     * Delete method
     *
     * @param string|null $id Property id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $property = $this->Properties->get($id);
        if ($this->Properties->delete($property)) {
            $this->Flash->success('The property has been deleted');
        } else {
            $this->Flash->error('The property could not be deleted. Please, try again');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function archiveproperty($id) {

        $this->loadModel('Properties');

        $propertiesTable = TableRegistry::get('Properties');

        $property = $propertiesTable->get($id);
        $this->set(compact('property'));

        $property->archived = 'YES';

        $propertiesTable->save($property);

        $this->Flash->success('Property Archived');

        return $this->redirect($this->referer());

    }

    public function unarchiveproperty($id) {

        $this->loadModel('Properties');

        $propertiesTable = TableRegistry::get('Properties');

        $property = $propertiesTable->get($id);
        $this->set(compact('property'));

        $property->archived = 'NO';

        $propertiesTable->save($property);

        $this->Flash->success('Property Unarchived');

        return $this->redirect($this->referer());

    }

}
