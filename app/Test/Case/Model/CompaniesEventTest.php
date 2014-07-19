<?php
App::uses('CompaniesEvent', 'Model');

/**
 * CompaniesEvent Test Case
 *
 */
class CompaniesEventTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.companies_event',
		'app.company',
		'app.person',
		'app.city',
		'app.department',
		'app.stage',
		'app.event',
		'app.role_company'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CompaniesEvent = ClassRegistry::init('CompaniesEvent');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CompaniesEvent);

		parent::tearDown();
	}

}
