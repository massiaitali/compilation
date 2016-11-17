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

	public function look(){
		return $this->tableau_token[$this->position + 1];
	}
	public function next{
		$this->position ++;
		return $this->tableau_token[$this->position];
	}

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
		if ($this->retourner_type_token($this->look())== 'ident') {
			$this->ajouter_noeud($this->parent, 'ident',$this->next());
		}
		if ($this->look() == 304) {
			$this->next();
			$this->expression();
			if ($this->look() != 305 || $this->look() == null) {
				echo 'Erreur pas de ) ou mauvaise expression';
			}
			else {
				$this->next();
				return false;
			}
		}
	}
	public function additive(){
		if ($this->look() != null) {
			$this->ajouter_noeud($this->parent, 'ident',$this->next());
		}
		if ($this->look()==313 || $this->look()==300) {
			$this->next();
			$this->additive;

		}
	}

	public function multiplicateur(){
		primitive();
		if($this->retourner_type_token($this->look()) == 302 || $this->retourner_type_token($this->look()) == 303 || $this->retourner_type_token($this->look()) == 304) {
			$this->next();
			$this->multiplicateur();
		}
	}
	public function expression(){

	}
}
$token_tab = Array ( "for/3/MotsCles" => 200 ,"(/5/Operateur" => 304 );
$test = new Analyseur_Synthaxique;
$test-> ajouter_tableau($token_tab);
$test->primitive();
echo "<td><td>";

?>