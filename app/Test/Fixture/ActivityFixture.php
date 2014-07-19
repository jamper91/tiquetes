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
		'shelf_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'func_nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'func_fechInicio' => array('type' => 'date', 'null' => false, 'default' => null),
		'func_fechFinal' => array('type' => 'date', 'null' => false, 'default' => null),
		'func_cortesia' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'func_estado' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'func_imagen' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'func_palaClaves' => array('type' => 'text', 'null' => false, 'default' => null, 'length' => 20),
		'func_cantEntradas' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
		'func_cantAlerta' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
		'func_codigo' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'shelf_id' => 1,
			'func_nombre' => 'Lorem ipsum dolor ',
			'func_fechInicio' => '2014-07-19',
			'func_fechFinal' => '2014-07-19',
			'func_cortesia' => 1,
			'func_estado' => 'Lorem ipsum dolor ',
			'func_imagen' => 'Lorem ipsum dolor ',
			'func_palaClaves' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'func_cantEntradas' => '',
			'func_cantAlerta' => '',
			'func_codigo' => 'Lorem ipsum dolor '
		),
	);

}
