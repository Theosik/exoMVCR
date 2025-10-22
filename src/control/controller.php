<?php

require_once('view/view.php');

class Controller {
	
	private View $view;
	public function __construct(View $view) {
		$this -> view = $view;
		$this -> animalsTabs = array(
	'medor' => array('Médor', 'chien'),
	'felix' => array('Félix', 'chat'),
	'denver' => array('Denver', 'dinosaure'),
	);
	}
	
	public function showInformation($id) {
		if (($id >= 0)&&($id < count($this -> animalsTabs))) {
			$this -> view -> prepareAnimalPage($this -> animalsTabs[array_keys($this -> animalsTabs)[$id]][0],$this -> animalsTabs[array_keys($this -> animalsTabs)[$id]][1]); 
		}
		else {
			$this -> view -> prepareUnknownAnimalPage();
		}
	}
	
}
