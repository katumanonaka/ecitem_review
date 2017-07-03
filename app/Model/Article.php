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

    public function category($category_num){
        //$data = $this->$category->find('all');
        //$data = $this->Article->category->find('all');

        //$data = $category_num;

        $data = $this->find('all', array(
               'conditions' => array('Product.category_id' => $category_num)
           ));

        // $data = $this->find('all');

        return $data;
    }

    public function category2() {

        //$count =count($category_num);
        // $sql[] = "SELECT * FROME articles INNER JOIN products ON articles.product_id = products.id WHERE products.category_id = :id;";
        //
        $n = 22;

        $sql = "SELECT * FROM articles WHERE articles.id = :id;";

        $params = array(
            'id'=> $n
        );
        // for($i = 0; $i < $count; $i++) {
        // }

       $data = $this->query($sql,$params);
       return $data;
    }

}
