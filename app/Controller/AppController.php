<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
//'SimplePasswordHasher', 'Controller/Component/Auth'
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $components = array('DebugKit.Toolbar' => array('panels' => array('history' => false)) ,'Auth','Session');
    //<span style="color: #ff0000;">=> array('panels' => array('history' => false))</span> ,
    // 'Auth' => array(
    //         'loginRedirect' => array(
    //             'controller' => 'posts',
    //             'action' => 'index'
    //         ),
    //         'logoutRedirect' => array(
    //             'controller' => 'pages',
    //             'action' => 'display',
    //             'home'
    //         ),
    //         'authenticate' => array(
    //             'Form' => array(
    //                 'passwordHasher' => 'Blowfish'
    //             )
    //         )
    //     )

    public $helpers = array(
           'Session',
           'Html' => array('className' => 'TwitterBootstrap.BootstrapHtml'),
           'Form' => array('className' => 'TwitterBootstrap.BootstrapForm'),
           'Paginator' => array('className' => 'TwitterBootstrap.BootstrapPaginator'),
    );

    public $layout = 'bootstrap';

    public function beforeFilter() {
        // 認証コンポーネントをViewで利用可能にしておく
        $this->set('auth',$this->Auth);
    }
}
