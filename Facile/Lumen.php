<!--
Objectif
ILS vous ont mis dans une pièce de forme carrée, avec N mètres de chaque côté.
ILS veulent tout savoir sur vous.
ILS vous observent.
ILS ont placé des bougies dans la pièce.

Chaque bougie fait L "lumière" à l'endroit où ils se trouvent, et chaque endroit de forme carrée obtient une "lumière" de moins que les suivants. Si un point est touché par deux bougies, il aura la plus grande "lumière" qu'il peut avoir. Chaque spot a la lumière de base de 0.

Vous ne pouvez masquer que si vous trouvez une tache sombre qui a 0 "lumière".
Combien de taches sombres avez-vous?

Vous recevrez un plan de la pièce, avec les places vides (X) et les bougies (C) sur N rangées, chaque personnage étant séparé par un espace.

Exemple pour la diffusion de la lumière N = 5, L = 3:
X X X X X
X C X X X
X X X X X
X X X X X
X X X X X

2 2 2 1 0
2 3 2 1 0
2 2 2 1 0
1 1 1 1 0
0 0 0 0 0
-->

<?php
<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%d", $N);
echo("$N\n");
fscanf(STDIN, "%d", $L);
echo("$L\n");
for ($i = 0; $i < $N; $i++) {
    $LINE[$i] = trim(stream_get_line(STDIN, 500 + 1, "\n"));
    $LINE2[$i] = implode(explode(" ", $LINE[$i]));
    //echo("LINE[$i] : $LINE[$i]\n");
    echo("LINE2[$i] : $LINE2[$i]\n");
}

for ($i = 0; $i < $N; $i++) {
    for ($j = 0; $j < $N; $j++) {
        if ($LINE2[$i][$j] != 'C') {
            $LINE2[$i][$j] = 0;
        }
    }
}

for ($i = 0; $i < $N; $i++) {
    for ($j = 0; $j < $N; $j++) {
        if ($LINE2[$i][$j] == 'C') {
                //echo("-----\n");
            echo("LINE2[$i][$j] : $LINE2[$i][$j]\n");
            //$LINE2[$i][$j] = 1;
            for ($Y = $i-$L; $Y < $L; $Y++) {
                //echo("Y : $Y\n");
                for ($X = $j-$L; $X < $L; $X++) {
                    //echo("X : $X\n");
                    if (($Y >= 0)  && ($X >= 0) 
                    &&  ($Y <= $N) && ($X <= $N)) {
                        echo("X, Y : $X, $Y\n");
                        if ($LINE2[$Y][$X] == 0) {
                            $LINE2[$Y][$X] = 1;
                        }
                    }
                }
            }
        }
    }
}

$result = 0;
for ($i = 0; $i < $N; $i++) {
    for ($j = 0; $j < $N; $j++) {
        if ($LINE2[$i][$j] == 0) {
            $result++;
        }
    }
}

for ($i = 0; $i < $N; $i++) {
    print_r("LINE2[$i] : $LINE2[$i]\n");
}

echo("$result\n");
?>?>