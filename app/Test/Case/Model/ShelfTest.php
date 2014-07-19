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
		'app.registration_type',
		'app.category',
		'app.entrada',
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
		'app.events_payment',
		'app.paper_input'
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
