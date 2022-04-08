<!--
Objectif
Vous êtes payé par un fermier pour peindre sa clôture.

Sachant que la tâche peut être trop difficile pour vous, vous avez sous-traité le travail à une école d'étudiants comme activité parascolaire, 
pour dessiner des graffitis sur la clôture.

Après une journée entière de travail et de plaisir, les élèves ont indiqué quelles sections de la clôture avaient été peintes. 
Les étudiants travaillaient en petites équipes ou individuellement, de sorte que vous obteniez plusieurs rapports séparés d'eux.

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


Les sections peintes peuvent ne pas être continues, réalisées sur différentes parties de la clôture. 
Certaines sections signalées se chevauchent même. Les rapports ne sont pas triés dans un ordre spécial.

Ayant les rapports en main, vous voulez savoir quelles sections de la clôture n'ont pas été peintes.
-->

<!-- Ma solution -->
<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%d", $L);
fscanf(STDIN, "%d", $N);
$tab = [];
$tabD = [];
for ($i = 0; $i < $N; $i++) {
    fscanf(STDIN, "%d %d", $st, $ed);
    $tab += [$st => $ed];
    $tabD[$i][0] = $st;
    $tabD[$i][1] = $ed;
}

// Write an answer using echo(). DON'T FORGET THE TRAILING \n
// To debug: error_log(var_export($var, true)); (equivalent to var_dump)
ksort($tab);
foreach ($tab as $k => $v) {
    for ($i = 0; $i < $N; $i++) {
        if ($k == $tabD[$i][0]) {
            $tab[$k] = $tabD[$i][1];
        }
    }
}

$key = 0;
$val = 0;
$result = [];
$result1 = [];
$n = 1;
foreach ($tab as $k => $v) {
    $n++;
    if ($key == 0 && $val == 0) {
        $key = $k;
        $val = $v;
    } else {
        if ($key < $k && $k < $val && $v < $val) {
            $result = [$key => $val];
        } elseif ($key < $k && $k < $val && $val < $v) {
            $val = $v;
            $result = [$key => $val];
        } elseif ($k == $val && $val < $v) {
            $val = $v;
            $result = [$key => $val];
        } elseif ($val < $k) {
            $result = [$key => $val];
            $result1 += $result;

            $key = $k;
            $val = $v;
        }
    }
}
$result = [$key => $val];
$result1 += $result;

$valprec = 0;
$tab2 = [];
foreach ($result1 as $k => $v) {
    if ($k == 0) {
        if ($v != $L) {
            $valprec = $v;
        } else {
            $valprec = $v;
            $val = $L;
            $tab2 += [$key => $val];
        }
    } else {
        $key = $valprec; 
        $val = $k;
        $tab2 += [$key => $val];

        $valprec = $v;
    }
}

if ($valprec != $L) {
    $key = $valprec; 
    $val = $L;
    $tab2 += [$key => $val];
}

foreach ($tab2 as $k => $v) {
    if ($k == 0 && $v == $L) {
        echo("All painted\n");
    } else {
        echo("$k $v\n");
    }
}
?>

<!-- Solution -->
<?php

fscanf(STDIN, "%d", $length);
fscanf(STDIN, "%d", $count);

$report = [];
for ($i = 0; $i < $count; $i++) {
    fscanf(STDIN, "%d %d", $st, $ed);
    $report[$st] = $ed;
}

ksort($report);
error_log(var_export($report, true));

$painted = [];
$lst = 0;
$led = 0;
foreach ($report as $st => $ed) {
    if ($led < $st) {
        $painted[$st] = $ed;
        $lst = $st;
        $led = $ed;
    } else if ($led < $ed) {
        $painted[$lst] = $ed;
        $led = $ed;
    }
    //error_log(var_export($painted, true));
}

error_log(var_export($painted, true));

$unpainted = [];
$lst = 0;
foreach ($painted as $st => $ed) {
    if ($st != 0) {
        $unpainted[$lst] = $st;
    }
    $lst = $ed;
}
if ($lst < $length) {
    $unpainted[$lst] = $length;
}

error_log(var_export($unpainted, true));

if (count($unpainted) > 0) {
    foreach ($unpainted as $st => $ed) {
        echo("$st $ed\n");
    }
} else {
    echo("All painted\n");
}

?>
