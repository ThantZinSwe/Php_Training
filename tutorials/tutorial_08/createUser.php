<?php
session_start();
include 'connectDB.php';
$firstnameError = $lastnameError = $emailError = $phoneError  = $ageError = "";
$status = true;
if (isset($_POST['createUser'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];

    if (empty($firstname)) {
        $firstnameError = "First Name is required";
        $status = false;
    } else {
        $firstnameError = "";
    }

    if (empty($lastname)) {
        $lastnameError = "Last Name is required";
        $status = false;
    } else {
        $lastnameError = "";
    }

    if (empty($email)) {
        $emailError = "Email is required";
        $status = false;
    } else {
        $emailError = "";
    }

    if (empty($phone)) {
        $phoneError = "Phone is required";
        $status = false;
    } else {
        $phoneError = "";
    }

    if (empty($age)) {
        $ageError = "Age is required";
        $status = false;
    } else {
        $ageError = "";
    }

    if($status){
        try{
            $sql = "INSERT INTO users (firstname,lastname,email,phone,age) VALUES 
             (:firstname,:lastname,:email,:phone,:age)";

             $statement = $conn->prepare($sql);

             $data = [
                ':firstname' => $firstname,
                ':lastname' => $lastname,
                ':email' => $email,
                ':phone' => $phone,
                ':age' => $age,
             ];

             $execute = $statement->execute($data);

             if($execute){
                $_SESSION['message'] = "Created successfully";
                header('Location: index.php');
                exit(0);
             }else{
                $_SESSION['message'] = "Not Created";
                header('Location: index.php');
                exit(0);
             }
        }catch(PDOException $e){
            echo $e->getMessage();
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
    <title>Tutorial_08 | Create User</title>
    <!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Tutorial 8 | Create User</h1>
        <div class="row">
            <div class="col-12 col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Tutorial 8 Create Page
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h3>
                    </div>

                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="firstname">First Name</label>
                                <input type="text" name="firstname" class="form-control">
                               
                                <span class="text-danger"><?php echo $firstnameError; ?></span>
                            </div>

                            <div class="mb-3">
                                <label for="lastname">Last Name</label>
                                <input type="text" name="lastname" class="form-control">

                                <span class="text-danger"><?php echo $lastnameError; ?></span>
                            </div>

                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control">

                                <span class="text-danger"><?php echo $emailError; ?></span>
                            </div>

                            <div class="mb-3">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control">

                                <span class="text-danger"><?php echo $phoneError; ?></span>
                            </div>

                            <div class="mb-3">
                                <label for="age">Age</label>
                                <input type="text" name="age" class="form-control">

                                <span class="text-danger"><?php echo $ageError; ?></span>
                            </div>

                            <div>
                                <button type="submit" name="createUser"  class="btn btn-primary">Create</button>
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
