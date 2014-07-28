<?php
App::uses('RoleCompany', 'Model');

/**
 * RoleCompany Test Case
 *
 */
class RoleCompanyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.role_company',
		'app.companies_event',
		'app.company',
		'app.person',
		'app.document_type',
		'app.city',
		'app.state',
		'app.hotel',
		'app.event',
		'app.stage',
		'app.event_type',
		'app.authorizations_user',
		'app.user',
		'app.authorization',
		'app.form',
		'app.personal_datum',
		'app.forms_personal_datum',
		'app.paper',
		'app.location',
		'app.shelf',
		'app.entrada',
		'app.input',
		'app.input_state',
		'app.events_registration_type',
		'app.registration_type',
		'app.delivery_method',
		'app.delivery_methods_input',
		'app.entradas_input',
		'app.sale',
		'app.inputs_sale',
		'app.committee',
		'app.committees_event',
		'app.events_hotel',
		'app.payment',
		'app.events_payment',
		'app.data',
		'app.committees_events_person'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RoleCompany = ClassRegistry::init('RoleCompany');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RoleCompany);

		parent::tearDown();
	}

}
