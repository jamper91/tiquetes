<?php
/**
 * SaleFixture
 *
 */
class SaleFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'sale_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'cantidad' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'tipo_de_pago' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'fecha' => array('type' => 'date', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'sale_id', 'unique' => 1),
			'sale_id' => array('column' => 'sale_id', 'unique' => 1)
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
			'sale_id' => '',
			'cantidad' => 1,
			'tipo_de_pago' => 'Lorem ipsum dolor sit amet',
			'fecha' => '2014-07-19'
		),
	);

}
