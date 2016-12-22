<?php
App::uses('AppController', 'Controller');
/**
 * Orders Controller
 *
 * @property Order $Order
 * @property PaginatorComponent $Paginator
 */
class OrdersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function indexOfStaff() {
        //show Avatar
        $this->loadModel('User');
        $user_avatar = $this->User->findById($this->Auth->user('id'));
        $this->set('user_avatar', $user_avatar['User']['avatar']);

        $user = $this->Auth->user();
        $this->setHeader($user);

        $this->Order->recursive = 0;
        $this->Paginator->settings = array(
            'limit' => 7,
            'order' => array(
                'Order.id' => 'desc'
            )
        );
        $this->set('orders', $this->Paginator->paginate());
    }


    public function indexOfMember() {
        //show Avatar
        $this->loadModel('User');
        $user_avatar = $this->User->findById($this->Auth->user('id'));
        $this->set('user_avatar', $user_avatar['User']['avatar']);

        $user = $this->Auth->user();
        $this->setHeader($user);
        $this->Order->recursive = 0;
        $this->Paginator->settings = array(
            'limit' => 7,
            'order' => array(
                'Order.id' => 'desc'
            ),
            'conditions' => array(
                'Order.user_id' => $this->Auth->user('id')
            )
        );
        $this->set('orders', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        //show Avatar
        $this->loadModel('User');
        $user_avatar = $this->User->findById($this->Auth->user('id'));
        $this->set('user_avatar', $user_avatar['User']['avatar']);

        $user = $this->Auth->user();
        $this->setHeader($user);
        if (!$this->Order->exists($id)) {
            throw new NotFoundException(__('Invalid order'));
        }
        $options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
        $this->set('order', $this->Order->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function addOfStaff() {
        //show Avatar
        $this->loadModel('User');
        $user_avatar = $this->User->findById($this->Auth->user('id'));
        $this->set('user_avatar', $user_avatar['User']['avatar']);

        $user = $this->Auth->user();
        $this->setHeader($user);
        if ($this->request->is('post')) {
            $this->Order->create();

            //load model Food & User
            $this->loadModel('Food');
            $this->loadModel('User');

            //calculate total
            $food_id = $this->request->data['Order']['food_id'];

            $price = $this->Food->find('first', array(
                'conditions' => array(
                    'Food.id' => $food_id,
                ),
                'fields' => 'price'
            ));

            $quantity = $this->request->data['Order']['quantity'];

            $total = $quantity * $price['Food']['price'];

            $this->request->data['Order']['total'] = $total;

            //get user_id
            $this->request->data['Order']['user_id'] = $this->Auth->user('id');

            //save data
            if ($this->Order->save($this->request->data)) {
                $this->Flash->set("Bạn đã thêm đơn đặt hàng", array('key' => 'addOrderSuccess'));
                return $this->redirect(array('action' => 'indexOfStaff'));
            } else {
                $this->Flash->set("Bạn chưa thêm đơn đặt hàng", array('key' => 'addOrderFailure'));
            }
        }
        $foods = $this->Order->Food->find('list');
        $users = $this->Order->User->find('list');
        $this->set(compact('foods', 'users'));
    }

    public function addOfMember($food_id = null) {
        //show Avatar
        $this->loadModel('User');
        $user_avatar = $this->User->findById($this->Auth->user('id'));
        $this->set('user_avatar', $user_avatar['User']['avatar']);

        $user = $this->Auth->user();
        $this->setHeader($user);
        if ($this->request->is('post')) {
            $this->Order->create();

            //load model Food & User
            $this->loadModel('Food');
            $this->loadModel('User');
            $this->loadModel('Category');

            //get food_id from user
            $this->request->data['Order']['food_id'] = $food_id;

            //calculate total
            $price = $this->Food->find('first', array('conditions' => array('Food.id' => $food_id), 'fields' => 'price'));
            $quantity = $this->request->data['Order']['quantity'];
            $total = $quantity * $price['Food']['price'];
            $this->request->data['Order']['total'] = $total;

            //get user_id
            $this->request->data['Order']['user_id'] = $this->Auth->user('id');

            //save data
            if ($this->Order->save($this->request->data)) {
                $this->Flash->set("Bạn đã thêm đơn đặt hàng", array('key' => 'addOrderSuccess'));
                return $this->redirect(array(
                    'controller'=>'users',
                    'action' => 'home'));
            } else {
                $this->Flash->set("Bạn chưa thêm đơn đặt hàng", array('key' => 'addOrderFailure'));
            }
        }
        $foods = $this->Order->Food->find('list');
        $users = $this->Order->User->find('list');
        $this->set(compact('foods', 'users'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        //show Avatar
        $this->loadModel('User');
        $user_avatar = $this->User->findById($this->Auth->user('id'));
        $this->set('user_avatar', $user_avatar['User']['avatar']);

        $user = $this->Auth->user();
        $this->setHeader($user);
        if (!$this->Order->exists($id)) {
            throw new NotFoundException(__('Invalid order'));
        }
        if ($this->request->is(array('post', 'put'))) {

            //load model Food & User
            $this->loadModel('Food');
            $this->loadModel('User');

            //calculate total
            $food_id = $this->request->data['Order']['food_id'];
            $price = $this->Food->find('first', array('conditions' => array('id' => $food_id), 'fields' => 'price'));

            $quantity = $this->request->data['Order']['quantity'];

            $total = $quantity * $price['Food']['price'];

            $this->request->data['Order']['total'] = $total;

            //get user_id
            $this->request->data['Order']['user_id'] = $this->Auth->user('id');


            if ($this->Order->save($this->request->data)) {
                $this->Flash->set("Bạn đã chỉnh sửa đơn đặt hàng", array('key' => 'editOrderSuccess'));
                return $this->redirect(array('action' => 'indexOfStaff'));
            } else {
                $this->Flash->set("Bạn không thể chỉnh sửa đơn đặt hàng", array('key' => 'editOrderFailure'));
            }
        } else {
            $options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
            $this->request->data = $this->Order->find('first', $options);
        }
        $foods = $this->Order->Food->find('list');
        $users = $this->Order->User->find('list');
        $this->set(compact('foods', 'users'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Order->id = $id;
        if (!$this->Order->exists()) {
            throw new NotFoundException(__('Invalid order'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Order->delete()) {
            $this->Flash->set("Bạn đã xóa đơn đặt hàng", array('key' => 'deleteOrderSuccess'));
        } else {
            $this->Flash->set("Bạn không thể xóa đơn đặt hàng", array('key' => 'deleteOrderFailure'));
        }
        return $this->redirect(array('action' => 'indexOfStaff'));
    }


    public function isAuthorized($user)
    {
        // All registered users can access these action
        if (isset($user) && $user['role'] == 'Staff') {
            if (in_array($this->action, array('addOfStaff', 'view', 'indexOfStaff', 'edit', 'delete'))) {
                return true;
            }
            return parent::isAuthorized($user);
        }

        if (isset($user) && $user['role'] == 'Member') {
            if (in_array($this->action, array('addOfMember', 'indexOfMember'))) {
                return true;
            }
            return parent::isAuthorized($user);
        }

        if(!isset($user)){
            if (in_array($this->action, array('addOfMember'))) {
                return false;
            }
            return $this->redirect(array('controller'=>'users','action' => 'home'));
        }

    }
}
