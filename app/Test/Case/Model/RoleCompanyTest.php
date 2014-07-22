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
		'app.country',
		'app.stage',
		'app.event',
		'app.event_type',
		'app.form',
		'app.personal_datum',
		'app.forms_personal_datum',
		'app.paper',
		'app.shelf',
		'app.location',
		'app.entrada',
		'app.category',
		'app.input',
		'app.input_state',
		'app.events_registration_type',
		'app.registration_type',
		'app.delivery_method',
		'app.delivery_methods_input',
		'app.sale',
		'app.inputs_sale',
		'app.paper_input',
		'app.committee',
		'app.committees_event',
		'app.hotel',
		'app.events_hotel',
		'app.payment',
		'app.events_payment',
		'app.data',
		'app.forms_personal_data',
		'app.user',
		'app.type_user',
		'app.department',
		'app.authorization',
		'app.authorizations_user',
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
