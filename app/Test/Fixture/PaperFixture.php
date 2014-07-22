<?php
/**
 * PaperFixture
 *
 */
class PaperFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'event_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'index'),
		'shelf_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'index'),
		'func_nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'func_fechInicio' => array('type' => 'date', 'null' => false, 'default' => null),
		'func_fechFinal' => array('type' => 'date', 'null' => false, 'default' => null),
		'func_cortesia' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'func_estado' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'func_imagen' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'func_palaClaves' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'func_cantEntradas' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
		'func_cantAlerta' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
		'func_codigo' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id' => array('column' => 'id', 'unique' => 1),
			'event_id' => array('column' => 'event_id', 'unique' => 0),
			'shelf_id' => array('column' => 'shelf_id', 'unique' => 0)
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
			'event_id' => '',
			'shelf_id' => '',
			'func_nombre' => 'Lorem ipsum dolor sit amet',
			'func_fechInicio' => '2014-07-22',
			'func_fechFinal' => '2014-07-22',
			'func_cortesia' => 1,
			'func_estado' => 'Lorem ipsum dolor sit amet',
			'func_imagen' => 'Lorem ipsum dolor sit amet',
			'func_palaClaves' => 'Lorem ipsum dolor sit amet',
			'func_cantEntradas' => '',
			'func_cantAlerta' => '',
			'func_codigo' => 'Lorem ipsum dolor sit amet'
		),
	);

}
