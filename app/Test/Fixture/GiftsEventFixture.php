<?php
/**
 * GiftsEventFixture
 *
 */
class GiftsEventFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'gift_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'event_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'cantidad' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'control' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'categoria_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'people_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'gift_id' => 1,
			'event_id' => 1,
			'cantidad' => 1,
			'control' => 1,
			'categoria_id' => 1,
			'people_id' => 1
		),
	);

}
