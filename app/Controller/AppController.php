<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public $helpers = array('Form', 'Html', 'Flash');
    public $layout ='managerCommon';

    public $components = array(
        'Flash',
        'Paginator',
        'Auth' => array(
            'loginAction' => array(
                'controller' => 'users',
                'action' => 'login'
            ),
            'logoutRedirect' => array(
                'controller' => 'users',
                'action' => 'login'
            ),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            ),
            'authorize' => array('Controller')
        )
    );

    //this function run before any action
    public function beforeFilter()
    {
        $this->Auth->allow('logout');
    }

    //check if the user is authorized to do something
    public function isAuthorized($user)
    {
        if ($this->action == 'login' || $this->action == 'logout' ||
            $this->action == 'viewProfile' || $this->action =='editProfile' ||
            $this->action == 'home' || $this->action == 'register') {
            return true;
        }

        if (isset($user['role'])) {
            if ($user['role'] == 'Manager') {
                if ($this->action == 'indexOfManager' || $this->action == 'addStaff' ||
                    $this->action == 'viewStaff' || $this->action == 'editStaff' ||
                    $this->action == 'deleteStaff' || $this->action == 'listManager' ||
                    $this->action == 'listStaff') {
                    return true;
                }
                return false;
            }
            if ($user['role'] == 'Staff') {
                if ($this->action == 'indexOfStaff' || $this->action == 'addMember' ||
                    $this->action == 'viewMember' || $this->action == 'editMember' ||
                    $this->action == 'deleteMember' || $this->action == 'viewStaff' ||
                    $this->action == 'listMember') {
                    return true;
                }
                return false;
            }
            if ($user['role'] == 'Member') {
                if ($this->action == 'indexOfMember' || $this->action == 'view' || $this->action == 'edit' ) {
                    return true;
                }
                return false;
            }
        }
        return false;
    }

}
