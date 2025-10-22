<?php 

require('view/view.php');
require('control/controller.php');

class Router {
	
	public function main() {
		$view = new View("Titre","Contenu de la page");
		$controller = new Controller($view);
		if (isset($_GET["id"])) {
			$controller -> showInformation($_GET["id"]);
		}
		else {
			$controller -> accueil(); 
		}
		$view->render();
	}
	
	
	
}
