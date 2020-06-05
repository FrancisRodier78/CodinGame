<!--
Objectif
Vous êtes payé par un fermier pour peindre sa clôture.

Sachant que la tâche peut être trop difficile pour vous, vous avez sous-traité le travail à une école d'étudiants comme activité parascolaire, pour dessiner des graffitis sur la clôture.

Après une journée entière de travail et de plaisir, les élèves ont indiqué quelles sections de la clôture avaient été peintes. Les étudiants travaillaient en petites équipes ou individuellement, de sorte que vous obteniez plusieurs rapports séparés d'eux.

La clôture est marquée à chaque mètre, à partir du mètre 0. Une section peinte est signalée comme
st ed
ce qui signifie que la peinture se fait de [point de départ] à [point de fin].
Nous prenons uniquement des lectures entières.

Exemple

    st ed
    ! ░ ° C ° C ° C
 + - + - + - + - + - + -
 0 1 2 3 4 5


st = 1
ed = 4
longueur peinte = 3


Les sections peintes peuvent ne pas être continues, réalisées sur différentes parties de la clôture. Certaines sections signalées se chevauchent même. Les rapports ne sont pas triés dans un ordre spécial.

Ayant les rapports en main, vous voulez savoir quelles sections de la clôture n'ont pas été peintes.
-->

<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%d", $L);
//echo("L : $L\n");
fscanf(STDIN, "%d", $N);
//echo("N : $N\n");
$tab = [];
for ($i = 0; $i < $N; $i++) {
    fscanf(STDIN, "%d %d", $st, $ed);
    //echo("st, ed : $st, $ed\n");
    $tab += [$st => $ed];
}

// Write an answer using echo(). DON'T FORGET THE TRAILING \n
// To debug: error_log(var_export($var, true)); (equivalent to var_dump)
ksort($tab);
foreach ($tab as $k => $v) {
    //echo "tab[$k] => $v\n";
}

$key = 0;
$val = 0;
$result = [];
$result1 = [];
$result2 = [];
$n = 1;
foreach ($tab as $k => $v) {
    $n++;
    if ($key == 0 && $val == 0) {
        $key = $k;
        $val = $v;
        //echo("0 0 : $key, $val \n");
    } else {
        if ($key == $k && $k == $v) {
            //$result = [$key => $val];
            echo("Rien 1\n");
        } elseif ($key == $k && $key < $v && $v < $val) {
            //$result = [$key => $val];
            echo("Rien 2\n");
        } elseif ($key == $k && $val == $v) {
            //$result = [$key => $val];
            echo("Rien 3\n");
        } elseif ($key == $k && $val < $v) {
            $val = $v;
            $result = [$key => $val];
        } elseif ($key < $k && $k < $val && $k == $v) {
            //$result = [$key => $val];
            echo("Rien 5\n");
        } elseif ($key < $k && $k < $val && $v < $val) {
            $result = [$key => $val];
            //echo("Rien 6 : $key, $val\n");
        } elseif ($key < $k && $k < $val && $v == $val) {
            //$result = [$key => $val];
            echo("Rien 7\n");
        } elseif ($key < $k && $k < $val && $val < $v) {
            $val = $v;
            $result = [$key => $val];
        } elseif ($k == $val && $k == $v) {
            //$result = [$key => $val];
            echo("Rien 9\n");
        } elseif ($k == $val && $val < $v) {
            $val = $v;
            $result = [$key => $val];
        } elseif ($k == $val+1 && $val < $v) {
            $val = $v;
            $result = [$key => $val];
        } elseif ($val+1 < $k) {
            //echo("nouveau tab : $key, $val\n");
            $result1 += $result;
            $result = [$key => $val];

            $key = $k;
            $val = $v;
        }
    }
}
$result1 += $result;

$valprec = 0;
$resul2 = [];
foreach ($result1 as $k => $v) {
    if ($k == 0 ) {
        //$key = $v; 
        $valprec = $v;
    } else {
        $key = $valprec; 
        $val = $k;
        $result2 += [$key => $val];

        $valprec = $v;
    }
}

if ($valprec != $L) {
    $key = $valprec; 
    $val = $L;
    $result2 += [$key => $val];
}

foreach ($result2 as $k => $v) {
    if ($k == 0 && $v == $L) {
        echo("All painted\n");
    } else {
        echo("$k $v\n");
    }
}
?>