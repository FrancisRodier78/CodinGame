<!--
Objectif

Dans cet exercice, vous devez analyser un relevé de températures pour trouver quelle température se rapproche le plus de zéro.
Exemple de températures
Ici, -1 est le plus proche de 0.
  Règles
Écrivez un programme qui affiche la température la plus proche de 0 parmi les données d'entrée. Si deux nombres sont aussi proches de zéro, alors l'entier positif sera considéré comme étant le plus proche de zéro (par exemple, si les températures sont -5 et 5, alors afficher 5).
  Entrées du jeu
Votre programme doit lire les données depuis l'entrée standard et écrire le résultat sur la sortie standard.
Entrée

Ligne 1 : Le nombre N de températures à analyser.

Ligne 2 : Une chaine de caractères contenant les N températures exprimées sous la forme de nombres entiers allant de -273 à 5526
Sortie
Affichez 0 (zéro) si aucune température n'est fournie. Sinon, affichez la température la plus proche de 0
Contraintes
0 ≤ N < 10000
Exemple
Entrée

5
1 -2 -8 4 5

Sortie

1
-->

<!-- Ma solution -->
<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fgets(STDIN);
$list = explode(' ',fgets(STDIN));

for ($temp = 0; $temp <= 5526; $temp++)
{
    if (in_array($temp, $list)) exit ("$temp");
    if (in_array(-$temp, $list)) exit ("-$temp");
}

$temp = 5527;

// $n: the number of temperatures to analyse
fscanf(STDIN, "%d", $n);
$inputs = explode(" ", fgets(STDIN));
for ($i = 0; $i < $n; $i++)
{
    $t = intval($inputs[$i]); // a temperature expressed as an integer ranging from -273 to 5526
    
    if ($temp > abs($t)) {
        $temp = abs($t);
        if ($t < 0) {
            $result = $temp * -1;
        } else {
            $result = $temp;
        }
    } elseif ($temp == abs($t)) {
        if ($result < $t) {
            $result = $temp;
        }
    }    
}

if ($temp == 5527) {
    $result = 0;
}
// Write an action using echo(). DON'T FORGET THE TRAILING \n
// To debug (equivalent to var_dump): error_log(var_export($var, true));

echo("$result\n");
?>

<!-- Solution -->
<?php
//Why making things complicated? This is an easy puzzle!

fgets(STDIN);
$list = explode(' ',fgets(STDIN));

for ($temp = 1; $temp <= 5526; $temp++)
{
    if (in_array($temp, $list)) exit ("$temp");
    if (in_array(-$temp, $list)) exit ("-$temp");
}
exit("0");
?>
