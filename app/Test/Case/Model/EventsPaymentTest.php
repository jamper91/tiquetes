<?php
App::uses('EventsPayment', 'Model');

/**
 * EventsPayment Test Case
 *
 */
class EventsPaymentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.events_payment',
		'app.payment',
		'app.event',
		'app.stage',
		'app.city',
		'app.department',
		'app.user',
		'app.person',
		'app.document_type',
		'app.company',
		'app.companies_event',
		'app.data',
		'app.form',
		'app.personal_datum',
		'app.input',
		'app.input_state',
		'app.events_registration_type',
		'app.registration_type',
		'app.category',
		'app.entrada',
		'app.paper',
		'app.shelf',
		'app.location',
		'app.paper_input',
		'app.delivery_method',
		'app.delivery_methods_input',
		'app.sale',
		'app.inputs_sale',
		'app.committees_event',
		'app.committee',
		'app.committees_events_person',
		'app.type_user',
		'app.authorization',
		'app.authorizations_user',
		'app.event_type',
		'app.hotel',
		'app.events_hotel'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EventsPayment = ClassRegistry::init('EventsPayment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EventsPayment);

		parent::tearDown();
	}

}
