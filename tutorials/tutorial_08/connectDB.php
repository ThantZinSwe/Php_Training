<?php

$servername = "localhost";
$databasename = "test";
$username = "root";
$password = "password";

try {
    $createDB = new PDO("mysql:host=$servername", $username, $password);
    $createDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS test";
    $createDB->exec($sql);

    $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql2 = 'CREATE TABLE IF NOT EXISTS users( ' .
        'id INT NOT NULL AUTO_INCREMENT, ' .
        'firstname VARCHAR(20) NOT NULL, ' .
        'lastname VARCHAR(20) NOT NULL, ' .
        'email  VARCHAR(50) NOT NULL, ' .
        'phone  VARCHAR(20) NOT NULL, ' .
        'age  INT(3) NOT NULL, ' .
        'primary key ( id ))';

    $conn->exec($sql2);
} catch (PDOException $e) {
    echo "Connection Failed" . $e->getMessage();
}
