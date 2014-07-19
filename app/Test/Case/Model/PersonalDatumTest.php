<?php
App::uses('PersonalDatum', 'Model');

/**
 * PersonalDatum Test Case
 *
 */
class PersonalDatumTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.personal_datum',
		'app.form',
		'app.event',
		'app.stage',
		'app.event_type',
		'app.paper',
		'app.shelf',
		'app.entrada',
		'app.category',
		'app.input',
		'app.input_state',
		'app.person',
		'app.document_type',
		'app.city',
		'app.department',
		'app.user',
		'app.company',
		'app.companies_event',
		'app.data',
		'app.committees_event',
		'app.committee',
		'app.committees_events_person',
		'app.events_registration_type',
		'app.registration_type',
		'app.delivery_method',
		'app.delivery_methods_input',
		'app.sale',
		'app.inputs_sale',
		'app.paper_input',
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
		$this->PersonalDatum = ClassRegistry::init('PersonalDatum');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PersonalDatum);

		parent::tearDown();
	}

}
