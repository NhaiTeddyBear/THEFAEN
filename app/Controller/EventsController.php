<?php
App::uses('AppController', 'Controller');

class EventsController extends AppController{
    public $helpers = array('Html', 'Form', 'Flash');

    // for view all products
   public function index() {
    $this->paginate = array(
        'limit' => 10,
        'order' => array(
            'id' => 'desc'
        )
    );
    $this->set('events', $this->Paginator->paginate('Event'));
   }
    //when people click on name of any products, this will show them all information
    //of that product
    public function view($id=null){
        if(!$id){
            throw new NotFoundException(__('Invalid product'));
        }
        $event = $this->Event->findById($id);
        if(!$event) {
            throw new NotFoundException(__('Invalid product'));
        }
        $this->set('event', $event);
    }
    /**
     * function add to add more Foods
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Event->create();
            if ($this->Event->save($this->request->data)) {
                $this->Flash->set('Thêm sự kiện mới thành công', array('key'=>'addEventSuccess'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->set('Không thể thêm chương trình khuyến mại', array('key'=>'addEventFailure'));
        }
    }
    /**
     * function edit
     */
    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid event'));
        }
        $event = $this->Event->findById($id);
        if (!$event) {
            throw new NotFoundException(__('Invalid event'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->Event->id = $id;
            if ($this->Event->save($this->request->data)) {
                $this->Flash->set('Chỉnh sửa sự kiện thành công', array('key'=>'editEventSuccess'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->set('Không thể chỉnh sửa sự kiện này', array('key' => 'editEventFailure'));
        }
        if (!$this->request->data) {
            $this->request->data = $event;
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Event->delete($id)) {
            $this->Flash->set('Đã xóa 1 chương trình khuyến mại', array('key' => 'deleteEventSuccess'));
        } else {
            $this->Flash->set('Không thể xóa sự kiện này', array('key' => 'deleteEventFailure'));
        }
        return $this->redirect(array('action' => 'index'));
    }
    /**
     * function beforefilter allow user do some action without logging in
     */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add','edit', 'delete');
    }
    /**
     *@return check if the action is authorized by recent user
     */
    public function isAuthorized($user)
    {
        // All registered users can access these action
        if (isset($user) && $user['role'] == 'Manager') {
            if (in_array($this->action, array('add', 'view', 'index', 'edit', 'delete'))) {
                return true;
            }
            return parent::isAuthorized($user);
        }
    }
}
?>