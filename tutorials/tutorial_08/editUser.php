<?php
session_start();
include 'connectDB.php';
$firstnameError = $lastnameError = $emailError = $phoneError = "";
$status = true;
if (isset($_POST['updateUser'])) {
    $userID = $_POST['userID'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if (empty($firstname)) {
        $firstnameError = "First Name is required";
        $firstname = "";
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

    if($status){
        try{
            $sql = "UPDATE users set firstname=:firstname,lastname=:lastname,email=:email,phone=:phone
             WHERE id=:userID LIMIT 1";
            
            $statement = $conn->prepare($sql);
            $data = [
                ':firstname' => $firstname,
                ':lastname' => $lastname,
                ':email' => $email,
                ':phone' => $phone,
                ':userID' => $userID,

            ];

            $execute = $statement->execute($data);

            if ($execute) {
                $_SESSION['message'] = "Updated successfully";
                header('Location: index.php');
                exit(0);
            }else {
                $_SESSION['message'] = "Not Updated";
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
    <title>Tutorial_08 | Edit User</title>
    <!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Tutorial 8 | Edit User</h1>
        <div class="row">
            <div class="col-12 col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Tutorial 8 Edit Page
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h3>
                    </div>

                    <div class="card-body">
                        
                        <?php
                            if(isset($_GET['id'])){
                                $userID = $_GET['id'];
                                $sql = "SELECT * from users WHERE id=$userID LIMIT 1";
                                $statement = $conn->prepare($sql);

                                $statement->execute();

                                $user = $statement->fetch(PDO::FETCH_OBJ);
                            }
                        ?>

                        <form method="POST">
                            <input type="hidden" value="<?= $user->id; ?>" name="userID">
                            <div class="mb-3">
                                <label for="firstname">First Name</label>
                                <input type="text" name="firstname" class="form-control" value="<?= $user->firstname; ?>">
                               
                                <span class="text-danger"><?php echo $firstnameError; ?></span>
                            </div>

                            <div class="mb-3">
                                <label for="lastname">Last Name</label>
                                <input type="text" name="lastname" class="form-control" value="<?= $user->lastname; ?>">

                                <span class="text-danger"><?php echo $lastnameError; ?></span>
                            </div>

                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" value="<?= $user->email; ?>">

                                <span class="text-danger"><?php echo $emailError; ?></span>
                            </div>

                            <div class="mb-3">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control" value="<?= $user->phone; ?>">

                                <span class="text-danger"><?php echo $phoneError; ?></span>
                            </div>

                            <div>
                                <button type="submit" name="updateUser"  class="btn btn-primary">Update</button>
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
