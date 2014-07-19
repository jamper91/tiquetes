<?php
/**
 * UserFixture
 *
 */
class UserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'username' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'password' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'estado' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'person_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'type_user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'department_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true),
		'validodesde' => array('type' => 'date', 'null' => true, 'default' => null),
		'validohasta' => array('type' => 'date', 'null' => true, 'default' => null),
		'identificador' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'username' => 'Lorem ipsum dolor ',
			'password' => 'Lorem ipsum dolor ',
			'estado' => 1,
			'person_id' => 1,
			'type_user_id' => 1,
			'department_id' => '',
			'validodesde' => '2014-07-19',
			'validohasta' => '2014-07-19',
			'identificador' => 'Lorem ipsum dolor '
		),
	);

}
