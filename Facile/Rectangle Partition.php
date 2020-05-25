<!--
Objectif
Il y a un rectangle de largeur donnée w et de hauteur h,

Côté largeur, vous obtenez une liste de mesures.
Côté hauteur, on vous donne une autre liste de mesures.

Tracez des lignes perpendiculaires à partir des mesures pour partitionner le rectangle en petits rectangles.

Dans tous les sous-rectangles (y compris les combinaisons de petits rectangles), combien sont des carrés?


Exemple

w = 10
h = 5
mesures sur l'axe des x: 2, 5
mesures sur l'axe des y: 3

   ___2______5__________
  | | | |
  | | | |
 3 | ___ | ______ | __________ |
  | | | |
  | ___ | ______ | __________ |


Nombre de carrés dans des sous-rectangles = 4 (un 2x2, un 3x3, deux 5x5)
Entrée
Ligne 1: Entiers avec countX countY, séparés par un espace
Ligne 2: liste des mesures côté largeur, nombre d'entiers countX séparés par un espace, triés par ordre asc
Ligne 3: liste des mesures côté hauteur, nombre d'entiers Y séparés par un espace, triés par ordre asc
Sortie
Ligne 1: le nombre de carrés dans les sous-rectangles créés par les lignes ajoutées
-->

<!-- Ma solution -->
<?php
fscanf(STDIN, "%d %d %d %d", $w, $h, $countX, $countY);

$x = array();
$inputs = explode(" ", fgets(STDIN));
$x[0] = 0;
$j = 0;
for ($i = 0; $i < $countX; $i++) {
    $j++;
    $x[$j] = intval($inputs[$i]);
}
$countX++;
$x[$countX] = $w;
$countX++;
for ($i = 0; $i < $countX; $i++) {
    //echo("x[$i] : $x[$i]\n");
}

$y = array();
$inputs = explode(" ", fgets(STDIN));
$y[0] = 0;
$j = 0;
for ($i = 0; $i < $countY; $i++) {
    $j++;
    $y[$j] = intval($inputs[$i]);
}
$countY++;
$y[$countY] = $h;
$countY++;

$tabX = array();
for ($i = 0; $i < $countX; $i++) {
    for ($j = $i; $j < $countX; $j++) {
        $val = $x[$i] - $x[$j];
        if ($val != 0) {
            $tabX[abs($val)]++;
            $val1 = abs($val);
        }
    }
}

$tabY = array();
for ($i = 0; $i < $countY; $i++) {
    for ($j = $i; $j < $countY; $j++) {
        $val = $y[$i] - $y[$j];
        if ($val != 0) {
            $tabY[abs($val)]++;
            $val1 = abs($val);
        }
    }
}

$val = 0;
foreach ($tabX as $keyX => $valueX){
    foreach ($tabY as $keyY => $valueY){
        if ($keyX == $keyY) {
            $val += $valueX * $valueY;
        }
    }
}

echo("$val\n");
?>

<!-- Solution -->
<?php
fscanf(STDIN, "%d %d %d %d", $w, $h, $cX, $cY);

$X = array_merge([0], explode(" ", trim(fgets(STDIN))), [$w]);

$Y = array_merge([0], explode(" ", trim(fgets(STDIN))), [$h]);

for ($i = 0; $i <= $cX; $i++) 
	for ($k = $i + 1; $k < $cX + 2; $k++) 
		@$sw[$X[$k] - $X[$i]]++ ;

for ($c = $j = 0; $j <= $cY; $j++) 
	for ($l = $j + 1; $l < $cY + 2; $l++) 
		$c += @$sw[$Y[$l] - $Y[$j]];
	
echo $c;
?>