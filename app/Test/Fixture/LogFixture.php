<?php
/**
 * LogFixture
 *
 */
class LogFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'log';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id_log' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'fecha_realizado' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'descripcion' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id_log', 'unique' => 1),
			'id_log' => array('column' => 'id_log', 'unique' => 1),
			'id' => array('column' => 'id', 'unique' => 0)
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
			'id_log' => '',
			'id' => '',
			'fecha_realizado' => 1405998746,
			'descripcion' => 'Lorem ipsum dolor sit amet'
		),
	);

}
