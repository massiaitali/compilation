
<?php
/* A PROGRAMMER EN OBJET !!!!!!!!!!!!!!!!!!!!!!!!
URGENT URGENT !!!!!!!!!!!!!!
*/

/**
* Ident [a-z A-Z _ 0-9]
* Entier [0-9]
* Mots-clés IF FOR WHILE VAR INT
* Opérateurs + - * / % ( ) == != < > <= >= =
**/
function add_token(&$tableau_token, $token){
array_push($tableau_token, $token);
}
function look_token($code, $position) {
	$retourn = true;
	$pos_temp = $position;
	while ($retourn) {
		if ($code[$pos_temp]==" ") {
			$pos_temp ++;
		}
		else {
			$retourn = false;
		}
	}
	return $code[$pos_temp];
}
function next_token($code, &$position) {
	$retourner = true;
	while ($retourner) {
		if ($code[$position]==" ") {
			$position ++;
		}
		else {
			$retourner = false;
		}
	}
	if ($position != strlen($code)-1) {
		$position ++;
	}
	return $code[$position-1];
}
/**
* Chaine de caractère pour test
**/

$code = "if ( x = 2; ); x = 2 + 1";
$tableau_token = array();
$position=0;

while ($position < strlen($code)-1)
{
	if (look_token($code, $position) == "i") 
		{
			next_token($code, $position);
			if (look_token($code, $position) == "f") 
				{
				add_token($tableau_token, "if");
				next_token($code, $position);
				}
		}
	if (look_token($code, $position) == "(") 
		{
			add_token($tableau_token, "(");
			next_token($code, $position);
		}
	if (look_token($code, $position) == '2') 
		{
			add_token($tableau_token, "2");
			next_token($code, $position);
		}
	if (look_token($code, $position) == '1') 
		{
			add_token($tableau_token, "1");
			next_token($code, $position);
		}
	if (look_token($code, $position) == ";") 
		{
			add_token($tableau_token, ";");
			next_token($code, $position);
		}
	if (look_token($code, $position) == "+") 
		{
			add_token($tableau_token, "+");
			next_token($code, $position);
		}
	if (look_token($code, $position) == ")") 
		{
			add_token($tableau_token, ")");
			next_token($code, $position);
		}
	if (look_token($code, $position) == "x") 
		{
			add_token($tableau_token, "x");
			next_token($code, $position);
		}
	if (look_token($code, $position) == "=") 
		{
				next_token($code, $position);
			if (look_token($code, $position) == "=") 
				{
				add_token($tableau_token, "==");
				next_token($code, $position);
				}
			else 
				add_token($tableau_token, "=");
		}

}
print_r($tableau_token);
=======
<?php
/* A PROGRAMMER EN OBJET !!!!!!!!!!!!!!!!!!!!!!!!
URGENT URGENT !!!!!!!!!!!!!!
*/

/**
* Ident [a-z A-Z _ 0-9]
* Entier [0-9]
* Mots-clés IF FOR WHILE VAR INT
* Opérateurs + - * / % ( ) == != < > <= >= =
**/
function add_token(&$tableau_token, $token){
array_push($tableau_token, $token);
}
function look_token($code, $position) {
	$retourn = true;
	$pos_temp = $position;
	while ($retourn) {
		if ($code[$pos_temp]==" ") {
			$pos_temp ++;
		}
		else {
			$retourn = false;
		}
	}
	return $code[$pos_temp];
}
function next_token($code, &$position) {
	$retourner = true;
	while ($retourner) {
		if ($code[$position]==" ") {
			$position ++;
		}
		else {
			$retourner = false;
		}
	}
	if ($position != strlen($code)-1) {
		$position ++;
	}
	return $code[$position-1];
}
/**
* Chaine de caractère pour test
**/

$code = "if ( x = 2; ); x = 2 + 1";
$tableau_token = array();
$position=0;

while ($position < strlen($code)-1)
{
	if (look_token($code, $position) == "i") 
		{
			next_token($code, $position);
			if (look_token($code, $position) == "f") 
				{
				add_token($tableau_token, "if");
				next_token($code, $position);
				}
		}
	if (look_token($code, $position) == "(") 
		{
			add_token($tableau_token, "(");
			next_token($code, $position);
		}
	if (look_token($code, $position) == '2') 
		{
			add_token($tableau_token, "2");
			next_token($code, $position);
		}
	if (look_token($code, $position) == '1') 
		{
			add_token($tableau_token, "1");
			next_token($code, $position);
		}
	if (look_token($code, $position) == ";") 
		{
			add_token($tableau_token, ";");
			next_token($code, $position);
		}
	if (look_token($code, $position) == "+") 
		{
			add_token($tableau_token, "+");
			next_token($code, $position);
		}
	if (look_token($code, $position) == ")") 
		{
			add_token($tableau_token, ")");
			next_token($code, $position);
		}
	if (look_token($code, $position) == "x") 
		{
			add_token($tableau_token, "x");
			next_token($code, $position);
		}
	if (look_token($code, $position) == "=") 
		{
				next_token($code, $position);
			if (look_token($code, $position) == "=") 
				{
				add_token($tableau_token, "==");
				next_token($code, $position);
				}
			else 
				add_token($tableau_token, "=");
		}

}
print_r($tableau_token);

?>