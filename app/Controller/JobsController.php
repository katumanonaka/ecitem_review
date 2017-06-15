<?php
App::uses('AppController', 'Controller');
/**
 * Jobs Controller
 *
 * @property Job $Job
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class JobsController extends AppController {

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
        $this->Job->recursive = 0;
        $this->set('jobs', $this->Paginator->paginate());
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        if (!$this->Job->exists($id)) {
            throw new NotFoundException(__('Invalid job'));
        }
        $options = array('conditions' => array('Job.' . $this->Job->primaryKey => $id));
        $this->set('job', $this->Job->find('first', $options));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Job->create();
            if ($this->Job->save($this->request->data)) {
                $this->Flash->success(__('The job has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The job could not be saved. Please, try again.'));
            }
        }
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        if (!$this->Job->exists($id)) {
            throw new NotFoundException(__('Invalid job'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Job->save($this->request->data)) {
                $this->Flash->success(__('The job has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The job could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Job.' . $this->Job->primaryKey => $id));
            $this->request->data = $this->Job->find('first', $options);
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
        $this->Job->id = $id;
        if (!$this->Job->exists()) {
            throw new NotFoundException(__('Invalid job'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Job->delete()) {
            $this->Flash->success(__('The job has been deleted.'));
        } else {
            $this->Flash->error(__('The job could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
