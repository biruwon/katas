<?php

class FizzBuzz
{
	public function letsGo($number) {

		$also = str_split((string)$number);
		$five = in_array(5, $also);
		$three = in_array(3, $also);

		if($number%3 == 0 || $three) {
			if($number%5 == 0 || $five) {
				return 'FizzBuzz';
			}
			return 'Fizz';
		} elseif($number%5 == 0 || $five) {
			return 'Buzz';
		}

		return $number;
	}
}