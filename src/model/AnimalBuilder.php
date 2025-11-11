<?php

define('NAME_REF', "nom");
define('SPECIES_REF', "espece");
define('AGE_REF', "age");

class AnimalBuilder {

	private array $data;

	public function __construct(array $data) {
		$this -> data = $data;
        $this -> error = null;
	}

    public function getData() {
        return $this -> data;
    }

    public function setData($data) {
        $this -> data = $data;
    }

    public function getError() {
        return $this -> error;
    }

    public function setError($error) {
        $this -> error = $error;
    }

    public function createAnimal() {
        $animal = new Animal($this -> data[NAME_REF],$this -> data[SPECIES_REF],(int)trim($this -> data[AGE_REF]));
        return $animal;
    }

    public function isValid() {
        $error = "";
		if (trim($this -> data[NAME_REF]) == "") {
			$error = "Erreur : Le nom entré est vide.";
            $this -> error = $error;
            return false;
        }
		else if (trim($this -> data[SPECIES_REF]) == "") {
			$error = "Erreur : L'espèce entrée est vide.";
            $this -> error = $error;
            return false;
        }
		else if (trim($this -> data[AGE_REF]) == "") {
			$error = "Erreur : L'age entré est vide.";
            $this -> error = $error;
            return false;
        }
		else if (is_int((int)trim($this -> data[AGE_REF])) == false) {
			$error = "Erreur : L'age entré n'est pas un entier.";
            $this -> error = $error;
            return false;
		}
		else if (((int)trim($this -> data[AGE_REF]))<0) {
			$error = "Erreur : L'age entré est inferieur à 0.";
            $this -> error = $error;
            return false;
		}
        $this -> error = $error;
        return true;
    }
}