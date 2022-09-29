<?php 
    function getAge(){
        if(isset($_POST['calculateAge'])){
            $today = new DateTime(date("Y-m-d"));
            $birthday = new DateTime($_POST['dateOfBirth']);

            if( $today < $birthday){
                return "You are not born yet.";
            }

            $age = $today->diff($birthday);
            return "Your age is $age->y years $age->m months and $age->d days.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_03</title>
</head>
<style>
    h1{
        text-align: center;
    }
    .form-wrapper{
        margin: 0 auto;
        width: 50%;
        padding: 50px;
    }
</style>
<body>
    <h1>Tutorial 3</h1>
    <div class="form-wrapper">
        <center>
            <form method="POST">
                <label for="date of birth">Date of birth</label>
                <input type="date" name="dateOfBirth">
                <button type="submit" name="calculateAge">Calculate Age</button>
            </form>
           <p><?php echo getAge();?></p>
        </center>
    </div>
</body>
</html>