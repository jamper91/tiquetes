<?php
/**
 * CompanionFixture
 *
 */
class CompanionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'expo_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'person_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'event_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
			'expo_id' => 1,
			'person_id' => 1,
			'event_id' => 1
		),
	);

}
