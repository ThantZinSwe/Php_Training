<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "phptest";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $create_sql = 'CREATE TABLE student( ' .
        'id INT NOT NULL AUTO_INCREMENT, ' .
        'fullname VARCHAR(20) NOT NULL, ' .
        'email  VARCHAR(20) NOT NULL, ' .
        'primary key ( id ))';

    $insert_sql = "INSERT INTO student (fullname, email)
        VALUES ('Kyaw Kyaw', 'kyawkyaw@example.com')";

    $conn->exec($create_sql);
    $conn->exec($insert_sql);
    echo "Table Student created successfully";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
