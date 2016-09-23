<?php
/**
* Classe symbole avec items ( ident et profondeur )
*/
class Symbole
{
	public $table_symboles = array(array());
	public $ident;
	public $profondeur;

	public function add($symbole_add, $profondeur_add){
		$this->ident = $symbole_add;
		$this->profondeur = $profondeur_add;
	}
	public function retourner(){
		return array($this->ident, $this->profondeur);
	}

	/**
	* Fonction push (inutile) incrémente de 1
	*/ 
	public function Push()
	{
		$this->profondeur ++;
		
	}

	/**
	* Fonction Pop décrémente et supprime les symboles de profondeur courante 
	*/
	public function Pop()
	{
		for ($i=sizeof($this->table_symboles)-1; $i >= 0 ; $i--) { 
			if ($this->profondeur == $this->table_symboles[$i][1]) {
				unset($this->table_symboles[$i]);
			}
		}
		$this->profondeur --;
	}

	/**
	* Fonction Définir recherche dans la profondeur courrante si le symbole existe si oui on affiche une erreur sinon il créer l'objet et l'ajoute dans le tableau
	*/
	public function Definir()
	{
		for ($i=sizeof($this->table_symboles)-1; $i >= 0 ; $i--) { 
			if ($this->profondeur == $this->table_symboles[$i][1] && $this->ident == $this->table_symboles[$i][0]) {
				echo "fin";
				return false;
			}
		}
		$add = $this->retourner();
		$this->table_symboles[sizeof($this->table_symboles)] = $add;
	}

	/**
	* Fonction Chercher recherche dans tous le tableau si le symbole existe si non retourne une erreur
	*/
	public function Chercher()
	{
		for ($i=sizeof($this->table_symboles)-1; $i >= 0 ; $i--) { 
			if ($this->ident == $this->table_symboles[$i][0]) {
				return true;
			}
		}
		return false;
	}
}
?>