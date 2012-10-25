<?php

class RomanNumerals
{
	protected $combination = array(
		1  => 'I',
		4  => 'IV',
		5  => 'V',
		9  => 'IX',
		10 => 'X',
		);

	public function arabicToRoman($arabic) {

		if(empty($arabic)) {
		 	return;
		}

		return $this->units($arabic);

		return 'Not valid number given';
	}

	public function units($arabic) {

		return $this->combination[$arabic];
	}
}