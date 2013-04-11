<?php

class SimpleLists
{
	private $list = array();

	public function find($name){

		if(is_array($name)){

			$position = array();
			foreach($name as $person){

				$pos = array_search($person, $this->list);
				if (!$pos){
					$position[] = null;
				} else {
					$position[] = $pos;
				}
			}
			return $position;

		} else {
			$position = array_search($name, $this->list);
			if (!$position){
				return null;
			} else{
				return $position;
			}
		}
	}

	public function addNode($name){
		$this->list[] = $name;
		return $this;
	}

	public function deleteNode($name){
		$position = array_search($name, $this->list);
		array_splice($this->list, $position, 1);
		return $this;
	}
}