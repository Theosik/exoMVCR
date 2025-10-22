<?php

require_once('view/view.php');
require_once('model/animal.php');

class Controller {
	
	private View $view;
	public function __construct(View $view) {
		$this -> view = $view;
		$this -> animalsTabs = array(
	'medor' => new Animal("Médor","chien",6),
	'felix' => new Animal("Félix","chat",9),
	'denver' => new Animal("Denver","dinosaure",140),
	);
	}
	
	public function showInformation($id) {
		if (in_array($id,array_keys($this -> animalsTabs))) {
			$this -> view -> prepareAnimalPage($this -> animalsTabs[$id]); 
		}
		else {
			$this -> view -> prepareUnknownAnimalPage();
		}
	}
	
	public function accueil() {
		$this -> view -> afficheAccueil();
	}	
	
}
