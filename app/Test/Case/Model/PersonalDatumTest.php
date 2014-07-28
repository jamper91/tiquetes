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
		'app.authorizations_user',
		'app.user',
		'app.authorization',
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
		'app.forms_personal_datum',
		'app.committees_event',
		'app.committee',
		'app.committees_events_person',
		'app.events_registration_type',
		'app.registration_type',
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
