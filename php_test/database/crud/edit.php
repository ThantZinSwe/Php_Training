<?php
session_start();
include 'connectdb.php';
if(isset($_POST['updateButton'])){
	$studentID = $_POST['studentID'];
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];

	try {	
			$sql = "UPDATE student set fullname=:fullname, email=:email WHERE id=:studentID LIMIT 1";
			$statment = $conn->prepare($sql);
			$data = [
					':fullname' => $fullname,
					':email' => $email,
					':studentID' => $studentID,
			]; 
			$execute = $statment->execute($data);
			if ($execute) {
					$_SESSION['message'] = "Updated successfully";
					header('Location: index.php');
					exit(0);
			}else {
					$_SESSION['message'] = "Not Updated";
					header('Location: index.php');
					exit(0);
			}
	} catch (PDOException $e) {
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
	<title>PHP CRUD Edit & Update</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-4">
				<div class="card">
					<div class="card-header">
						<h3>Edit and Update Page
							<a href="index.php" class="btn btn-danger float-end">Back</a>
						</h3>
					</div>

					<div class="card-body">
						<?php
							if(isset($_GET['id'])){
								$studentID = $_GET['id'];
								$sql = "SELECT * from student WHERE id=:studentID LIMIT 1";
								$statment = $conn->prepare($sql);
								$data = [
									':studentID' => $studentID,
								];
								$statment->execute($data);
								$student = $statment->fetch(PDO::FETCH_OBJ);
							}
						?>
						<form action="" method="post">
							<input type="hidden" value="<?= $student->id;?>" name="studentID">
							<div class="mb-3">
								<label for="fullname">Full Name</label>
								<input type="text" name="fullname" class="form-control" value="<?= $student->fullname;?>">
							</div>

							<div class="mb-3">
								<label for="fullname">Email</label>
								<input type="text" name="email" class="form-control" value="<?= $student->email;?>">
							</div>

							<div class="mb-3">
								<button type="submit" name="updateButton" class="btn btn-primary">Update</button>
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
