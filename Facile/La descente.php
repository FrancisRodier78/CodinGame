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
while (TRUE) {
    $max = 0;
    $imax = 0;
    for ($i = 0; $i < 8; $i++) {
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

