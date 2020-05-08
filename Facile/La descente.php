<!--
Que vais-je apprendre ?

Boucles

Résoudre ce puzzle vous fait comprendre le concept de boucle et comment trouver le maximum d'une liste d'entiers.

Ce puzzle est aussi un terrain de jeu pour tester le concept de tri en utilisant jusqu'à 25 langages de programmation. Enfin il vous fait découvrir la programmation fonctionnelle.

Tutoriels vidéo
▶️ La Descente en Python 3 par Foxxpy

▶️ La Descente en Java par PochyPoch
Ressources externes Tri📖 BouclesLa Descente - Let's Play
Énoncé

Un problème simple pour expérimenter la plateforme CodinGame : votre programme doit trouver la montagne la plus haute parmi une liste de montagnes.
-->

<!-- Ma solution -->
<?php
/**
 * The while loop represents the game.
 * Each iteration represents a turn of the game
 * where you are given inputs (the heights of the mountains)
 * and where you have to print an output (the index of the mountain to fire on)
 * The inputs you are given are automatically updated according to your last actions.
 **/

// game loop
while (TRUE) {
    $max = 0;
    $imax = 0;
    for ($i = 0; $i < 8; $i++) {
        // $mountainH represents the height of one mountain, from 9 to 0. Mountain heights are provided from left to right.
        fscanf(STDIN, "%d", $mountainH);
        
        if ($mountainH > $max) {
            $max = $mountainH;
            $imax = $i;
        }
    }

    echo($imax."\n");
}
?>

<!-- Solution -->
<?php
while (TRUE) {
    for ($i = 0; $i < 8; $i++) {
        $hights[$i] = fgets(STDIN);
    }
    echo array_flip($hights)[max($hights)] . "\n";
}
?>

