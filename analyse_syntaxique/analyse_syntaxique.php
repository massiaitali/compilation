<?php
/**
* Classe Analyseur Syntaxique
*/
class Analyseur_Synthaxique
{
	public $niveau = 0;
	public $arbre = array(); // arbre type : array



	public function ajouter_noeud($nom, $enfants)
	{
    array_push($this->arbre, array('Nom' => $nom, 'enfants' => $enfants));
	}	

}

?>