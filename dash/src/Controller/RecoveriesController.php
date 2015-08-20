<?php
// src/Controller/UsersController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Email\Email;

class RecoveriesController extends AppController
{

    public function index()
    {   
        $this->layout = false;
        //$this->element('recovery');
        $user = $this->Recoveries->newEntity();
        
        $array = ['mjlai3@student.monash.edu', 'tmar41@student.monash.edu', 'yche265@student.monash.edu', 'ybtan6@student.monash.edu'];
        $this->set(compact('array'));
        foreach ($array as $recipient) {
            if ($this->request->is('post')) {
                $user = $this->Recoveries->patchEntity($user, $this->request->data);
                $email = new Email('default');
                $email->from(['Tony@monish.com' => 'Password Recovery'])
                ->to($recipient)
                ->subject('About')
                ->send('Dear Tony, '.$user->username.' has requested a password reset.');
                $this->Flash->success(__('The administrator will reset your password shortly.'));
            }
        }
        
        $this->set('user', $user);   
    }
   
    public function beforeFilter(Event $event)
    {
        $this->Auth->allow();
    }

}
?>