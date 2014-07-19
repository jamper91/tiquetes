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
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'document_type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'city_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'pers_documento' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'document_type_id' => 1,
			'city_id' => 1,
			'pers_documento' => 'Lorem ipsum dolor ',
			'pers_primNombre' => 'Lorem ipsum dolor ',
			'pers_segNombre' => 'Lorem ipsum dolor ',
			'pers_primApellido' => 'Lorem ipsum dolor ',
			'pers_segApellido' => 'Lorem ipsum dolor ',
			'pers_direccion' => 'Lorem ipsum dolor ',
			'pers_barrio' => 'Lorem ipsum dolor ',
			'pers_telefono' => '',
			'pers_celular' => '',
			'pers_fechNacimiento' => '2014-07-19',
			'pers_tipoSangre' => 'Lorem ipsum dolor ',
			'pers_mail' => 'Lorem ipsum dolor '
		),
	);

}
