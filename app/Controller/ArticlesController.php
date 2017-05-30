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
        if ($this->request->is('post',array('type'=>'file','enctype' => 'multipart/form-data' ))) {
            $this->Article->create();
            if ($this->Article->save($data, $validate = false)) {
                $this->Flash->success(__('The article has been saved.'));

                //保存先のパスを保存
                $path = "/var/www/html/ecitem_review/app/webroot/upimg/";
                $path = WWW_ROOT . "upimg/";

                $img = $this->request->data('Article.image.tmp_name');

                $name = $this->request->data('Article.image.name');

                $uploadfile = $path . $name;
                //画像のフォルダとファイル名を指定して保存
                if(!move_uploaded_file($img,$uploadfile)){
                    debug($uploadfile);
                    return;
                }

                return $this->redirect(array('action' => 'index'));

            } else {
                $this->Flash->error(__('The article could not be saved. Please, try again.'));
            }
        }
        $users = $this->Article->User->find('list');
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
//     public function admin_index() {
//         $this->Article->recursive = 0;
//         $this->set('articles', $this->Paginator->paginate());
//     }
//
// /**
//  * admin_view method
//  *
//  * @throws NotFoundException
//  * @param string $id
//  * @return void
//  */
//     public function admin_view($id = null) {
//         if (!$this->Article->exists($id)) {
//             throw new NotFoundException(__('Invalid article'));
//         }
//         $options = array('conditions' => array('Article.' . $this->Article->primaryKey => $id));
//         $this->set('article', $this->Article->find('first', $options));
//     }
//
// /**
//  * admin_add method
//  *
//  * @return void
//  */
//     public function admin_add() {
//         if ($this->request->is('post')) {
//             $this->Article->create();
//             if ($this->Article->save($this->request->data)) {
//                 $this->Flash->success(__('The article has been saved.'));
//                 return $this->redirect(array('action' => 'index'));
//             } else {
//                 $this->Flash->error(__('The article could not be saved. Please, try again.'));
//             }
//         }
//         $users = $this->Article->User->find('list');
//         $products = $this->Article->Product->find('list');
//         $this->set(compact('users', 'products'));
//     }
//
// /**
//  * admin_edit method
//  *
//  * @throws NotFoundException
//  * @param string $id
//  * @return void
//  */
//     public function admin_edit($id = null) {
//         if (!$this->Article->exists($id)) {
//             throw new NotFoundException(__('Invalid article'));
//         }
//         if ($this->request->is(array('post', 'put'))) {
//             if ($this->Article->save($this->request->data)) {
//                 $this->Flash->success(__('The article has been saved.'));
//                 return $this->redirect(array('action' => 'index'));
//             } else {
//                 $this->Flash->error(__('The article could not be saved. Please, try again.'));
//             }
//         } else {
//             $options = array('conditions' => array('Article.' . $this->Article->primaryKey => $id));
//             $this->request->data = $this->Article->find('first', $options);
//         }
//         $users = $this->Article->User->find('list');
//         $products = $this->Article->Product->find('list');
//         $this->set(compact('users', 'products'));
//     }
//
// /**
//  * admin_delete method
//  *
//  * @throws NotFoundException
//  * @param string $id
//  * @return void
//  */
//     public function admin_delete($id = null) {
//         $this->Article->id = $id;
//         if (!$this->Article->exists()) {
//             throw new NotFoundException(__('Invalid article'));
//         }
//         $this->request->allowMethod('post', 'delete');
//         if ($this->Article->delete()) {
//             $this->Flash->success(__('The article has been deleted.'));
//         } else {
//             $this->Flash->error(__('The article could not be deleted. Please, try again.'));
//         }
//         return $this->redirect(array('action' => 'index'));
//     }
}
