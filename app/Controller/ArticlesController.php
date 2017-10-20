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
        'Paginator',
        'Session',
        'Flash'
    );

    public $paginate = array(
        'limit' => 10,
        'order' => array('Article.id' => 'desc'),
        'conditions' => array('Article.id <' => 15)
    );

    public $uses = ['Article'];
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
        //$category_id = $this->request->data['Article']['category'];
        //選択された評価数値を取得する
        //$evaluation_num = $this->request->data['Article']['evaluation'];

        //複数選択した条件を送る、検索した記事データを取得する
        // $selected_articles = $this->Article->get_selected_articles($category_id,$evaluation_num);

        //$sql = $this->Article->get_selected_articles($category_id,$evaluation_num);
        // $query = [
        //     'limit' => 10,
        //     'extra' => [
        //         'type' => $sql
        //     ],
        //     'order' => array('Article.id' => 'desc')
        // ];

        // $this->paginate = $sql;
        // $this->set('selected_article', $this->paginate('Article'));

        //$conditions = array('id' => 5);//array(20,21,22));
        //$this->paginate['conditions'] = $conditions;
        // debug($conditions);
        // return;
        //$data = $this->paginate($conditions);
        //$this->set('selected_article', $data);

        //$this->Paginator->settings = $query;
        $history_lists = $this->Paginator->paginate('Article');

        $this->set('selected_article', $history_lists);

        //$this->set('selected_article',$selected_articles);

        //チェックボックのためのカテゴリー数とカテゴリー名をViewに送る
        $this->set('category_id', $this->Category->find('list', array('fields' => array('name'))));
        $evaluation = array(1 => 1,2,3,4,5);
        //5段階評価のカテゴリー
        $this->set('article_evaluation', $evaluation);
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
            //ログイン中ユーザーのidを取得する
            $user_id = $this->Session->read('Auth.User.id');
            //記事データのユーザーIDにログイン中ユーザーのidを代入する
            $this->request->data['Article']['user_id'] = $user_id;
            // debug($user_id);
            // debug($this->request->data('Article.user_id'));
            // debug($this->request->data('Article'));
            // return;

            //アップロードしたファイルの拡張子を取得する
            $extension = $this->request->data('Article.image.type');
            $check_array = array(0 => 'image/jpeg', 1 => 'image/jpg', 2 => 'image/gif', 3 => 'image/png');

            if(!in_array($extension , $check_array)) {
                $this->Flash->error(__('画像ファイルを入れて下さい'));
                return $this->redirect(array('action' => 'add'));
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
            // $this->request->data['Article']['id'] = 23;
            $this->request->data['Article']['image'] = $name;

            // $this->request->data['Article']['created'] = '2017-07-17-19-01-49';
            // $this->request->data['Article']['modified'] = '2017-07-17-19-01-49';
            // $this->request->data['Article']['review'] = 1;
            // $this->request->data['Article']['evaluation'] = 1;
            // $this->request->data['Article']['great'] = 1;
// $test = $this->request->data;
// // debug($this->request->data);
// debug($test);
// // return;
// $save = $this->Article->save($test['Article']);
// debug($save);
// // 登録する項目（フィールド指定）
// $fields = array('user_id','product_id','review','evaluation','great','image');
// debug($fields);
            // if($this->Article->save($test,false,$fields)) {
            if($this->Article->save($this->request->data)) {
                $this->Flash->success(__('記事を追加しました'));
                return $this->redirect(array('action' => 'index'));

            }   else {
                //debug($this->log( $this->Article->getDataSource()->getLog(), LOG_DEBUG));
                // debug($this->Article->validationErrors);
                $this->Flash->error(__('記事を追加出来ませんでした'));
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
