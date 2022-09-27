<?php
$realPassword = "password123";
$hashPassword = password_hash($realPassword, PASSWORD_DEFAULT);
echo "Hash Password is $hashPassword <br>";

if (isset($_POST['checkButton'])) {
    $password = $_POST['password'];

    if (password_verify($password, $hashPassword)) {
        echo "Same Password <br>";
    } else {
        echo "Incorrect Password";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Password Encryption</title>
</head>
<body>
	<form method="POST">
		<label for="password">Password</label>
		<input type="text" name="password" placeholder="Password is password123">
		<button type="submit" name="checkButton">Check</button>
	</form>
</body>
</html>
