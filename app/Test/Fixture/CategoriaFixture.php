<?php
/**
 * CategoriaFixture
 *
 */
class CategoriaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'validation_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true),
		'descripcion' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'precio' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'discount_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true),
		'gift_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true),
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
			'validation_id' => '',
			'descripcion' => 'Lorem ipsum dolor sit amet',
			'precio' => 1,
			'discount_id' => '',
			'gift_id' => ''
		),
	);

}
