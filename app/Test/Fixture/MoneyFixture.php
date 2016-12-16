<?php
/**
 * Money Fixture
 */
class MoneyFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'moneys';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'schedule_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'aspect' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 100, 'unsigned' => false),
		'amount' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 100, 'unsigned' => false),
		'date_created' => array('type' => 'datetime', 'null' => false, 'default' => '0000-00-00 00:00:00'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'user_id' => array('column' => 'user_id', 'unique' => 0),
			'schedule_id' => array('column' => 'schedule_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'user_id' => 1,
			'schedule_id' => 1,
			'aspect' => 1,
			'amount' => 1,
			'date_created' => '2016-10-27 05:02:05'
		),
	);

}
