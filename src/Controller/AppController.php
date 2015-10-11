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
use Cake\Event\Event;
use Cake\Controller\Controller;

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
	public $theme = "ThemeJobs";

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
	/**/
    public function initialize(){
        $this->loadComponent('Flash');
		//$this->loadComponent('RequestHandler');
		$this->loadComponent('Auth', [
			'authorize'=> ['controller'],
            'loginRedirect' => [
                'controller' => 'Jobs',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Jobs',
                'action' => 'index'
            ],
			'unauthorizedRedirect' => $this->referer()
        ]);

    }
	public function isAuthorized($user){
		 // Admin can access every action
		if (isset($user['role']) && $user['role'] === '2') {
        return true;
		}
		return false;
	}
	
	public function beforeFilter(Event $event){
			parent::beforeFilter($event);
			$authUser = $this->Auth->user();
			$this->set(compact('authUser'));
			$this->Auth->allow(['index','login','logout','register',]);
	}
}
