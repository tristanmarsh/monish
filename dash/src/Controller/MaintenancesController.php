<?php
// src/Controller/ArticlesController.php


namespace App\Controller;

use App\Controller\AppController;

class MaintenancesController extends AppController
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
		
        $this->set('elephant', $this->Maintenances->find('all'));
    }

    public function view($id = null)
    {
        //$article = $this->Articles->get($id);
        //$this->set(compact('article'));

        //my take on how to do this (like the index())
        $this->set('giraffe', $this->Maintenances->get($id));
		
		$lion = $this->Maintenances->get($id, [
            'contain' => ['Users']
        ]);
		$this->set(compact('lion'));
    }

    public function add()
    {
        $zebra = $this->Maintenances->newEntity();
        if ($this->request->is('post')) {
            $zebra = $this->Maintenances->patchEntity($zebra, $this->request->data);
            $zebra->user_id = $this->Auth->user('id');
            // You could also do the following
            //$newData = ['user_id' => $this->Auth->user('id')];
            //$zebra = $this->Articles->patchEntity($zebra, $newData);
            if ($this->Maintenances->save($zebra)) {
                $this->Flash->success(__('Your request has been submitted.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable submit your request.'));
        }
        $this->set('zebra', $zebra);
    }

    public function edit($id = null)
    {
        $lion = $this->Maintenances->get($id);
        if ($this->request->is(['post', 'put'])) {
            $lion = $this->Maintenances->patchEntity($lion, $this->request->data);
            if ($this->Maintenances->save($lion)){
                $this->Flash->success(__('Your request has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your request.'));
        }
        $this->set('lion', $lion);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $tiger = $this->Maintenances->get($id);
        if ($this->Maintenances->delete($tiger)) {
            $this->Flash->success(__('The request with id: {0} has been deleted.', h($id)));
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
            $articleId = (int)$this->request->params['pass'][0];
            if ($this->Maintenances->isOwnedBy($articleId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

}

?>