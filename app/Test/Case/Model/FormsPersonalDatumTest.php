<?php
App::uses('FormsPersonalDatum', 'Model');

/**
 * FormsPersonalDatum Test Case
 *
 */
class FormsPersonalDatumTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.forms_personal_datum',
		'app.personal_datum',
		'app.form',
		'app.event',
		'app.stage',
		'app.event_type',
		'app.authorizations_user',
		'app.user',
		'app.authorization',
		'app.paper',
		'app.committee',
		'app.committees_event',
		'app.company',
		'app.person',
		'app.city',
		'app.state',
		'app.hotel',
		'app.companies_event',
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
		$this->FormsPersonalDatum = ClassRegistry::init('FormsPersonalDatum');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FormsPersonalDatum);

		parent::tearDown();
	}

}
