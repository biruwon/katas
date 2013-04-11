<?php

require_once __DIR__.'/SimpleLists.php';

class SimpleListsTest extends PHPUNIT_framework_TestCase{

	private $simpleLists;

	public function setUp(){
		$this->simpleLists = new SimpleLists;
	}

	public function testFindNullSinglyList(){
		$this->assertEquals(null, $this->simpleLists->find("fred"));
	}

	public function testFindSinglyList(){
		$this->simpleLists->addNode("fred");
		$this->assertEquals(0, $this->simpleLists->find("fred"));
	}

	public function testFindValuesSinglyList(){
		$this->assertEquals(null, $this->simpleLists->find("wilma"));
		$this->simpleLists->addNode("fred");
		$this->simpleLists->addNode("wilma");
		$this->assertEquals(0, $this->simpleLists->find("fred"));
		$this->assertEquals(1, $this->simpleLists->find("wilma"));
		$this->assertEquals(array(0,1), $this->simpleLists->find(array("fred", "wilma")));
	}

	public function testFIndAndDeleteValueSinglyList(){
		$this->simpleLists->addNode("fred");
		$this->simpleLists->addNode("wilma");
		$this->simpleLists->addNode("betty");
		$this->simpleLists->addNode("barney");
		$this->assertEquals(array(0, 1, 2, 3),
			$this->simpleLists->find(array("fred", "wilma", "betty", "barney")));

		$this->simpleLists->deleteNode("wilma");
		$this->assertEquals(array(0, 1, 2),
			$this->simpleLists->find(array("fred", "betty", "barney")));

		$this->simpleLists->deleteNode("barney");
		$this->assertEquals(array(0, 1),
			$this->simpleLists->find(array("fred", "betty")));

		$this->simpleLists->deleteNode("fred");
		$this->assertEquals(array(0),
			$this->simpleLists->find(array("betty")));
	}
}