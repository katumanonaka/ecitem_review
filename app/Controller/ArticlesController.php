<?php
App::uses('AppController', 'Controller');
/**
 * Articles Controller
 *
 * @property Article $Article
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class ArticlesController extends AppController {

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
		$this->Article->recursive = 0;
		$this->set('articles', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Article->exists($id)) {
			throw new NotFoundException(__('Invalid article'));
		}
		$options = array('conditions' => array('Article.' . $this->Article->primaryKey => $id));
		$this->set('article', $this->Article->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Article->create();
			if ($this->Article->save($this->request->data)) {
				$this->Flash->success(__('The article has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The article could not be saved. Please, try again.'));
			}
		}
		$users = $this->Article->User->find('list');
		$products = $this->Article->Product->find('list');
		$this->set(compact('users', 'products'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Article->exists($id)) {
			throw new NotFoundException(__('Invalid article'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Article->save($this->request->data)) {
				$this->Flash->success(__('The article has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The article could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Article.' . $this->Article->primaryKey => $id));
			$this->request->data = $this->Article->find('first', $options);
		}
		$users = $this->Article->User->find('list');
		$products = $this->Article->Product->find('list');
		$this->set(compact('users', 'products'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Article->delete()) {
			$this->Flash->success(__('The article has been deleted.'));
		} else {
			$this->Flash->error(__('The article could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
// 	public function admin_index() {
// 		$this->Article->recursive = 0;
// 		$this->set('articles', $this->Paginator->paginate());
// 	}
//
// /**
//  * admin_view method
//  *
//  * @throws NotFoundException
//  * @param string $id
//  * @return void
//  */
// 	public function admin_view($id = null) {
// 		if (!$this->Article->exists($id)) {
// 			throw new NotFoundException(__('Invalid article'));
// 		}
// 		$options = array('conditions' => array('Article.' . $this->Article->primaryKey => $id));
// 		$this->set('article', $this->Article->find('first', $options));
// 	}
//
// /**
//  * admin_add method
//  *
//  * @return void
//  */
// 	public function admin_add() {
// 		if ($this->request->is('post')) {
// 			$this->Article->create();
// 			if ($this->Article->save($this->request->data)) {
// 				$this->Flash->success(__('The article has been saved.'));
// 				return $this->redirect(array('action' => 'index'));
// 			} else {
// 				$this->Flash->error(__('The article could not be saved. Please, try again.'));
// 			}
// 		}
// 		$users = $this->Article->User->find('list');
// 		$products = $this->Article->Product->find('list');
// 		$this->set(compact('users', 'products'));
// 	}
//
// /**
//  * admin_edit method
//  *
//  * @throws NotFoundException
//  * @param string $id
//  * @return void
//  */
// 	public function admin_edit($id = null) {
// 		if (!$this->Article->exists($id)) {
// 			throw new NotFoundException(__('Invalid article'));
// 		}
// 		if ($this->request->is(array('post', 'put'))) {
// 			if ($this->Article->save($this->request->data)) {
// 				$this->Flash->success(__('The article has been saved.'));
// 				return $this->redirect(array('action' => 'index'));
// 			} else {
// 				$this->Flash->error(__('The article could not be saved. Please, try again.'));
// 			}
// 		} else {
// 			$options = array('conditions' => array('Article.' . $this->Article->primaryKey => $id));
// 			$this->request->data = $this->Article->find('first', $options);
// 		}
// 		$users = $this->Article->User->find('list');
// 		$products = $this->Article->Product->find('list');
// 		$this->set(compact('users', 'products'));
// 	}
//
// /**
//  * admin_delete method
//  *
//  * @throws NotFoundException
//  * @param string $id
//  * @return void
//  */
// 	public function admin_delete($id = null) {
// 		$this->Article->id = $id;
// 		if (!$this->Article->exists()) {
// 			throw new NotFoundException(__('Invalid article'));
// 		}
// 		$this->request->allowMethod('post', 'delete');
// 		if ($this->Article->delete()) {
// 			$this->Flash->success(__('The article has been deleted.'));
// 		} else {
// 			$this->Flash->error(__('The article could not be deleted. Please, try again.'));
// 		}
// 		return $this->redirect(array('action' => 'index'));
// 	}
}
