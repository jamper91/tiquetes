<?php
App::uses('Form', 'Model');

/**
 * Form Test Case
 *
 */
class FormTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.form',
		'app.personal_datum',
		'app.event',
		'app.stage',
		'app.event_type',
		'app.paper',
		'app.committee',
		'app.committees_event',
		'app.company',
		'app.person',
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
		'app.data'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Form = ClassRegistry::init('Form');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Form);

		parent::tearDown();
	}

}
