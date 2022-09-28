<?php

for ($x = 1; $x <= 6; $x++) {

    for ($y = 1; $y <= (2 * 6) - 1; $y++) {

        if ($y >= 6 - ($x - 1) && $y <= 6 + ($x - 1)) {
            echo '*';
        } else {
            echo '&nbsp;&nbsp';
        }

    }

    echo '<br>';
}

for ($x = 6 - 1; $x >= 1; $x--) {

    for ($y = 1; $y <= (2 * 6) - 1; $y++) {

        if ($y >= 6 - ($x - 1) && $y <= 6 + ($x - 1)) {
            echo '*';
        } else {
            echo '&nbsp;&nbsp';
        }

    }

    echo '<br>';
}
