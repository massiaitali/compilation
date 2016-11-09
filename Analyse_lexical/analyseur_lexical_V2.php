<?php
/*
Ident [a-z A-Z _]
Entier [0-9]
Mots-clés IF FOR WHILE VAR INT
Opérateurs + - * / % ( ) == != < > <= >= =
*/


							//
class analyseur_lexical { 	// Classe analyseur lexical
							//	

/**
* Liste des tokens du code analyse
*/
	public $Token_List = array();
/**
* Variable avec le code et position dans le code
*/
	public $code;
	public $position = 0;

/**
* Liste des types acceptes
*/
	public $ident = array(53  => 'a' , 1 => 'b' , 2 =>  'c' , 3 =>  'd' , 4 =>  'e' , 5 =>  'f' , 6 =>  'g' , 7 =>  'h' , 8 =>  'i' , 9 => 'j' , 10 => 'k' , 11 => 'l' , 12 => 'm' , 13 => 'n' , 14 => 'o' , 15 => 'p' , 16 => 'q' , 17 => 'r' , 18 => 's' , 19 => 't' , 20 => 'u' , 21 => 'v' , 22 => 'w' , 23 => 'x' , 24 => 'y' , 25 => 'z' , 26 => 'A' , 27 => 'B' , 28 => 'C' , 29 => 'D' , 30 => 'E' , 31 => 'F' , 32 => 'G' , 33 => 'H' , 34 => 'I' , 35 => 'J' , 36 => 'K' , 37 => 'L' , 38 => 'M' , 39 => 'N' , 40 => 'O' , 41 => 'P' , 42 => 'Q' , 43 => 'R' , 44 => 'S' , 45 => 'T' , 46 => 'U' , 47 => 'V' , 48 => 'W' , 49 => 'X' , 50 => 'Y' , 51 => 'Z' , 52 => '_');
	public $Entier = array(108  =>  '0' , 100 =>  '1' , 101 =>  '3' , 102 =>  '4' , 103 =>  '5' , 104 =>  '6' , 105 =>  '7' , 106 =>  '8' , 107 =>  '9');
	public $mots_cles = array(204  => 'if' , 200 =>  'for' , 201 =>  'while'/* , 202 =>  'var' , 203 =>  'int'*/);
	public $operateur = array(313  => '+' , 300 =>  '-' , 301 => '*' , 302 => '/' , 303 => '%' , 304 => '(' , 305 => ')' , 306 => '==' , 307 => '!=' , 308 => '<' , 309 => '>' , 310 => '<=' , 311 => '>=' , 312 => '=', 314 => ';', 315 => '{', 316 => '}');

/**
* Fonction ajout de code
*/
	public function ajout_code($code_ajouter) {
		$this->code = $code_ajouter;
	}

/**
* retourne le token associe et l'ajoute dans la list en dernier position. En paramètre le code a ajouter en token et la liste du genre (int, ent, mot cle, operateur)
*/
	public function add_token($var, $liste) {
		if ($liste == 1) { // Ident
			$token = array_search($var, $this->ident);
			$type = 'Ident';
		}
		if ($liste == 2) { // Entier
			$token = array_search($var, $this->Entier);
			$type = 'Entier';
		}
		if ($liste == 3) { // Mot cle
			$token = array_search($var, $this->mots_cles);
			$type = 'Mots Cles';
		}
		if ($liste == 4) { // Operateur
			$token = array_search($var, $this->operateur);
			$type = 'Operateur';
		}
		if ($token != false) {
			$this->Token_List[$var."/".$this->position.'/'.$type] = $token;
		}
		
	}

/**
* Fonction pour regarder le token suivant
*/
function look_token() {
	$retourn = true;
	$pos_temp = $this->position;
	while ($retourn) {
		if ($this->code[$pos_temp]==" ") {
			$pos_temp ++;
		}
		else {
			$retourn = false;
		}
	}
	return $this->code[$pos_temp];
}

/**
* Fonction pour passer au token suivant et le retourner
*/
function next_token() {
	$retourner = true;
	while ($retourner) {
		if ($this->code[$this->position]==" ") {
			$this->position ++;
		}
		else {
			$retourner = false;
		}
	}
	if ($this->position != strlen($this->code)) {
		$temp  = $this->code[$this->position];
		$this->position ++;
		return $temp;
	}
}

/**
* Fonction principale d'analyse du code
*/
	public function analyse() {
		$temp_token = ''; 
		$taille = strlen($this->code) - 1; // taile du code
		while ($this->position < $taille) // parcours le code
		{
			if(array_search($this->look_token(), $this->ident)) { // ¨Partie ident
				$temp_token = $this->next_token(); // stocke en temp le token 
				while(isset($this->code[$this->position + 1]) && array_search($this->look_token(), $this->ident)) { // regarde si un token ident le suit et verifie de pas dépasser la taille du tableau
					$temp_token = $temp_token . $this->next_token();
				}
				if( array_search($temp_token, $this->mots_cles)) { // compare la chaine de caractere a la liste mot_cle pour verifier si il appartient
					$this->add_token($temp_token, 3);
				}
				else {
					$this->add_token($temp_token[0], 1); // insere le token 
				}
			}
			elseif( array_search($this->look_token(), $this->Entier)) { // Partie Entier
				$this->add_token($this->next_token(), 2);
			}
			elseif(array_search($this->look_token(), $this->operateur)) { // Partie opérateur 
				$temp_token = $this->next_token(); // stocke en temp le token 
				while(isset($this->code[$this->position + 1]) && array_search($this->look_token(), $this->operateur)) { // regarde si un token opérateur le suit et verifie de pas dépasser la taille du tableau
					$temp_token = $temp_token . $this->next_token();
				}
				$this->add_token($temp_token, 4); // insere le token 
			}
			else {echo "error la position est : ". $this->position . " et l'élement du code est : ". $this->code[$this->position];
					break;}

		}
	}
}
$code =  'for ( x = 0; x <= 10 ; x = x + 1 ) { y = x + 9 }';
$test = new analyseur_lexical ;
$test->ajout_code($code);
$test->analyse();
print_r($test->Token_List);
?>