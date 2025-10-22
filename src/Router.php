<?php 

require('view/view.php');
require('control/controller.php');

class Router {
	
	public function main() {
		$view = new View("Titre","Contenu de la page");
		$controller = new Controller($view);
		$controller -> showInformation(3);
		$view->render();
	}
	
	
	
}
