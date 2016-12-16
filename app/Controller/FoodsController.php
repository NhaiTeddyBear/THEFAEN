<?php
App::uses('AppController', 'Controller');

class FoodsController extends AppController{
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash', 'Paginator');

    // for view all products
    public function indexOfManager1() {
        $this->Food->recursive = 0;
        $this->Paginator->settings = array(
            'limit' => 4,
            'order' => array(
                'id' => 'desc'
            )
        );
        $this->set('foods', $this->Paginator->paginate('Food'));
    }


    public function indexOfMember(){

        if($food = $this->Food->findAllByCategory_id(3)) {
            $this->set('foods', $food);
        }

        if($food4 = $this->Food->findAllByCategory_id(4)) {
            $this->set('food4s', $food4);
        }
    }

    //when people click on name of any products, this will show them all information
    //of that product
    public function view($id=null){
        if(!$id){
            throw new NotFoundException(__('Invalid product'));
        }
        $food = $this->Food->findById($id);
        if(!$food) {
            throw new NotFoundException(__('Invalid product'));
        }
        $this->set('food', $food);
    }
    /**
     * function add to add more Foods
     */
    public function add() {
        if ($this->request->is('post')) {
            //create() : prepare for new place in database to store new data
            $this->Food->create();
            //Check if image has been uploaded
            if (!empty($this->request->data['Food']['image']['name'])) {
                $file = $this->request->data['Food']['image'];
                //get the extension
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                //set allowed extensions
                $arr_ext = array('jpg', 'jpeg', 'gif','png');
                if (in_array($ext, $arr_ext)) {
                    //create new parameter to find name of that food
                    $file_name = date("Y-m-d");
                    //create new folder to store images
                    mkdir(WWW_ROOT. 'upload/' . $file_name) ;
                    //upload directory
                    $upload_dir = WWW_ROOT . 'upload/'. $file_name. '/' .$file['name'];
                    //move an uploaded file to new location
                    move_uploaded_file($file['tmp_name'], $upload_dir);
                    //prepare the filename for database entry
                    $this->request->data['Food']['image'] = $file_name. '/' . $file['name'];
                }
            }

            //
            $category = $this->request->data['Food']['category_id'];
            $this->request->data['Food']['category_id'] = implode(", ", $category);

            if ($this->Food->save($this->request->data)) {
                $this->Flash->set('Món mới được thêm thành công', array('key' => 'addFoodSuccess'));
                return $this->redirect(array('action' => 'indexOfManager1'));
            } else {
                $this->Flash->set('Không thể thêm món mới', array('key' => 'addFoodFailure'));
            }
        }
        $category = $this->Food->Category->find('list');
        $this->set(compact('category'));
    }
    /**
     * function edit
     */
    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid product'));
        }
        $food = $this->Food->findById($id);
        if (!$food) {
            throw new NotFoundException(__('Invalid product'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->Food->id = $id;

            //Check if image has been uploaded
            if (!empty($this->request->data['Food']['image']['name'])) {
                $file = $this->request->data['Food']['image'];
                //get the extension
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                //set allowed extensions
                $arr_ext = array('jpg', 'jpeg', 'gif','png');
                if (in_array($ext, $arr_ext)) {
                    //create new parameter to find name of that food
                    $file_name = date("Y-m-d");
                    //create new folder to store images
                    mkdir(WWW_ROOT. 'upload/' . $file_name) ;
                    //upload directory
                    $upload_dir = WWW_ROOT . 'upload/'. $file_name. '/' .$file['name'];
                    //move an uploaded file to new location
                    move_uploaded_file($file['tmp_name'], $upload_dir);
                    //prepare the filename for database entry
                    $this->request->data['Food']['image'] = $file_name. '/' . $file['name'];
                }
            }

            if ($this->Food->save($this->request->data)) {
                $this->Flash->set('Đã chỉnh sửa món ăn', array('key' => 'editFoodSuccess'));
                return $this->redirect(array('action' => 'indexOfManager1'));
            }
            $this->Flash->set('Không thể chỉnh sửa món ăn này', array('key' => 'editFoodFailure'));
        }
        if (!$this->request->data) {
            $this->request->data = $food;
        }
        $category = $this->Food->Category->find('list');
        $this->set(compact('category'));
    }


    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Food->delete($id)) {
            $this->Flash->set('Đã xóa 1 món ăn', array('key' => 'deleteFoodSuccess'));
        } else {
            $this->Flash->set('Không thể xóa món ăn này', array('key' => 'deleteFoodFailure'));
        }
        return $this->redirect(array('action' => 'indexOfManager1'));

    }
    /**
     * function beforefilter allow user do some action without logging in
     */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add','edit', 'delete');
    }
    /**
     * function paginator
     */
    public $component = array('Paginator');
    public $paginate = array(
        'fields' => array('Foods.image'),
        'maxLimit' => 10,
    );


    /**
     *@return check if the action is authorized by recent user
     */
    public function isAuthorized($user)
    {
        // All registered users can access these action
        if (isset($user) && $user['role'] == 'Manager') {
            if (in_array($this->action, array('add', 'view', 'indexOfManager1', 'indexOfMember', 'edit', 'delete'))) {
                return true;
            }
            return parent::isAuthorized($user);
        }

        if (isset($user) && $user['role'] == 'Member' || $user['role'] == 'Staff') {
            if (in_array($this->action, array('indexOfMember'))) {
                return true;
            }
            return parent::isAuthorized($user);
        }

    }
}
?>