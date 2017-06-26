<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
    public $components = array('Paginator', 'Session', 'Flash','Session',
            'Auth' => Array(
                'loginRedirect' => Array('controller'  => 'articles', 'action' => 'index'),
                'logoutRedirect' => Array('controller' => 'articles', 'action' => 'login'),
                'loginAction' => Array('controller' => 'articles', 'action' => 'login'),
                'authenticate' => Array('Form' => Array('fields' => Array('username' => 'username')))
            )
    );

    public $name ='Users';
/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate());
    }

/*
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            //パスワードをハッシュ化する
            $this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $jobs = $this->User->Job->find('list');
        $this->set(compact('jobs'));
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $jobs = $this->User->Job->find('list');
        $this->set(compact('jobs'));
    }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    //全てのメソッドで呼び出される
    public function beforeFilter() {
        $this->Auth->allow('login','add','logout','edit','view','index');
    }

    public function login() {
        if($this->request->is('post')) {
            debug($this->request->data['User']['password']);
            if($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            } else {
                echo "ログイン失敗";
                $this->Session->setFlash(__('ユーザ名かパスワードが間違っています'), 'default', array(), 'auth');
            }
        }
    }

    public function logout() {
            echo "ログアウト！";
            $this->Auth->logout();
    }

}
