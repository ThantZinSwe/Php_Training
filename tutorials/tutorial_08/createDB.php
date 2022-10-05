<?php

$servername = "localhost";
$username = "root";
$password = "password";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE test";

    $conn->exec($sql);
    echo "Database create successfully";
} catch (PDOException $e) {
    echo $e->getMessage();
}
