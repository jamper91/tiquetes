<?php
App::uses('RegistrationType', 'Model');

/**
 * RegistrationType Test Case
 *
 */
class RegistrationTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.registration_type',
		'app.event',
		'app.stage',
		'app.event_type',
		'app.form',
		'app.personal_datum',
		'app.data',
		'app.person',
		'app.document_type',
		'app.city',
		'app.department',
		'app.user',
		'app.company',
		'app.companies_event',
		'app.input',
		'app.input_state',
		'app.events_registration_type',
		'app.category',
		'app.entrada',
		'app.paper',
		'app.shelf',
		'app.paper_input',
		'app.delivery_method',
		'app.delivery_methods_input',
		'app.sale',
		'app.inputs_sale',
		'app.committees_event',
		'app.committee',
		'app.committees_events_person',
		'app.hotel',
		'app.events_hotel',
		'app.payment',
		'app.events_payment'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RegistrationType = ClassRegistry::init('RegistrationType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RegistrationType);

		parent::tearDown();
	}

}
