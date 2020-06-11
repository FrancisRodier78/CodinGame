<!--
Objectif
Vous obtenez une grille de sudoku d'un joueur et vous devez vérifier si elle a été correctement remplie.

Une grille sudoku se compose de 9 × 9 = 81 cellules divisées en 9 sous-grilles de 3 × 3 = 9 cellules.
Pour que la grille soit correcte, chaque ligne doit contenir une occurrence de chaque chiffre (1 à 9), chaque colonne doit contenir une occurrence de chaque chiffre (1 à 9) et chaque sous-grille doit contenir une occurrence de chaque chiffre (1 à 9).

Vous devez répondre vrai si la grille est correcte ou fausse dans le cas contraire.
Entrée
9 rangées de 9 chiffres séparés par des espaces représentant la grille sudoku.
Sortie
vrai ou faux
Contraintes
Pour chaque chiffre n de la grille: 1 ≤ n ≤ 9.
-->

<!-- Ma solution -->
<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

for ($i = 0; $i < 9; $i++) {
    $col[$i] = [];
    $bloc[$i] = [];
}

for ($i = 0; $i < 9; $i++) {
    // Constitution des rows.
    $row[$i] = explode(" ", fgets(STDIN));

    //error_log(var_export($row, true));
    for ($j = 0; $j < 9; $j++)     {
        $n = intval($row[$i][$j]);
        // Constitution des cols.
        if ($j == 0) {array_push($col[$j],$n);};
        if ($j == 1) {array_push($col[$j],$n);};
        if ($j == 2) {array_push($col[$j],$n);};
        if ($j == 3) {array_push($col[$j],$n);};
        if ($j == 4) {array_push($col[$j],$n);};
        if ($j == 5) {array_push($col[$j],$n);};
        if ($j == 6) {array_push($col[$j],$n);};
        if ($j == 7) {array_push($col[$j],$n);};
        if ($j == 8) {array_push($col[$j],$n);};

        // Constitution des blocs.
        if (0 <= $i && $i <= 2) {
            if (0 <= $j && $j <= 2) {array_push($bloc[0],$n);}
            if (3 <= $j && $j <= 5) {array_push($bloc[1],$n);}
            if (6 <= $j && $j <= 8) {array_push($bloc[2],$n);}
        };
        if (3 <= $i && $i <= 5) {
            if (0 <= $j && $j <= 2) {array_push($bloc[3],$n);}
            if (3 <= $j && $j <= 5) {array_push($bloc[4],$n);}
            if (6 <= $j && $j <= 8) {array_push($bloc[5],$n);}
        };
        if (6 <= $i && $i <= 8) {
            if (0 <= $j && $j <= 2) {array_push($bloc[6],$n);}
            if (3 <= $j && $j <= 5) {array_push($bloc[7],$n);}
            if (6 <= $j && $j <= 8) {array_push($bloc[8],$n);}
        };

    }
}

$result = "true";
$k = 0;
for ($i = 0; $i < 9; $i++) {
    $k++;
    for ($j = 0; $j < 9; $j++) {
        //error_log(var_export($bloc, true));
        if (!in_array($k, $row[$j])) {
            $result = "false";
        }

        if (!in_array($k, $col[$j])) {
            $result = "false";
        }

        if (!in_array($k, $bloc[$j])) {
            $result = "false";
        }
    }
}

// Write an answer using echo(). DON'T FORGET THE TRAILING \n
// To debug: error_log(var_export($var, true)); (equivalent to var_dump)

echo("$result\n");
?>

<!-- Solution -->
<?php
$h = array_fill(0,27,array_fill(1,9,0));
for ($i = 0; $i < 9; $i++) {
    $row = explode(" ",trim(fgets(STDIN)));
    for($j = 0; $j < 9; $j++) {
        $h[$i][$row[$j]] = 1;   
        $h[9+$j][$row[$j]] = 1;
        $h[18+(intdiv($j,3)+intdiv($i,3)*3)][$row[$j]] = 1;
    }
}

echo array_sum(array_map("array_sum",$h)) < 27*9 ? "false" : "true";
?>