<?php
session_start();
$oldPasswordError = $newPasswordError = $confirmPasswordError = "";
$status = true;
if(isset($_POST['updatePassword'])){
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    if(empty($oldPassword)){
        $oldPasswordError = "Old password is required.";
        $status = false;
    }else{
        $oldPasswordError = "";
    }

    if(empty($newPassword)){
        $newPasswordError = "New password is required.";
        $status = false;
    }else{
        $newPasswordError = "";
    }

    if(empty($confirmPassword)){
        $confirmPasswordError = "Confirm password is required.";
        $status = false;
    }else{
        $confirmPasswordError = "";
    }

    if($status){
        if($oldPassword != $_SESSION['password']){
            $oldPasswordError = "Your password is not match old password";
        }elseif($newPassword != $confirmPassword){
            $confirmPasswordError = "Your password is not match new password";
        }else{
            $_SESSION['password'] = $newPassword;
            $_SESSION['success'] = "Your password update successfully";
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
    <title>Tutorial_10 | Change Password</title>
     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Tutorial 10 | Change Password</h1>
        <div class="row mt-4">
            <div class="col-8 col-md-8 mt-4 offset-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Change Password</h3>
                    </div>

                    <div class="card-body">

                        <?php if(isset($_SESSION['success'])) {?>
                        <p style="text-align: center; color:green; font-weight:bold;"><?php echo $_SESSION['success'];?></p>
                        <?php unset($_SESSION['success']); }?>

                        <form method="POST">

                            <div class="mb-3">
                                <label for="Old Password">Old Password</label>
                                <input type="password" name="oldPassword" class="form-control">

                                <span class="text-danger"><?php echo $oldPasswordError; ?></span>
                            </div>

                            <div class="mb-3">
                                <label for="New Password">New Password</label>
                                <input type="password" name="newPassword" class="form-control">

                                <span class="text-danger"><?php echo $newPasswordError; ?></span>
                            </div>

                            <div class="mb-3">
                                <label for="Confirm Password">Confirm Password</label>
                                <input type="password" name="confirmPassword" class="form-control">

                                <span class="text-danger"><?php echo $confirmPasswordError; ?></span>
                            </div>

                            <div>
                                <button type="submit" name="updatePassword" class="btn btn-primary">Update Password</button>
                                <a href="login.php" class="btn btn-primary float-end">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>