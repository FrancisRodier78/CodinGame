<!--
Objectif

Grâce à votre aide, le détective Pikaptcha a une meilleure idée de l'endroit où il s'est fait emprisonné : c'est un labyrinthe spatio-déformé ! Pikaptcha sait que la sortie est invisible et qu'il va devoir cartographier la structure du labyrinthe pour pouvoir s'en sortir.

«C'est l'heure de tester une bonne vieille méthode : suivre un mur et compter le nombre de fois que je passe sur chacune des cases.»
Votre objectif est d'écrire un programme qui retournera pour chaque case du labyrinthe le nombre de fois que Pikaptcha traversera la case en suivant un mur jusqu'à atteindre la case de départ.
wall-following
Parcours en suivant le mur de gauche
  Règles
Le labyrinthe est rempli de 0 et de # ; ici 0 représente un passage et # représente un mur : une case infranchissable.
La position et direction initiale de Pikaptcha sont données dans la grille avec un caractère spécial :

    >: face à la droite
    v: face vers le bas
    <: face à la gauche
    ^: face vers le haut 

Un caractère supplémentaire indique quel mur Pikaptcha va suivre :

    R le mur à sa droite
    L le mur à sa gauche 

On considère qu’une case a au maximum 4 voisins (les cases en diagonale ne sont pas adjacentes).
Vous devez analyser le labyrinthe donné et le retourner avec une petite transformation : pour chaque case vide, au lieu de 0, retournez le nombre de fois que Pikaptcha a traversé cette case pendant sa traversée du labyrinthe, en suivant un mur. Pour chaque case mur, ne changez rien, retournez toujours #.
  Note

N'oubliez pas d'exécuter les tests depuis la fenêtre "Jeu de tests". Chaque test réussi rapporte un certain nombre de points (par exemple 10%).

Attention : les tests fournis et les validateurs utilisés pour le calcul du score sont similaires mais différents (pas de points pour les solutions "hardcodées").

Vous pouvez soumettre autant de solutions que vous le souhaitez. Seule votre meilleure soumission par question sera utilisée pour le classement final.

-->

<?php
<?php
function plusun(&$Ligne, $Y, $X) {
    if ($Ligne[$Y][$X] == '0') {
        $Ligne[$Y][$X] = '1';
    } elseif ($Ligne[$Y][$X] == '1') {
        $Ligne[$Y][$X] = '2';
    } elseif ($Ligne[$Y][$X] == '2') {
        $Ligne[$Y][$X] = '3';
    } elseif ($Ligne[$Y][$X] == '3') {
        $Ligne[$Y][$X] = '4';
    } elseif ($Ligne[$Y][$X] == '4') {
        $Ligne[$Y][$X] = '5';
    } elseif ($Ligne[$Y][$X] == '5') {
        $Ligne[$Y][$X] = '6';
    } elseif ($Ligne[$Y][$X] == '6') {
        $Ligne[$Y][$X] = '7';
    } elseif ($Ligne[$Y][$X] == '7') {
        $Ligne[$Y][$X] = '8';
    } elseif ($Ligne[$Y][$X] == '8') {
        $Ligne[$Y][$X] = '9';
    };
}

/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%d %d", $width, $height);
error_log(var_export($width, true));
error_log(var_export($height, true));
for ($i = 0; $i < $height; $i++) {
    fscanf(STDIN, "%s", $line[$i]);
    error_log(var_export($line[$i], true));
    $saveLine[$i] = $line[$i];
}

fscanf(STDIN, "%s", $side);
error_log(var_export($side, true));

for ($i = 0; $i < $height; $i++) {
    for ($j = 0; $j < $width; $j++) {
        if ($line[$i][$j] != '#' && $line[$i][$j] != '0') {
            $firstPosX = $j;
            $firstPosY = $i;
            //$firstSide = $saveLine[$firstPosY][$firstPosX];
            $posX = $j;
            $posY = $i;
            $saveLine[$firstPosY][$firstPosX] = '0';
        }
    }
    // Write an action using echo(). DON'T FORGET THE TRAILING \n
    // To debug: error_log(var_export($var, true)); (equivalent to var_dump)
}

error_log(var_export($posX, true));
error_log(var_export($posY, true));

do {
    if ($side == 'L') {
        if ($line[$posY][$posX] == '>') {
            $face = 'face à la droite';
            //error_log(var_export($face, true));

            if (isset($line[$posY-1][$posX]) && $line[$posY-1][$posX] == '0') {
                plusun($saveLine, $posY, $posX);

                $line[$posY][$posX] = '0';
                $posY = $posY - 1;
                $line[$posY][$posX] = '^';

                $mvt = 'mvt en haut';
                //error_log(var_export($mvt, true));
            } elseif (isset($line[$posY][$posX+1]) && $line[$posY][$posX+1] == '0') {
                plusun($saveLine, $posY, $posX);

                $line[$posY][$posX] = '0';
                $posX = $posX + 1;
                $line[$posY][$posX] = '>';

                $mvt = 'mvt a droite';
                //error_log(var_export($mvt, true));
            } elseif (isset($line[$posY+1][$posX]) && $line[$posY+1][$posX] == '0') {
                plusun($saveLine, $posY, $posX);

                $line[$posY][$posX] = '0';
                $posY = $posY + 1;
                $line[$posY][$posX] = 'v';

                $mvt = 'mvt en bas';
                //error_log(var_export($mvt, true));
            } elseif (isset($line[$posY][$posX-1]) && $line[$posY][$posX-1] == '0') {
                plusun($saveLine, $posY, $posX);

                $line[$posY][$posX] = '0';
                $posX = $posX - 1;
                $line[$posY][$posX] = '<';

                $mvt = 'mvt à gauche';
                //error_log(var_export($mvt, true));
            }

            for ($i = 0; $i < $height; $i++) {
                //error_log(var_export($saveLine[$i], true));
            }

            for ($i = 0; $i < $height; $i++) {
                //error_log(var_export($line[$i], true));
            }
        } elseif ($line[$posY][$posX] == 'v') {
            $face = 'face vers le bas';
            //error_log(var_export($face, true));
            
            if (isset($line[$posY][$posX+1]) && $line[$posY][$posX+1] == '0') {
                plusun($saveLine, $posY, $posX);

                $line[$posY][$posX] = '0';
                $posX = $posX + 1;
                $line[$posY][$posX] = '>';

                $mvt = 'mvt a droite';
                //error_log(var_export($mvt, true));
            } elseif (isset($line[$posY+1][$posX]) && $line[$posY+1][$posX] == '0') {
                plusun($saveLine, $posY, $posX);

                $line[$posY][$posX] = '0';
                $posY = $posY + 1;
                $line[$posY][$posX] = 'v';

                $mvt = 'mvt en bas';
                //error_log(var_export($mvt, true));
            } elseif (isset($line[$posY][$posX-1]) && $line[$posY][$posX-1] == '0') {
                plusun($saveLine, $posY, $posX);

                $line[$posY][$posX] = '0';
                $posX = $posX - 1;
                $line[$posY][$posX] = '<';

                $mvt = 'mvt à gauche';
                //error_log(var_export($mvt, true));
            } elseif (isset($line[$posY-1][$posX]) && $line[$posY-1][$posX] == '0') {
                plusun($saveLine, $posY, $posX);

                $line[$posY][$posX] = '0';
                $posY = $posY - 1;
                $line[$posY][$posX] = '^';

                $mvt = 'mvt en haut';
                //error_log(var_export($mvt, true));
            }
        } elseif ($line[$posY][$posX] == '<') {
            $face = 'face à la gauche';
            //error_log(var_export($face, true));
            
            if (isset($line[$posY+1][$posX]) && $line[$posY+1][$posX] == '0') {
                plusun($saveLine, $posY, $posX);

                $line[$posY][$posX] = '0';
                $posY = $posY + 1;
                $line[$posY][$posX] = 'v';

                $mvt = 'mvt en bas';
                //error_log(var_export($mvt, true));
            } elseif (isset($line[$posY][$posX-1]) && $line[$posY][$posX-1] == '0') {
                plusun($saveLine, $posY, $posX);

                $line[$posY][$posX] = '0';
                $posX = $posX - 1;
                $line[$posY][$posX] = '<';

                $mvt = 'mvt à gauche';
                //error_log(var_export($mvt, true));
            } elseif (isset($line[$posY-1][$posX]) && $line[$posY-1][$posX] == '0') {
                plusun($saveLine, $posY, $posX);

                $line[$posY][$posX] = '0';
                $posY = $posY - 1;
                $line[$posY][$posX] = '^';

                $mvt = 'mvt en haut';
                //error_log(var_export($mvt, true));
            } elseif (isset($line[$posY][$posX+1]) && $line[$posY][$posX+1] == '0') {
                plusun($saveLine, $posY, $posX);

                $line[$posY][$posX] = '0';
                $posX = $posX + 1;
                $line[$posY][$posX] = '>';

                $mvt = 'mvt a droite';
                //error_log(var_export($mvt, true));
            }
        } elseif ($line[$posY][$posX] == '^') {
            $face = 'face vers le haut';
            //error_log(var_export($face, true));
            
            if (isset($line[$posY][$posX-1]) && $line[$posY][$posX-1] == '0') {
                plusun($saveLine, $posY, $posX);

                $line[$posY][$posX] = '0';
                $posX = $posX - 1;
                $line[$posY][$posX] = '<';

                $mvt = 'mvt à gauche';
                //error_log(var_export($mvt, true));
            } elseif (isset($line[$posY-1][$posX]) && $line[$posY-1][$posX] == '0') {
                plusun($saveLine, $posY, $posX);

                $line[$posY][$posX] = '0';
                $posY = $posY - 1;
                $line[$posY][$posX] = '^';

                $mvt = 'mvt en haut';
                //error_log(var_export($mvt, true));
            } elseif (isset($line[$posY][$posX+1]) && $line[$posY][$posX+1] == '0') {
                plusun($saveLine, $posY, $posX);

                $line[$posY][$posX] = '0';
                $posX = $posX + 1;
                $line[$posY][$posX] = '>';

                $mvt = 'mvt a droite';
                //error_log(var_export($mvt, true));
            } elseif (isset($line[$posY+1][$posX]) && $line[$posY+1][$posX] == '0') {
                plusun($saveLine, $posY, $posX);

                $line[$posY][$posX] = '0';
                $posY = $posY + 1;
                $line[$posY][$posX] = 'v';

                $mvt = 'mvt en bas';
                //error_log(var_export($mvt, true));
            }
        }
    } else { // $side == 'R' 

    }
} while (($firstPosX != $posX) || ($firstPosY != $posY));

for ($i = 0; $i < $height; $i++) {
    echo("$saveLine[$i]\n");
}
?>?>