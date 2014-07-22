<?php
/**
 * PersonFixture
 *
 */
class PersonFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'document_type_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'index'),
		'city_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'index'),
		'pers_documento' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'unique', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'pers_primNombre' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'pers_segNombre' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'pers_primApellido' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'pers_segApellido' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'pers_direccion' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'pers_barrio' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'pers_telefono' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false),
		'pers_celular' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false),
		'pers_fechNacimiento' => array('type' => 'date', 'null' => true, 'default' => null),
		'pers_tipoSangre' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'pers_mail' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id' => array('column' => 'id', 'unique' => 1),
			'pers_documento' => array('column' => 'pers_documento', 'unique' => 1),
			'document_type_id' => array('column' => 'document_type_id', 'unique' => 0),
			'city_id' => array('column' => 'city_id', 'unique' => 0)
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
			'document_type_id' => '',
			'city_id' => '',
			'pers_documento' => 'Lorem ipsum dolor ',
			'pers_primNombre' => 'Lorem ipsum dolor ',
			'pers_segNombre' => 'Lorem ipsum dolor ',
			'pers_primApellido' => 'Lorem ipsum dolor ',
			'pers_segApellido' => 'Lorem ipsum dolor ',
			'pers_direccion' => 'Lorem ipsum dolor ',
			'pers_barrio' => 'Lorem ipsum dolor ',
			'pers_telefono' => '',
			'pers_celular' => '',
			'pers_fechNacimiento' => '2014-07-22',
			'pers_tipoSangre' => 'Lorem ipsum dolor ',
			'pers_mail' => 'Lorem ipsum dolor '
		),
	);

}
