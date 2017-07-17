<?php
App::uses('AppController', 'Controller');
/**
 * Companies Controller
 *
 * @property Company $Company
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class CompaniesController extends AppController {

/**
 * Components
 *
 * @var array
 */
    public $components = array('Paginator', 'Session', 'Flash','Custom');

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->Company->recursive = 0;

        //サイト情報の横に記事数を出力する処理
        $table_name = "Product";
        $field_name = "company_id";
        //サイトの数を取得する
        $this_list_count = count($this->Company->find('list'));
        //各サイトごとの記事がアップされている数を取得する
        $article_company_id_data = $this->Custom->get_article_count($table_name,$field_name,$this_list_count);

        $this->set('article_company_id_data',$article_company_id_data);

        $this->set('companies', $this->Paginator->paginate());
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        if (!$this->Company->exists($id)) {
            throw new NotFoundException(__('Invalid company'));
        }
        $options = array('conditions' => array('Company.' . $this->Company->primaryKey => $id));
        $this->set('company', $this->Company->find('first', $options));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Company->create();
            if ($this->Company->save($this->request->data)) {
                $this->Flash->success(__('The company has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The company could not be saved. Please, try again.'));
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
        if (!$this->Company->exists($id)) {
            throw new NotFoundException(__('Invalid company'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Company->save($this->request->data)) {
                $this->Flash->success(__('The company has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The company could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Company.' . $this->Company->primaryKey => $id));
            $this->request->data = $this->Company->find('first', $options);
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
        $this->Company->id = $id;
        if (!$this->Company->exists()) {
            throw new NotFoundException(__('Invalid company'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Company->delete()) {
            $this->Flash->success(__('The company has been deleted.'));
        } else {
            $this->Flash->error(__('The company could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
