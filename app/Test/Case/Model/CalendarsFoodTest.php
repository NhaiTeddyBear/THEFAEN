<?php
App::uses('CalendarsFood', 'Model');

/**
 * CalendarsFood Test Case
 */
class CalendarsFoodTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.calendars_food',
		'app.food'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CalendarsFood = ClassRegistry::init('CalendarsFood');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CalendarsFood);

		parent::tearDown();
	}

}
