<?php
/**
 * LocationFixture
 *
 */
class LocationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'loca_nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'stage_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'parent_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'loca_fila' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'loca_colomnna' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'loca_nombre' => 'Lorem ipsum dolor ',
			'stage_id' => 1,
			'parent_id' => 1,
			'loca_fila' => 'Lorem ipsum dolor ',
			'loca_colomnna' => 'Lorem ipsum dolor '
		),
	);

}
