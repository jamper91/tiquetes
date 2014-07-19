<?php
App::uses('CompaniesEvent', 'Model');

/**
 * CompaniesEvent Test Case
 *
 */
class CompaniesEventTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.companies_event',
		'app.company',
		'app.person',
		'app.document_type',
		'app.city',
		'app.department',
		'app.user',
		'app.type_user',
		'app.authorization',
		'app.authorizations_user',
		'app.stage',
		'app.event',
		'app.event_type',
		'app.form',
		'app.personal_datum',
		'app.data',
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
		'app.committees_events_person',
		'app.role_company'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CompaniesEvent = ClassRegistry::init('CompaniesEvent');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CompaniesEvent);

		parent::tearDown();
	}

}
