<?php
App::uses('PaperInput', 'Model');

/**
 * PaperInput Test Case
 *
 */
class PaperInputTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.paper_input',
		'app.paper',
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
		'app.sale',
		'app.inputs_sale'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PaperInput = ClassRegistry::init('PaperInput');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PaperInput);

		parent::tearDown();
	}

}
