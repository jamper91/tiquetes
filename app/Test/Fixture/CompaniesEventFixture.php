<?php
/**
 * CompaniesEventFixture
 *
 */
class CompaniesEventFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'company_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true),
		'event_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true),
		'role_company_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true),
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
			'company_id' => '',
			'event_id' => '',
			'role_company_id' => ''
		),
	);

}
