<?php

require_once __DIR__.'/KataLonja.php';
require_once __DIR__.'/Mercado.php';

class KataLonjaTest extends PHPUNIT_framework_TestCase
{
	protected $lonja;
	protected $vanLoad = 5;
	protected $kmCost = 2;

	public function setUp(){
		$this->lonja = new KataLonja();
	}

	public function testMercadoSimple(){
		$this->assertEquals(45895,
			$this->lonja->calculateLoss(new Mercado('MADRID', 800, array(
				'Vieiras' => 500,
				'Pulpo' => 0,
				'Centollos' => 450
			)))
		);
	}
}