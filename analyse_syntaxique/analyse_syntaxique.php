<?php
/**
* Classe Analyseur Syntaxique
*/
class Analyseur_Synthaxique
{
	public $position = 0; // niveau
	public $parent = 0;// id parent numero 1
	public $arbre = array(); // arbre type : array
	public $tableau_token = array(); // tableau de token 

	public function ajouter_tableau($tableau)
	{
		$this->tableau_token = $tableau;
	}

	public function ajouter_noeud($parent, $nom, $valeur)
	{
		$this->arbre[sizeof($this->arbre)] = array('Parent_id' => $parent, 'Nom' => $nom, 'Valeur' => $valeur);
	}
	public function retourner_type_token($token){
		if ($token < 100) {
			return "ident";
		}
		elseif ($token < 200) {
			return "entier";
		}
		elseif ($token < 300) {
			return "mot_cle";
		}
		elseif ($token < 400) {
			return "operateur";
		}
		else return false;
	}
	public function primitive(){
		if ($this->retourner_type_token($this->tableau_token[$this->position])== 'ident') {
			$this->ajouter_noeud($this->parent, 'ident',$this->tableau_token[$this->position]);
			$this->position++;
		}
		if ($this->tableau_token[$this->position] == 304) {
			$this->position++;
			$this->expression();
			if ($this->tableau_token[$this->position] != 305 || $this->tableau_token[($this->position)+1] == null) {
				echo 'Erreur pas de ) ou mauvaise expression';
			}
			else {
				$this->position++;
				return false;
			}
		}
	}
	public function additive(){
		if ($this->tableau_token[($this->position)+1]==313 || $this->tableau_token[($this->position)+1]==300) {
			$this->position++;
			$this->additive;
		}
	}

	public function multiplicateur(){
		primitive();
		if($this->retourner_type_token($this->tableau_token[$this->position]) == 302 || $this->retourner_type_token($this->tableau_token[$this->position]) == 303 || $this->retourner_type_token($this->tableau_token[$this->position]) == 304) {
			$this->position++;
			$this->multiplicateur();
		}
	}
	public function expression(){

	}
}
$token_tab = Array ( "for/3/Mots Cles" => 200 ,"(/5/Operateur" => 304 ,"x/7/Ident" => 23 ,"=/9/Operateur" => 312 ,"0/11/Entier" => 108 ,";/12/Operateur" => 314 ,"x/14/Ident" => 23 ,"<=/17/Operateur" => 310 ,"1/19/Entier" => 100 ,"0/20/Entier" => 108 ,";/22/Operateur" => 314 ,"x/24/Ident" => 23 ,"=/26/Operateur" => 312 ,"x/28/Ident" => 23 ,"+/30/Operateur" => 313 ,"1/32/Entier" => 100 ,")/34/Operateur" => 305 ,"y/36/Ident" => 24 ,"=/38/Operateur" => 312 ,"x/40/Ident" => 23 ,"+/42/Operateur" => 313 ,"9/44/Entier" => 107 ,";/46/Operateur" => 314 );
$test = new Analyseur_Synthaxique;
$test-> ajouter_tableau($token_tab);
$test->primitive();
echo "<td><td>";

?>