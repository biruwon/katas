<?php

class KataLonja
{
	protected $kgProducts = array(
		'Vieiras' => 50,
		'Pulpo' => 100,
		'Centollos' => 50
		);

	public function calculateLoss(Mercado $mercado){

		$loss = 0;

		$prices = $mercado->getPrices();

		$totalPriceSold = $this->calculatePriceProduct($prices);

		$distance = $mercado->getDistance();

		$loss = $totalPriceSold - $distance * 2 - 5;

		return $loss;
	}

	public function calculatePriceProduct($prices){

		$total = 0;

		foreach ($prices as $key => $price){
			$total += $price * $this->kgProducts[$key];
		}

		return $total;
	}
}