<?php

namespace App\Controller;

use App\Controller\AppController;

class MacaddressesController extends AppController
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
        $personEntity = $this->People->get($userEntity->person_id, ['contain'=>'Macaddresses']);
        $this->set(compact('personEntity'));

        $elephant = $this->Macaddresses->find('all')->contain('People');
        $this->set(compact('elephant'));
    }

    public function view($id = null)
    {
        //$article = $this->Articles->get($id);
        //$this->set(compact('article'));

        $this->loadModel('People');

        //my take on how to do this (like the index())
        $this->set('giraffe', $this->Macaddresses->get($id));

        $lion = $this->Macaddresses->get($id, [
            'contain' => ['People']
        ]);
        $this->set(compact('lion'));
    }

    public function edit($id = null)
    {
        $lion = $this->Macaddresses->get($id);
        if ($this->request->is(['post', 'put'])) {
            $lion = $this->Macaddresses->patchEntity($lion, $this->request->data);
            if ($this->Macaddresses->save($lion)){
                $this->Flash->success(__('Your MAC addresses has been updated'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your MAC addresses'));
        }
        $this->set('lion', $lion);

        $this->loadModel('Properties');
        $addresses = $this->Properties->find('list', ['keyField' => 'address', 'valueField' => 'address']);
        $this->set('addresses', $addresses);
    }

    // src/Controller/ArticlesController.php
    public function isAuthorized($user)
    {
        // All registered users can add articles
        if ($this->request->action === 'index') {
            return true;
        }

        // The owner of an article can edit and delete it
        if (in_array($this->request->action, ['edit'])) {
            $requestId = (int)$this->request->params['pass'][0];
            $requestEntity = $this->Macaddresses->get($requestId);
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

}

?>