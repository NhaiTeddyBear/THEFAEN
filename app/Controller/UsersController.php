<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {
/**
* @param array $user
* @return redirect to their page by role
*/
    public function login() {
		if($this->request->is('post')){
			if($this->Auth->login()){
				if($this->Auth->user('role') === 'Manager'){
					$this->redirect(array('action'=>'home'));
				}
				if($this->Auth->user('role') === 'Staff'){
					$this->redirect(array('action'=>'home'));
				}
				if($this->Auth->user('role') === 'Member'){
					$this->redirect(array('action'=>'home'));
				}
			}
			else {
				$this->Flash->error(__('Sai tài khoản hoặc mật khẩu'));
				$this->set('error', 'Sai tài khoản hoặc mật khẩu');
			}

		}
	}


/**
* @return logout user
*/
	public function logout(){
		return $this->redirect($this->Auth->logout());
	}
/********-------------------------------------end common function that both Manager, Staff and Member users have-----------------------------***/

/****--------------------------Manager users function-----------------------------------------***/
	/**** if recent manager is the boss(id=constant, now is 7), will own some function****/
	/**
	 * list manager
	 */
	public function listManager() {
        $user = $this->Auth->user();
        $this->setHeader($user);
		$this->set('users', $this->User->find('all', array('conditions'=>array('role'=>'Manager'))));
	}

	/**
	 * @ add new manger
	 */
	public function addManager(){
        $user = $this->Auth->user();
        $this->setHeader($user);
		if ($this->request->is('post')) {
			$this->User->create();
            //add avatar
            if (!empty($this->request->data['User']['avatar']['name'])) {
                $file = $this->request->data['User']['avatar'];
                //get the extension
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                //set allowed extensions
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($ext, $arr_ext)) {
                    //create new parameter to find name of that food
                    $file_name = date("Y-m-d");
                    //create new folder to store images
                    mkdir(WWW_ROOT . 'avatar/' . $file_name);
                    //upload directory
                    $upload_dir = WWW_ROOT . 'avatar/' . $file_name . '/' . $file['name'];
                    //move an uploaded file to new location
                    move_uploaded_file($file['tmp_name'], $upload_dir);
                    //prepare the filename for database entry
                    $this->request->data['User']['avatar'] = $file_name . '/' . $file['name'];
                }
            }
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('Thêm thành công'));
				$this->redirect(array('action' => 'listManager'));
			} $this->Flash->error(__('Không thể thêm người dùng'));
		}
	}

	public function editManager($id = null){
        $user = $this->Auth->user();
        $this->setHeader($user);
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Người dùng không hợp lệ'));
		}
		if ($this->request->is(array('post', 'put'))) {
            //add avatar
            if (!empty($this->request->data['User']['avatar']['name'])) {
                $file = $this->request->data['User']['avatar'];
                //get the extension
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                //set allowed extensions
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($ext, $arr_ext)) {
                    //create new parameter to find name of that food
                    $file_name = date("Y-m-d");
                    //create new folder to store images
                    mkdir(WWW_ROOT . 'avatar/' . $file_name);
                    //upload directory
                    $upload_dir = WWW_ROOT . 'avatar/' . $file_name . '/' . $file['name'];
                    //move an uploaded file to new location
                    move_uploaded_file($file['tmp_name'], $upload_dir);
                    //prepare the filename for database entry
                    $this->request->data['User']['avatar'] = $file_name . '/' . $file['name'];
                }
            }
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('Sửa thông tin thành công ^_^'));
				$this->redirect(array('action' => 'listManager'));
			} else {
				$this->Flash->error(__('Không thể update thông tin :( Vui lòng thử lại!'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

	public function deleteManager($id){
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}

		if ($this->User->delete($id)) {
			$this->Flash->success(
				__('Quản lý có id %s đã bị xóa.', h($id))
			);
		} else {
			$this->Flash->error(
				__('Quản lý có id: %s không thể xóa.', h($id))
			);
		}

		$this->redirect(array('action' => 'listManager'));
	}

	/**
	 * list all staff
	 */
	public function listStaff() {
        $user = $this->Auth->user();
        $this->setHeader($user);
		$this->paginate = array(
			'limit' => 5,
			'conditions'=>array('role'=>'Staff'),
			'order' => array(
				'id' => 'desc'
			)
		);
		$this->set('users', $this->Paginator->paginate('User'));
	}

	/**
	 * @param $id
	 */
	public function viewManager($id){
        $user = $this->Auth->user();
        $this->setHeader($user);
		if (!$id) {
			throw new NotFoundException(__('Invalid post'));
		}
		$user = $this->User->findById($id);
		if (!$user) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->set('user', $user);
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function viewStaff($id) {
        $user = $this->Auth->user();
        $this->setHeader($user);
		if (!$id) {
			throw new NotFoundException(__('Invalid post'));
		}
		$user = $this->User->findById($id);
		if (!$user) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->set('user', $user);
	}


	/**
 * add method
 *
 * @return void
 */
	public function addStaff() {
        $user = $this->Auth->user();
        $this->setHeader($user);
		if ($this->request->is('post')) {
			$this->User->create();
            //add avatar
            if (!empty($this->request->data['User']['avatar']['name'])) {
                $file = $this->request->data['User']['avatar'];
                //get the extension
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                //set allowed extensions
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($ext, $arr_ext)) {
                    //create new parameter to find name of that food
                    $file_name = date("Y-m-d");
                    //create new folder to store images
                    mkdir(WWW_ROOT . 'avatar/' . $file_name);
                    //upload directory
                    $upload_dir = WWW_ROOT . 'avatar/' . $file_name . '/' . $file['name'];
                    //move an uploaded file to new location
                    move_uploaded_file($file['tmp_name'], $upload_dir);
                    //prepare the filename for database entry
                    $this->request->data['User']['avatar'] = $file_name . '/' . $file['name'];
                }
            }
			if ($this->User->save($this->request->data)) {
				$this->Flash->set('Thêm nhân viên thành công', array('key'=>'addStaffSuccess'));
				$this->redirect(array('action' => 'listStaff'));
			}
			$this->Flash->set('Không thể thêm nhân viên', array('key'=>'addStaffFailure'));
		}
	}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function editStaff($id = null) {
        $user = $this->Auth->user();
        $this->setHeader($user);
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Người dùng không hợp lệ'));
		}
		if ($this->request->is(array('post', 'put'))) {
            //add avatar
            if (!empty($this->request->data['User']['avatar']['name'])) {
                $file = $this->request->data['User']['avatar'];
                //get the extension
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                //set allowed extensions
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($ext, $arr_ext)) {
                    //create new parameter to find name of that food
                    $file_name = date("Y-m-d");
                    //create new folder to store images
                    mkdir(WWW_ROOT . 'avatar/' . $file_name);
                    //upload directory
                    $upload_dir = WWW_ROOT . 'avatar/' . $file_name . '/' . $file['name'];
                    //move an uploaded file to new location
                    move_uploaded_file($file['tmp_name'], $upload_dir);
                    //prepare the filename for database entry
                    $this->request->data['User']['avatar'] = $file_name . '/' . $file['name'];
                }
            }
			if ($this->User->save($this->request->data)) {
				$this->Flash->set('Sửa thông tin nhân viên thành công', array('key'=>'editStaffSuccess'));
				$this->redirect(array('action' => 'listStaff'));
			} else {
				$this->Flash->set('Không thể chỉnh sửa thông tin nhân viên', array('key'=>'editStaffFailure'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function deleteStaff($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}

		if ($this->User->delete($id)) {
			$this->Flash->set('Đã xóa 1 nhân viên', array('key'=>'deleteStaffSuccess'));
		} else {
			$this->Flash->set('Không thể xóa nhân viên', array('key'=>'deleteStaffFailure'));
		}

		$this->redirect(array('action' => 'listStaff'));
	}

	/********-------------------------------------end Mananger users function-----------------------------***/

	/****--------------------------Staff users function-----------------------------------------***/


	/**
	 * @return this is the page of staff
	 */
	public function indexOfStaff(){
        $user = $this->Auth->user();
        $this->setHeader($user);
		$this->set('users', $this->User->find('all', array('conditions'=>array('role'=>'Member'))));
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */

	public function listMember() {
        $user = $this->Auth->user();
        $this->setHeader($user);
		$this->Paginator->settings = array(
			'limit' => 15,
			'conditions'=>array('role'=>'Member'),
			'order' => array(
				'id' => 'desc'
			)
		);
		$this->set('users', $this->Paginator->paginate('User'));
	}


	public function viewMember($id) {
        $user = $this->Auth->user();
        $this->setHeader($user);
		if (!$id) {
			throw new NotFoundException(__('Invalid post'));
		}
		$user = $this->User->findById($id);
		if (!$user) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->set('user', $user);
	}


	/**
	 * add method
	 *
	 * @return void
	 */
	public function addMember() {
        $user = $this->Auth->user();
        $this->setHeader($user);
		if ($this->request->is('post')) {
			$this->User->create();
            //add avatar
            if (!empty($this->request->data['User']['avatar']['name'])) {
                $file = $this->request->data['User']['avatar'];
                //get the extension
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                //set allowed extensions
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($ext, $arr_ext)) {
                    //create new parameter to find name of that food
                    $file_name = date("Y-m-d");
                    //create new folder to store images
                    mkdir(WWW_ROOT . 'avatar/' . $file_name);
                    //upload directory
                    $upload_dir = WWW_ROOT . 'avatar/' . $file_name . '/' . $file['name'];
                    //move an uploaded file to new location
                    move_uploaded_file($file['tmp_name'], $upload_dir);
                    //prepare the filename for database entry
                    $this->request->data['User']['avatar'] = $file_name . '/' . $file['name'];
                }
            }
			if ($this->User->save($this->request->data)) {
				$this->Flash->set('Thêm thành viên thành công', array('key'=>'addMemberSuccess'));
				$this->redirect(array('action' => 'listMember'));
			}
			$this->Flash->set('Không thể thêm thành viên', array('key'=>'addMemberFailure'));
		}
	}


	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function editMember($id = null) {
        $user = $this->Auth->user();
        $this->setHeader($user);
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Người dùng không hợp lệ'));
		}
		if ($this->request->is(array('post', 'put'))) {
            //add avatar
            if (!empty($this->request->data['User']['avatar']['name'])) {
                $file = $this->request->data['User']['avatar'];
                //get the extension
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                //set allowed extensions
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($ext, $arr_ext)) {
                    //create new parameter to find name of that food
                    $file_name = date("Y-m-d");
                    //create new folder to store images
                    mkdir(WWW_ROOT . 'avatar/' . $file_name);
                    //upload directory
                    $upload_dir = WWW_ROOT . 'avatar/' . $file_name . '/' . $file['name'];
                    //move an uploaded file to new location
                    move_uploaded_file($file['tmp_name'], $upload_dir);
                    //prepare the filename for database entry
                    $this->request->data['User']['avatar'] = $file_name . '/' . $file['name'];
                }
            }
			if ($this->User->save($this->request->data)) {
				$this->Flash->set('Sửa thông tin thành viên thành công', array('key'=>'editMemberSuccess'));
				$this->redirect(array('action' => 'listMember'));
			} else {
				$this->Flash->set('Không thể sửa thông tin thành viên', array('key'=>'editMemberFailure'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function deleteMember($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}

		if ($this->User->delete($id)) {
			$this->Flash->set('Đã xóa 1 thành viên', array('key'=>'deleteMemberSuccess'));
		} else {
			$this->Flash->set('Không thể xóa thành viên', array('key'=>'deleteMemberFailure'));
		}

		$this->redirect(array('action' => 'listMember'));
	}


	/**
	 * @return this is the page of Member
	 */
	public function home(){
        $user = $this->Auth->user();
	    $this->setHeader($user);

	    $this->loadModel('Food');

        //retrieve food information
        $food88 = $this->Food->find('first', array(
            'conditions' => array('Food.id' => 97)
        ));
        $this->set('food88', $food88);

        $food89 = $this->Food->find('first', array(
            'conditions' => array('Food.id' => 98)
        ));
        $this->set('food89', $food89);

        $food90 = $this->Food->find('first', array(
            'conditions' => array('Food.id' => 99)
        ));
        $this->set('food90', $food90);

        $food91 = $this->Food->find('first', array(
            'conditions' => array('Food.id' => 100)
        ));
        $this->set('food91', $food91);

        /**
         * order food
         */
        $this->loadModel('Order');
        //add order for food88 => com-thap-cam
        $order88 = array(
            'food_id' => 97,
        );
        $this->request->data['Order']['food_id'] = 97;
	}


	/**
	 * view personal profile
	 */
	public function viewProfile(){
        $user = $this->Auth->user();
        $this->setHeader($user);
		$user = $this->User->findById($this->Auth->user('id'));
		$this->set('user', $user);
	}

	/**
	 * edit personal profile
	 */
	public function editProfile($id = null){
        $user = $this->Auth->user();
        $this->setHeader($user);
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Người dùng không hợp lệ'));
        }
        //add avatar
        if (!empty($this->request->data['User']['avatar']['name'])) {
            $file = $this->request->data['User']['avatar'];
            //get the extension
            $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
            //set allowed extensions
            $arr_ext = array('jpg', 'jpeg', 'gif','png');
            if (in_array($ext, $arr_ext)) {
                //create new parameter to find name of that food
                $file_name = date("Y-m-d");
                //create new folder to store images

                mkdir(WWW_ROOT. 'avatar/' . $file_name) ;

                //upload directory
                $upload_dir = WWW_ROOT . 'avatar/'. $file_name. '/' .$file['name'];
                //move an uploaded file to new location
                move_uploaded_file($file['tmp_name'], $upload_dir);
                //prepare the filename for database entry
                $this->request->data['User']['avatar'] = $file_name. '/' . $file['name'];
            }
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {

                $this->redirect(array('action' => 'viewProfile'));
            } else {

            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }

	}

    public function register(){
        if ($this->request->is('post')) {
            $this->User->create();
            //set role
            $this->request->data['User']['role'] = "Member";

            //add avatar
            if (!empty($this->request->data['User']['avatar']['name'])) {
                $file = $this->request->data['User']['avatar'];
                //get the extension
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                //set allowed extensions
                $arr_ext = array('jpg', 'jpeg', 'gif','png');
                if (in_array($ext, $arr_ext)) {
                    //create new parameter to find name of that food
                    $file_name = date("Y-m-d");
                    //create new folder to store images
                    if(!$file_name){
                        mkdir(WWW_ROOT. 'avatar/' . $file_name) ;
                    }
                    //upload directory
                    $upload_dir = WWW_ROOT . 'avatar/'. $file_name. '/' .$file['name'];
                    //move an uploaded file to new location
                    move_uploaded_file($file['tmp_name'], $upload_dir);
                    //prepare the filename for database entry
                    $this->request->data['User']['avatar'] = $file_name. '/' . $file['name'];
                }
            }
            if ($this->User->save($this->request->data)) {
                $this->Flash->set('Tạo tài khoản mới thành công', array('key'=>'registerSuccess'));
                $this->redirect(array('action' => 'home'));
            }
            $this->Flash->set('Bạn chưa tạo được tài khoản', array('key'=>'registerFailure'));
        }
    }

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('register', 'home');
    }
}
