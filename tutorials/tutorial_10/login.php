<?php
    session_start();

    if(isset($_POST['addDefault'])){
        $_SESSION['email'] = "admin@gmail.com";
        $_SESSION['password'] = "password";
        $_SESSION['success'] = "Session add success email is admin@gmail.com and password is password";
    }

    $emailError = $passwordError = "";
    $status = true;

    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email)) {
            $emailError = "Email is required";
            $status = false;
        } else {
            $emailError = "";
        }

        if (empty($password)) {
            $passwordError = "Password is required";
            $status = false;
        } else {
            $passwordError = "";
        }

        if($status){
            if(isset($_SESSION['email']) && isset($_SESSION['password'])){
                if($email == $_SESSION['email'] && $password == $_SESSION['password']){
                    header("location:../tutorial_08/index.php");
                }else{
                    $_SESSION['error'] = 'Invalid email and password';
                }
            }else{
                $_SESSION['error'] = 'Invalid email and password';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_10 | Login</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Tutorial 10 | Login</h1>
        <div class="row mt-4">
            <div class="col-8 col-md-8 mt-4 offset-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Login Page</h3>
                    </div>

                    <div class="card-body">

                    <?php if(isset($_SESSION['success'])) {?>
                    <p style="text-align: center; color:green; font-weight:bold;"><?php echo $_SESSION['success'];?></p>
                    <?php unset($_SESSION['success']); }?>

                    <?php if(isset($_SESSION['error'])) {?>
                        <p style="text-align: center; color:red; font-weight:bold;"><?php echo $_SESSION['error'];?></p>
                    <?php unset($_SESSION['error']); }?>

                        <form method="POST">
                            <div class="mb-3">
                                <label for="Email">Email</label>
                                <input type="text" name="email" class="form-control">

                                <span class="text-danger"><?php echo $emailError; ?></span>
                            </div>

                            <div class="mb-3">
                                <label for="lastname">Password</label>
                                <input type="password" name="password" class="form-control">

                                <span class="text-danger"><?php echo $passwordError; ?></span>
                            </div>

                            <div>
                                <button type="submit" name="login"  class="btn btn-primary">Login</button>
                                <button type="submit" name="addDefault"  class="btn btn-primary">Add Default user and password</button>
                                <a href="resetPassword.php" class="float-end">Forgot Your Password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <p class="text-center text-danger">Please click <b>Add Default user and password</b> at first time for add session.</p>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>