<?php
// src/Controller/UsersController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\App;
use Cake\Routing\Router;
use Cake\Utility\Security;
use Cake\Utility\Text;
use Cake\Network\Email\Email;

use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

class UsersController extends AppController
{

    function forgot_password(){

         $this->layout = false;

        if(!empty($this->request->data))
        {
			
            if(empty($this->request->data['username']))
            {
                $this->Flash->error('Please enter your username (email address)');

            }
            else
            {
                $email=$this->request->data['username'];

                // Match users to their username
                $query = $this->Users->find('all', ['conditions'=> ['Users.username'=>$email]]); //i wanna look username colummn under use
                $user = $query->first();
                
                if($user)
                {
                        // $key = Security::hash(Text::uuid(),'sha512',true); //original that we didn't have a controller for
                        $key = Security::hash(Text::uuid(),'sha512',true);
                        $hash=sha1($user['User']['username'].rand(0,100));
                        $url = Router::url(['controller'=>'users','action'=>'reset_password'], true ).'/'.$key.'#'.$hash;
                        $ms=$url;
                        $ms=wordwrap($ms,1000);

                        $user['tokenhash']=$key;

                        if ($this->Users->save($user)) {

                            //============Email================//
                            /* SMTP Options */

                            $email = new Email('default');
                            $toemail = $user['username'];
                            $email->template('reset_password')
                                ->emailFormat('html')
                                ->to($toemail)
                                ->subject('Request To Recover Monash International Student House Account')
                                ->from('mafak1@student.monash.edu')
                                ->viewVars(['ms' => $ms])
                                ->send();

                            $this->Flash->success('Recovery email generated! Please check your email');

                            //============EndEmail=============//
                        }
                        else{

                            $this->Flash->error('Unable to generate recovery email');
                        }
                }
                else
                {
                    $this->Flash->error('Email not associated with a current system user');
                }
            }
        }
    }

    function reset_password($token=null){

        $this->layout = false;

        // User must have a token in order to proceed
        if(!empty($token)){
            $query = $this->Users->find('all', ['conditions'=> ['Users.tokenhash'=>$token]]);

            $u = $query->first();
            $uvalid = $u['username'];

            if($uvalid){

                $user = $this->Users->newEntity();
                $user = $this->Users->patchEntity($user, $this->request->data);

                if ($this->request->is('post')) {

                    $this->Users->data = $this->request->data;
                    $new_hash = sha1($u['username'].rand(0,100)); //created token
                    $u['tokenhash'] = $new_hash;

                    $passinput = $this->request->data['password'];
                    $passconfirminput = $this->request->data['confirm_password'];


                    if($passinput === $passconfirminput){
                        $passinput = $this->request->data['password'];

                        $u['password'] = $passinput;

                        if($this->Users->save($u))
                        {
                            $this->Flash->success('Password Successfully Updated');

                            //Redirects home rather than to a controller to prevent error access message
                            $this->redirect('/');
                        }
                        
                    }
                    else{
                        $this->Flash->error('Oops! Please try again');
                    }
                }
            }
            else
            {
                $this->redirect(['controller' => 'users', 'action' => 'login']);
                $this->Flash->error('Token Corrupted, please retry. The reset link will only work once');
            }
        }

        else{
            $this->redirect('/');
        }

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);

    }

 

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['add', 'logout', 'forgot_password', 'reset_password']);
    }

    public function index() {

        $this->redirect($this->referer());

        $this->set('users', $this->Users->find('all'));
        
    }

    public function view($id)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }

        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    public function add()
    {
        //I made this function redirect back to the tenants index because this should not be accessible, and can break the system
        $this->Flash->error(__('Restricted area. Redirecting you to tenants'));
        $this->redirect(['controller'=>'tenants', 'action' => 'index']);

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Thank you for registering'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add the user'));
        }
        $people = $this->Users->People->find('list', ['limit' => 200]);
        $this->set(compact('people'));
        $this->set('user', $user);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user with id: {0} has been deleted', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }

    public function login()
    {

        $this->loadModel('People');
        $this->loadModel('Requests');
        $this->loadModel('Leases');
        $this->loadModel('Properties');
        $this->loadModel('Rooms');


        $requests = $this->Requests->find('all')->contain('People');
        $this->set(compact('requests'));

        $leases = $this->Leases->find('all')->contain(['Students', 'Properties', 'Rooms']);
        $this->set(compact('leases'));

        $walrus = $this->People;
        $this->set('walrus', $walrus);

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                if (isset($user['role']) && $user['role'] === 'admin') {
					$this->Auth->setUser($user);
					return $this->redirect(['controller' => '','action' => 'index']);
				}
				else {
					$this->Auth->setUser($user);
					return $this->redirect(['controller' => '','action' => 'index']);
				}	
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function editpassword($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->request->is(['post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)){
                $this->Flash->success(__('This user has been updated'));
                return $this->redirect(['controller'=>'people', 'action' => 'index']);
            }
            $this->Flash->error(__('Unable to update this user'));
        }
        $this->set('user', $user);

        //finds the list of people in the people's table
        $people = $this->Users->People->find('list', ['limit' => 200]);
        $this->set(compact('people'));
    }
        public function editusername($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->request->is(['post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)){
                $this->Flash->success(__('This user has been updated'));
                return $this->redirect(['controller'=>'people', 'action' => 'index']);
            }
            $this->Flash->error(__('Unable to update this user'));
        }
        $this->set('user', $user);

        //finds the list of people in the people's table
        $people = $this->Users->People->find('list', ['limit' => 200]);
        $this->set(compact('people'));
    }

    public function isAuthorized($user)
    {

        if (in_array($this->request->action, ['editpassword'])) {
            $requestId = (int)$this->request->params['pass'][0];

            $this->loadModel('People');
            $this->loadModel('Users');

            $authid = $this->Auth->user('id');
            $this->set(compact('authid'));
            $userEntity = $this->Users->get($authid);
            $this->set(compact('userEntity'));
            $personEntity = $this->People->get($userEntity->person_id);
            $this->set(compact('personEntity'));

            if ($authid === $requestId) {
                return true;
            }
        }
                if (in_array($this->request->action, ['editusername'])) {
            $requestId = (int)$this->request->params['pass'][0];

            $this->loadModel('People');
            $this->loadModel('Users');

            $authid = $this->Auth->user('id');
            $this->set(compact('authid'));
            $userEntity = $this->Users->get($authid);
            $this->set(compact('userEntity'));
            $personEntity = $this->People->get($userEntity->person_id);
            $this->set(compact('personEntity'));

            if ($authid === $requestId) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

}
?>