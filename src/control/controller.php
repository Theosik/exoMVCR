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
		$animal = new Animal($_POST['name'],$_POST['specie'],$_POST['age']);
		$this -> animalsTabs -> create($animal);
		$this -> view -> prepareAnimalPage($animal);
	}

	public function createNewAnimal() {
		$this -> view -> prepareAnimalCreationPage();
	}
}
