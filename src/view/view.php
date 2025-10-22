<?php

class View {


	public function __construct(string $title, string $content) {
		$this -> title = "";
		$this -> content = "";
	}
	
	public function render() {
		echo "<head><title>" . $this -> title . "</title></head>";
		echo "<body><h1>" . $this -> title . "</h1><p>" . $this -> content . "</p><body>";
	}
	
	public function prepareTestPage(string $title, string $contenu) {
		$this -> title = $title;
		$this -> content = $contenu;
	}
	
	public function prepareAnimalPage(string $name, string $species) {
		$this -> title = "Page de " . $name;
		$this -> content = $name . " est un animal de l'espèce " . $species . ".";
	}
	
	public function prepareUnknownAnimalPage() {
		$this -> title = "Erreur";
		$this -> content = "Animal inconnu";
	}
	
	public function afficheAccueil() {
		$this -> title = "Accueil";
		$this -> content = "Bienvenu, vous voici dans l'accueil.";
	}
	
	
}
