<?php
session_start();

if (isset($_POST['submit'])) {
    $folderName = $_POST['folderName'];

    $currentPath = __DIR__ . '/' . $folderName;

    if (!is_dir($currentPath)) {
        mkdir($currentPath, true);
    }
    
    $image = uniqid(). $_FILES['image']['name'];
    $imageTmp = $_FILES['image']['tmp_name'];
    $fileExt = explode('.',$image);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = ['jpg','jpeg','png','gif'];

    if(in_array($fileActualExt,$allowed)){
        move_uploaded_file($imageTmp, "$folderName/" . $image);
        $_SESSION['success'] = "Folder and image create success";
    }else{
        $_SESSION['error'] = "Invalid file.Please upload only (.jpeg,.jpg,.png,.gif)";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_06</title>
    <!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<style>
    form{
        width: 50%;
        margin: 0 auto;
    }
</style>
<body>
    <h1 style="text-align: center;">Tutorial 6</h1>
    <div class="form">
        <?php if(isset($_SESSION['success'])) {?>
            <p class="fw-bold text-success text-center"><?php echo $_SESSION['success'];?></p>
        <?php unset($_SESSION['success']); }?>

        <?php if(isset($_SESSION['error'])) {?>
            <p class="fw-bold text-danger text-center"><?php echo $_SESSION['error'];?></p>
        <?php unset($_SESSION['error']); }?>

        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="Folder Name" class="form-label">Folder Name</label>
                <input class="form-control" type="text" name="folderName">
            </div>

            <div class="mb-3">
                <label for="Image" class="form-label">Image</label>
                <input class="form-control" type="file" name="image">
            </div>

            <div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>
