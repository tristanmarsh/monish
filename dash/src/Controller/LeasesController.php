<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Table;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;

/**
 * Leases Controller
 *
 * @property \App\Model\Table\LeasesTable $Leases */
class LeasesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->loadModel('People');
        $walrus = $this->People;
        $this->paginate = [
            'contain' => ['Rooms', 'Students', 'Properties']
        ];
        $this->set('leases', $this->paginate($this->Leases));
        $this->set('_serialize', ['leases']);
        $lion = $this->Leases->Students->find('all', ['contain' => ['Users']]);
        $this->set('lion', $lion);
        $this->set('walrus', $walrus);

        $this->loadModel('Rooms');
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

    }

    /**
     * View method
     *
     * @param string|null $id Lease id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)

    {
        $this->loadModel('People');
        $walrus = $this->People;
        $this->set('walrus', $walrus);
        $lease = $this->Leases->get($id, [
            'contain' => ['Rooms', 'Students']
        ]);
        $this->set('lease', $lease);
        //$lion = $this->User;
        //$this->set('lion', $lion);
        $query = $this->Leases->Students->get($lease->student->id, ['contain' => ['Users']]);
        $this->set('query', $query);
        $this->set('_serialize', ['lease']);

    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $this->loadModel('Rooms');
        $this->loadModel('Properties');

        $lease = $this->Leases->newEntity();
        if ($this->request->is('post')) {
            $lease->date_start = $lease->start;
            $lease->date_end = $lease->end;
            $lease->property_id = 1;

            $lease = $this->Leases->patchEntity($lease, $this->request->data);
            if ($this->Leases->save($lease)) {
                //Finds the room entity related to the lease being added
                $room = $this->Rooms->get($lease->room_id, ['contain' => ['Properties']]);
                $this->set(compact('room'));
                //Replaces the property_id of 1 (above) with the actual property id of the room
                $lease->property_id = $room->property_id;
                //Always remember to save
                $this->Leases->save($lease);
                $this->Flash->success('The lease has been saved.');
                return $this->redirect(['controller' => 'tenants', 'action' => 'updaterooms']);
            } else {
                $this->Flash->error('The lease could not be saved. Please, try again.');
            }
        }
        //$properties = $this->Leases->Properties->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'address']);
        $rooms = $this->Leases->Rooms->find('list', ['groupField' => 'property.address', 'conditions'=>['vacant'=>'TRUE']])->contain('Properties');
        $students = $this->Leases->Students->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'person.first_name'])->contain(['People']);
        $this->set(compact('lease', 'rooms', 'students', 'properties'));
        $this->set('_serialize', ['lease']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Lease id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lease = $this->Leases->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lease = $this->Leases->patchEntity($lease, $this->request->data);
            if ($this->Leases->save($lease)) {
                $this->Flash->success('The lease has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The lease could not be saved. Please, try again.');
            }
        }
        $rooms = $this->Leases->Rooms->find('list', ['limit' => 200]);
        $students = $this->Leases->Students->find('list', ['limit' => 200]);
        $this->set(compact('lease', 'rooms', 'students'));
        $this->set('_serialize', ['lease']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Lease id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lease = $this->Leases->get($id);
        if ($this->Leases->delete($lease)) {
            $this->Flash->success('The lease has been deleted.');
        } else {
            $this->Flash->error('The lease could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
