<?php
App::uses('Topic', 'Model');

/**
 * Topic Test Case
 *
 */
class TopicTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.topic',
		'app.category',
		'app.comment'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Topic = ClassRegistry::init('Topic');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Topic);

		parent::tearDown();
	}

	public function testタイトルは必須入力である() {
		// createメソッドでモデルに値を作成する
		$this->Topic->create(array('Topic'=>array('title'=>'')));
		$this->assertFalse($this->Topic->validates());
		$this->assertArrayHaskey('title',
														$this->Topic->validationErrors);
	}

	public function testカテゴリ1の最新5件が取得できていること() {
		$latests = $this->Topic->getLatest();
		$this->assertCount(5, $latests);
		$this->assertEquals('入門', $latests[0]['Topic']['title']);
		$this->assertEquals('windows', $latests[1]['Topic']['title']);	
		$this->assertEquals('PHP', $latests[2]['Topic']['title']);
		$this->assertEquals('スマホ', $latests[3]['Topic']['title']);
		$this->assertEquals('パソコン', $latests[4]['Topic']['title']);
	}

}
