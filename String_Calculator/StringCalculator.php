<?php

class StringCalculator
{
	const REG_NEWLINE = '/(\n)+/';
	const REG_DELIM = '/^\/\/(.)\n/';
	const REG_BIGDELIM = '/^\/\/\[(.*)\]\n/';

	public function add($string) {

		if(empty($string)) {
			return 0;
		}

		$parsedString = $this->check($string);

		$values = explode(',', $parsedString);
		$numbers = "";
		foreach($values as $value) {
			if($value < 0) {
				$numbers .= $value . ' ';
			} elseif($value > 1000) {
				$values = array_diff($values, array($value));
			}
		}
		if(!empty($numbers)) {
				throw new InvalidArgumentException("Values must be positives: $numbers" . "given");
		}

		return array_sum($values);
	}

	public function check($string) {

		$parsedString = $string;

		$delimiter = $this->hasDelimiter($parsedString);
		if(!empty($delimiter)) {

			if(preg_match(self::REG_BIGDELIM, $parsedString)) {
				$parsedString = preg_replace(self::REG_BIGDELIM,'', $parsedString);
				$parsedString = str_replace($delimiter,',', $parsedString);
			} else {
				$parsedString = preg_replace(self::REG_DELIM,'', $parsedString);
				$parsedString = str_replace($delimiter,',', $parsedString);
			}
		}

		elseif (preg_match(self::REG_NEWLINE, $parsedString)) {
			$parsedString = preg_replace(self::REG_NEWLINE, ',', $parsedString);
		}

		return $parsedString;
	}

	public function hasDelimiter($parsedString) {

		if(preg_match(self::REG_BIGDELIM, $parsedString, $match)) {
			$match[1] = preg_replace('/^(\[)(.*)(\])$/', '${2}' , $match[1]);
			return $match[1];
		}

		elseif(preg_match(self::REG_DELIM, $parsedString, $match)) {
			return $match[1];
		}

		return false;
	}
}