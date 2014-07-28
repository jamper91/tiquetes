<?php
/**
 * DiscountFixture
 *
 */
class DiscountFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'porcentaje' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'fecha_inicio' => array('type' => 'date', 'null' => true, 'default' => null),
		'fecha_fin' => array('type' => 'date', 'null' => true, 'default' => null),
		'categoria_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'porcentaje' => 1,
			'fecha_inicio' => '2014-07-28',
			'fecha_fin' => '2014-07-28',
			'categoria_id' => 1
		),
	);

}
