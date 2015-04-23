<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class DashboardsController extends AppController
{

    public function index()
    {
        // "Table 'blog.homepages' doesn't exist" if I have the two lines below (because mySQL database doesn't have those tables durrr)
        //$homepages = $this->Homepages->find('all');
        //$this->set('homepages', $homepages);
    }

    public function beforeFilter(Event $event)
    {
        // this gives access of index actions, view actions to ALL controllers.
        //$this->Auth->allow(['index']);
    }

}
?>