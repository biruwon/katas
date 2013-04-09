<?php

class KataLonja
{
	protected $kgProducts = array(
		'Vieiras' => 50,
		'Pulpo' => 100,
		'Centollos' => 50
		);

	protected $prices = array();
	protected $distances = array();

	public function whereIShouldSell(){

	}

	public function calculateLoss($mercado){

		$loss = 0;

		$prices = $this->prices[$mercado];

		$totalPriceSold = $this->calculatePriceProduct($prices);

		$distance = $this->distances[$mercado];

		$deprecated = $this->calculateDeprecated($totalPriceSold, $distance);

		$loss = $totalPriceSold - $distance * 2 - 5 - $deprecated;
		var_dump($totalPriceSold/0.01);

		return $loss;
	}

	public function calculatePriceProduct($prices){

		$total = 0;

		foreach ($prices as $key => $price){
			$total += $price * $this->kgProducts[$key];
		}

		return $total;
	}

	public function calculateDeprecated($totalPriceSold, $distance){
		$deprecated = floor($distance/100) * ($totalPriceSold * 0.01);

		return $deprecated;
	}

	public function addCity(Mercado $mercado){
		$this->distances[$mercado->getName()] = $mercado->getDistance();
		$this->prices[$mercado->getName()] = $mercado->getPrices();
		return $this;
	}
}