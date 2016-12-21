<?php
App::uses('AppController', 'Controller');
/**
 * Calendars Controller
 *
 * @property Calendar $Calendar
 * @property PaginatorComponent $Paginator
 */
class CalendarsController extends AppController {

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
		$this->Calendar->recursive = 0;
		$this->set('calendars', $this->Paginator->paginate());
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
		if (!$this->Calendar->exists($id)) {
			throw new NotFoundException(__('Invalid calendar'));
		}
		$options = array('conditions' => array('Calendar.' . $this->Calendar->primaryKey => $id));
		$this->set('calendar', $this->Calendar->find('first', $options));
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
			$this->Calendar->create();
			if ($this->Calendar->save($this->request->data)) {
				$this->Flash->success(__('The calendar has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The calendar could not be saved. Please, try again.'));
			}
		}
		$foods = $this->Calendar->Food->find('list');
		$this->set(compact('foods'));
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
		if (!$this->Calendar->exists($id)) {
			throw new NotFoundException(__('Invalid calendar'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Calendar->save($this->request->data)) {
				$this->Flash->success(__('The calendar has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The calendar could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Calendar.' . $this->Calendar->primaryKey => $id));
			$this->request->data = $this->Calendar->find('first', $options);
		}
		$foods = $this->Calendar->Food->find('list');
		$this->set(compact('foods'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Calendar->id = $id;
		if (!$this->Calendar->exists()) {
			throw new NotFoundException(__('Invalid calendar'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Calendar->delete()) {
			$this->Flash->success(__('The calendar has been deleted.'));
		} else {
			$this->Flash->error(__('The calendar could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
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

        if (isset($user) && $user['role'] == 'Staff') {
            if (in_array($this->action, array('add', 'view', 'index', 'edit', 'delete'))) {
                return true;
            }
            return parent::isAuthorized($user);
        }
    }
}
