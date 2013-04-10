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
	protected $cities = array();

	public function whereIShouldSell(){

		$maxProfit = 0;
		$cityName = "";

		foreach ($this->cities as $city){

			$cityProfit = $this->calculateProfit($city);
			if ($maxProfit < $cityProfit){
				$maxProfit = $cityProfit;
				$cityName = $city;
			}
		}

		return "The best mercado is: " . $cityName;
	}

	public function calculateProfit($mercado){

		$profit = 0;

		$prices = $this->prices[$mercado];

		$totalPriceSold = $this->calculatePriceProduct($prices);

		$distance = $this->distances[$mercado];

		$deprecated = $this->calculateDeprecated($totalPriceSold, $distance);

		$profit = $totalPriceSold - $distance * 2 * 2 - 5 - $deprecated;

		return $profit;
	}

	public function calculatePriceProduct($prices){

		$total = 0;

		foreach ($prices as $key => $price){
			$total += $price * $this->kgProducts[$key];
		}

		return $total;
	}

	public function calculateDeprecated($totalPriceSold, $distance){
		$deprecated = floor(($distance * 2)/100) * ($totalPriceSold * 0.01);

		return $deprecated;
	}

	public function addCity(Mercado $mercado){
		$this->distances[$mercado->getName()] = $mercado->getDistance();
		$this->prices[$mercado->getName()] = $mercado->getPrices();
		$this->cities[] = $mercado->getName();
		return $this;
	}
}