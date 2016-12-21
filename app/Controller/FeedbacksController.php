<?php
App::uses('AppController', 'Controller');
/**
 * Feedback Controller
 *
 * @property Feedback $Feedback
 * @property PaginatorComponent $Paginator
 */
class FeedbacksController extends AppController {

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
	public function index() {
        $user = $this->Auth->user();
        $this->setHeader($user);
		$this->Feedback->recursive = 0;
		$this->set('feedback', $this->Paginator->paginate());
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
		if (!$this->Feedback->exists($id)) {
			throw new NotFoundException(__('Invalid feedback'));
		}
		$options = array('conditions' => array('Feedback.' . $this->Feedback->primaryKey => $id));
		$this->set('feedback', $this->Feedback->find('first', $options));
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
			$this->Feedback->create();
			if ($this->Feedback->save($this->request->data)) {
				$this->Flash->success(__('The feedback has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The feedback could not be saved. Please, try again.'));
			}
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
		$this->Feedback->id = $id;
		if (!$this->Feedback->exists()) {
			throw new NotFoundException(__('Invalid feedback'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Feedback->delete()) {
			$this->Flash->success(__('The feedback has been deleted.'));
		} else {
			$this->Flash->error(__('The feedback could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function isAuthorized($user)
	{
		if($this->action == 'add'){
			return true;
		}
		if (isset($user) && $user['role'] == 'Manager') {
			if (in_array($this->action, array('view','index','delete'))) {
				return true;
			}
			return parent::isAuthorized($user);
		}
	}

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }
}
