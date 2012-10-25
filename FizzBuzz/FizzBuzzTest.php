<?php

require_once __DIR__.'/FizzBuzz.php';

class FizzBuzzTest extends PHPUNIT_framework_TestCase
{
	public function setUp() {
		$this->fizzbuzz = new FizzBuzz();
	}

	public function Provider() {
		$cases = array(
			array(1,1),
			array(2,2),
			array('Fizz',3),
			array('Buzz',5),
			array(7,7),
			array('Fizz',9),
			array('Buzz',10),
			array('Fizz',12),
			array('Fizz', 13),
			array('FizzBuzz',15),
			array('FizzBuzz',35),
			array('FizzBuzz',53),
			array('FizzBuzz',60),
			array('Buzz',65),
			array('Fizz',99)
			);
		return $cases;
	}

	/**
	 * @dataProvider Provider
	 */
	public function testGame($expected, $number) {
		$this->assertEquals($expected, $this->fizzbuzz->letsGo($number));
	}

}