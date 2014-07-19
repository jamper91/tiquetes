<?php
App::uses('Paper', 'Model');

/**
 * Paper Test Case
 *
 */
class PaperTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.paper',
		'app.event',
		'app.stage',
		'app.event_type',
		'app.form',
		'app.personal_datum',
		'app.data',
		'app.person',
		'app.committee',
		'app.committees_event',
		'app.company',
		'app.city',
		'app.department',
		'app.user',
		'app.companies_event',
		'app.hotel',
		'app.events_hotel',
		'app.payment',
		'app.events_payment',
		'app.registration_type',
		'app.events_registration_type',
		'app.shelf',
		'app.entrada',
		'app.category',
		'app.input',
		'app.input_state',
		'app.delivery_method',
		'app.delivery_methods_input',
		'app.sale',
		'app.inputs_sale',
		'app.paper_input'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Paper = ClassRegistry::init('Paper');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Paper);

		parent::tearDown();
	}

}
