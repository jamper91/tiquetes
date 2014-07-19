<?php
App::uses('InputsSale', 'Model');

/**
 * InputsSale Test Case
 *
 */
class InputsSaleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.inputs_sale',
		'app.input',
		'app.input_state',
		'app.person',
		'app.events_registration_type',
		'app.registration_type',
		'app.event',
		'app.stage',
		'app.event_type',
		'app.form',
		'app.personal_datum',
		'app.data',
		'app.paper',
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
		'app.category',
		'app.entrada',
		'app.delivery_method',
		'app.delivery_methods_input',
		'app.sale'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InputsSale = ClassRegistry::init('InputsSale');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InputsSale);

		parent::tearDown();
	}

}
