<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

class TestsController extends AppController
{

    public function index()
    {
        
    }

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['index']);
    }

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
                //$test = explode(" ", $user->date_start);
                //$lease->date_start = $test[0]."-".$test[1]."-".$test[2];
                //$test = explode(" ", $user->date_end);
                //$lease->date_end = $test[0]."-".$test[1]."-".$test[2];
                $lease->date_start = $user->date_start['year']."-".$user->date_start['month']."-".$user->date_start['day'];
                $lease->date_end = $user->date_end['year']."-".$user->date_end['month']."-".$user->date_end['day'];
                // $lease->date_start = $user->date_start;
                // $lease->date_end = $user->date_end;
                $lease->weekly_price = $user->weekly_price;
                $leasesTable->save($lease);

            	$this->Flash->success(__('Person Added'));
                return $this->redirect(['controller' => 'people', 'action' => 'index']);
            }
            $this->Flash->error(__('Unable to add the user.'));
        }
        $this->set('user', $user);
    }

    public function lease(){
        $this->loadModel('Properties');
        $this->loadModel('Rooms');
        $this->loadModel('Leases');

        $data = $this->Properties->find('threaded')->contain('Rooms');
        $data2 = $this->Rooms->find('list', ['groupField' => 'property.address'])->contain('Properties');

        $this->set(compact('data', 'data2'));
    }

}

