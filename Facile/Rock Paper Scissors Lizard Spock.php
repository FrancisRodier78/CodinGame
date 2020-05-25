<!--
Objectif
An international Rock Paper Scissors Lizard Spock tournament is organized, all players receive a number when they register.

Each player chooses a sign that he will keep throughout the tournament among:
Rock (R)
Paper (P)
sCissors (C)
Lizard (L)
Spock (S)

Scissors cuts Paper
Paper covers Rock
Rock crushes Lizard
Lizard poisons Spock
Spock smashes Scissors
Scissors decapitates Lizard
Lizard eats Paper
Paper disproves Spock
Spock vaporizes Rock
Rock crushes Scissors
and in case of a tie, the player with the lowest number wins (it's scandalous but it's the rule).

Example

4 R \
      1 P \
1 P /      \
             1 P
8 P \      /     \
      8 P /       \
3 R /              \
                     2 L
7 C \              /
      5 S \       /
5 S /      \     /
             2 L
6 L \      /
      2 L /
2 L /

The winner of the tournament is player 2. Before winning, he faced player 6, then player 5 and finally player 1.
-->

<!-- Ma solution -->
<?php
function winner(&$N, &$Tab_NUMPLAYER, &$Tab_SIGNPLAYER, &$Tab_looser)  {
    $j = -1;
    for ($i = 0; $i < $N; $i = $i+2) {
        $j++;
        switch ($Tab_SIGNPLAYER[$i]) {
            case 'R':
                if ($Tab_SIGNPLAYER[$i+1] == 'L' 
                ||  $Tab_SIGNPLAYER[$i+1] == 'C') {
                    $Tab_looser[$Tab_NUMPLAYER[$i]] .= ' '.$Tab_NUMPLAYER[$i+1];
                    $Tab_NUMPLAYER[$j] = $Tab_NUMPLAYER[$i];
                    $Tab_SIGNPLAYER[$j] = $Tab_SIGNPLAYER[$i];
                } elseif ($Tab_SIGNPLAYER[$i+1] == 'R') {
                    if ($Tab_NUMPLAYER[$i] < $Tab_NUMPLAYER[$i+1]) {
                        $Tab_looser[$Tab_NUMPLAYER[$i]] .= ' '.$Tab_NUMPLAYER[$i+1];
                        $Tab_NUMPLAYER[$j] = $Tab_NUMPLAYER[$i];
                    } else {
                        $Tab_looser[$Tab_NUMPLAYER[$i+1]] .= ' '.$Tab_NUMPLAYER[$i];
                        $Tab_NUMPLAYER[$j] = $Tab_NUMPLAYER[$i+1];
                    }

                    $Tab_SIGNPLAYER[$j] = $Tab_SIGNPLAYER[$i+1];
                } else {
                    $Tab_looser[$Tab_NUMPLAYER[$i+1]] .= ' '.$Tab_NUMPLAYER[$i];
                    $Tab_NUMPLAYER[$j] = $Tab_NUMPLAYER[$i+1];
                    $Tab_SIGNPLAYER[$j] = $Tab_SIGNPLAYER[$i+1];
                };

                break;
            case 'P':
                if ($Tab_SIGNPLAYER[$i+1] == 'R' 
                ||  $Tab_SIGNPLAYER[$i+1] == 'S') {
                    $Tab_looser[$Tab_NUMPLAYER[$i]] .= ' '.$Tab_NUMPLAYER[$i+1];
                    $Tab_NUMPLAYER[$j] = $Tab_NUMPLAYER[$i];
                    $Tab_SIGNPLAYER[$j] = $Tab_SIGNPLAYER[$i];
                } elseif ($Tab_SIGNPLAYER[$i+1] == 'P') {
                    if ($Tab_NUMPLAYER[$i] < $Tab_NUMPLAYER[$i+1]) {
                        $Tab_looser[$Tab_NUMPLAYER[$i]] .= ' '.$Tab_NUMPLAYER[$i+1];
                        $Tab_NUMPLAYER[$j] = $Tab_NUMPLAYER[$i];
                    } else {
                        $Tab_looser[$Tab_NUMPLAYER[$i+1]] .= ' '.$Tab_NUMPLAYER[$i];
                        $Tab_NUMPLAYER[$j] = $Tab_NUMPLAYER[$i+1];
                    }

                    $Tab_SIGNPLAYER[$j] = $Tab_SIGNPLAYER[$i+1];
                } else {
                    $Tab_looser[$Tab_NUMPLAYER[$i+1]] .= ' '.$Tab_NUMPLAYER[$i];
                    $Tab_NUMPLAYER[$j] = $Tab_NUMPLAYER[$i+1];
                    $Tab_SIGNPLAYER[$j] = $Tab_SIGNPLAYER[$i+1];
                };

                break;
            case 'C':
                if ($Tab_SIGNPLAYER[$i+1] == 'P' 
                ||  $Tab_SIGNPLAYER[$i+1] == 'L') {
                    $Tab_looser[$Tab_NUMPLAYER[$i]] .= ' '.$Tab_NUMPLAYER[$i+1];
                    $Tab_NUMPLAYER[$j] = $Tab_NUMPLAYER[$i];
                    $Tab_SIGNPLAYER[$j] = $Tab_SIGNPLAYER[$i];
                } elseif ($Tab_SIGNPLAYER[$i+1] == 'C') {
                    if ($Tab_NUMPLAYER[$i] < $Tab_NUMPLAYER[$i+1]) {
                        $Tab_looser[$Tab_NUMPLAYER[$i]] .= ' '.$Tab_NUMPLAYER[$i+1];
                        $Tab_NUMPLAYER[$j] = $Tab_NUMPLAYER[$i];
                    } else {
                        $Tab_looser[$Tab_NUMPLAYER[$i+1]] .= ' '.$Tab_NUMPLAYER[$i];
                        $Tab_NUMPLAYER[$j] = $Tab_NUMPLAYER[$i+1];
                    }

                    $Tab_SIGNPLAYER[$j] = $Tab_SIGNPLAYER[$i+1];
                } else {
                    $Tab_looser[$Tab_NUMPLAYER[$i+1]] .= ' '.$Tab_NUMPLAYER[$i];
                    $Tab_NUMPLAYER[$j] = $Tab_NUMPLAYER[$i+1];
                    $Tab_SIGNPLAYER[$j] = $Tab_SIGNPLAYER[$i+1];
                };

                break;
            case 'L':
                if ($Tab_SIGNPLAYER[$i+1] == 'S' 
                ||  $Tab_SIGNPLAYER[$i+1] == 'P') {
                    $Tab_looser[$Tab_NUMPLAYER[$i]] .= ' '.$Tab_NUMPLAYER[$i+1];
                    $Tab_NUMPLAYER[$j] = $Tab_NUMPLAYER[$i];
                    $Tab_SIGNPLAYER[$j] = $Tab_SIGNPLAYER[$i];
                } elseif ($Tab_SIGNPLAYER[$i+1] == 'L') {
                    if ($Tab_NUMPLAYER[$i] < $Tab_NUMPLAYER[$i+1]) {
                        $Tab_looser[$Tab_NUMPLAYER[$i]] .= ' '.$Tab_NUMPLAYER[$i+1];
                        $Tab_NUMPLAYER[$j] = $Tab_NUMPLAYER[$i];
                    } else {
                        $Tab_looser[$Tab_NUMPLAYER[$i+1]] .= ' '.$Tab_NUMPLAYER[$i];
                        $Tab_NUMPLAYER[$j] = $Tab_NUMPLAYER[$i+1];
                    }

                    $Tab_SIGNPLAYER[$j] = $Tab_SIGNPLAYER[$i+1];
                } else {
                    $Tab_looser[$Tab_NUMPLAYER[$i+1]] .= ' '.$Tab_NUMPLAYER[$i];
                    $Tab_NUMPLAYER[$j] = $Tab_NUMPLAYER[$i+1];
                    $Tab_SIGNPLAYER[$j] = $Tab_SIGNPLAYER[$i+1];
                };

                break;
            case 'S':
                if ($Tab_SIGNPLAYER[$i+1] == 'C' 
                ||  $Tab_SIGNPLAYER[$i+1] == 'R') {
                    $Tab_looser[$Tab_NUMPLAYER[$i]] .= ' '.$Tab_NUMPLAYER[$i+1];
                    $Tab_NUMPLAYER[$j] = $Tab_NUMPLAYER[$i];
                    $Tab_SIGNPLAYER[$j] = $Tab_SIGNPLAYER[$i];
                } elseif ($Tab_SIGNPLAYER[$i+1] == 'S') {
                    if ($Tab_NUMPLAYER[$i] < $Tab_NUMPLAYER[$i+1]) {
                        $Tab_looser[$Tab_NUMPLAYER[$i]] .= ' '.$Tab_NUMPLAYER[$i+1];
                        $Tab_NUMPLAYER[$j] = $Tab_NUMPLAYER[$i];
                    } else {
                        $Tab_looser[$Tab_NUMPLAYER[$i+1]] .= ' '.$Tab_NUMPLAYER[$i];
                        $Tab_NUMPLAYER[$j] = $Tab_NUMPLAYER[$i+1];
                    }

                    $Tab_SIGNPLAYER[$j] = $Tab_SIGNPLAYER[$i+1];
                } else {
                    $Tab_looser[$Tab_NUMPLAYER[$i+1]] .= ' '.$Tab_NUMPLAYER[$i];
                    $Tab_NUMPLAYER[$j] = $Tab_NUMPLAYER[$i+1];
                    $Tab_SIGNPLAYER[$j] = $Tab_SIGNPLAYER[$i+1];
                };

                break;
        }
    }

    $N = $N / 2;
    if ($N == 0.5) {
        $N = 0;
    }
}

fscanf(STDIN, "%d", $N);
$Tab_NUMPLAYER = [];
$Tab_SIGNPLAYER = [];
for ($i = 0; $i < $N; $i++) {
    fscanf(STDIN, "%d %s", $NUMPLAYER, $SIGNPLAYER);
    $Tab_NUMPLAYER[$i] = $NUMPLAYER;
    $Tab_SIGNPLAYER[$i] = $SIGNPLAYER;
}

$M = $N;
$P = 0;
while ($M <> 1) {
    $M = $M/2;
    $P++;
}

$O = $N;
$Tab_looser = array();
for ($i = 1; $i <= $O; $i++) {
    $Tab_looser[$i] = '';
}

for ($j = 0; $j < $P; $j++) {
    winner($N, $Tab_NUMPLAYER, $Tab_SIGNPLAYER, $Tab_looser);

}

echo("$Tab_NUMPLAYER[0]\n");

$i = $Tab_NUMPLAYER[0];
$Tab = trim($Tab_looser[$i]);
echo("$Tab\n");
?>	