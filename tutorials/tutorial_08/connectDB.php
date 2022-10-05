<?php

$servername = "localhost";
$databasename = "test";
$username = "root";
$password = "password";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection Failed" . $e->getMessage();
}
