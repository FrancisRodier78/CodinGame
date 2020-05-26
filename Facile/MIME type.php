<!--
Objectif
Le type MIME est utilisé dans de nombreux protocoles internet pour associer un type de média (html, image, vidéo, ...) avec le contenu envoyé. Ce type MIME est généralement déduit de l'extension du fichier à transférer.

Vous devez écrire un programme qui permet de détecter le type MIME d'un fichier à partir de son nom.
  Règles
Une table qui associe un type MIME avec une extension de fichier vous est fournie. Une liste de noms de fichier à transférer vous sera aussi fournie et vous devrez déduire pour chacun d'eux, le type MIME à utiliser.

L'extension d'un fichier se définit par la partie du nom qui se trouve après le dernier point qui le compose.
Si l'extension du fichier est présente dans la table d'association (la casse ne compte pas. ex : TXT est équivalent à txt), alors affichez le type MIME correspondant . S'il n'est pas possible de trouver le type MIME associé à un fichier, ou si le fichier n'a pas d'extensions, affichez UNKNOWN.
  Entrées du jeu
Entrée

Ligne 1: Nombre N d’éléments composant la table d'association. 

Ligne 2 : Nombre Q de noms de fichiers à analyser.

N lignes suivantes : Une extension de fichier par ligne et son type MIME correspondant (séparé par un espace).

Q lignes suivantes : Un nom de fichier par ligne.
Sortie
Pour chacun des Q noms de fichiers, afficher sur une ligne le type MIME associé. S'il n'y a pas de correspondance, afficher UNKNOWN.
Contraintes
0 < N < 10000
0 < Q < 10000

    Les extensions de fichiers sont composées d'un maximum de 10 caractères ascii alphanumériques.
    Les type MIME sont composés d'un maximum de 50 caractères ascii alphanumérique et de ponctuations.
    Les noms de fichiers sont composés d'un maximum de 256 caractères ascii alphanumériques et points.
    Il n'y a pas d'espaces dans les noms de fichiers, les extensions et les types MIME.
-->

<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

// $N: Number of elements which make up the association table.
fscanf(STDIN, "%d", $N);

// $Q: Number Q of file names to be analyzed.
fscanf(STDIN, "%d", $Q);

for ($i = 0; $i < $N; $i++) {
    // $EXT: file extension
    // $MT: MIME type.
    fscanf(STDIN, "%s %s", $EXT[$i], $MT[$i]);
    $EXT[$i] = strtolower($EXT[$i]);
}

for ($i = 0; $i < $Q; $i++) {
    $FNAME[$i] = stream_get_line(STDIN, 256 + 1, "\n");// One file name per line.
}

for ($i = 0; $i < $Q; $i++) {
    $trouve = "FALSE";
    $var1 = new SplFileInfo($FNAME[$i]);
    $var2 = strtolower($var1->getExtension());
    for ($j = 0; $j < $N; $j++) {
        // $EXT: file extension
        // $MT: MIME type.
        if ($var2 == $EXT[$j]) {
            echo("$MT[$j]\n");
            $trouve = "TRUE";
        }
    }

    if ($trouve == "FALSE") {
        echo("UNKNOWN\n");
    }
}

// Write an answer using echo(). DON'T FORGET THE TRAILING \n
// To debug: error_log(var_export($var, true)); (equivalent to var_dump)

// For each of the Q filenames, display on a line the corresponding MIME type. If there is no corresponding type, then display UNKNOWN.
?>

<?php
fscanf(STDIN, "%d", $N);
fscanf(STDIN, "%d", $Q);

for($i=0; $i<$N; $i++){
    fscanf(STDIN, "%s %s", $EXT, $MT );
    $m[strtolower($EXT)] = $MT;
}

for($i=0; $i<$Q; $i++){
    $type = strtolower(@pathinfo(stream_get_line(STDIN, 500, "\n"))['extension']);
    echo array_key_exists($type, $m) ? $m[$type] . "\n" : "UNKNOWN\n";
}
?>