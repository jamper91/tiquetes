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
		'app.person',
		'app.document_type',
		'app.city',
		'app.state',
		'app.company',
		'app.companies_event',
		'app.hotel',
		'app.events_hotel',
		'app.data',
		'app.committees_event',
		'app.committee',
		'app.committees_events_person',
		'app.events_registration_type',
		'app.delivery_method',
		'app.delivery_methods_input',
		'app.entradas_input',
		'app.sale',
		'app.inputs_sale',
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
