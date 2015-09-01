<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
        // By loading auth, no user is allowed to access anything lel
        $this->loadComponent('Auth', [
            'authorize' => ['Controller'], // Added this line        But what does this do??? need to find out
            'loginRedirect' => [
                'controller' => 'Requests',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ]
        ]);
		
		$this->loadModel('People');
        $this->loadModel('Users');

        $authid = $this->Auth;
        $this->set(compact('authid'));
        $userEntity = $this->Users;
        $this->set(compact('userEntity'));
        $personEntity = $this->People;
        $this->set(compact('personEntity'));
    }

    public function beforeFilter(Event $event)
    {
        // this gives access of index actions, view actions to ALL controllers.
        $this->Auth->allow([/*'index',*/ 'view', 'display']);
    }

    public function isAuthorized($user)
    {
        // Admin can access every action
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }

        // Default deny
        return false;
    }

}
