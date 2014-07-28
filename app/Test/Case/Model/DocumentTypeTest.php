<?php
App::uses('DocumentType', 'Model');

/**
 * DocumentType Test Case
 *
 */
class DocumentTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.document_type',
		'app.person'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DocumentType = ClassRegistry::init('DocumentType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DocumentType);

		parent::tearDown();
	}

}
