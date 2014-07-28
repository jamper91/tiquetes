<?php
/**
 * ShelfFixture
 *
 */
class ShelfFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'location_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true),
		'esta_nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'fila' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'columna' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'location_id' => '',
			'esta_nombre' => 'Lorem ipsum dolor sit amet',
			'fila' => 1,
			'columna' => 1
		),
	);

}
