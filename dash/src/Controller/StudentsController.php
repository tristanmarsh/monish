<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Students Controller
 *
 * @property \App\Model\Table\StudentsTable $Students */
class StudentsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'People']
        ];
        $this->set('students', $this->paginate($this->Students));
        $this->set('_serialize', ['students']);
    }

    /**
     * View method
     *
     * @param string|null $id Student id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $student = $this->Students->get($id, [
            'contain' => ['Users', 'People', 'Leases', 'Emergencies']
        ]);
        $this->set('student', $student);
        $this->set('_serialize', ['student']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $student = $this->Students->newEntity();
        if ($this->request->is('post')) {
            $student = $this->Students->patchEntity($student, $this->request->data);
            if ($this->Students->save($student)) {
                $this->Flash->success('The student has been saved');
                return $this->redirect(['controller' => 'leases', 'action' => 'add']);
            } else {
                $this->Flash->error('The student could not be saved. Please, try again');
            }
        }
        //the condition removes the Person with id = 1 from the drop down list (which is Tony Wise)
        $person = $this->Students->People->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'first_name', 'conditions' => array('id !=' => '1')]);
		$emergencies = $this->Students->Emergencies->find('list', ['limit' => 200, 'keyfield' => 'id', 'valueField' => 'first_name']);
        $this->set(compact('student', 'person', 'emergencies'));
        $this->set('_serialize', ['student']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Student id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $student = $this->Students->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $student = $this->Students->patchEntity($student, $this->request->data);
            if ($this->Students->save($student)) {
                $this->Flash->success('The internet plan has been changed');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The student could not be saved. Please, try again');
            }
        }
        $person = $this->Students->People->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'first_name']);
		$emergencies = $this->Students->Emergencies->find('list', ['limit' => 200, 'keyfield' => 'id', 'valueField' => 'first_name']);
        $this->set(compact('student', 'person', 'emergencies'));
        $this->set('_serialize', ['student']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Student id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $student = $this->Students->get($id);
        if ($this->Students->delete($student)) {
            $this->Flash->success('The student has been deleted');
        } else {
            $this->Flash->error('The student could not be deleted. Please, try again');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        // All registered users can add articles
        if ($this->request->action === 'index' || $this->request->action === 'edit') {
            return true;
        }

        return parent::isAuthorized($user);
    }

}
