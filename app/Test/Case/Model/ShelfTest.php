<?php
App::uses('Shelf', 'Model');

/**
 * Shelf Test Case
 *
 */
class ShelfTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.shelf',
		'app.location',
		'app.stage',
		'app.paper',
		'app.event',
		'app.event_type',
		'app.authorizations_user',
		'app.user',
		'app.authorization',
		'app.form',
		'app.personal_datum',
		'app.forms_personal_datum',
		'app.committee',
		'app.committees_event',
		'app.company',
		'app.person',
		'app.document_type',
		'app.city',
		'app.state',
		'app.hotel',
		'app.events_hotel',
		'app.data',
		'app.input',
		'app.input_state',
		'app.events_registration_type',
		'app.registration_type',
		'app.delivery_method',
		'app.delivery_methods_input',
		'app.entrada',
		'app.entradas_input',
		'app.sale',
		'app.inputs_sale',
		'app.committees_events_person',
		'app.companies_event',
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
		$this->Shelf = ClassRegistry::init('Shelf');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Shelf);

		parent::tearDown();
	}

}
