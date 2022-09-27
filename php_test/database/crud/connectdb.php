<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "phptest";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connection Success";
} catch (PDOException $e) {
    echo "Connection Failed" . $e->getMessage();
}
