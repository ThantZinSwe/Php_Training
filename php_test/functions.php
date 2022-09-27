<?php declare (strict_types = 1);
function message()
{
    echo "Hello World <br>";
}

message();

function name($name = "Su Su")
{
    echo "My name is $name <br>";
}

name("Aung Aung");
name("Kyaw Kyaw");
name();

function optional($required, $optional = 1)
{
    echo "Require = $required <br>";
    echo "Optional = $optional <br>";
}

optional(10);

function sum($x, $y)
{
    $result = $x + $y;
    return $result;
}

echo "Sum is " . sum(10, 10) . "<br>";

function addFive(&$number)
{
    $number += 5;
}

$num = 3;
addFive($num);
echo "$num <br>";

$global = 5;

function test()
{
    echo "Inside function global variable is $global <br>"; //error
}

test();
echo "Outside function global variable is $global <br><br>";

function test2()
{
    $local = 5;
    echo "Inside function local variable is $local <br>";
}

test2();
echo "Outside function local variable is $local <br>"; //error

function test3()
{
    $x = $GLOBALS['global'];
    echo "Global variable in function $x <br>";
}

test3();

function add($num1, $num2)
{
    return $num1 + $num2;
}

function minus($num1, $num2)
{
    return $num1 - $num2;
}

$calculateFunction = "minus";
echo "$calculateFunction result : " . $calculateFunction(10, 10) . '<br>';

function recursive($c)
{

    if ($c <= 10) {
        echo "Recursive function number is $c <br/>";
        recursive($c + 1);
    }

}

recursive(1);
function strict(float $d, float $e): int
{
    return $d + $e;
}

echo strict(1.5, 2.5);
