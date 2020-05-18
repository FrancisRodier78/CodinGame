<!--
Objectif
Dans les gares et aéroports on croise souvent ce type d'écran :
Vous êtes-vous demandé comment il serait possible de simuler cet affichage dans un bon vieux terminal ? Nous oui : avec l'art ASCII !
  Règles

L'art ASCII permet de représenter des formes en utilisant des caractères. Dans notre cas, ces formes sont précisément des mots. Par exemple, le mot "MANHATTAN" pourra être affiché ainsi en art ASCII :
 
# #  #  ### # #  #  ### ###  #  ###
### # # # # # # # #  #   #  # # # #
### ### # # ### ###  #   #  ### # #
# # # # # # # # # #  #   #  # # # #
# # # # # # # # # #  #   #  # # # #
 

​Votre mission : Ecrire un programme capable d'afficher une ligne de texte en art ASCII dans un style qui vous est fourni en entrée.
  Entrées du jeu
Entrée

Ligne 1 : la largeur L d'une lettre représentée en art ASCII. Toutes les lettres font la même largeur.

Ligne 2 : la hauteur H d'une lettre représentée en art ASCII. Toutes les lettres font la même hauteur.

Ligne 3 : La ligne de texte T, composée de N caractères ASCII

Lignes suivantes : La chaîne de caractères ABCDEFGHIJKLMNOPQRSTUVWXYZ? représentée en art ASCII.
Sortie
Le texte T en art ASCII.
Les caractères de a à z seront affichés en art ASCII par leur équivalent en majuscule.
Les caractères qui ne sont pas dans les intervales [a-z] ou [A-Z], seront affichés par le point d'interrogation en art ASCII.
Contraintes
0 < L < 30
0 < H < 30
0 < N < 200
-->

<!-- Ma solution -->
<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%d", $L);
fscanf(STDIN, "%d", $H);
$T = stream_get_line(STDIN, 256 + 1, "\n");
for ($i = 0; $i < $H; $i++) {
    $ROW[$i] = stream_get_line(STDIN, 1024 + 1, "\n");
}

// Write an answer using echo(). DON'T FORGET THE TRAILING \n
// To debug: error_log(var_export($var, true)); (equivalent to var_dump)

$tabAlp = ['a' => 0, 'b' => 1, 'c' => 2, 'd' => 3, 'e' => 4,
            'f' => 5, 'g' => 6, 'h' => 7, 'i' => 8, 'j' => 9,
            'k' => 10, 'l' => 11, 'm' => 12, 'n' => 13, 'o' => 14,
            'p' => 15, 'q' => 16, 'r' => 17, 's' => 18, 't' => 19,
            'u' => 20, 'v' => 21, 'w' => 22, 'x' => 23, 'y' => 24,
            'z' => 25,
            'A' => 0, 'B' => 1, 'C' => 2, 'D' => 3, 'E' => 4,
            'F' => 5, 'G' => 6, 'H' => 7, 'I' => 8, 'J' => 9,
            'K' => 10, 'L' => 11, 'M' => 12, 'N' => 13, 'O' => 14,
            'P' => 15, 'Q' => 16, 'R' => 17, 'S' => 18, 'T' => 19,
            'U' => 20, 'V' => 21, 'W' => 22, 'X' => 23, 'Y' => 24,
            'Z' => 25,];

for ($j = 0; $j < strlen($T); $j++) {
    $trouve = FALSE;
    foreach ($tabAlp  as $key => $value) {
        if ($key == $T[$j]) {
            $trouve = TRUE;
            for ($i = 0; $i < $H; $i++) {
              $tab[$i] = substr($ROW[$i], $L * $value, $L);
              $result[$i] = $result[$i].$tab[$i];
            }
        }
    }

    if ($trouve == FALSE) {
        for ($i = 0; $i < $H; $i++) {
            $tab[$i] = substr($ROW[$i], $L * 26, $L);
            $result[$i] = $result[$i].$tab[$i];
        }
    }
}

for ($i = 0; $i < $H; $i++) {
    echo("$result[$i]\n");
}
?>

<!-- Solution -->
<?
fscanf(STDIN, "%d", $L);
fscanf(STDIN, "%d", $H);
$T = str_split(strtoupper(trim(fgets(STDIN))));
for ($i=0; $i<$H; $i++) {
    $ROW = fgets(STDIN);
    foreach($T as $c)     {
        $m = ctype_alpha($c)? ord($c)-65 : 26;
        echo substr($ROW,$m*$L,$L);
    }
    echo "\n";
}