<?php 

require('view/view.php');
require('control/controller.php');

class Router {
	
	public function main() {
		$view = new View("Titre","Contenu de la page",$this);
		$controller = new Controller($view);
		if (isset($_GET["id"])) {
			$controller -> showInformation($_GET["id"]);
		}
		else if (isset($_GET["action"])) {
			if ($_GET["action"] == "liste") {
				$controller -> showList();
			} 
		}
		else {
			$controller -> accueil(); 
		}
		$view->render();
	}
	
	public function getAnimalURL($id) {
		return "https://dev-huet236.users.info.unicaen.fr/TW4-2025/tp7/exoMVCR/site.php?id=" . $id;
	}
	
	
}
