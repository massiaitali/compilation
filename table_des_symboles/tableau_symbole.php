<?
/**
* Classe symbole avec items ( ident et profondeur )
*/
class Symbole
{
	public $ident;
	public $profondeur;

	public function add($symbole_add, $profondeur_add){
		this->ident == $symbole_add;
		this->profondeur == $profondeur_add;
	}

	public function retourner(){
		return array(this->ident, this->profondeur);
	}
}

/**
* Fonction push (inutile) incrémente de 1
*/ 
public function Push($profondeur)
{
	$profondeur ++;
	return $profondeur;
}

/**
* Fonction Pop décrémente et supprime les symboles de profondeur courante 
*/
public function Pop($profondeur, $tableau)
{
	for ($i=sizeof($tableau); $i >= 0 ; $i--) { 
		if (in_array($profondeur, $tableau[i]) {
			unset($tableau[i]);
		}
	}
	$profondeur --;
	return $profondeur;
}

/**
* Fonction Définir recherche dans la profondeur courrante si le symbole existe si oui on affiche une erreur sinon il créer l'objet et l'ajoute dans le tableau
*/
public function Definir($symbole, $profondeur, $tableau)
{
	for ($i=sizeof($tableau); $i >= 0 ; $i--) { 
		if (in_array($profondeur, $tableau[i]) && in_array($symbole, $tableau[i])) {
			return false;
		}
	}
	$new_symbole = new Symbole;
	$new_symbole->add($symbole, $profondeur);
	$tableau[i] = $new_symbole->retourner();
}

/**
* Fonction Chercher recherche dans tous le tableau si le symbole existe si non retourne une erreur
*/
public function Chercher($symbole, $tableau)
{
	for ($i=sizeof($tableau); $i >= 0 ; $i--) { 
		if (in_array($symbole, $tableau[i])) {
			return true;
		}
	}
	return else;
}

/**
* Initialisation des paramètres table et profondeur
*/
$table_symboles = array(array());
$profondeur = 0

$code_test = "int x = 0; if { x ++; int x = 5; x --; }";

?>