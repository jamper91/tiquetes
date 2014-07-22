<?php
/**
 * DataFixture
 *
 */
class DataFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'descripcion' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'person_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'index'),
		'forms_personal_data_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'index'),
		'indexes' => array(
			'id' => array('column' => 'id', 'unique' => 1),
			'person_id' => array('column' => 'person_id', 'unique' => 0),
			'forms_personal_data_id' => array('column' => 'forms_personal_data_id', 'unique' => 0)
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
			'id' => '',
			'descripcion' => 'Lorem ipsum dolor sit amet',
			'person_id' => '',
			'forms_personal_data_id' => ''
		),
	);

}
