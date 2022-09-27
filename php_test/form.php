<?php

if (isset($_POST['submitButton'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    if (empty($name)) {
        $nameError = 'Please enter your name';
    }

    if (empty($password)) {
        $passwordError = 'Please enter password';
    }

    echo ($name . '<br>');
    echo ($password . '<br>');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form</title>
</head>
<body>
  <h1>Form</h1>
  <form method="post">
		<div>
      <label for="name">Name</label>
			<input type="text" name="name">
      <?php if(isset($nameError)) { ?>
        <p style="color: red;"><?php echo $nameError?></p>
        <?php }?>
		</div>

    <div>
      <label for="password">Password</label>
      <input type="password" name="password">
      <?php if(isset($passwordError)) { ?>
        <p style="color: red;"><?php echo $passwordError?></p>
        <?php }?>
    </div>
		<button type="submit" name="submitButton">Submit</button>
  </form>

  <h2>Form External</h2>
  <form action="formExternal.php" method="POST">
    <div>
      <label for="name">Name</label>
			<input type="text" name="name">
		</div>
    <button type="submit" name="submitButton2">Submit</button>
  </form>
</body>
</html>
