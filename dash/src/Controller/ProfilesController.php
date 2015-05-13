<?php
// src/Controller/ProfilesController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

class ProfilesController extends AppController
{


    public function index()
    {

    }

    public function isAuthorized($user) {
        if ($this->request->action === 'index') {
            return true;
        }

        return parent::isAuthorized($user);
    }


}
?>