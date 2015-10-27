<?php
// src/Controller/PeopleController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

class PeopleController extends AppController
{

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['logout']);
    }

    public function index()
    {
        $this->set('users', $this->People->find('all'));

        $peopleTable = $this->People;
        $this->set(compact('peopleTable'));
    }

    public function view($id)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }

        $user = $this->People->get($id);
        $this->set(compact('user'));
    }

    public function add()
    {
        $user = $this->People->newEntity();
        if ($this->request->is('post')) {
            $user = $this->People->patchEntity($user, $this->request->data);
            if ($this->People->save($user)) {
                $this->Flash->success(__('Person Added'));
                return $this->redirect(['controller' => 'students', 'action' => 'add']);
            }
            $this->Flash->error(__('Unable to add the user'));
        }
        $this->set('user', $user);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $user = $this->People->get($id);
        if ($this->People->delete($user)) {
            $this->Flash->success(__('The user with id: {0} has been deleted', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }

    public function edit($id = null)
    {
        $user = $this->People->get($id);
        if ($this->request->is(['post', 'put'])) {
            $user = $this->People->patchEntity($user, $this->request->data);
            if ($this->People->save($user)){
                $this->Flash->success(__('This user has been updated'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update this user'));
        }
        $this->set('user', $user);
    }

    public function isAuthorized($user)
    {
        // All registered users can add articles
        if ($this->request->action === 'index') {
            return true;
        }

        // The owner of an article can edit and delete it
        if (in_array($this->request->action, ['edit'])) {
            $parameterId = (int)$this->request->params['pass'][0];
            if ($parameterId === $user['person_id']) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

}
?>