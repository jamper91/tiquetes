<?php
/**
 * EntradasInputFixture
 *
 */
class EntradasInputFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'entrada_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true),
		'input_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true),
		'fecha' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'ingresos' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false),
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
			'entrada_id' => '',
			'input_id' => '',
			'fecha' => '2014-07-28 03:24:40',
			'ingresos' => 1
		),
	);

}
