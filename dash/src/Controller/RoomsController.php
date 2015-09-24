<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Rooms Controller
 *
 * @property \App\Model\Table\RoomsTable $Rooms */
class RoomsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index() {

        $this->redirect($this->referer());

        $this->paginate = [
            'contain' => ['Properties']
        ];
        $this->set('rooms', $this->paginate($this->Rooms));
        $this->set('_serialize', ['rooms']);

        $this->loadModel('Leases');
        $this->loadModel('Properties');

        $roomlease = $this->Rooms;
        $this->set(compact('roomlease'));

        $allrooms = $this->Rooms->find('all', ['contain' => ['Properties', 'Leases']]);
        $this->set(compact('allrooms'));

        foreach ($allrooms as $room){
            $roomsTable = TableRegistry::get('Rooms');
            $currentroom = $roomsTable->get($room->id, ['contain'=>'Leases']); 
            
            $test = "";
            $sentinel = true; //true if Never Been Leased
            if (!empty($currentroom->leases)) {
                foreach ($currentroom->leases as $leastenddate) {
                    $test = $test."||".$leastenddate->date_end->format('Y-m-d');
                }
            }
            else {
                $currentroom->vacant = 'TRUE';
                $sentinel = false;
            }
            if ($sentinel) { 
                $toArray = explode("||", $test);
                if (max($toArray) > date("Y-m-d")) {
                    $currentroom->vacant = 'FALSE';
                } else if (max($toArray) === date("Y-m-d")) {
                    $currentroom->vacant = 'FALSE';
                } else if (max($toArray) < date("Y-m-d")) {
                    $currentroom->vacant = 'TRUE';
                }
            }

            $roomsTable->save($currentroom);
        }

        $lastroomupdateTable = TableRegistry::get('Lastroomupdate');
        $lastroomupdate = $lastroomupdateTable->get(1); 

        $lastroomupdate->date = date("Y-m-d");
        $lastroomupdateTable->save($lastroomupdate);

        $this->set(compact('lastroomupdate'));

    }

    /**
     * View method
     *
     * @param string|null $id Room id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $room = $this->Rooms->get($id, [
            'contain' => ['Properties', 'Leases']
        ]);
        $this->set('room', $room);
        $this->set('_serialize', ['room']);

        //$lion = $this->Rooms->Leases->get($room->leases->id, ['contain' => 'Students']);
        //$this->set('lion', $lion);

        $this->loadModel('People');
        $this->loadModel('Students');
        $this->loadModel('Leases');
        $this->loadModel('Properties');
        
        $leasesTable = $this->Leases;
        $this->set(compact('leasesTable'));
        $peopleTable = $this->People;
        $this->set(compact('peopleTable'));
        $studentsTable = $this->Students;
        $this->set(compact('studentsTable'));

        $properties = $this->Properties->find('all', ['contain' => ['Rooms']]);
        $this->set(compact('properties'));

        $roomlease = $this->Rooms;
        $this->set(compact('roomlease'));

        $studentTable = $this->Students;
        $this->set(compact('studentTable'));
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $room = $this->Rooms->newEntity();
        if ($this->request->is('post')) {
            $room = $this->Rooms->patchEntity($room, $this->request->data);
            $room->vacant = 'TRUE';
            if ($this->Rooms->save($room)) {
                $this->Flash->success('The room has been saved.');
                return $this->redirect(['controller' => 'properties', 'action' => 'index']);
            } else {
                $this->Flash->error('The room could not be saved. Please, try again.');
            }
        }
        $properties = $this->Rooms->Properties->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'address']);
        $this->set(compact('room', 'properties'));
        $this->set('_serialize', ['room']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Room id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $room = $this->Rooms->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $room = $this->Rooms->patchEntity($room, $this->request->data);
            if ($this->Rooms->save($room)) {
                $this->Flash->success('The room has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The room could not be saved. Please, try again.');
            }
        }
        $properties = $this->Rooms->Properties->find('list', ['limit' => 200, 'valueField'=>'address']);
        $this->set(compact('room', 'properties'));
        $this->set('_serialize', ['room']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Room id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $room = $this->Rooms->get($id);
        if ($this->Rooms->delete($room)) {
            $this->Flash->success('The room has been deleted.');
        } else {
            $this->Flash->error('The room could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
