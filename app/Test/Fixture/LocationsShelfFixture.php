<?php
/**
 * LocationsShelfFixture
 *
 */
class LocationsShelfFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'location_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true),
		'shelf_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true),
		'estado' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'precio' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'shelf_id' => '',
			'estado' => 1,
			'precio' => 1
		),
	);

}
