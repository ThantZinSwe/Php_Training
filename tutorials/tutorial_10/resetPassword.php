<?php
session_start();
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendResetPassword($email){
    $mail = new PHPMailer(true);

    $mail->isSMTP();                                         
    $mail->Host       = 'smtp.gmail.com';               
    $mail->SMTPAuth   = true;                            
    $mail->Username   = 'thantzinswe01@gmail.com';             
    $mail->Password   = 'wvtehntzmrhsdmrr';                 
    $mail->SMTPSecure = "tls";            
    $mail->Port       = 587;                                   

    //Recipients
    $mail->setFrom('thantzinswe01@gmail.com');
    $mail->addAddress($email); 

    //Content
    $mail->isHTML(true);                           
    $mail->Subject = 'Reset Password Notification';
    $email_template = "<h2>Hello</h2>
    <h3>This is your password reset request for your account.</h3><br/><br/>
    <a href='http://localhost:8080/php_training/tutorials/tutorial_10/changePassword.php'>Click me</a>";
    $mail->Body    = $email_template;
    $mail->send();
}

$emailError = "";
$status = true;

if(isset($_POST['resetPassword'])){
    $email = $_POST['email'];

    if (empty($email)) {
        $emailError = "Email is required";
        $status = false;
    } else {
        $emailError = "";
    }

    if($status){
        sendResetPassword($email);
        $_SESSION['success'] = "Reset password link send your email successfully.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_10 | Reset Password</title>
     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Tutorial 10 | Reset Password</h1>
        <div class="row mt-4">
            <div class="col-8 col-md-8 mt-4 offset-2">

                <?php if(isset($_SESSION['success'])) {?>
                        <p style="text-align: center; color:green; font-weight:bold;"><?php echo $_SESSION['success'];?></p>
                <?php unset($_SESSION['success']); }?>

                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Reset Password</h3>
                    </div>

                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control">

                                <span class="text-danger"><?php echo $emailError; ?></span>
                            </div>

                            <div>
                                <button type="submit" name="resetPassword" class="btn btn-primary">Send Password Reset Link</button>
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