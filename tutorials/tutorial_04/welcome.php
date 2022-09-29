<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_04 | Welcome</title>
</head>
<style>
    div{
        text-align: center;
    }
</style>
<body>
    <div>
        <h1>Tutorial 4 | Welcome <?php echo $_SESSION['username']; ?></h1>
        Click here to <a href="logout.php">logout</a>
    </div>
</body>
</html>