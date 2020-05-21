<!--
Ghost Legs est une sorte de jeu de loterie courant en Asie. Cela commence par un certain nombre de lignes verticales. Entre les lignes, il y a des connecteurs horizontaux aléatoires reliant toutes les lignes dans un diagramme connecté, comme celui ci-dessous.

A B C
| | |
| - | |
| | - |
| | - |
| | |
1 2 3

Pour jouer au jeu, un joueur choisit une ligne en haut et la suit vers le bas. Lorsqu'un connecteur horizontal est rencontré, il doit suivre le connecteur pour se tourner vers une autre ligne verticale et continuer vers le bas. Répétez cette opération jusqu'à atteindre le bas du diagramme.

Dans l'exemple de diagramme, lorsque vous commencez à partir de A, vous vous retrouverez en 2. Partant de B se terminera en 1. Partant de C se terminera en 3. Il est garanti que chaque étiquette supérieure correspondra à une étiquette inférieure unique .

Étant donné un diagramme Ghost Legs, découvrez quelle étiquette supérieure est connectée à quelle étiquette inférieure. Liste toutes les paires connectées.
-->

<!-- Ma solution -->
<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%d %d", $W, $H);
//echo("W : $W\n");
//echo("H : $H\n");
$line = array();
for ($i = 0; $i < $H; $i++) {
    $line[$i] = stream_get_line(STDIN, 1024 + 1, "\n");
    //echo("$line[$i]\n");
}

// Write an answer using echo(). DON'T FORGET THE TRAILING \n
// To debug: error_log(var_export($var, true)); (equivalent to var_dump)

//echo("-------\n");
for ($i = 0; $i < $W; $i = $i+3) {
    $k = $i;
    for ($j = 0; $j < $H; $j++) {
        //echo("*** $k *** $j ***\n");
        $l = $k;
        $ligne = $line[$j];
        //echo("ligne : $ligne\n");

        if ($j == 0) {
            $deb = $ligne[$k];
            //echo("deb : $deb\n");
        }

        if (($j != 0) && ($j != $H-1)) {
            //$mil = $ligne[$k];
            //echo("mil : $mil\n");

            if ($k == 0 && $ligne[$k+1] == '-') {
                $l = $l + 3;
                //echo("l : $l\n");
            }

            if ($k == $w-1 && $ligne[$k-1] == '-') {
                $l = $l - 3;
                //echo("l : $l\n");
            }

            if ($k != 0 && $k != $w-1) {
                //echo("k : $k\n");
                if ($ligne[$k+1] == '-') {
                    $l = $l + 3;
                    //echo("l : $l\n");
                }

                if ($ligne[$k-1] == '-') {
                    $l = $l - 3;
                    //echo("l : $l\n");
                }
            }

            $k = $l;
        }

        if ($j == $H-1) {
            $fin = $ligne[$k];
            //echo("fin : $fin\n");
            echo("$deb$fin\n");
        }
    }
}
?>

<!-- Solution -->
<?php
fscanf(STDIN, "%d %d", $W, $H);
for ($i = 0; $i < $H; $i++)
    $line[] = ' '.fgets(STDIN);

for ($x = 1; $x < strlen($line[0]); $x += 3) {
    for ($px = $x, $y = 1; $y < $H - 1; $y++)
        $px += (($line[$y][$px + 1] == '-') - ($line[$y][$px - 1] == '-')) * 3;

    echo $line[0][$x].$line[$y][$px]."\n";
}
-->