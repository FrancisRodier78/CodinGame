<!--
Objectif
You are given a 1-dimensional spreadsheet. You are to resolve the formulae and give the value of all its cells.

Each input cell's content is provided as an operation with two operands arg1 and arg2.

There are 4 types of operations:
VALUE arg1 arg2: The cell's value is arg1, (arg2 is not used and will be "_" to aid parsing).
ADD arg1 arg2: The cell's value is arg1 + arg2.
SUB arg1 arg2: The cell's value is arg1 - arg2.
MULT arg1 arg2: The cell's value is arg1 × arg2.

Arguments can be of two types:
• Reference $ref: If an argument starts with a dollar sign, it is a interpreted as a reference and its value is equal to the value of the cell by that number ref, 0-indexed.
For example, "$0" will have the value of the result of the first cell.
Note that a cell can reference a cell after itself!

• Value val: If an argument is a pure number, its value is val.
For example: "3" will have the value 3.

There won't be any cyclic references: a cell that reference itself or a cell that references it, directly or indirectly.
-->

<--
Objectif
On vous donne une feuille de calcul unidimensionnelle. Vous devez résoudre les formules et donner la valeur de toutes ses cellules.

Le contenu de chaque cellule d'entrée est fourni sous la forme d'une opération avec deux opérandes arg1 et arg2.

Il existe 4 types d'opérations :
VALEUR arg1 arg2 : la valeur de la cellule est arg1, (arg2 n'est pas utilisé et sera "_" pour faciliter l'analyse).
AJOUTER arg1 arg2 : la valeur de la cellule est arg1 + arg2.
SUB arg1 arg2 : la valeur de la cellule est arg1 - arg2.
MULT arg1 arg2 : la valeur de la cellule est arg1 × arg2.

Les arguments peuvent être de deux types :
• Référence $ref : Si un argument commence par un signe dollar, il est interprété comme une référence et sa valeur est égale à la valeur de la cellule par ce numéro ref, indexée à 0.
Par exemple, "$0" aura la valeur du résultat de la première cellule.
Notez qu'une cellule peut référencer une cellule après elle-même !

• Valeur val : si un argument est un nombre pur, sa valeur est val.
Par exemple : "3" aura la valeur 3.

Il n'y aura pas de références cycliques : une cellule qui se référence elle-même ou une cellule qui la référence, directement ou indirectement.
-->

<!-- Ma solution -->
<?php
fscanf(STDIN, "%d", $N);
for ($i = 0; $i < $N; $i++) {
    fscanf(STDIN, "%s %s %s", $operation, $arg1, $arg2);
    $tab_oper[$i] = $operation;
    $tab_arg1[$i] = $arg1;
    $tab_arg2[$i] = $arg2;
}

function size($i) {
    $j = strlen($i);
    $res = 0;
    for($k = 1; $k < $j; $k++) {
        $res = $res * 10 + $i[$k];
    }

    return $res;
}

function dependencie($tab_oper, $tab_arg1, $tab_arg2, $j) {
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
        if ($tab_oper[$j] == "ADD") {
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
}
?>

<!-- Solution -->
<?php
for ($i = (int)fgets(STDIN); $i--;)
    $database[] = [explode(" ", trim(fgets(STDIN))), false];

function compute($index) {
    global $database;
    list($line, $result) = $database[$index];
    if ($result !== false) return $result;
    
    list($op, $a, $b) = $line;
    $a = $a[0] == '$' ? compute((int)substr($a, 1)) : (int)$a;
    $b = $b[0] == '$' ? compute((int)substr($b, 1)) : (int)$b;
    
    $result = $a;
    if ($op == 'ADD') $result += $b;
    if ($op == 'SUB') $result -= $b;
    if ($op == 'MULT') $result *= $b;
    
    $database[$index][1] = $result;
    return $result;
}

foreach ($database as $i => $line)
    echo compute($i)."\n";
?>
