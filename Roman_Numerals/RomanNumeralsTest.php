<?php

require_once __DIR__.'/RomanNumerals.php';

class RomanNumeralsTest extends PHPUNIT_framework_TestCase
{
	protected $number;

	public function setUp() {
		$this->number = new RomanNumerals();
	}

	public function Provider() {
		$cases = array(
			array('', 0),
			array('I', 1),
			array('II', 2),
			array('III', 3),
			array('IV', 4),
			array('V', 5),
			array('VI', 6),
			array('VII', 7),
			array('VIII', 8),
			array('IX', 9),
			);

		return $cases;
	}

	/**
	 * @dataProvider Provider
	 */
	public function testArabicToRoman($expected, $arabic) {
		$this->assertEquals($expected, $this->number->arabicToRoman($arabic));
	}
}