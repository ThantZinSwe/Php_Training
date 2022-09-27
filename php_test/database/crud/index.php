<?php 
session_start();
include 'connectdb.php';
if (isset($_POST['deleteButton'])) {
		$studentID = $_POST['deleteButton'];
		try {
				$sql = "DELETE from student WHERE id=:studentID";
				$statment = $conn->prepare($sql);
				$execute = $statment->execute([':studentID'=>$studentID]);

				if ($execute) {
					$_SESSION['message'] = "Deleted successfully";
					header('Location: index.php');
					exit(0);
				} else {
						$_SESSION['message'] = "Not Deleted";
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
	<title>PHP CRUD Index</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-4">

				<?php if(isset($_SESSION['message'])) : ?>
					<h5 class="alert alert-success"><?= $_SESSION['message'];?></h5>
				<?php 
					unset($_SESSION['message']); 
					endif; 
				?>

				<div class="card">
					<div class="card-header">
						<h3>PHP CRUD
							<a href="create.php" class="btn btn-primary float-end">Create Student</a>
						</h3>
					</div>

					<div class="card-body">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Fullname</th>
									<th>Email</th>
									<th></th>
									<th></th>
								</tr>
							</thead>

							<tbody>
								<?php 
									$sql = 'SELECT * from student';
									$statment = $conn->prepare($sql);
									$statment->execute();
									$students = $statment->fetchAll(PDO::FETCH_OBJ);
									if($students){
										foreach($students as $student){
											?>
											<tr>
												<td><?= $student->id; ?></td>
												<td><?= $student->fullname; ?></td>
												<td><?= $student->email; ?></td>
												<td>
													<a href="edit.php?id=<?= $student->id;?>" class="btn btn-primary">Edit</a>
												</td>
												<td>
													<form action="" method="POST">
														<button type="submit" class="btn btn-danger" name="deleteButton" value="<?= $student->id?>">Delete</button>
													</form>
												</td>
											</tr>
											<?php
										}
									}else{
										?>
										<tr>
											<td class="colspan=3">No Students</td>
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
