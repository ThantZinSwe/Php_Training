<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_01</title>
</head>
<style>
    .w-blk{
        width: 60px;
        height: 60px;
        background-color: #ffffff;
    }

    .b-blk{
        width: 60px;
        height: 60px;
        background-color: #000;
    }

    table{
        margin-left: auto;
        margin-right: auto;
        border-spacing: 0;
        border: 2px solid #000;
    }
</style>
<body>
    <table>
        <?php
			for($row=1; $row<=8; $row++){
				echo "<tr>";
				for($col=1; $col<=8; $col++){
					$blk = $row + $col;
					if($blk%2 == 0){
						echo "<td class='w-blk'></td>";
					}else{
						echo "<td class='b-blk'></td>";
					}
				}
				echo "</tr>";
			}
        ?>
    </table>
</body>
</html>
