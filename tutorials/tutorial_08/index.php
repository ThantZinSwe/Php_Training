<?php
session_start();
include "connectDB.php";
if(isset($_POST['deleteUser'])){
    $userID = $_POST['deleteUser'];
    try{
        $sql = "DELETE from users WHERE id=:userID";
        $statement = $conn->prepare($sql);
        $execute = $statement->execute([":userID" => $userID]);

        if ($execute) {
            $_SESSION['message'] = "Deleted successfully";
            header('Location: index.php');
            exit(0);
        } else {
            $_SESSION['message'] = "Not Deleted";
            header('Location: index.php');
            exit(0);
        }

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_08 | Index</title>
    <!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Tutorial 8 | Index</h1>
        <div class="row">
            <div class="col-12 col-md-12 mt-4">

                <?php if(isset($_SESSION['message'])) : ?>
					<h5 class="alert alert-success"><?= $_SESSION['message'];?></h5>
				<?php 
					unset($_SESSION['message']); 
					endif; 
				?>

                <div class="card">
                    <div class="card-header">
                        <h3>Tutorial 8 CRUD
                            <a href="createUser.php" class="btn btn-primary float-end">Create User</a>
                        </h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th></th>
                                <th></th>
                            </tr>

                            <tbody>
                                <?php
                                    $sql = "SELECT * from users";
                                    $statement = $conn->prepare($sql);

                                    $statement->execute();

                                    $users = $statement->fetchAll(PDO::FETCH_OBJ);

                                    if($users){
                                        foreach($users as $user){
                                            ?>
                                            <tr>
                                                <td><?= $user->id; ?></td>
                                                <td><?= $user->firstname; ?></td>
                                                <td><?= $user->lastname; ?></td>
                                                <td><?= $user->email; ?></td>
                                                <td><?= $user->phone; ?></td>
                                                <td>
                                                    <a href="editUser.php?id=<?= $user->id; ?>" class="btn btn-primary">Edit</a>
                                                </td>
                                                <td>
                                                    <form method="POST">
                                                        <button type="submit" class="btn btn-danger" name="deleteUser" value="<?= $user->id; ?>">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }else{
                                        ?>
                                        <tr>
                                            <td colspan="5">No Users</td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
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