<?php

require_once('view/view.php');
require_once('model/Animal.php');
require_once('model/AnimalBuilder.php');

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
		$animal = new AnimalBuilder($data);
		if ($animal -> isValid() == false) {
			$this -> view -> prepareAnimalCreationPage($animal);
		}

		else {
			$animalCorrect = $animal -> createAnimal();
			$id = $this -> animalsTabs -> create($animalCorrect);
			$this -> view -> displayAnimalCreationSuccess($id);
		}
	}

	public function createNewAnimal() {
		$data = array (
		NAME_REF  => "",
		SPECIES_REF => "",
		AGE_REF   => ""
		);
		$animal = new AnimalBuilder($data);
		$this -> view -> prepareAnimalCreationPage($animal);
	}
}
