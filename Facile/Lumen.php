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
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%d", $N);
fscanf(STDIN, "%d", $L);
for ($i = 0; $i < $N; $i++) {
    $LINE[$i] = trim(stream_get_line(STDIN, 500 + 1, "\n"));
    $LINE2[$i] = implode(explode(" ", $LINE[$i]));
}

for ($i = 0; $i < $N; $i++) {
    for ($j = 0; $j < $N; $j++) {
        if ($LINE2[$i][$j] != 'C') {
            $LINE2[$i][$j] = '0';
        }
    }
}

for ($i = 0; $i < $N; $i++) {
    for ($j = 0; $j < $N; $j++) {
        if ($LINE2[$i][$j] == 'C') {
            for ($Y = $i-$L+1; $Y <= $i+$L-1; $Y++) {
                for ($X = $j-$L+1; $X <= $j+$L-1; $X++) {
                    if (($Y >= 0)  && ($X >= 0) 
                    &&  ($Y <= $N) && ($X <= $N)) {
                        if ($LINE2[$Y][$X] == '0') {
                            $LINE2[$Y][$X] = '1';
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
        if ($LINE2[$i][$j] == '0') {
            $result++;
        }
    }
}

echo("$result\n");
?>