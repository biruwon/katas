<?php

class deepClass {


	public function preorder($a, $index = 0){

		if ($index >= count($a)) {
			return array();
		}

		$first = $a[$index];

		$leftNode = 2*$index + 1;
		$rightNode = 2*$index + 2;

		$left = $this->preorder($a, $leftNode);
		$right = $this->preorder($a, $rightNode);


		$order = array_merge(array($first), $left, $right);
		return $order;
	}

	public function iterative($b) {
		return $b;
	}

}