<?php
App::uses('Money', 'Model');

/**
 * Money Test Case
 */
class MoneyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.money',
		'app.user',
		'app.schedule'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Money = ClassRegistry::init('Money');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Money);

		parent::tearDown();
	}

}
