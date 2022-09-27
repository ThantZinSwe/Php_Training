<?php
$dayName = date('D');

if ($dayName == "Sun") {
    echo 'Today is Offday' . '<br>';
} elseif ($dayName == "Tue") {
    echo 'Today is so Busyday' . '<br>';
} else {
    echo 'Today is Busyday' . '<br>';
}

$operator = '*';

switch ($operator) {
    case '+';
        echo "Plus operator" . '<br>';
        break;

    case '-';
        echo "Minus operator" . '<br>';
        break;

    case '*';
        echo "Multiple operator" . '<br>';
        break;

    case '/';
        echo "Divison operator" . '<br>';
        break;
}

$x = 5;
$y = 10;
echo ++$x . '<br>';
echo ($x <=> $y) . '<br>';

$x = 10;
$y = 10;
echo ($x <=> $y) . '<br>';

$x = 20;
$y = 10;
echo ($x <=> $y) . '<br>';
echo $x++ . '<br>';

echo $status = (empty($user)) ? 'anonymous' : 'logged in';
echo '<br>';

$user = "Aung Aung";
echo $status = empty($user) ? 'anonymous' : 'logged in';
echo '<br>';

echo $color = $color ?? "red";
echo '<br>';

$color = "blue";
echo $color = $color ?? "red";
echo '<br>';

for ($n = 0; $n <= 10; $n++) {
    echo "The numbers is $n <br>";
}

$fruits = ["Apple", "Banana", "Mango"];

foreach ($fruits as $fruit) {
    echo $fruit . '<br>';
}

$x = 1;

while ($x <= 10) {
    echo "The number is $x <br>";
    $x++;
}

$x = 6;

do {
    echo "The number is: $x <br>";
    $x++;
} while ($x <= 5);

for ($y = 1; $y <= 5; $y++) {

    if ($y == 5) {
        break;
    }

    echo "The number is $y <br>";
}

for ($y = 1; $y <= 5; $y++) {

    if ($y == 5) {
        continue;
    }

    echo "The number is $y <br>";
}
