<?php
include "connectDB.php";
    try{
        $sql = "SELECT age,COUNT(age) as countAge 
            FROM users
            group by age";
        $statement = $conn->prepare($sql);

        $statement->execute();
        $users = $statement->fetchAll((PDO::FETCH_OBJ));

        if($users){
            foreach($users as $user){
                $age[] = 'Age - ' .$user->age;
                $countAge[] = $user->countAge;
            }
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_09</title>
    <!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<style>
    .chart{
        width: 50%;
        margin: 0 auto;
    }
</style>
<body>
    <h1 class="text-center">Tutorial 9 | Bar Chart</h1>
    <div class="chart mt-5">
        <a href="index.php" class="btn btn-danger float-end">Back</a>
        <canvas id="myChart"></canvas>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>

    <script>
        const labels = <?php echo json_encode($age); ?>

        const data = {
            labels: labels,
            datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: <?php echo json_encode($countAge); ?>,
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {}
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</body>
</html>