<?php 

require('view/view.php');
require('control/controller.php');


class Router {
	
	public function main(AnimalStorage $animaux) {
		$view = new View("Titre","Contenu de la page",$this);
		$controller = new Controller($view, $animaux);
		if (isset($_GET["id"])) {
			$controller -> showInformation($_GET["id"]);
		}
		else if (isset($_GET["action"])) {
			if ($_GET["action"] == "liste") {
				$controller -> showList();
			} 
			else if ($_GET["action"] == "nouveau") {
				$controller -> createNewAnimal();
			}
			else if ($_GET["action"] == "sauverNouveau") {
				$controller -> saveNewAnimal($_POST);
			}
		}
		else {
			$controller -> accueil(); 
		}
		$view->render();
	}

	public function getAccueilURL() {
		return "site.php";
	}
	
	public function getAnimalURL($id) {
		return $this -> getAccueilURL() . "?id=" . $id;
	}

	public function getActionURL($action) {
		return $this -> getAccueilURL() . "?action=" . $action;
	}

	public function getAnimalCreationURL() {
		return $this -> getActionURL("nouveau");
	}

	public function getAnimalSaveURL() {
		return $this -> getActionURL("sauverNouveau");
	}

	public function POSTredirect($url, $feedback) {
		header("Location: " . $url, true, 303);
	}


	
	
}
