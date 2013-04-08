<?php

class Mercado
{
	protected $name = '';
	protected $distance = 0;
	protected $prices = array();

	public function __construct($name, $distance, $prices) {

		$this->name = $name;
		$this->distance = $distance;
		$this->prices = $prices;
	}

	public function getDistance() {
		return $this->distance;
	}

	public function getPrices() {
		return $this->prices;
	}
}