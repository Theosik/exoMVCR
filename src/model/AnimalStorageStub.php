<?php

require_once('AnimalStorage.php');

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

    public function create(Animal $a) {
        throw new Exception("Erreur :  La méthode create n'est pas définie");
    }

    public function delete($id) {
        throw new Exception("Erreur :  La méthode delete n'est pas définie");
    }

    public function update($id, Animal $a) {
        throw new Exception("Erreur :  La méthode update n'est pas définie");
    }
}