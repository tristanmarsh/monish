<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class RequestsController extends AppController
{

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    //By defining function index() in our ArticlesController, users can now access the logic there by requesting www.example.com/articles/index.
    //Similarly, if we were to define a function called foobar(), users would be able to access that at www.example.com/articles/foobar.
    public function index()
    {
        /*
        $articles = $this->Articles->find('all');
		
		//The single instruction in the action uses set() to pass data from the controller to the view (which we’ll create next). 
		//The line sets the view variable called ‘articles’ equal to the return value of the find('all') method of the Articles table object.
        $this->set(compact('articles'));
        */

        $this->loadModel('People');
        $this->loadModel('Users');

        $authid = $this->Auth->user('id');
        $this->set(compact('authid'));
        $userEntity = $this->Users->get($authid);
        $this->set(compact('userEntity'));
        $personEntity = $this->People->get($userEntity->person_id);
        $this->set(compact('personEntity'));

        $requests = $this->Requests->find('all')->contain('People');
        $this->set(compact('requests'));

        $allUsers = $this->Users;
        $this->set(compact('allUsers'));
    }

    public function view($id = null)
    {
        //$article = $this->Articles->get($id);
        //$this->set(compact('article'));

        $this->loadModel('People');


        //my take on how to do this (like the index())
        $this->set('giraffe', $this->Requests->get($id));

            $request = TableRegistry::get('Requests');
        $authid = $this->Auth->user('id');
        $this->set(compact('authid'));
        $userEntity = $this->Users->get($authid);
        $this->set(compact('userEntity'));
             if ($userEntity->role === 'admin'){
            $wolf = $this->Requests->get($id); 
           
            $wolf->status = 'Viewed';

            $request->save($wolf);
            }
            

        $lion = $this->Requests->get($id, [
            'contain' => ['People']
        ]);
        $this->set(compact('lion'));
    }

    public function add()
    {
        $entity = $this->Requests->newEntity();

        $this->loadModel('Users');
        $this->loadModel('People');

        $authid = $this->Auth->user('id');
        $this->set(compact('authid'));
        $userEntity = $this->Users->get($authid);
        $this->set(compact('userEntity'));
        $personEntity = $this->People->get($userEntity->person_id);
        $this->set(compact('personEntity'));

        if ($this->request->is('post')) {
            $entity = $this->Requests->patchEntity($entity, $this->request->data);
            $entity->person_id = $personEntity->id;
            // You could also do the following
            //$newData = ['user_id' => $this->Auth->user('id')];
            //$entity = $this->Articles->patchEntity($entity, $newData);
            if ($this->Requests->save($entity)) {
                $this->Flash->success(__('Your request has been submitted'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable submit your request'));
        }
        $this->set('entity', $entity);

        $this->loadModel('Properties');
        $addresses = $this->Properties->find('list', ['keyField' => 'address', 'valueField' => 'address']);

        $addresses = $this->Properties->find('list', ['keyField' => 'address', 'valueField' => 'address']);
        
        $this->set('addresses', $addresses);
    }

    public function edit($id = null)
    {
        $entity = $this->Requests->get($id);
        if ($this->request->is(['post', 'put'])) {
            $entity = $this->Requests->patchEntity($entity, $this->request->data);
            if ($this->Requests->save($entity)){
                $this->Flash->success(__('Your request has been updated'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your request'));
        }
        $this->set('entity', $entity);

        $this->loadModel('Properties');
        $addresses = $this->Properties->find('list', ['keyField' => 'address', 'valueField' => 'address']);
        $this->set('addresses', $addresses);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $this->loadModel('People');

        $requestEntity = $this->Requests->get($id);
        $requestPersonId = $requestEntity->person_id;
        $personEntity = $this->People->get($requestPersonId);
        if ($this->Requests->delete($requestEntity)) {
            $this->Flash->success(__('The request ' . $requestEntity->title . ' from ' . $personEntity->first_name . ' has been completed', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }

    // src/Controller/ArticlesController.php
    public function isAuthorized($user)
    {
        // All registered users can add articles
        if ($this->request->action === 'add' || $this->request->action === 'index') {
            return true;
        }

        // The owner of an article can edit and delete it
        if (in_array($this->request->action, ['edit', 'delete'])) {
            $requestId = (int)$this->request->params['pass'][0];
            $requestEntity = $this->Requests->get($requestId);
            $this->set(compact('requestEntity'));

            $this->loadModel('People');
            $this->loadModel('Users');

            $authid = $this->Auth->user('id');
            $this->set(compact('authid'));
            $userEntity = $this->Users->get($authid);
            $this->set(compact('userEntity'));
            $personEntity = $this->People->get($userEntity->person_id);
            $this->set(compact('personEntity'));

            if ($requestEntity->person_id === $personEntity->id) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

    public function testing($x){
        $this->loadModel('People');
        $test = $this->People->get($x);
        $this->set(compact($test));
        return $test->first_name;
    }


    // public function changestatus($id){

    //         $dog = $this->Requests->get($id);

    //         if($dog->status=='unread'){
    //             $dog->status='viewed';
    //         }
        

    // }

}


?>