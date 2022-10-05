<?php

$servername = "localhost";
$databasename = "test";
$username = "root";
$password = "password";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'CREATE TABLE users( ' .
        'id INT NOT NULL AUTO_INCREMENT, ' .
        'firstname VARCHAR(20) NOT NULL, ' .
        'lastname VARCHAR(20) NOT NULL, ' .
        'email  VARCHAR(50) NOT NULL, ' .
        'phone  VARCHAR(20) NOT NULL, ' .
        'primary key ( id ))';

    $conn->exec($sql);
    echo "Create Table successfully";
} catch (PDOException $e) {
    echo $e->getMessage();
}
