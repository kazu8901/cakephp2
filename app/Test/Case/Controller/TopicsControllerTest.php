<?php
App::uses('TopicsController', 'Controller');

/**
	* @expectedException NotFoundException
	* @expectedExceptionMessage Invalid topic
	*/

/**
 * TopicsController Test Case
 *
 */
class TopicsControllerTest extends ControllerTestCase {

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
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {
	}

	public function testトピックを一覧表示できる() {
		$result = $this->testAction('/topics/index', array('return' => 'vars'));
		$topics = $result['topics'];
		$this->assertCount(7,$topics);
		$this->assertEquals('パソコン', $topics[0]['Topic']['title']);
		$this->assertEquals('スマホ', $topics[1]['Topic']['title']);
		$this->assertEquals('電話', $topics[2]['Topic']['title']);
		$this->assertEquals('PHP', $topics[3]['Topic']['title']);
		$this->assertEquals('windows', $topics[4]['Topic']['title']);
		$this->assertEquals('入門', $topics[5]['Topic']['title']);
		$this->assertEquals('寿司', $topics[6]['Topic']['title']);
	}

	public function testトピック一覧はtableタグで表示する() {
		$result = $this->testAction('/topics/index', array('return' => 'view'));
		$expected = array(
					'tag' => 'div',
					'attributes' => array('class' => 'topics index'),
					'child' => array(
							'tag' => 'index',
							'children' => array('count' =>8)
					)
		);
		// $this->assertTag($expected, $result);
	}

	 public function test存在しないトピックを表示するとNotFoundになる() {
		 $this->testAction('/topics/index/999');
	 }

	 public function test削除が成功したらindexにリダイレクトする() {
		 $this->testAction('/topics/delete/1', array('method' => 'post'));
		 $this->assertRegExp('/topics$/', $this->headers['Location']);
	 }

	 public function test新しいトピックを追加する() {
		 $data = array('Topic' => array('title' => '新しいトピックタイトル',
																		'body' => 'あああああ',
																		'category_id' => '9'));
		 $this->testAction('/topics/add', array('data' => $data, 'method' => 'post'));
		 $this->assertContains('The topic has been saved.', $this->controller->Session->read('Message.flash'));
	 }

}
