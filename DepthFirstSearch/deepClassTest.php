<?php

require_once __DIR__.'/deepClass.php';

 class deepClassTest extends PHPUNIT_framework_TestCase{

 	public function setUp(){
 		$this->arrayDeep = new deepClass();
 	}

 	public function testArrayEmpty(){
		$this->assertEquals(array(), $this->arrayDeep->preOrder(array()));
 	}

 	public function testArrayOneElement() {
 		$this->assertEquals(array(1), $this->arrayDeep->preOrder(array(1)));
 	}

 	public function testArrayThreeElement() {
 		$this->assertEquals(array(1,2,3), $this->arrayDeep->preOrder(range(1,3)));
 	}

 	public function testArraySevenElement() {
 		$this->assertEquals(array(1,2,4,5,3,6,7), $this->arrayDeep->preOrder(range(1,7)));
 	}

 	public function testIterative() {
 		$case = array();
 		$this->assertEquals($this->arrayDeep->preOrder($case), $this->arrayDeep->iterative($case));
 		$case = array(1);
 		$this->assertEquals($this->arrayDeep->preOrder($case), $this->arrayDeep->iterative($case));
 	}
 }