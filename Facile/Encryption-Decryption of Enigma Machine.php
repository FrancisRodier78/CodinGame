<!--
Objectif
Pendant la Seconde Guerre mondiale, les Allemands utilisaient un code de cryptage appelé Enigma - qui était essentiellement une machine de cryptage qui cryptait les messages à transmettre. Le code Enigma est resté de nombreuses années sans interruption. Voici comment fonctionne la machine de base:

Le premier décalage de César est appliqué en utilisant un nombre incrémentiel:
Si la chaîne est AAA et le numéro de départ est 4, la sortie sera EFG.

A + 4 = E
A + 4 + 1 = F
A + 4 + 1 + 1 = G


Mappez maintenant EFG au premier ROTOR tel que:

ABCDEFGHIJKLMNOPQRSTUVWXYZ
BDFHJLCPRTXVZNYEIWGAKMUSQO

EFG devient donc JLC. Il est ensuite passé à travers 2 autres rotors pour obtenir la valeur finale.

Si le deuxième ROTOR est AJDKSIRUXBLHWTMCQGZNPYFVOE, nous appliquons à nouveau l'étape de substitution ainsi:

ABCDEFGHIJKLMNOPQRSTUVWXYZ
AJDKSIRUXBLHWTMCQGZNPYFVOE

JLC devient donc BHD.

Si le troisième ROTOR est EKMFLGDQVZNTOWYHXUSPAIBRCJ, alors la substitution finale est:

ABCDEFGHIJKLMNOPQRSTUVWXYZ
EKMFLGDQVZNTOWYHXUSPAIBRCJ

BHD devient donc KQF.

La sortie finale est envoyée via l'émetteur radio.
-->

<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/
function Encode($alpha, $pseudoRandomNumber, $rotor, &$message, &$newmessage) {
    $lenmessage = strlen($message);
    for ($i = 0; $i < $lenmessage; $i++) {
        $pos[$i] = stripos($alpha, $message[$i]) + $pseudoRandomNumber + $i;

        $j = $pos[$i];
        while ($j > 25) {
            $j = $j - 26;
        }

        $newmessage[$i] = $alpha[$j];
    }

    for ($j = 0; $j < 3; $j++) {
        for ($i = 0; $i < $lenmessage; $i++) {
            $replace = stripos($alpha, $newmessage[$i]);
            $newrotor = $rotor[$j];
            $newmessage[$i] = $newrotor[$replace];
            $message = implode( '', $newmessage);
        }
    }
};

function Decode($alpha, $pseudoRandomNumber, $rotor, &$message, &$newmessage) {
    $lenmessage = strlen($message);
    for ($j = 2; $j > -1; $j--) {
        for ($i = 0; $i < $lenmessage; $i++) {
            $replace = stripos($rotor[$j], $message[$i]);
            $message[$i] = $alpha[$replace];
        }
    }

    for ($i = 0; $i < $lenmessage; $i++) {
        $pos[$i] = stripos($alpha, $message[$i]) - $pseudoRandomNumber - $i;

        $j = $pos[$i];
        while ($j < 0) {
            $j = $j + 26;
        }

        $newmessage[$i] = $alpha[$j];
    }

};

$operation = stream_get_line(STDIN, 256 + 1, "\n");
fscanf(STDIN, "%d", $pseudoRandomNumber);
$alpha = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
for ($i = 0; $i < 3; $i++) {
    $rotor[$i] = stream_get_line(STDIN, 26 + 1, "\n");
}
$message = stream_get_line(STDIN, 1024 + 1, "\n");

$newmessage = array();

if ($operation == 'ENCODE') {
    Encode($alpha, $pseudoRandomNumber, $rotor, $message, $newmessage);
} else {
    Decode($alpha, $pseudoRandomNumber, $rotor, $message, $newmessage);
};

$message = implode( '', $newmessage);
echo("$message\n");
?>

<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/
$Operation = stream_get_line(STDIN, 256 + 1, "\n");
fscanf(STDIN, "%d", $p );

for ($i = 0; $i < 3; $i++) {
	$rotor[] = str_split(fgets(STDIN))
};

$message = str_split(fgets(STDIN));
$num = range('A', 'Z');
$abc = array_flip($num);

if ($Operation == "ENCODE") {
    foreach($message as $k => $l) $message[$k] = $num[($abc[$l] + $p++) % 26];
    foreach($message as $k => $l) $message[$k] = $rotor[0][$abc[$l]];
    foreach($message as $k => $l) $message[$k] = $rotor[1][$abc[$l]];
    foreach($message as $k => $l) $message[$k] = $rotor[2][$abc[$l]];
} else {
    $rotor[2] = array_flip($rotor[2]);
    $rotor[1] = array_flip($rotor[1]);
    $rotor[0] = array_flip($rotor[0]);
    foreach($message as $k => $l) $message[$k] = $num[$rotor[2][$l]];
    foreach($message as $k => $l) $message[$k] = $num[$rotor[1][$l]];
    foreach($message as $k => $l) $message[$k] = $num[$rotor[0][$l]];
    foreach($message as $k => $l) $message[$k] = $num[($abc[$l] + 2600 - $p++) % 26];
}

echo implode($message) . "\n";
?>