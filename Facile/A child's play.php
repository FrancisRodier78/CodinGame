<!--
Objectif
Depuis plusieurs années maintenant, dans les écoles primaires, on assiste à l'émergence d'un nouveau modèle éducatif, la programmation ludique. 
Les étudiants doivent programmer un petit robot à l'aide de blocs d'assemblage. 
Cela leur permet de se familiariser avec la programmation dès leur plus jeune âge tout en exerçant leur logique et leur perception de l'espace.

Vous êtes étudiant dans l'une de ces écoles. 
Le but de l'exercice est simple: 
    votre professeur a conçu un circuit pour votre robot, 
    vous a indiqué le nombre de mouvements que le robot peut effectuer 
    et vous devez connaître la position finale du robot à la fin de l'exécution.

Pour ce faire, vous devez connaître certains principes de fonctionnement du robot.
- Lorsque le robot rencontre un obstacle (représenté par #) il tourne à droite (sur la même opération). 
    Sinon, sur une zone vide (représentée par.), Il avance tout droit.
- Le robot se déplace initialement vers le haut.
- Le robot s'arrête après n mouvements.
- Le coin supérieur gauche représente les coordonnées (0,0)
- L'environnement du robot est représenté comme suit, où O est la position initiale du robot:

...#........
...........#
............
............
..#O........
..........#.
-->

<!-- Ma solution -->
<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%d %d", $w, $h);
error_log(var_export($w, true));
error_log(var_export($h, true));

fscanf(STDIN, "%d", $n);
error_log(var_export($n, true));

for ($i = 0; $i < $h; $i++) {
    $line[$i] = stream_get_line(STDIN, 500 + 1, "\n");
    error_log(var_export($line[$i], true));
}

for ($Y = 0; $Y < $h; $Y++) {
    for ($X = 0; $X < $w; $X++) {
        //error_log(var_export($line[$Y][$X], true));
        if ($line[$Y][$X] == 'O') {
            $debY = $Y;
            $debX = $X;
            $line[$Y][$X] = '.';
            //error_log(var_export($Y, true));
            //error_log(var_export($X, true));
        }
    }
}

$Y = $debY;
$X = $debX;
$move = 'h';
for ($i = 0; $i < $n; $i++) {
    if       (isset($line[$Y-1][$X]) && $line[$Y-1][$X] == '.' && $move == 'h') {
        //move vers le haut
        $Y = $Y - 1;
    } elseif (isset($line[$Y-1][$X]) && $line[$Y-1][$X] == '#' && $move == 'h') {
        //move vers la droite
        $move = 'd';
        $X = $X + 1;
    } elseif (isset($line[$Y][$X+1]) && $line[$Y][$X+1] == '.' && $move == 'd') {
        //move vers la droite
        $X = $X + 1;
    } elseif (isset($line[$Y][$X+1]) && $line[$Y][$X+1] == '#' && $move == 'd') {
        //move vers le bas
        $move = 'b';
        $Y = $Y + 1;
    } elseif (isset($line[$Y+1][$X]) && $line[$Y+1][$X] == '.' && $move == 'b') {
        //move vers le bas
        $Y = $Y + 1;
    } elseif (isset($line[$Y+1][$X]) && $line[$Y+1][$X] == '#' && $move == 'b') {
        //move vers la gauche
        $move = 'g';
        $X = $X - 1;
    } elseif (isset($line[$Y][$X-1]) && $line[$Y][$X-1] == '.' && $move == 'g') {
        //move vers la gauche
        $X = $X - 1;
    } elseif (isset($line[$Y][$X-1]) && $line[$Y][$X-1] == '#' && $move == 'g') {
        //move vers le haut
        $move = 'h';
        $Y = $Y - 1;
    }

    if ($debY == $Y && $debX == $X) {
        // On st dans une boucle !
        // en tenir compte pour écourter la boucle.
        error_log(var_export("Boucle. $i", true));
    }

    //error_log(var_export($move, true));
    //error_log(var_export($Y, true));
    //error_log(var_export($X, true));
    //echo("-------\n");
}

error_log(var_export($i, true));
echo("X : $X, Y : $Y\n");
?>
