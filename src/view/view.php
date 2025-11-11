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
		$this -> routeur -> getAnimalCreationURL() => "Ajouter un animal"
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
		$nom = htmlspecialchars($animal -> getName());
		$espece = htmlspecialchars($animal -> getSpecies());
		$age = htmlspecialchars($animal -> getAge());
		$this -> title = "Page de " . $nom;
		$this -> content = "<p>" . $nom . " est un animal de l'espèce " . $espece . " et il a actuellement " . $age . " ans." . "</p>";
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
			$content .= "<li><a href=" . $this -> routeur -> getAnimalURL($cle) . ">" . htmlspecialchars($animal -> getName()) . "</a></li>";
		}
		$content .= "</ul>";
		$this -> content = $content;
		
	}

	public function prepareDebugPage($variable) {
		$this->title = 'Debug';
		$this->content = '<pre>'.htmlspecialchars(var_export($variable, true)).'</pre>';
	}

	public function prepareAnimalCreationPage(AnimalBuilder $animal) {
		if ($animal -> getData() == "") {
			$name = "";
			$specie = "";
			$age = "";
		}
		else {
			$name = $animal -> getData()[NAME_REF];
			$specie = $animal -> getData()[SPECIES_REF];
			$age = $animal -> getData()[AGE_REF];
		}
		$error = $animal -> getError();


		$formulaire = <<<EOT
		
			<form action=" {$this -> routeur -> getAnimalSaveURL()}" method="post">
				<label>{$error}</label>
				<br>
				<label for="nom">Nom: </label> 
				<input type="text" name="nom" id="nom" value="{$name}" />
				
				<br>
				<label for="espece">Espèce: </label>
				<input type="text" name="espece" id="espece" value="{$specie}"/>
				
				<br>
				<label for="age">Age: </label>
				<input type="age" name="age" id="age" value="{$age}"/>
				<br>
				<input type="submit" value="Créer" />
			</form>		
		EOT; 

		$this -> title = "Création d'un animal";
		$this -> content = $formulaire;
		
	}

	

	
	
}
