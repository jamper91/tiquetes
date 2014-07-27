<?php
/**
 * InputFixture
 *
 */
class InputFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'input_state_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true),
		'person_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true),
		'entr_imagen' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'entr_titulo' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'entr_fuenTitulo' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'entr_tamaTitulo' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
		'entr_fecha' => array('type' => 'date', 'null' => false, 'default' => null),
		'entr_fuenFecha' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'entr_tamaFecha' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
		'entr_fuenCliente' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'entr_tamaCliente' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
		'entr_direccion' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'entr_fuenDireccion' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'entr_tamaDireccion' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
		'entr_codigo' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'entr_identificador' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'entr_impreso' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'events_registration_type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'category_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true),
		'cantidad_reingresos' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'input_state_id' => '',
			'person_id' => '',
			'entr_imagen' => 'Lorem ipsum dolor sit amet',
			'entr_titulo' => 'Lorem ipsum dolor sit amet',
			'entr_fuenTitulo' => 'Lorem ipsum dolor sit amet',
			'entr_tamaTitulo' => '',
			'entr_fecha' => '2014-07-28',
			'entr_fuenFecha' => 'Lorem ipsum dolor sit amet',
			'entr_tamaFecha' => '',
			'entr_fuenCliente' => 'Lorem ipsum dolor sit amet',
			'entr_tamaCliente' => '',
			'entr_direccion' => 'Lorem ipsum dolor sit amet',
			'entr_fuenDireccion' => 'Lorem ipsum dolor sit amet',
			'entr_tamaDireccion' => '',
			'entr_codigo' => 'Lorem ipsum dolor ',
			'entr_identificador' => 'Lorem ipsum dolor ',
			'entr_impreso' => 1,
			'events_registration_type_id' => 1,
			'category_id' => '',
			'cantidad_reingresos' => 1
		),
	);

}
