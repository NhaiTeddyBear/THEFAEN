<?php
App::uses('AppController','Controller');
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 27/10/2016
 * Time: 8:55 SA
 */
class InformationController extends AppController {

    public function add() {
        if ($this->request->is('post')) {
            $this->Ingredient->create();
            if ($this->Information->save($this->request->data)) {
                $this->Flash->set('Thêm thông tin thành công', array('key'=>'addInformationSuccess'));
                $this->redirect(array('action' => 'view'));
            } else {
                $this->Flash->set('Không thể thêm thông tin', array('key'=>'addInformationFailure'));
            }
        }
    }
    public function view(){
        $content = $this->Information->findById(1);
        $this->set('content', $content );
    }

    public function edit(){
        $content = $this->Information->findById(1);
        if($this->request->is(array('post', 'put'))){
            if($this->Information->save($this->request->data)){
                $this->redirect(array('action'=>'view'));
                $this->Flash->set('Chỉnh sửa thông tin quán thành công', array('key'=>'editInformationSuccess'));
            }
            $this->Flash->set('Không thể chỉnh sửa thông tin quán', array('key'=>'editInformationFailure'));
        }
        if(!$this->request->data){
            $this->request->data = $content;
        }
    }

    public function isAuthorized($user)
    {
            if ($this->action == 'view') {
                return true;
            }
        if($this->action == 'edit'){
            if($user['role']=='Manager'){
                return true;
            }
            return parent::isAuthorized($user);
        }
    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('view');
    }

}
