<?php
App::uses('AppController', 'Controller');
/**
 * Comments Controller
 *
 * @property Comment $Comment
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class CommentsController extends AppController {

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
    public function add() {
        if ($this->request->is('post')) {
            $this->Comment->create();
            if ($this->Comment->save($this->request->data)) {
                $this->Flash->success(__(''));
                return $this->redirect(array('controller'=>'articles' ,
                'action' => 'view' , $this->data['Comment']['article_id']));
            } else {
                $this->Flash->error(__('The comment could not be saved. Please, try again.'));
            }
        }
        $articlies = $this->Comment->Articly->find('list');
        $users = $this->Comment->User->find('list');
        $this->set(compact('articlies', 'users'));
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
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
        $articlies = $this->Comment->Articly->find('list');
        $users = $this->Comment->User->find('list');
        $this->set(compact('articlies', 'users'));
    }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function delete($id = null, $article_id = null) {
        $this->Comment->id = $id;

        if (!$this->Comment->exists()) {
            throw new NotFoundException(__('Invalid comment'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Comment->delete()) {
            $this->Flash->success(__(''));
        } else {
            $this->Flash->error(__('The comment could not be deleted. Please, try again.'));
        }
        //削除を行ったviewに遷移する
        return $this->redirect(array(
            'controller'=>'articles' ,
            'action' => 'view' ,
            $article_id
            ));//$this->data['Comment']['article_id']));
        //$this->data['Comment']['article_id']
    }
}
