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
for ($i = 0; $i < $N; $i++) {
    fscanf(STDIN, "%s %s %s", $operation, $arg1, $arg2);
    $tab_oper[$i] = $operation;
    $tab_arg1[$i] = $arg1;
    $tab_arg2[$i] = $arg2;

        //echo("-deb------\n");
        //echo("$tab_oper[$i]\n");
        //echo("$tab_arg1[$i]\n");
        //echo("$tab_arg2[$i]\n");
        //echo("-fin------\n");
}

function size($i) {
    //echo("i : $i\n");
    $j = strlen($i);
    $res = 0;
    for($k = 1; $k < $j; $k++) {
        $res = $res * 10 + $i[$k];
    }
    //echo("res : $res\n");

    return $res;
}

function dependencie($tab_oper, &$tab_arg1, &$tab_arg2, $j) {
    if (($tab_arg1[$j][0] != "$") && ($tab_arg2[$j][0] != "$")) {
        if($tab_oper[$j] == "VALUE") {
            return $tab_arg1[$j];
        }

        if($tab_oper[$j] == "ADD") {
            return $tab_arg1[$j] + $tab_arg2[$j];
        }

        if($tab_oper[$j] == "SUB") {
            return $tab_arg1[$j] - $tab_arg2[$j];
        }

        if($tab_oper[$j] == "MULT") {
            return $tab_arg1[$j] * $tab_arg2[$j];
        }
    } else {
        if($tab_oper[$j] == "VALUE") {
            $val = size($tab_arg1[$j]);
            $tab_arg1[$j] = dependencie($tab_oper, $tab_arg1, $tab_arg2, $val); 
            return $tab_arg1[$j];
        }

        if ($tab_oper[$j] == "ADD") {
            if (($tab_arg1[$j][0] != "$") && ($tab_arg2[$j][0] == "$")) {
                $val = size($tab_arg2[$j]);
                $tab_arg2[$j] = dependencie($tab_oper, $tab_arg1, $tab_arg2, $val);
                //echo("tab_arg2[$j] : $tab_arg2[$j]\n");
            } 
            
            if (($tab_arg1[$j][0] == "$") && ($tab_arg2[$j][0] != "$")) {
                $val = size($tab_arg1[$j]);
                $tab_arg1[$j] = dependencie($tab_oper, $tab_arg1, $tab_arg2, $val); 
                //echo("tab_arg1[$j] : $tab_arg1[$j]\n");
            }

            if (($tab_arg1[$j][0] == "$") && ($tab_arg2[$j][0] == "$")) {
                $val = size($tab_arg1[$j]);
                $tab_arg1[$j] = dependencie($tab_oper, $tab_arg1, $tab_arg2, $val);
                $val = size($tab_arg2[$j]);
                $tab_arg2[$j] = dependencie($tab_oper, $tab_arg1, $tab_arg2, $val);
            }

            return $tab_arg1[$j]
                    + $tab_arg2[$j];
        }

        if ($tab_oper[$j] == "SUB") {
            if (($tab_arg1[$j][0] != "$") && ($tab_arg2[$j][0] == "$")) {
                $val = size($tab_arg2[$j]);
                $tab_arg2[$j] = dependencie($tab_oper, $tab_arg1, $tab_arg2, $val);
            } 
            
            if (($tab_arg1[$j][0] == "$") && ($tab_arg2[$j][0] != "$")) {
                $val = size($tab_arg1[$j]);
                $tab_arg1[$j] = dependencie($tab_oper, $tab_arg1, $tab_arg2, $val);
            }

            if (($tab_arg1[$j][0] == "$") && ($tab_arg2[$j][0] == "$")) {
                $val = size($tab_arg1[$j]);
                $tab_arg1[$j] = dependencie($tab_oper, $tab_arg1, $tab_arg2, $val); 
                $val = size($tab_arg2[$j]);
                $tab_arg2[$j] = dependencie($tab_oper, $tab_arg1, $tab_arg2, $val);
            }

            return $tab_arg1[$j]
                    - $tab_arg2[$j];
        }

        if ($tab_oper[$j] == "MULT") {
            if (($tab_arg1[$j][0] != "$") && ($tab_arg2[$j][0] == "$")) {
                $val = size($tab_arg2[$j]);
                $tab_arg2[$j] = dependencie($tab_oper, $tab_arg1, $tab_arg2, $val);
            } 
            
            if (($tab_arg1[$j][0] == "$") && ($tab_arg2[$j][0] != "$")) {
                $val = size($tab_arg1[$j]);
                $tab_arg1[$j] = dependencie($tab_oper, $tab_arg1, $tab_arg2, $val); 
            }

            if (($tab_arg1[$j][0] == "$") && ($tab_arg2[$j][0] == "$")) {
                $val = size($tab_arg1[$j]);
                $tab_arg1[$j] = dependencie($tab_oper, $tab_arg1, $tab_arg2, $val); 
                $val = size($tab_arg2[$j]);
                $tab_arg2[$j] = dependencie($tab_oper, $tab_arg1, $tab_arg2, $val);
            }

            return $tab_arg1[$j]
                    * $tab_arg2[$j];
        }
    }
}

for ($i = 0; $i < $N; $i++) {
    $val = dependencie($tab_oper, $tab_arg1, $tab_arg2, $i);
    echo("$val\n");

    //echo("*******\n");

    // Write an answer using echo(). DON'T FORGET THE TRAILING \n
    // To debug: error_log(var_export($var, true)); (equivalent to var_dump)
    //echo("1\n");
}

        //echo("-------\n");
        //echo("$tab_oper[$i]\n");
        //echo("$tab_arg1[$i]\n");
        //echo("$tab_arg2[$i]\n");
        //echo("-------\n");
            //echo("ICI\n");
            //echo("$valT\n");

?>