<?php

require('AnimalStorage.php');

class AnimalStorageStub implements AnimalStorage {
    public function __construct() {
		$this -> animalsTabs = array(
	'medor' => new Animal("Médor","chien",6),
	'felix' => new Animal("Félix","chat",9),
	'denver' => new Animal("Denver","dinosaure",140),
	);
    }

    public function isIn($id) {
        if (in_array($id,array_keys($this -> animalsTabs))) {
            return true;
        }
        return false;
    }

    public function read($id) {
		return $this -> animalsTabs[$id];
    }

    public function readAll() {
        return $this -> animalsTabs;
    }
}