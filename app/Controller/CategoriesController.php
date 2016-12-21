<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class CategoriesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

/**
 * index method
 *
 * @return void
 */
	public function index() {
        $user = $this->Auth->user();
        $this->setHeader($user);
		$this->paginate = array(
			'limit' => 5,
			'order' => array(
				'id' => 'desc'
			)
		);
		$this->set('categories', $this->Paginator->paginate('Category'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
        $user = $this->Auth->user();
        $this->setHeader($user);
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
		$this->set('category', $this->Category->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
        $user = $this->Auth->user();
        $this->setHeader($user);
		if ($this->request->is('post')) {
			$this->Category->create();
			if ($this->Category->save($this->request->data)) {
				$this->Flash->set('Thêm mục mới thành công', array('key'=>'addCategorySuccess'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->set('Không thể thêm mục mới', array('key'=>'addCategoryFailure'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $user = $this->Auth->user();
        $this->setHeader($user);
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Category->save($this->request->data)) {
				$this->Flash->set('Chỉnh sửa mục thành công', array('key'=>'editCategorySuccess'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->set('Không thể chỉnh sửa mục', array('key'=>'editCategoryFailure'));
			}
		} else {
			$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
			$this->request->data = $this->Category->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Category->delete()) {
			$this->Flash->set('Đã xóa một mục', array('key'=>'deleteCategorySuccess'));
		} else {
			$this->Flash->set('Không thể xóa mục', array('key'=>'deleteCategoryFailure'));
		}
		$this->redirect(array('action' => 'index'));
	}

	/**
	 *@return check if the action is authorized by recent user
	 */
	public function isAuthorized($user)
	{
		// All registered users can access these action
		if (isset($user) && $user['role'] == 'Staff') {
			if (in_array($this->action, array('add', 'view', 'index', 'edit', 'delete'))) {
				return true;
			}
			return parent::isAuthorized($user);
		}
	}
}
