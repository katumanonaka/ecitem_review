<?php
App::uses('AppModel', 'Model');
/**
 * Article Model
 *
 * @property User $User
 * @property Product $Product
 */
class Article extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */

    //コメントテーブルから外部キーで参照されている
    public $hasMany = array(
        'Comment' => array(
            'className' => 'Comment',
            'foreignKey' => 'article_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

    public $validate = array(
        'user_id' => array(
             'numeric' => array(
            //'alphaNumeri' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),

        'image' => array(
            // 'notBlank' => array(
            //     'rule' => array('notBlank',array('rule' => 'notBlank' , 'rule' => 'notBlank' )),
            //     //'message' => 'Your custom message here',
            //     //'allowEmpty' => false,
            //     //'required' => false,
            //     //'last' => false, // Stop validation after this rule
            //     //'on' => 'create', // Limit validation to 'create' or 'update' operations
            // ),
        ),

        // 'image' => array(
        //     'notBlank' => array(
        //         //'rule' => 'boolean',
        //         'rule' => array('extension' => array('jpg','jpeg','gif','png')),
        //         'message' => '画像ではありません。',
        //         //'message' => 'Your custom message here',
        //         //'allowEmpty' => false,
        //         //'required' => false,
        //         //'last' => false, // Stop validation after this rule
        //         //'on' => 'create', // Limit validation to 'create' or 'update' operations
        //     ),
        // ),
        'review' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'evaluation' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'great' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );


    // 'image' => array(
    //     'notBlank' => array(
    //         'rule' => array('notBlank'),
    //         //'message' => 'Your custom message here',
    //         //'allowEmpty' => false,
    //         //'required' => false,
    //         //'last' => false, // Stop validation after this rule
    //         //'on' => 'create', // Limit validation to 'create' or 'update' operations
    //     ),
    // ),

    // The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Product' => array(
            'className' => 'Product',
            'foreignKey' => 'product_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    public $actsAs = array('Containable');

    public function get_category($category_id){

        $data = $this->find('all' , array('conditions' => array('Product.category_id' => $category_id)));

        return $data;
    }

    public function get_all_artircles() {
        //記事データの全てを取得する
        $sql = "SELECT *
        FROM articles
        INNER JOIN users
        ON articles.user_id = users.id
        INNER JOIN products
        ON articles.product_id = products.id";

        $data = $this->query($sql);
        return $data;
    }

    public function get_selected_articles($category_id,$evaluation_num) {

        //カテゴリーのfindを使えるようにする
        $category = ClassRegistry::init('Category');

        // if($category_id == null) {
        if(empty($category_id)) {
            //カテゴリーが選択されていなければ全てのカテゴリーidを代入する
            $temp = $category->find('list' , array('fields' => array('id')));
            $category_id_str = implode("," , $temp);
        } else {
            //渡されたカテゴリーidをカンマ区切りの文字列に変換する
            $category_id_str = implode("," , $category_id);
        }

        if(empty($evaluation_num)) {
            //評価指数が入力されていなければすべての評価指数を代入する
            $evaluation_str = "1,2,3,4,5";
        } else {
            //渡された評価数値をカンマ区切りの文字列に変換する
            $evaluation_str = implode("," , $evaluation_num);
        }

        //選択された条件で記事データを抽出する
        $sql = "SELECT *
        FROM
            articles
        INNER JOIN
            users
        ON
            articles.user_id = users.id
        INNER JOIN
            products
        ON
            articles.product_id = products.id
        WHERE
            products.category_id IN ($category_id_str)
        AND
            articles.evaluation IN ($evaluation_str)";

        $data = $this->query($sql);
        return $sql;
    }


    //public $useTable = false;

//     public function paginate() {
// // debug("aaaa");
// // return;
//         $extra = func_get_arg(6);
//         $limit = func_get_arg(3);
//         $page = func_get_arg(4);
//
//         //1ページの表示件数を指定
//         // $limit = 6;
//
//         $sql = $extra['extra']['type'];
//         $sql .= ' limit ' . $limit;
//         if ($page > 1){
//             $sql .= ' OFFSET ' . ($limit * ($page - 1));
//         }
//
//
//         return $this->query($sql);
//     }

    // public function paginateCount() {
    //     $extra = func_get_arg(2);
    //     return count($this->query(
    //         preg_replace(
    //             '/LIMIT \d+ OFFSET \d+$/u',
    //             '',
    //             $extra['extra']['type']
    //         )
    //     ));
    // }

    //public $base_sql = "(select name from members) union (select name from member2s)";

 // public function paginate($conditions,$fields,$order,$limit,$page=1,$recursive=null,$extra=array()){
 //        if($page==0){$page = 1;}
 //        $recursive = -1;
 //        $offset = $page * $limit - $limit;
 //        $sql = $this->base_sql . ' limit ' . $limit . ' offset ' . $offset;
 //        return $this->query($sql);
 //    }
 //
 //    public function paginateCount($conditions=null,$recursive=0,$extra=array()){
 //        $this->recursive = $recursive;
 //        $results = $this->query($this->base_sql);
 //        return count($results);
 //    }

}
