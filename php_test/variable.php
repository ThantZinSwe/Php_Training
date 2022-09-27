<?php
$txt = "Hello world";
$x = 5;
$y = 5.5;
$changeY = (int) $y;
$fruits = ["Banana", "Apple", "Mango"];
$a = true;
$b = null;
echo $txt . '<br>' . $x . '<br>';
echo strlen($txt) . '<br>';
echo str_word_count($txt) . '<br>';
echo strrev($txt) . '<br>';
echo strpos($txt, "world") . '<br>';

var_dump($txt);
echo '<br>';

var_dump($x);
echo '<br>';
var_dump(is_int($x));
echo '<br>';

var_dump($y);
echo '<br>';
var_dump(is_int($y));
echo '<br>';

var_dump($changeY);
echo '<br>';

var_dump($fruits);
echo '<br>' . count($fruits) . '<br>';

var_dump($a);
echo '<br>';

var_dump($b);
echo '<br>';

define("GREETING", "Welcome");
echo GREETING . '<br>';

echo min(0, 100, 20, -10) . '<br>';
echo max(0, 100, 20, -10) . '<br>';
echo sqrt(100) . '<br>';
echo abs(-10) . '<br>';
echo round(10.5) . '<br>';
echo rand(0, 100) . '<br>';

sort($fruits);
$fruitLength = count($fruits);

for ($i = 0; $i < $fruitLength; $i++) {
    echo $fruits[$i];
    echo "<br>";
}

rsort($fruits);

for ($i = 0; $i < $fruitLength; $i++) {
    echo $fruits[$i];
    echo "<br>";
}

$ages = ["Aung Aung" => 20, "Kyaw Kyaw" => 30, "Su Su" => 18];
asort($ages);

foreach ($ages as $age => $ageVAL) {
    echo "Key=" . $age . "Value=" . $ageVAL . '<br>';
}

echo '<br>';
arsort($ages);

foreach ($ages as $age => $ageVAL) {
    echo "Key=" . $age . "Value=" . $ageVAL . '<br>';
}

echo '<br>';
ksort($ages);

foreach ($ages as $age => $ageVAL) {
    echo "Key=" . $age . "Value=" . $ageVAL . '<br>';
}

echo '<br>';
krsort($ages);

foreach ($ages as $age => $ageVAL) {
    echo "Key=" . $age . "Value=" . $ageVAL . '<br>';
}
