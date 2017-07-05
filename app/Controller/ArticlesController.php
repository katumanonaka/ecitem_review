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
    public $components = array(
        //'Paginator',
        'Session', 'Flash');

    public $paginate = array(
        'limit' => 6,
        'order' => array('Article.id' => 'desc')
    );
/**
 * index method
 *
 * @return void
 */
    public function index() {
        //error_reporting(0);

        $this->Article->recursive = 0;
        //カテゴリーデータの読み込み
        $this->loadModel('Category');
        $categry_data = $this->Category->find('list');

        //選択されたカテゴリーidを取得する
        $category_id = $this->request->data['Article']['category'];
        //カテゴリーidをModelに渡して該当する記事データを受け取る
        $selected_article = $this->Article->get_category($category_id);

        $category2 = $this->Article->category2();
        debug($category2);
        debug($selected_article);

        if($selected_article == null) {
            //カテゴリー選択をしない場合全件出力する
            $this->set('selected_article', $category2);// $this->paginate());
        } else {
            $this->set('selected_article',$selected_article);
        }

        //カテゴリー数とカテゴリー名をViewに送る
        $this->set('category_id', $this->Category->find('list', array('fields' => array('name'))));
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
        return;
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {

        if ($this->request->is('post',array('type'=>'file','enctype' => 'multipart/form-data' ))) {
            $this->Article->create();

            //アップロードしたファイルの拡張子を取得する
            $extension = $this->request->data('Article.image.type');
            $check_array = array(0 => 'image/jpeg', 1 => 'image/jpg', 2 => 'image/gif', 3 => 'image/png');

            if(!in_array($extension , $check_array)) {
                $this->Flash->error(__('画像ファイルを入れて下さい'));
                return $this->redirect(array('action' => 'index'));
            }

            //保存先のパスを保存
            $path = WWW_ROOT . "upimg/";
            //アップロードしたファイルの一時的なパスを取得する
            $img = $this->request->data('Article.image.tmp_name');
            //アップロードしたファイル名を取得する
            $name = $this->request->data('Article.image.name');

            //$id = $this->Article->getLastInsertID();
            //現在ある記事のidの最大値を取得する
            $box = $this->Article->find('first', array("fields" => "MAX(Article.id) as max_id"));
            $id = $box[0]['max_id'];
            //今回追加する記事番号にする
            $id++;
            //$uploadfile = $path . $id . $name;

            $uploadfile = $path . $id . ".jpg";

            //画像のフォルダとファイル名を指定して保存
            if(!move_uploaded_file($img,$uploadfile)) {
                $this->Flash->error(__('画像ファイル保存できませんでした'));
                return $this->redirect(array('action' => 'index'));
            }

            //DB保存用にファイル名を保存する
            $this->request->data['Article']['image'] = $name;

            if ($this->Article->save($this->request->data)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(array('action' => 'index'));

            } else {
                $this->Flash->error(__('記事の追加でエラーThe article could not be saved. Please, try again.'));
            }
        }


        $users = $this->Article->User->find('list', array(
            'fields' => array('User.username'))
        );

        // $users = $this->Article->User->find('list');
        $products = $this->Article->Product->find('list');
        $this->set(compact('users', 'products'));
    }

    //画像のアップロードクラス
    public function fileup(){
      if ($this->request->is('post') || $this->request->is('put')) {
        //画像の保存
        if($this->Post->save($this->request->data)){
          //画像保存先のパス
          $path = IMAGES;
          $image = $this->request->data['Post']['image'];
          $this->Session->setFlash('画像を登録しました');
          move_uploaded_file($image['tmp_name'], $path . DS . $image['name']);
        }else{
          $this->Session->setFlash('画像が登録できませんでした');
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

        $users = $this->Article->User->find('list', array('fields' => array('User.username')));
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

}
