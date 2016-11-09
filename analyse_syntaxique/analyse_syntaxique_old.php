<?php
function P($tab, &$pos){
	if ($tab[$pos]=="ident" || $tab[$pos]=="ent") {
		accept($pos);
		return true;
	}
}

function accept(&$position){
	$position++;
}

function E($tab, &$pos){
	if (P($tab, $pos)) {
		return true;
	}
	else {
		return false;
	}
}

$tableau_token = array("ent", "ident", "ent", "ent", "ident");
$position = 0;
$correct = false;


while ($position < sizeof($tableau_token)) {
	if(E($tableau_token, $position)){
		$correct = true;
	}
	else{
		echo "La syntaxe est incorrecte";
		$correct = false;
		break;
	}
}
if ($correct) {
	echo "La syntaxe est correct";
}
?>