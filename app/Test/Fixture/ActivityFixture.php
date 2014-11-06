<?php
/**
 * ActivityFixture
 *
 */
class ActivityFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'event_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'conferencista' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'location_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'fecha' => array('type' => 'date', 'null' => false, 'default' => null),
		'hora_inicio' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'hora_fin' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'costo' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'aforo' => array('type' => 'biginteger', 'null' => true, 'default' => null, 'unsigned' => false),
		'alerta_aforo' => array('type' => 'biginteger', 'null' => true, 'default' => null, 'unsigned' => false),
		'control_aforo' => array('type' => 'biginteger', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'event_id' => 1,
			'nombre' => 'Lorem ipsum dolor sit amet',
			'conferencista' => 'Lorem ipsum dolor sit amet',
			'location_id' => 1,
			'fecha' => '2014-11-06',
			'hora_inicio' => 'Lorem ipsum dolor ',
			'hora_fin' => 'Lorem ipsum dolor ',
			'costo' => 'Lorem ipsum dolor ',
			'aforo' => '',
			'alerta_aforo' => '',
			'control_aforo' => ''
		),
	);

}
