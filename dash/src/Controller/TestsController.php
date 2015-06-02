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

    public function lease(){
        $this->loadModel('Properties');
        $this->loadModel('Rooms');
        $this->loadModel('Leases');

        $data = $this->Properties->find('threaded')->contain('Rooms');
        $data2 = $this->Rooms->find('list', ['groupField' => 'property.address'])->contain('Properties');

        $this->set(compact('data', 'data2'));
    }

}

