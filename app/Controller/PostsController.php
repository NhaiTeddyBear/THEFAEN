<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 * @property PaginatorComponent $Paginator
 */
class PostsController extends AppController {

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

		$this->Post->recursive = 0;
		$this->set('posts', $this->Paginator->paginate());
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

		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
		$this->set('post', $this->Post->find('first', $options));
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
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->Flash->success(__('The post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The post could not be saved. Please, try again.'));
			}
		}
		$users = $this->Post->User->find('list');
		$categories = $this->Post->Category->find('list');
		$this->set(compact('users', 'categories'));
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

		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Post->save($this->request->data)) {
				$this->Flash->success(__('The post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The post could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
			$this->request->data = $this->Post->find('first', $options);
		}
		$users = $this->Post->User->find('list');
		$categories = $this->Post->Category->find('list');
		$this->set(compact('users', 'categories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Post->delete()) {
			$this->Flash->success(__('The post has been deleted.'));
		} else {
			$this->Flash->error(__('The post could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


	public function userView() {
        //show Avatar
        $this->loadModel('User');
        $user_avatar = $this->User->findById($this->Auth->user('id'));
        $this->set('user_avatar', $user_avatar['User']['avatar']);

        $user = $this->Auth->user();
        $this->setHeader($user);

		$this->paginate = array(
			'limit' => 5,
			'order' => array(
				'id' => 'desc'
			)
		);
		$this->set('posts', $this->Paginator->paginate('Post'));
	}

	public function read($id = null){
        //show Avatar
        $this->loadModel('User');
        $user_avatar = $this->User->findById($this->Auth->user('id'));
        $this->set('user_avatar', $user_avatar['User']['avatar']);

        $user = $this->Auth->user();
        $this->setHeader($user);

		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
		$this->set('post', $this->Post->find('first', $options));

		$this->loadModel('Comment', 'User');
		$comments = $this->Post->Comment->find('all', array('conditions'=>array('post_id'=>$id)));
		$this->set('comments', $comments);
		if ($this->request->is('post')) {
			$this->Post->Comment->create();
			if ($this->Post->Comment->save($this->request->data)) {
				$this->Flash->success(__('The comment has been saved.'));
				return $this->redirect(array('action' => 'read'));
			} else {
				$this->Flash->error(__('The comment could not be saved. Please, try again.'));
			}
		}
	}


	public function isAuthorized($user) {
		// All registered users can add posts
		if(isset($user) && $user['role'] == 'Staff') {
			if (in_array($this->action, array('add', 'view', 'index', 'userView', 'read'))) {
				return true;
			}

			// The owner of a post can edit and delete it
			if (in_array($this->action, array('edit', 'delete'))) {
				$postId = (int)$this->request->params['pass'][0];
				if ($this->Post->isOwnedBy($postId, $user['id'])) {
					return true;
				}
			}
		}

        if(isset($user) && $user['role'] == 'Manager') {
            if (in_array($this->action, array('add', 'view', 'index', 'userView', 'read'))) {
                return true;
            }

            // The owner of a post can edit and delete it
            if (in_array($this->action, array('edit', 'delete'))) {
                $postId = (int)$this->request->params['pass'][0];
                if ($this->Post->isOwnedBy($postId, $user['id'])) {
                    return true;
                }
            }
        }

		return parent::isAuthorized($user);
	}

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('userView');
    }
}
