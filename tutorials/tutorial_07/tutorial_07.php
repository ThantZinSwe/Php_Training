<?php
include "phpqrcode/qrlib.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_07</title>
    <!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<style>
    .form{
        width: 50%;
        margin: 0 auto;
    }
</style>
<body>
    <h1 class="text-center">Tutorial 7</h1>
    <div class="form">
        <form method="POST">
            <div class="mb-3">
                <label for="QR Code data" class="form-label">QR Code Data</label>
                <input type="text" class="form-control" name="data">
            </div>

            <div>
                <button type="submit" class="btn btn-primary" name="generate">QR Code Generate</button>
            </div>
        </form>
        <?php
            if(isset($_POST['generate'])){
                $data = $_POST['data'];
            
                $path = "qrcode/";
                $file = $path . uniqid() . ".png";
                
                QRcode::png($data,$file,'L',5,2);

                echo "<center><img src='".$file."' /></center>";
            }
        ?>
    </div>
</body>
</html>