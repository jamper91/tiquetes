<?php
/**
 * ValidationFixture
 *
 */
class ValidationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'descripcion' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'fechainicio' => array('type' => 'date', 'null' => true, 'default' => null),
		'fechafin' => array('type' => 'date', 'null' => true, 'default' => null),
		'cantidad_reingresos' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'categoria' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id' => array('column' => 'id', 'unique' => 1)
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
			'fechainicio' => '2014-07-22',
			'fechafin' => '2014-07-22',
			'cantidad_reingresos' => 1,
			'categoria' => 1
		),
	);

}
