<?php
App::uses('AppModel', 'Model');
/**
 * Product Model
 *
 * @property Company $Company
 * @property Category $Category
 * @property Article $Article
 */
class Product extends AppModel {

/**
 * Display field
 *
 * @var string
 */
    public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
    public $validate = array(
        'name' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'company_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'category_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'price' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        // 'size' => array(
        //     'notBlank' => array(
        //         'rule' => array('notBlank'),
        //         //'message' => 'Your custom message here',
        //         //'allowEmpty' => false,
        //         //'required' => false,
        //         //'last' => false, // Stop validation after this rule
        //         //'on' => 'create', // Limit validation to 'create' or 'update' operations
        //     ),
        // ),
        // 'effect' => array(
        //     'notBlank' => array(
        //         'rule' => array('notBlank'),
        //         //'message' => 'Your custom message here',
        //         //'allowEmpty' => false,
        //         //'required' => false,
        //         //'last' => false, // Stop validation after this rule
        //         //'on' => 'create', // Limit validation to 'create' or 'update' operations
        //     ),
        // ),
        // 'how_to_use' => array(
        //     'notBlank' => array(
        //         'rule' => array('notBlank'),
        //         //'message' => 'Your custom message here',
        //         //'allowEmpty' => false,
        //         //'required' => false,
        //         //'last' => false, // Stop validation after this rule
        //         //'on' => 'create', // Limit validation to 'create' or 'update' operations
        //     ),
        // ),
    );

    // The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
    public $belongsTo = array(
        'Company' => array(
            'className' => 'Company',
            'foreignKey' => 'company_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

/**
 * hasMany associations
 *
 * @var array
 */
    public $hasMany = array(
        'Article' => array(
            'className' => 'Article',
            'foreignKey' => 'product_id',
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

    // public $actsAs = array('Tree','Containable','Test');
    public $actsAs = array('Containable','Test');
    // public function find($type, $options = array()) {
    //     $data = parent::find($type, array_merge($options, array('contain' => array('Product.name'))));
    //     return $data;
    // }

}
