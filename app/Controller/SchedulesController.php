<?php
App::uses('AppController', 'Controller');
/**
 * Schedules Controller
 *
 * @property Schedule $Schedule
 * @property PaginatorComponent $Paginator
 */
class SchedulesController extends AppController {

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
        $this->Paginator->settings = array(
            'limit' => 10,
            'order' => array(
                'id' => 'desc'
            )
        );
        $this->set('schedules', $this->Paginator->paginate());
    }


    public function indexOfStaff(){
        $this->Paginator->settings = array(
            'limit' => 10,
            'order' => array(
                'id' => 'desc'
            ),
            'conditions' => array(
            'Schedule.user_id' => $this->Auth->user('id')
        )
        );
        $this->set('schedules', $this->Paginator->paginate());
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Schedule->exists($id)) {
			throw new NotFoundException(__('Invalid schedule'));
		}
		$options = array('conditions' => array('Schedule.' . $this->Schedule->primaryKey => $id));
		$this->set('schedule', $this->Schedule->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Schedule->create();

            //convert string to an array to store work-shift
            $shift = $this->request->data['Schedule']['shift'];
            $this->request->data['Schedule']['shift'] = implode(", ", $shift);

            //count work-shift per day
            if($this->request->data['Schedule']['shift'] == 'Ca Sáng' ||
                $this->request->data['Schedule']['shift'] == 'Ca Chiều' ||
                $this->request->data['Schedule']['shift'] == 'Ca Phụ'){

                $this->request->data['Schedule']['count'] = 1;
            }

            if($this->request->data['Schedule']['shift'] == 'Ca Sáng, Ca Chiều' ||
                $this->request->data['Schedule']['shift'] == 'Ca Chiều, Ca Phụ' ||
                $this->request->data['Schedule']['shift'] == 'Ca Sáng, Ca Phụ'){

                $this->request->data['Schedule']['count'] = 2;
            }

            if($this->request->data['Schedule']['shift'] == 'Ca Sáng, Ca Chiều, Ca Phụ'){
                $this->request->data['Schedule']['count'] = 3;
            }

            //save data
			if ($this->Schedule->save($this->request->data)) {
				$this->Flash->set('Bạn đã thêm lịch làm việc!', array('key' => 'addScheduleSuccess'));
				return $this->redirect(array('action' => 'indexOfManager1'));
			} else {
				$this->Flash->set('Bạn không thể lịch làm việc!', array('key' => 'addScheduleFailure'));
			}
		}
		$users = $this->Schedule->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Schedule->exists($id)) {
			throw new NotFoundException(__('Invalid schedule'));
		}
		if ($this->request->is(array('post', 'put'))) {

            //convert string to an array to store work-shift
            $shift = $this->request->data['Schedule']['shift'];
            $this->request->data['Schedule']['shift'] = implode(", ", $shift);

            //count work-shift per day
            if($this->request->data['Schedule']['shift'] == 'Ca Sáng' ||
                $this->request->data['Schedule']['shift'] == 'Ca Chiều' ||
                $this->request->data['Schedule']['shift'] == 'Ca Phụ'){

                $this->request->data['Schedule']['count'] = 1;
            }

            if($this->request->data['Schedule']['shift'] == 'Ca Sáng, Ca Chiều' ||
                $this->request->data['Schedule']['shift'] == 'Ca Chiều, Ca Phụ' ||
                $this->request->data['Schedule']['shift'] == 'Ca Sáng, Ca Phụ'){

                $this->request->data['Schedule']['count'] = 2;
            }

            if($this->request->data['Schedule']['shift'] == 'Ca Sáng, Ca Chiều, Ca Phụ'){
                $this->request->data['Schedule']['count'] = 3;
            }

            //save data
			if ($this->Schedule->save($this->request->data)) {
				$this->Flash->set('Bạn đã chỉnh sửa lịch làm việc!', array('key' => 'editScheduleSuccess'));
				return $this->redirect(array('action' => 'indexOfManager1'));
			} else {
				$this->Flash->set('Bạn không thể chỉnh sửa lịch làm việc!', array('key' => 'editScheduleFailure'));
			}
		} else {
			$options = array('conditions' => array('Schedule.' . $this->Schedule->primaryKey => $id));
			$this->request->data = $this->Schedule->find('first', $options);
		}
		$users = $this->Schedule->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Schedule->id = $id;
		if (!$this->Schedule->exists()) {
			throw new NotFoundException(__('Invalid schedule'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Schedule->delete()) {
			$this->Flash->set('Bạn đã xóa lịch làm việc!', array('key' => 'deleteScheduleSuccess'));
		} else {
			$this->Flash->set('Bạn không thể xóa lịch làm việc!', array('key' => 'deleteScheduleFailure'));
		}
		return $this->redirect(array('action' => 'indexOfManager1'));
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
