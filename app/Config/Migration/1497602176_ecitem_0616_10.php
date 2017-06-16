<?php
class Ecitem061610 extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'ecitem_0616_10';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'drop_field' => array(
				'test' => array('id', 't', 'te', 'tes', 'tableParameters', 'indexes' => array('PRIMARY', 't')),
				'test3' => array('id', 't', 'te', 'tes', 'tableParameters', 'indexes' => array('PRIMARY')),
				'users' => array('id', 'name', 'password', 'thumbnail', 'gender', 'age', 'job_id', 'introduction', 'tableParameters', 'indexes' => array('PRIMARY', 'name', 'password')),
			),
			'drop_table' => array(
				'test', 'test3', 'users'
			),
		),
		'down' => array(
			'create_field' => array(
				'test' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
					't' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'unique'),
					'te' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
					'tes' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
						't' => array('column' => 't', 'unique' => 1),
					),
				),
				'test3' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
					't' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
					'te' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
					'tes' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
				),
				'users' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
					'name' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'password' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 32, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'thumbnail' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'gender' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'age' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'job_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'introduction' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
						'name' => array('column' => 'name', 'unique' => 1),
						'password' => array('column' => 'password', 'unique' => 1),
					),
				),
			),
			'create_table' => array(
				'test' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
					't' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'unique'),
					'te' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
					'tes' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
						't' => array('column' => 't', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
				'test3' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
					't' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
					'te' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
					'tes' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
				'users' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
					'name' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'password' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 32, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'thumbnail' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'gender' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'age' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'job_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'introduction' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
						'name' => array('column' => 'name', 'unique' => 1),
						'password' => array('column' => 'password', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function after($direction) {
		return true;
	}
}
