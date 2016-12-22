<?php
App::uses('AppController', 'Controller');
/**
 * Comments Controller
 *
 * @property Comment $Comment
 * @property PaginatorComponent $Paginator
 */
class CommentsController extends AppController {

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
        //show Avatar
        $this->loadModel('User');
        $user_avatar = $this->User->findById($this->Auth->user('id'));
        $this->set('user_avatar', $user_avatar['User']['avatar']);

        $user = $this->Auth->user();
        $this->setHeader($user);
		$this->Comment->recursive = 0;
		$this->set('comments', $this->Paginator->paginate());
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
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		$options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
		$this->set('comment', $this->Comment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($post_id = null) {
        //show Avatar
        $this->loadModel('User');
        $user_avatar = $this->User->findById($this->Auth->user('id'));
        $this->set('user_avatar', $user_avatar['User']['avatar']);

        $user = $this->Auth->user();
        $this->setHeader($user);

		if ($this->request->is('post')) {
			$this->Comment->create();

            //set post_id
            $this->Comment->set(array('post_id'=>$post_id));

            //setup name of user
            $user_id = $this->Auth->user('id');
            $this->request->data['Comment']['user_id'] = $user_id;

			if ($this->Comment->save($this->request->data)) {
				$this->Flash->success(__('The comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The comment could not be saved. Please, try again.'));
			}
		}
		$users = $this->Comment->User->find('list');
		$posts = $this->Comment->Post->find('list');
		$this->set(compact('users', 'posts'));
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
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Comment->save($this->request->data)) {
				$this->Flash->success(__('The comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The comment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
			$this->request->data = $this->Comment->find('first', $options);
		}
		$users = $this->Comment->User->find('list');
		$posts = $this->Comment->Post->find('list');
		$this->set(compact('users', 'posts'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Comment->id = $id;
		if (!$this->Comment->exists()) {
			throw new NotFoundException(__('Invalid comment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Comment->delete()) {
			$this->Flash->success(__('The comment has been deleted.'));
		} else {
			$this->Flash->error(__('The comment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

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

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }
}
