<!--
Objectif
L’Hippodrome de Casablanca organise un nouveau type de course de chevaux : les duels. Lors d’un duel, seulement deux chevaux participent à la course. Pour que la course soit intéressante, il faut sélectionner deux chevaux qui ont une puissance similaire.

Écrivez un programme qui, à partir d’un ensemble donné de puissances, identifie les deux puissances les plus proches et affiche leur écart avec un nombre entier positif.
-->

<!-- Ma solution -->
<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%d", $N);
for ($i = 0; $i < $N; $i++) {
    fscanf(STDIN, "%d", $pi);
    //echo("cheval $i : $pi\n");
    //array_push($array, $pi);

    $arr[] = $pi;
}

sort($arr);
$answer = 10000;
for ($i = 1; $i < $N; $i++) {
    $diff = abs($arr[$i-1] - $arr[$i]);

    if ($diff < $answer) {
        $answer = $diff;
        //echo("$answer\n");
    }
}

// Write an answer using echo(). DON'T FORGET THE TRAILING \n
// To debug: error_log(var_export($var, true)); (equivalent to var_dump)

echo("$answer\n");
?>

<!-- Solution -->
<?php
//init
fscanf(STDIN, "%d",$N);
for ($i = 0; $i < $N; $i++){
    fscanf(STDIN, "%d",$Pi);
    $arr[]=$Pi;
}

sort($arr);
//get all diffs
for($i=1;$i<$N;$i++)$diff[]=abs($arr[$i]-$arr[$i-1]);
//send response
echo min($diff);
?>
