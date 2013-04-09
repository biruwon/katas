<?php

require_once __DIR__.'/KataLonja.php';
require_once __DIR__.'/Mercado.php';

class KataLonjaTest extends PHPUNIT_framework_TestCase
{
	protected $lonja;
	protected $vanLoad = 5;
	protected $kmCost = 2;

	public function setUp(){
		$this->lonja = new KataLonja;
		$this->lonja->addCity(new Mercado('MADRID', 800, array(
					'Vieiras' => 500,
					'Pulpo' => 0,
					'Centollos' => 450
				)));
		$this->lonja->addCity(new Mercado('BARCELONA', 1100, array(
					'Vieiras' => 450,
					'Pulpo' => 120,
					'Centollos' => 0
				)));
		$this->lonja->addCity(new Mercado('LISBOA', 600, array(
					'Vieiras' => 600,
					'Pulpo' => 100,
					'Centollos' => 500
				)));
	}

	public function mercadosProvider(){
		$cases = array(
				array('expected' => 45895, 'mercado' => 'MADRID'),
				array('expected' => 32295, 'mercado' => 'BARCELONA'),
				array('expected' => 63795, 'mercado' => 'LISBOA')
			);

		return $cases;
	}

	/**
	 * @dataProvider mercadosProvider
	 */
	public function testMercado($expected, $mercado){
		$this->assertEquals($expected, $this->lonja->calculateLoss($mercado));
	}
}