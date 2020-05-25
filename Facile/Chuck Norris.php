<!--
Objectif

Le binaire avec des 0 et des 1 c'est bien. Mais le binaire avec que des 0, ou presque, c'est encore mieux. A l'origine, c'est un concept inventé par Chuck Norris pour envoyer des messages dits unaires.

Ecrivez un programme qui, à partir d'un message en entrée, affiche le message codé façon Chuck Norris en sortie.
  Règles

Voici le principe d'encodage :

    Le message en entrée est constitué de caractères ASCII (7 bits)
    Le message encodé en sortie est constitué de blocs de 0
    Un bloc est séparé d'un autre bloc par un espace
    Deux blocs consécutifs servent à produire une série de bits de même valeur (que des 1 ou que des 0) :
    - Premier bloc : il vaut toujours 0 ou 00. S'il vaut 0 la série contient des 1, sinon elle contient des 0
    - Deuxième bloc : le nombre de 0 dans ce bloc correspond au nombre de bits dans la série

  Exemple

Prenons un exemple simple avec un message constitué d'un seul caractère : C majuscule. C en binaire vaut 1000011 ce qui donne avec la technique de Chuck Norris :

    0 0 (la première série composée d'un seul 1)
    00 0000 (la deuxième série composée de quatre 0)
    0 00 (la troisième série composée de deux 1)

C vaut donc : 0 0 00 0000 0 00
 

Deuxième exemple, nous voulons encoder le message CC (soit les 14 bits 10000111000011) :

    0 0 (un seul 1)
    00 0000 (quatre 0)
    0 000 (trois 1)
    00 0000 (quatre 0)
    0 00 (deux 1)

CC vaut donc : 0 0 00 0000 0 000 00 0000 0 00
-->

<!-- Ma solution -->
<?php
$MESSAGE = stream_get_line(STDIN, 100 + 1, "\n");
    $longueur=strlen($MESSAGE);
    $chaine = '';
    for($i=0;$i<$longueur;$i++) {
        $var = decbin(ord($caractere=substr($MESSAGE,$i,1)));
        if(strlen($var) == 6) {
            $var = '0' . $var;
        }
        $chaine = $chaine.$var;
    }

    $longueur=strlen($chaine);
    $answer = '';
    $prec = '-1';
    $j = 0;
    for($i=0;$i<$longueur;$i++) {
        if ($chaine[$i] == 1) {
            if ($prec == 1) {
                $answer = $answer . '0';
            } elseif ($prec == -1) {
                $answer = $answer . '0 0';
            } else {
                $answer = $answer . ' 0 0';
            }
            $prec = 1;
        } else { //$chaine[$i] == 0
            if ($prec == 0) {
                $answer = $answer . '0';
            } elseif ($prec == -1) {
                $answer = $answer . '00 0';
            } else {
                $answer = $answer . ' 00 0';
            }
            $prec = 0;
        }
    }

    echo("$answer\n");
?>

<!--Solution -->
<?php
$message    = stream_get_line(STDIN, 100 + 1, "\n");
$binMessage = null;

for ($i = 0, $c = strlen($message); $i < $c; $i++) {
    $binMessage .= (string) str_pad(decbin(ord($message[$i])), 7, '0', STR_PAD_LEFT);    
}   

$outMessage = trim(preg_replace(
    array('/(0{1,})/', '/(1{1,})/', '/1/'), 
    array('00 $1 ', '0 $1 ', '0'), 
    $binMessage
));

echo($outMessage."\n");
?>