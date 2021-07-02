<?php
/**
 * TopicFixture
 *
 */
class TopicFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'body' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'category_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'title' => 'パソコン',
			'body' => 'あ',
			'category_id' => 1,
			'created' => '2021-05-22 14:15:10',
			'modified' => '2021-05-22 14:15:10'
		),
		array(
			'id' => 2,
			'title' => 'スマホ',
			'body' => 'あ',
			'category_id' => 1,
			'created' => '2021-05-22 14:15:10',
			'modified' => '2021-05-22 14:15:10'
		),
		array(
			'id' => 3,
			'title' => '電話',
			'body' => 'あ',
			'category_id' => 1,
			'created' => '2021-05-22 14:15:10',
			'modified' => '2021-05-22 14:15:10'
		),
		array(
			'id' => 4,
			'title' => 'PHP',
			'body' => 'あ',
			'category_id' => 1,
			'created' => '2021-05-22 14:15:10',
			'modified' => '2021-05-22 14:15:10'
		),
		array(
			'id' => 5,
			'title' => 'windows',
			'body' => 'あ',
			'category_id' => 1,
			'created' => '2021-05-22 14:15:10',
			'modified' => '2021-05-22 14:15:10'
		),
		array(
			'id' => 6,
			'title' => '入門',
			'body' => 'あ',
			'category_id' => 1,
			'created' => '2021-05-22 14:15:10',
			'modified' => '2021-05-22 14:15:10'
		),
		array(
			'id' => 7,
			'title' => '寿司',
			'body' => 'あ',
			'category_id' => 1,
			'created' => '2021-05-22 14:15:10',
			'modified' => '2021-05-22 14:15:10'
		)
	);

}
