<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

class TenantsController extends AppController
{
    public function index()
    {
        $this->loadModel('Users');
        $this->loadModel('People');
        $this->loadModel('Students');
        $this->loadModel('Leases');
        $this->loadModel('Properties');

        $students = $this->paginate($this->Students->find('all')->contain('People'));
        $this->set(compact('students'));

        $people = $this->paginate($this->People->find('all')->contain(['Students', 'Users']));
        $this->set(compact('people'));

        $this->loadModel('Rooms');

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

    public function archived()
    {
        $this->loadModel('Users');
        $this->loadModel('People');
        $this->loadModel('Students');
        $this->loadModel('Leases');
        $this->loadModel('Properties');

        $students = $this->paginate($this->Students->find('all')->contain('People'));
        $this->set(compact('students'));

        $people = $this->paginate($this->People->find('all')->contain(['Students', 'Users']));
        $this->set(compact('people'));

        $this->loadModel('Rooms');

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

    public function add()
    {
        $this->loadModel('People');
        $this->loadModel('Students');
        $this->loadModel('Users');
        $this->loadModel('Leases');
        $this->loadModel('Properties');
        $this->loadModel('Macaddresses');
        $this->loadModel('Rooms');

        $user = $this->People->newEntity();

        $properties = $this->Properties->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'address']);
        $rooms = $this->Leases->Rooms->find('list', ['groupField' => 'property.address', 'conditions'=>['vacant'=>'TRUE', 'rooms.archived'=>'NO']])->contain('Properties');
        $this->set(compact('rooms', 'properties'));  

        if ($this->request->is('post')) {
            $user = $this->People->patchEntity($user, $this->request->data);
                        
            if ($this->People->save($user)) {
                $studentsTable = TableRegistry::get('Students');
                $student = $studentsTable->newEntity();
                $student->person_id = $user->id;
                $student->internet_plan = $user->internet_plan;
                $studentsTable->save($student);

                $newUsersTable = TableRegistry::get('Users');
                $newUser = $newUsersTable->newEntity();
                $newUser->person_id = $user->id;
                $newUser->username = $user->email;
                $newUser->password = $user->email;
                $newUser->role = 'tenant';
                $newUsersTable->save($newUser);

                $room = $this->Rooms->get($user->room_id);
                $this->set(compact('room'));

                $leasesTable = TableRegistry::get('Leases');
                $lease = $leasesTable->newEntity();
                $lease->property_id = $room->property_id;
                $lease->room_id = $user->room_id;
                $lease->student_id = $student->id;
                //$lease->date_start = $user->date_start['year']."-".$user->date_start['month']."-".$user->date_start['day'];
                //$lease->date_end = $user->date_end['year']."-".$user->date_end['month']."-".$user->date_end['day'];
                //$newStartDate = explode("/", $user->date_start);
                //$lease->date_start = $newStartDate[2]."-".$newStartDate[1]."-".$newStartDate[0];
                //$newEndDate = explode("/", $user->date_end);
                //$lease->date_end = $newEndDate[2]."-".$newEndDate[1]."-".$newEndDate[0];
                //$lease->date_start = substr($user->date_start, 6, 9)."-".substr($user->date_start, 3, 2)."-".substr($user->date_start, 0, 2);
                //$lease->date_end = substr($user->date_end, 6, 9)."-".substr($user->date_end, 3, 2)."-".substr($user->date_end, 0, 2);
                $lease->date_start = $user->date_start;
                $lease->date_end = $user->date_end;
                $lease->weekly_price = $user->weekly_price;
                $leasesTable->save($lease);

                $macaddressesTable = TableRegistry::get('Macaddresses');
                $macaddress = $macaddressesTable->newEntity();
                $macaddress->person_id = $user->id;
                $macaddressesTable->save($macaddress);

                $this->Flash->success(__('Person Added'));
                return $this->redirect(['controller' => 'tenants', 'action' => 'updaterooms']);
            }
            $this->Flash->error(__('Unable to add the person'));
        }
        $this->set('user', $user);
    }

    public function edit($id = null)
    {

        //This just loads a bunch of models that may be used
        $this->loadModel('Users');
        $this->loadModel('People');
        $this->loadModel('Students');

        $user = $this->Users->get($id, ['contain' => ['People']]);
		//$user['confirm_password'] = $user['password'];

        //This provides the variable to use in edit.ctp to auto populate the current person's details
        $defaultPerson = $this->People->get($user->person_id, ['contain' => ['Students']]);
        $this->set(compact('defaultPerson'));

        $defaultStudent = $this->Students->get($defaultPerson->student->id);
        $this->set(compact('defaultStudent'));
        if ($this->request->is(['post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)){

                $peopleTable = TableRegistry::get('People');
                $person = $peopleTable->get($user->person_id); //Gets the person with the same person_id in the current $user

                $person->first_name = $user->first_name;
                $person->last_name = $user->last_name;
                $person->common_name = $user->common_name;
                $person->phone = $user->phone;
                $peopleTable->save($person); //Must have this statement to save the changes

                $studentsTable = TableRegistry::get('Students');
                $student = $studentsTable->get($defaultPerson->student->id); //Gets the student with the same id in the current student

                $student->internet_plan = $user->internet_plan;
                $studentsTable->save($person); //Must have this statement to save the changes

                $this->Flash->success(__('This tenant has been updated'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update this tenant'));
        }
        $this->set('user', $user);

        //finds the list of people in the people's table
        $people = $this->Users->People->find('list', ['limit' => 200]);
        $this->set(compact('people'));
    }

    public function view($id = null)
    {
        $this->loadModel('People');
        $this->loadModel('Users');
        $this->loadModel('Students');
        $this->loadModel('Leases');
        $this->loadModel('Rooms');
        $this->loadModel('Emergencies');
        $this->loadModel('Macaddresses');

        $person = $this->People->get($id, ['contain' => ['Students', 'Users', 'Macaddresses']]);
        $this->set(compact('person'));

        $student = $this->Students->get($person->student->id, [
            'contain' => ['Users', 'People', 'Leases', 'Emergencies']
        ]);
        $this->set('student', $student);
        $this->set('_serialize', ['student']);

        $query = $this->Leases->find('all', ['conditions' => ['student_id' => $person->student->id], 'contain' => ['Rooms', 'Properties']]);
        $this->set(compact('query'));

        $emergencyQuery = $this->Emergencies->find('all', ['conditions' => ['person_id' => $person->id]]);
        $this->set(compact('emergencyQuery'));

    }

    public function updaterooms()
    {
        $this->loadModel('Rooms');
        $this->loadModel('Properties');
        $this->loadModel('Leases');

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

        // $this->Flash->success('Rooms have been updated!');    
        return $this->redirect($this->referer());
    }

    public function archivetenant($id) {

        $this->loadModel('Students');

        $studentsTable = TableRegistry::get('Students');

        $student = $studentsTable->get($id);
        $this->set(compact('student'));

        $student->archived = 'YES';

        $studentsTable->save($student);

        $this->Flash->success('Tenant Archived');

        return $this->redirect($this->referer());

    }

    public function unarchivetenant($id) {

        $this->loadModel('Students');

        $studentsTable = TableRegistry::get('Students');

        $student = $studentsTable->get($id);
        $this->set(compact('student'));

        $student->archived = 'NO';

        $studentsTable->save($student);

        $this->Flash->success('Tenant Unarchived');

        return $this->redirect($this->referer());

    }



}
