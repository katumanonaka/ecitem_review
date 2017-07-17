<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class CategoriesController extends AppController {

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
        $this->Category->recursive = 0;

        //カテゴリーの横に記事数を出力する処理
        $table_name = "Product";
        $field_name = "category_id";
        //カテゴリーの数を取得する
        $this_list_count = count($this->Category->find('list'));
        //記事ごとに使われているカテゴリーを取得する
        $article_category_id_data = $this->Custom->get_article_count($table_name,$field_name,$this_list_count);

        $this->set('category_id_count',$article_category_id_data);

        $this->set('categories', $this->Paginator->paginate());

        // $this->loadModel('Article');
        // //記事のカテゴリーidを取得する
        // $article_list = $this->Article->find('all', array('fields' => array('Product.category_id')));
        //
        // //カテゴリーidごとの記事の数を取得する
        // for($i = 0; $i < count($article_list); $i++) {
        //     $category_id_list[$i] = $article_list[$i]['Product']['category_id'];
        // }
        //
        // //記事数を代入する
        // $category_count = count($this->Category->find('list'));
        // //カテゴリー数を代入する
        // $article_category_id_count = count($category_id_list);
        //
        // //$category_id_countを初期化する
        // for($i = 1; $i <= $category_count; $i++) {
        //     $category_id_count[$i] = 0;
        // }
        //
        // //カテゴリーidごとの記事の数を配列に代入する
        // for($i = 0; $i < $article_category_id_count; $i++) {
        //     for($j = 1; $j <= $category_count; $j++) {
        //         if($category_id_list[$i] == $j) {
        //             $category_id_count[$j]++;
        //             continue;
        //         }
        //     }
        // }


    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        if (!$this->Category->exists($id)) {
            throw new NotFoundException(__('Invalid category'));
        }
        $options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
        $this->set('category', $this->Category->find('first', $options));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Category->create();

            if ($this->Category->save($this->request->data)) {
                $this->Flash->success(__('The category has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The category could not be saved. Please, try again.'));
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
        if (!$this->Category->exists($id)) {
            throw new NotFoundException(__('Invalid category'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Category->save($this->request->data)) {
                $this->Flash->success(__('The category has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The category could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
            $this->request->data = $this->Category->find('first', $options);
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
        $this->Category->id = $id;
        if (!$this->Category->exists()) {
            throw new NotFoundException(__('Invalid category'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Category->delete()) {
            $this->Flash->success(__('The category has been deleted.'));
        } else {
            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
