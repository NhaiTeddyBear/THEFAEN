<?php
App::uses('AppController', 'Controller');
/**
 * Purchases Controller
 *
 * @property Purchase $Purchase
 * @property PaginatorComponent $Paginator
 */
class PurchasesController extends AppController {
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

        $this->Purchase->recursive = 0;
        $this->paginate = array(
            'limit' => 12,
            'order' => array(
                'Purchase.id' => 'desc'
            )
        );
        $this->set('purchases', $this->Paginator->paginate('Purchase'));
    }


    public function indexOfMember() {
        //show Avatar
        $this->loadModel('User');
        $user_avatar = $this->User->findById($this->Auth->user('id'));
        $this->set('user_avatar', $user_avatar['User']['avatar']);

        $user = $this->Auth->user();
        $this->setHeader($user);

        $this->Purchase->recursive = 0;
        $this->paginate = array(
            'limit' => 12,
            'order' => array(
                'Purchase.id' => 'desc'
            ),
            'conditions' => array(
                'Purchase.user_id' => $_SESSION['Auth']['User']['id']
            )
        );
        $this->set('purchases', $this->Paginator->paginate('Purchase'));

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
        if (!$this->Purchase->exists($id)) {
            throw new NotFoundException(__('Invalid purchase'));
        }
        $options = array('conditions' => array('Purchase.' . $this->Purchase->primaryKey => $id));
        $this->set('purchase', $this->Purchase->find('first', $options));
    }
    /**
     * add method
     *
     * @return void
     */
    public function add() {
        //show Avatar
        $this->loadModel('User');
        $user_avatar = $this->User->findById($this->Auth->user('id'));
        $this->set('user_avatar', $user_avatar['User']['avatar']);

        $user = $this->Auth->user();
        $this->setHeader($user);
        if ($this->request->is('post')) {
            $this->Purchase->create();
            /**
             * calculate membership_point
             */
            $this->loadModel('User');
            $this->loadModel('Food');
            if(!empty($this->request->data['Purchase']['food_id'])) {
                //get price from food_id
                $food_id = $this->request->data['Purchase']['food_id'];
                $price = $this->Food->find('first', array('conditions' => array('id' => $food_id), 'fields' => 'price'));
                $this->request->data['Purchase']['price'] = $price['Food']['price'];


                //calculate membership point = price * 10%
                $membership_point = ($price['Food']['price'] * 10) / 100;

                $this->request->data['Purchase']['membership_point'] = $membership_point;
            }
            /**
             * get user_id form phone number
             */
            if(!empty($this->request->data['Purchase']['phone_number'])){
                $phone_number = $this->request->data['Purchase']['phone_number'];
                //find user_id by user.phone_number
                $user_id = $this->User->find('first', array('conditions' => array('phone_number' => $phone_number), 'fields' => 'id'));
                $this->request->data['Purchase']['user_id'] = $user_id['User']['id'];
            }

            if ($this->Purchase->save($this->request->data)) {
                $this->Flash->set('Thêm giao dịch mới thành công', array('key'=>'addPurchaseSuccess'));
                $this->redirect(array('action' => 'indexOfStaff'));
            } else {
                $this->Flash->set('Không thể thêm giao dịch', array('key'=>'addPurchaseFailure'));
            }
        }

        $foods = $this->Purchase->Foods->find('list');
        $users = $this->Purchase->User->find('list');
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
        if (!$this->Purchase->exists($id)) {
            throw new NotFoundException(__('Invalid purchase'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->loadModel('User');
            if(!empty($this->request->data['Purchase']['price'])) {
                //get input price from user
                $price = $this->request->data['Purchase']['price'];
                //calculate membership point = price * 10%
                $membership_point = ($price * 10) / 100;

                $this->request->data['Purchase']['membership_point'] = $membership_point;
            }
            /**
             * get user_id form phone number
             */
            if(!empty($this->request->data['Purchase']['phone_number'])){
                $phone_number = $this->request->data['Purchase']['phone_number'];
                //find user_id by user.phone_number
                $user_id = $this->User->find('first', array('conditions' => array('phone_number' => $phone_number), 'fields' => 'id'));
                $this->request->data['Purchase']['user_id'] = $user_id['User']['id'];
            }
            if ($this->Purchase->save($this->request->data)) {
                $this->Flash->set('Chỉnh sửa giao dịch thành công', array('key'=>'editPurchaseSuccess'));
                $this->redirect(array('action' => 'indexOfStaff'));

            } else {
                $this->Flash->set('Không thể chỉnh sửa giao dịch', array('key'=>'editPurchaseFailure'));
            }
        } else {
            $options = array('conditions' => array('Purchase.' . $this->Purchase->primaryKey => $id));
            $this->request->data = $this->Purchase->find('first', $options);
        }
        $foods = $this->Purchase->Foods->find('list');
        $users = $this->Purchase->User->find('list');
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
        $this->Purchase->id = $id;
        if (!$this->Purchase->exists()) {
            throw new NotFoundException(__('Invalid purchase'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Purchase->delete()) {
            $this->Flash->set('Đã xóa 1 giao dịch', array('key'=>'deletePurchaseSuccess'));
        } else {
            $this->Flash->set('KHÔNG THỂ XÓA GIAO DỊCH NÀY', array('key'=>'deletePurchaseFailure'));
        }
        return $this->redirect(array('action' => 'indexOfStaff'));
    }
    /**
     *@return check if the action is authorized by recent user
     */
    public function isAuthorized($user)
    {
        // All registered users can access these action
        if (isset($user) && $user['role'] == 'Staff') {
            if (in_array($this->action, array('add', 'view', 'indexOfStaff', 'edit', 'delete'))) {
                return true;
            }
            return parent::isAuthorized($user);
        }

        // All registered users can access these action
        if (isset($user) && $user['role'] == 'Member') {
            if (in_array($this->action, array('indexOfMember'))) {
                return true;
            }
            return parent::isAuthorized($user);
        }
    }

}