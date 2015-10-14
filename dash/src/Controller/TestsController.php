<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Network\Email\Email;

class TestsController extends AppController
{

    public function index()
    {
        $this->loadModel('Leases');
        $this->loadModel('People');
        $this->loadModel('Students');
        $this->loadModel('Properties');
        $this->loadModel('Rooms');
        $this->loadModel('Lastroomupdate');
        $this->loadModel('Users');

        $amy = $this->Users->get(41);
        $this->set(compact('amy'));
        $amypassword = $amy->password;
        $this->set(compact('amypassword'));


        $email = new Email('default');
        $email->from(['me@example.com' => 'My Site'])
        ->to('mjlai3@student.monash.edu')
        ->subject('About')
        ->send($amypassword);

        $query = $this->Leases->find('all', ['contain' => ['Rooms', 'Properties']]);
        $this->set(compact('query'));

        $rooms = $this->Rooms->find('all', ['contain' => ['Leases']]);
        $this->set(compact('rooms'));

        $properties = $this->Properties->find('all', ['contain' => ['Rooms']]);
        $this->set(compact('properties'));

        $roomlease = $this->Rooms;
        $this->set(compact('roomlease'));

        $students = $this->paginate($this->Students->find('all')->contain('People'));
        $this->set(compact('students'));

        $people = $this->paginate($this->People->find('all')->contain(['Students', 'Users']));
        $this->set(compact('people'));

        $lastroomupdate = $this->Lastroomupdate->get(1);
        $this->set(compact('lastroomupdate'));

    }

    public function modal()
    {
        $this->loadModel('Rooms');
        $this->loadModel('Properties');

        $room = $this->Rooms->get(1, ['contain' => ['Properties']]);
        $this->set(compact('room'));



        $propertyid = $room->property_id;
        $this->set(compact('propertyid'));
    }

    public function lease()
    {
        $this->loadModel('Leases');

        $lease = $this->Leases->get(8);
        $this->set(compact('lease'));
        
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
        $this->Flash->success('Refreshed!');    
        return $this->redirect(['action' => 'index']);

    }

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['index']);
    }

    //This is used as the view for add.ctp for tenants
    public function add()
    {
        $this->loadModel('People');
        $this->loadModel('Students');
        $this->loadModel('Users');
        $this->loadModel('Leases');
        $this->loadModel('Properties');

        $user = $this->People->newEntity();

        $properties = $this->Properties->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'address']);
        $rooms = $this->Leases->Rooms->find('list', ['groupField' => 'property.address'])->contain('Properties');
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

                $leasesTable = TableRegistry::get('Leases');
                $lease = $leasesTable->newEntity();
                $lease->property_id = $user->property_id;
                $lease->room_id = $user->room_id;
                $lease->student_id = $student->id;
                //$lease->date_start = $user->date_start['year']."-".$user->date_start['month']."-".$user->date_start['day'];
                //$lease->date_end = $user->date_end['year']."-".$user->date_end['month']."-".$user->date_end['day'];
//                $newStartDate = explode("/", $user->date_start);
//                $lease->date_start = $newStartDate[2]."-".$newStartDate[1]."-".$newStartDate[0];
//                $newEndDate = explode("/", $user->date_end);
//                $lease->date_end = $newEndDate[2]."-".$newEndDate[1]."-".$newEndDate[0];
                //$lease->date_start = substr($user->date_start, 6, 9)."-".substr($user->date_start, 3, 2)."-".substr($user->date_start, 0, 2);
                //$lease->date_end = substr($user->date_end, 6, 9)."-".substr($user->date_end, 3, 2)."-".substr($user->date_end, 0, 2);
                $lease->date_start = $user->date_start;
                $lease->date_end = $user->date_end;
                $lease->weekly_price = $user->weekly_price;
                $leasesTable->save($lease);

            	$this->Flash->success(__('Person Added'));
                return $this->redirect(['controller' => 'people', 'action' => 'index']);
            }
            $this->Flash->error(__('Unable to add the user.'));
        }
        $this->set('user', $user);
    }

    //This is used as the view for index.ctp for tenants
    public function tenants(){

        $this->loadModel('Users');
        $this->loadModel('People');
        $this->loadModel('Students');
        $this->loadModel('Leases');
        $this->loadModel('Properties');

        $students = $this->paginate($this->Students->find('all')->contain('People'));
        $this->set(compact('students'));

        $people = $this->paginate($this->People->find('all')->contain(['Students', 'Users']));
        $this->set(compact('people'));

//        $this->set('users', $this->paginate($this->Users));
//        $this->set('_serialize', ['users']);
//        $this->set('people', $this->paginate($this->People));
//        $this->set('_serialize', ['people']);
//        $this->set('leases', $this->paginate($this->Leases));
//        $this->set('_serialize', ['leases']);
//        $this->set('properties', $this->paginate($this->Properties));
//        $this->set('_serialize', ['properties']);

    }

    //This is used as the view for edit.ctp for tenants
    public function edit($id = null)
    {

        //This just loads a bunch of models that may be used
        $this->loadModel('Users');
        $this->loadModel('People');
        $this->loadModel('Students');

        $user = $this->Users->get($id, ['contain' => ['People']]);

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
                $student = $studentsTable->get($defaultPerson->student->id); //Gets the student with the same person_id in the current $user

                $student->internet_plan = $user->internet_plan;
                $studentsTable->save($person); //Must have this statement to save the changes

                $this->Flash->success(__('This user has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update this user.'));
        }
        $this->set('user', $user);

        //finds the list of people in the people's table
        $people = $this->Users->People->find('list', ['limit' => 200]);
        $this->set(compact('people'));
    }

    public function roomUpdate(){



    }

}

