<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_02</title>
</head>
<body>
    <div style="text-align: center;">
    <h1>Tutorial 2</h1>
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
    ?>
    </div>
</body>
</html>
