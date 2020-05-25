<!--
Objectif
L'objectif de votre programme est de faire atterrir, sans crash, la capsule "Mars Lander" qui contient le rover Opportunity. La capsule “Mars Lander” permettant de débarquer le rover est pilotée par un programme qui échoue trop souvent dans le simulateur de la NASA.

Notez que ce problème peut sembler difficile, mais en réalité il est simple à résoudre. Ce puzzle constitue le premier des trois niveaux, par conséquent, certains contrôles sont présentés mais ne sont pas nécessaires pour résoudre ce premier niveau.
  Règles

Sous forme de jeu, le simulateur place Mars Lander dans une zone du ciel de Mars.
La zone fait 7000m de large et 3000m de haut.

Pour ce niveau, Mars Lander se situe au dessus de la zone d’atterrissage, en position verticale, avec aucune vitesse initiale.

Il existe une unique zone d'atterrissage plane sur la surface de Mars et elle mesure au moins 1000 mètres de large.
Toutes les secondes, en fonction des paramètres d’entrée (position, vitesse, fuel, etc.), le programme doit fournir le nouvel angle de rotation souhaité ainsi que la nouvelle puissance des fusées de Mars Lander:
Angle de -90° à 90°. Puissance des fusées de 0 à 4.

Pour ce niveau, vous n'avez besoin de contrôler que la puissance des fusées : l'angle doit rester à 0.
Le jeu modélise une chute libre sans atmosphère. La gravité sur Mars est de 3,711 m/s². Pour une puissance des fusées de X, on génère une poussée équivalente à X m/s² et on consomme X litres de fuel. Il faut donc une poussée de 4 quasi verticale pour compenser la gravité de Mars.

Pour qu’un atterrissage soit réussi, la capsule doit :

    atterrir sur un sol plat
    atterrir dans une position verticale (angle = 0°)
    la vitesse verticale doit être limitée ( ≤ 40 m/s en valeur absolue)
    la vitesse horizontale doit être limitée ( ≤ 20 m/s en valeur absolue)


Souvenez-vous que ce puzzle a été simplifié, ainsi :

    la zone d'atterrissage est juste en dessous du robot. Vous pouvez donc ignorer la rotation et toujours indiquer 0 en angle de rotation.
    vous n'avez pas besoin de tenir compte des coordonnées de la surface.
    il vous suffit que votre vitesse d'atterrissage soit entre 0 et 40m/s.
    lorsque la capsule descend vers le sol, la vitesse verticale est négative. Lorsque la capsule s'élève dans les airs, la vitesse verticale est positive.

  Note
Pour ce premier niveau d'introduction, Mars Lander doit passer un unique test.

Les validateurs sont différents des tests mais restent très similaires. Un programme qui passe un test passera le validateur correspondant sans problème.
-->

<!-- Ma solution -->
<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

// $surfaceN: the number of points used to draw the surface of Mars.
fscanf(STDIN, "%d", $surfaceN);
for ($i = 0; $i < $surfaceN; $i++) {
    // $landX: X coordinate of a surface point. (0 to 6999)
    // $landY: Y coordinate of a surface point. By linking all the points together in a sequential fashion, you form the surface of Mars.
    fscanf(STDIN, "%d %d", $landX, $landY);
}

// game loop
while (TRUE) {
    // $hSpeed: the horizontal speed (in m/s), can be negative.
    // $vSpeed: the vertical speed (in m/s), can be negative.
    // $fuel: the quantity of remaining fuel in liters.
    // $rotate: the rotation angle in degrees (-90 to 90).
    // $power: the thrust power (0 to 4).
    fscanf(STDIN, "%d %d %d %d %d %d %d", $X, $Y, $hSpeed, $vSpeed, $fuel, $rotate, $power);

    // Write an action using echo(). DON'T FORGET THE TRAILING \n
    // To debug: error_log(var_export($var, true)); (equivalent to var_dump)
    if ($vSpeed < -39) {
        echo("0 4\n");
    } else {
        echo("0 3\n");
    }
}
?>

<!-- Solution -->
<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%d",
    $surfaceN // the number of points used to draw the surface of Mars.
);
for ($i = 0; $i < $surfaceN; $i++)
{
    fscanf(STDIN, "%d %d",
        $landX, // X coordinate of a surface point. (0 to 6999)
        $landY // Y coordinate of a surface point. By linking all the points together in a sequential fashion, you form the surface of Mars.
    );
}

$maxSpeed = -40;
$height = 100;
$gravity = 3.711;

function landingSpeed($speed, $power, $gravity, $alt) {
    return ceil(sqrt(pow($speed, 2) + 2 * ($gravity - $power) * $alt));
}

// game loop
while (TRUE)
{
    fscanf(STDIN, "%d %d %d %d %d %d %d",
        $X,
        $Y,
        $hSpeed, // the horizontal speed (in m/s), can be negative.
        $vSpeed, // the vertical speed (in m/s), can be negative.
        $fuel, // the quantity of remaining fuel in liters.
        $rotate, // the rotation angle in degrees (-90 to 90).
        $power // the thrust power (0 to 4).
    );

    /*****************************
     * WITH ECONOMIC ACHIEVEMENT *
     * ***************************/

    $alt = $Y - $height;
    $landingSpeed = landingSpeed($vSpeed, 4, $gravity, $alt);
    error_log(var_export($landingSpeed, true));
    
    $thr = floor($vSpeed / ($maxSpeed / 4));
    if ((int)$landingSpeed < abs($maxSpeed)) {
        $thr--;
    }
    
    $thr = ($thr < 0) ? 0 : $thr;
    $thr = ($thr > 4) ? 4 : $thr;
    
    echo("0 $thr\n");
}
?>