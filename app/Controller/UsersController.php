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
    public $components = array('Paginator', 'Session', 'Flash','Auth');

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

    // ログイン処理を行う。
    public function login(){
        if ($this->request->is('post')) {

            $this->User->create();

            return;
            debug($this);
            //入力された名前とパスワードを取得する
            $name = $this->request->data['User']['name'];
            $pass = $this->request->data['User']['password'];

            //DBからユーザーデータを取得する
            $user_data = $this->User->find('all',array('conditions'=>array('User.name' => $name)));
            if($user_data[0]['User']['password'] == $pass) {
                //入力された値と一致するユーザーのviewへ遷移する
                return $this->redirect(array('action' => 'view',$user_data[0]['User']['id']));
            }

            //POSTデータが、Users['username']とUsers['password']である場合、$this->Auth->login()で認証が可能。
            if($this->Auth->login()){
                //ログイン成功したときの処理
                //$this->Auth->redirectUrl()でリダイレクト先を取得 2.3より前なら$this->Auth->redirect()
                return;
                echo "aaaaa";
                $this->redirect($this->Auth->redirectUrl());
            }else{
                //ログイン失敗したときの処理
            }

            // Authコンポーネントのログイン処理を呼び出す。
            // if($this->Auth->login()){
            //     // ログイン処理成功
            //     return $this->flash('認証に成功しました。', '/users/index');
            // }else{
            //     // ログイン処理失敗
            //     return $this->flash('認証に失敗しました。', '/users/index');
            // }

            // if($this->Session->check('Message.auth')){
            //     echo $this->Session->flash('auth');
            // }
            //
            // echo $this->Form->create('User',array('action' => 'login'));
            // echo $this->From->input('name');
            // echo $this->From->input('password');
            // echo $this->From->end('Login');

        }
    }

    public function logout() {
        echo $this->Html->tag('h3','ログアウトしました。');
    }

}
