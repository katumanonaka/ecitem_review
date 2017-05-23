<?php
App::uses('ProductsController', 'Controller');

/**
 * ProductsController Test Case
 */
class ProductsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.product',
		'app.company',
		'app.category',
		'app.article',
		'app.user',
		'app.job',
		'app.comment'
	);

}
