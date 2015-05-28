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

        $user = $this->People->newEntity();

        if ($this->request->is('post')) {
            $user = $this->People->patchEntity($user, $this->request->data);
                        
            if ($this->People->save($user)) {

				$studentsTable = TableRegistry::get('Students');
        		$student = $studentsTable->newEntity();
        		$student->person_id = $user->id;
        		$student->internet_plan = $user->internet_plan;
        		$studentsTable->save($student);

            	$this->Flash->success(__('Person Added'));
                return $this->redirect(['controller' => 'students', 'action' => 'add']);
            }
            $this->Flash->error(__('Unable to add the user.'));
        }
        $this->set('user', $user);
    }  

}

