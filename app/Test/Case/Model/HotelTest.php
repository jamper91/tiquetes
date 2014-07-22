<?php
App::uses('Hotel', 'Model');

/**
 * Hotel Test Case
 *
 */
class HotelTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.hotel',
		'app.event',
		'app.stage',
		'app.city',
		'app.state',
		'app.country',
		'app.company',
		'app.person',
		'app.document_type',
		'app.data',
		'app.forms_personal_data',
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
		'app.user',
		'app.type_user',
		'app.department',
		'app.authorization',
		'app.authorizations_user',
		'app.committees_event',
		'app.committee',
		'app.committees_events_person',
		'app.companies_event',
		'app.event_type',
		'app.form',
		'app.personal_datum',
		'app.forms_personal_datum',
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
		$this->Hotel = ClassRegistry::init('Hotel');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Hotel);

		parent::tearDown();
	}

}
