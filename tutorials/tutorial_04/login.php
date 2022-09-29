<?php
    session_start();
    
    if(isset($_POST['addSessionButton'])){
        $_SESSION['username'] = "admin";
        $_SESSION['password'] = "password";
        $_SESSION['success'] = "Session add success username is admin and password is password";
    }

    if(isset($_POST['loginButton'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(isset($_SESSION['username']) && isset($_SESSION['password'])){
            if($username == $_SESSION['username'] && $password == $_SESSION['password']){
                header("location:welcome.php");
            }else{
                $_SESSION['error'] = 'Invalid username and password';
            }
        }else{
            $_SESSION['error'] = 'Invalid username and password';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_04 | Login</title>
</head>
<style>
    h1{
        text-align: center;
    }

    .form-wrapper{
        width: 50%;
        margin: 0 auto;
        padding: 30px;
    }

    .form-input{
        margin-top: 20px;
    }
</style>
<body>
    <h1>Tutorial 4 Login</h1>
    <div class="form-wrapper">
        <?php if(isset($_SESSION['success'])) {?>
        <p style="text-align: center; color:green; font-weight:bold;"><?php echo $_SESSION['success'];?></p>
        <?php unset($_SESSION['success']); }?>

        <?php if(isset($_SESSION['error'])) {?>
        <p style="text-align: center; color:red; font-weight:bold;"><?php echo $_SESSION['error'];?></p>
        <?php unset($_SESSION['error']); }?>
        <center>
            <form method="POST">
                <div class="form-input">
                    <label for="username">Username</label>
                    <input type="text" name="username" placeholder="Enter Username">
                </div>

                <div class="form-input">
                    <label for="username">Password</label>
                    <input type="password" name="password" placeholder="Enter password">
                </div>

                <div class="form-input">
                    <button type="submit" name="loginButton" class="login-btn">Login</button>
                    <button type="submit" name="addSessionButton" class="login-btn">Add Session</button>
                </div>
            </form>
        </center>
    </div>
</body>
</html>