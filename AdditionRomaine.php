<!--
1) Je pense qu'il faut analyser et simplier tout les groupes 'soustractifs' (IV, IX, XL, XC, CD, CM) des deux nombres fournis.
IV en IIII
IX en VIIII
XL en XXXX
XC en LXXXX
CD en CCCC
CM en DCCCC

2) ensuite 'aditionner/concatener' les deux nombres en un seul et classer par ordre décroissants les chiffres de ce nouveau nombre.

3) Puis en partant de la droite de ce nombre reconditionner les chiffres.
VV    en X
XXXX  en XL
XXXXX en L
LL    en C
CCCC  en CD
CCCCC en D
DD    en M

4) Vérifier que dans le nombre final il n'y a pas plus de trois I

Ainsi 1989 et 95
soit MCMLXXXIX + XCV
avec 1) MDCCCCLXXXVIIII + LXXXXV
avec 2) MDCCCCLLXXXXXXXVVIIII
avec 3) MDCCCCLLXXXXXXXXIIII
		MDCCCCLLLXXXIIII
		MDCCCCCLXXXIIII
		MDDLXXXIIII
		MMLXXXIIII
avec 4) MMLXXXIV
soit 2084
-->

<?php
function additionRomaine( string $val1, string $val2 ) {
	/* 1) */
	$romain = array('IV', 'IX', 'XL', 'XC', 'CD', 'CM');
	$replace = array('IIII', 'VIIII', 'XXXX', 'LXXXX', 'CCCC', 'DCCCC');
	$val1 = str_replace($romain, $replace, $val1);
	$val2 = str_replace($romain, $replace, $val2);

	/* 2) */
	$result = $val1 . $val2;
	$taille = strlen($result);
	$j = 0;
	$resultBis = '';
	for ($i=0; $i < $taille; $i++) { 
		if ($result[$i] == 'M') {
			$resultBis = $resultBis.'M';
		} 
	}

	for ($i=0; $i < $taille; $i++) { 
		if ($result[$i] == 'D') {
			$resultBis = $resultBis.'D';
		} 
	}

	for ($i=0; $i < $taille; $i++) { 
		if ($result[$i] == 'C') {
			$resultBis = $resultBis.'C';
		} 
	}

	for ($i=0; $i < $taille; $i++) { 
		if ($result[$i] == 'L') {
			$resultBis = $resultBis.'L';
		} 
	}

	for ($i=0; $i < $taille; $i++) { 
		if ($result[$i] == 'X') {
			$resultBis = $resultBis.'X';
		} 
	}

	for ($i=0; $i < $taille; $i++) { 
		if ($result[$i] == 'V') {
			$resultBis = $resultBis.'V';
		} 
	}

	for ($i=0; $i < $taille; $i++) { 
		if ($result[$i] == 'I') {
			$resultBis = $resultBis.'I';
		} 
	}

	$result = $resultBis;
	return $result;

	/* 3) */
	$romain = array('VV', 'XXXXX', 'XXXX', 'LL', 'CCCCCCCCC', 'CCCCC', 'CCCC', 'DD');
	$replace = array('X', 'L',     'XL',   'C',  'CD',        'D',     'CD',   'M');
	$result = str_replace($romain, $replace, $result);

	$romain = array('DCD', 'LXL');
	$replace = array('CM', 'XC');
	$result = str_replace($romain, $replace, $result);

	/* 4) */
	$romain = array('IIIII', 'IIII');
	$replace = array('V',     'IV');
	$result = str_replace($romain, $replace, $result);

	$romain = array('VIV');
	$replace = array('IX');
	$result = str_replace($romain, $replace, $result);

	return $result;
}

	$val1 = 'MMDDCCCCCLXXXX';
	$val2 = 'IIII';
	$result = additionRomaine($val1,$val2 );
    echo("$result\n");

	$val1 = 'VII';
	$val2 = 'XI';
	$result = additionRomaine($val1,$val2 );
    echo("$result\n");

	$val1 = 'MCMLXXXIX';
	$val2 = 'XCV';
	$result = additionRomaine($val1,$val2 );
    echo("$result\n");
?>