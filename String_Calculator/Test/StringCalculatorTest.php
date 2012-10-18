<?php

include_once __DIR__.'/../StringCalculator.php';

class StringCalculatorTest extends PHPUNIT_framework_TestCase
{
	protected $stringInput;

	public function setUp() {
		$this->stringInput = new StringCalculator();
	}

	public function testEmptyString() {
		$this->assertEquals(0, $this->stringInput->add(""));
	}

	public function testOneValueString() {
		$this->assertEquals(2, $this->stringInput->add("2"));
	}

	public function testTwoValuesString() {
		$this->assertEquals(3, $this->stringInput->add("1,2"));
	}

	public function testNValuesString() {
		$this->assertEquals(15, $this->stringInput->add("1,2,3,4,5"));
	}

	public function testNewLineDelimiter() {
		$this->assertEquals(6, $this->stringInput->add("1\n2,3"));
		$this->assertEquals(11, $this->stringInput->add("1\n2,3,2\n3"));
	}

	public function testRandomDelimiter() {
		$this->assertEquals(3, $this->stringInput->add("//;\n1;2"));
		$this->assertEquals(6, $this->stringInput->add("//+\n1+2+3"));
	}

	/**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Values must be positives: -1 -2 given
     */
	public function testThrowExcentionNegativeNumbers() {
		$this->stringInput->add("//+\n-1+-2");
	}

	public function testIgnoreValuesGreatherThan1000() {
		$this->assertEquals(2, $this->stringInput->add("2,1001"));
	}

	public function testBigDelimiter() {
		$this->assertEquals(6, $this->stringInput->add("//[***]\n1***2***3"));
	}
}