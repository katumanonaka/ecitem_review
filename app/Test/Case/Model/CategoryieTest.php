<?php
App::uses('Categoryie', 'Model');

/**
 * Categoryie Test Case
 */
class CategoryieTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.categoryie'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Categoryie = ClassRegistry::init('Categoryie');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Categoryie);

		parent::tearDown();
	}

}
