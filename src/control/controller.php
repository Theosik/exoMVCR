<?php

require_once('view/view.php');
require_once('model/Animal.php');

class Controller {
	
	private View $view;
	public function __construct(View $view, AnimalStorage $animalsTabs) {
		$this -> view = $view;
		$this -> animalsTabs = $animalsTabs;
	}
	
	public function showInformation($id) {
		if ($this -> animalsTabs -> read($id) != null) {
			$this -> view -> prepareAnimalPage($this -> animalsTabs -> read($id)); 
		}
		else {
			$this -> view -> prepareUnknownAnimalPage();
		}
	}
	
	public function accueil() {
		$this -> view -> afficheAccueil();
	}	
	
	public function showList() {
		$this -> view -> prepareListPage($this -> animalsTabs -> readAll());
	}

	public function saveNewAnimal(array $data) {
		$error = "";
		if (trim($_POST['name']) == "") {
			$error = "Erreur : Le nom entré est vide.";
		}
		else if (trim($_POST['specie']) == "") {
			$error = "Erreur : L'espèce entrée est vide.";
		}
		else if (trim((int)$_POST['age']) == "") {
			$error = "Erreur : L'age entré est vide.";
		}
		else if (is_int((int)trim($_POST['age'])) == false) {
			$error = "Erreur : L'age entré n'est pas un entier.";
		}
		else if (((int)trim($_POST['age']))<0) {
			$error = "Erreur : L'age entré est inferieur à 0.";
		}

		if ($error != "") {
			$this -> view -> prepareAnimalCreationPage($error);
		}

		else {
			$animal = new Animal(trim($_POST['name']),trim($_POST['specie']),(int)trim($_POST['age']));
			$this -> animalsTabs -> create($animal);
			$this -> view -> prepareAnimalPage($animal);
		}
	}

	public function createNewAnimal() {
		$this -> view -> prepareAnimalCreationPage("");
	}
}
