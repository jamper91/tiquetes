<?php
/**
 * CompanyFixture
 *
 */
class CompanyFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'person_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true),
		'city_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true),
		'empr_nit' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'empr_nombre' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'empr_telefono' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false),
		'empr_mail' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'empr_direccion' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'empr_barrio' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'empr_pagiWeb' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'person_id' => '',
			'city_id' => '',
			'empr_nit' => 'Lorem ipsum dolor ',
			'empr_nombre' => 'Lorem ipsum dolor ',
			'empr_telefono' => '',
			'empr_mail' => 'Lorem ipsum dolor ',
			'empr_direccion' => 'Lorem ipsum dolor ',
			'empr_barrio' => 'Lorem ipsum dolor ',
			'empr_pagiWeb' => 'Lorem ipsum dolor '
		),
	);

}
