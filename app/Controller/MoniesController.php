<?php
App::uses('AppController', 'Controller');
/**
 * Monies Controller
 *
 * @property Money $Money
 * @property PaginatorComponent $Paginator
 */
class MoniesController extends AppController {

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
	public function indexOfManager1() {
        $user = $this->Auth->user();
        $this->setHeader($user);
		$this->Money->recursive = 0;
		$this->set('monies', $this->Paginator->paginate());
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
		if (!$this->Money->exists($id)) {
			throw new NotFoundException(__('Invalid money'));
		}
		$options = array('conditions' => array('Money.' . $this->Money->primaryKey => $id));
		$this->set('money', $this->Money->find('first', $options));
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
			$this->Money->create();

            //calculate amount of salary
            $count = $this->request->data['Schedule']['count'];
            var_dump($count); die;

			if ($this->Money->save($this->request->data)) {
				$this->Flash->success(__('The money has been saved.'));
				return $this->redirect(array('action' => 'indexOfManager1'));
			} else {
				$this->Flash->error(__('The money could not be saved. Please, try again.'));
			}
		}
		$users = $this->Money->User->find('list');
		$schedules = $this->Money->Schedule->find('list');
		$this->set(compact('users', 'schedules'));
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
		if (!$this->Money->exists($id)) {
			throw new NotFoundException(__('Invalid money'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Money->save($this->request->data)) {
				$this->Flash->success(__('The money has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The money could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Money.' . $this->Money->primaryKey => $id));
			$this->request->data = $this->Money->find('first', $options);
		}
		$users = $this->Money->User->find('list');
		$schedules = $this->Money->Schedule->find('list');
		$this->set(compact('users', 'schedules'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Money->id = $id;
		if (!$this->Money->exists()) {
			throw new NotFoundException(__('Invalid money'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Money->delete()) {
			$this->Flash->success(__('The money has been deleted.'));
		} else {
			$this->Flash->error(__('The money could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

    public function isAuthorized($user)
    {
        // All registered users can access these action
        if (isset($user) && $user['role'] == 'Manager') {
            if (in_array($this->action, array('add', 'view', 'indexOfManager1', 'edit', 'delete'))) {
                return true;
            }
            return parent::isAuthorized($user);
        }

        if (isset($user) && $user['role'] == 'Staff') {
            if (in_array($this->action, array('view', 'indexOfStaff'))) {
                return true;
            }
            return parent::isAuthorized($user);
        }
    }
}
