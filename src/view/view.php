<?php

require('model/Animal.php');

class View {
	public function __construct(string $title, string $content, Router $routeur) {
		$this -> title = "";
		$this -> content = "";
		$this -> routeur = $routeur;
		$this -> menu = array(
		$this -> routeur -> getAccueilURL() => "Accueil",
		$this -> routeur -> getActionURL("liste") => "Liste d'animaux",
		);
	}
	
	public function render() {
		echo "<head><title>" . $this -> title . "</title></head>";
		echo "<body><ul>";
		foreach ($this -> menu as $url => $texte) {
			echo "<li><a href=" . $url . ">" . $texte . "</a></li>";
		}
		echo "</ul><h1>" . $this -> title . "</h1>" . $this -> content . "<body>";
	}
	
	public function prepareTestPage(string $title, string $contenu) {
		$this -> title = $title;
		$this -> content = $contenu;
	}
	
	public function prepareAnimalPage(Animal $animal) {
		$this -> title = "Page de " . $animal -> getName();
		$this -> content = "<p>" . $animal -> getName() . " est un animal de l'espèce " . $animal -> getSpecies() . " et il a actuellement " . $animal -> getAge() . " ans." . "</p>";
	}
	
	public function prepareUnknownAnimalPage() {
		$this -> title = "Erreur";
		$this -> content = "<p>Animal inconnu</p>";
	}
	
	public function afficheAccueil() {
		$this -> title = "Accueil";
		$this -> content = "<p>Bienvenu, vous voici dans l'accueil.</p>";
	}

	public function prepareListPage($animaux) {
		$this -> title = "Liste d'animaux";
		$content = "<ul>";

		foreach ($animaux as $cle => $animal) {
			$content .= "<li><a href=" . $this -> routeur -> getAnimalURL($cle) . ">" . $animal -> getName() . "</a></li>";
		}
		$content .= "</ul>";
		$this -> content = $content;
		
	}

	public function prepareDebugPage($variable) {
		$this->title = 'Debug';
		$this->content = '<pre>'.htmlspecialchars(var_export($variable, true)).'</pre>';
	}

	public function prepareAnimalCreationPage() {
		$formulaire = <<<EOT
			<form action=" {$this -> routeur -> getAnimalSaveURL()}" method="post">
				<label for="name">Nom: </label>
				<input type="text" name="name" id="name"/>
				<label for="specie">Espèce: </label>
				<input type="text" name="specie" id="specie"/>
				<label for="age">Age: </label>
				<input type="age" name="age" id="name"/>
				<input type="submit" value="Créer" />
			</form>		
		EOT; 

		$this -> title = "Création d'un animal";
		$this -> content = $formulaire;
		
	}

	
	
}
