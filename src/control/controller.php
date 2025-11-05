<?php

require_once('view/view.php');
require_once('model/animal.php');

class Controller {
	
	private View $view;
	public function __construct(View $view, AnimalStorage $animalsTabs) {
		$this -> view = $view;
		$this -> animalsTabs = $animalsTabs;
	}
	
	public function showInformation($id) {
		if ($this -> animalsTabs -> isIn($id)) {
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
}
