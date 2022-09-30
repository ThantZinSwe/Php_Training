<?php
require "vendor/autoload.php";

$csvFile = "file.csv";
$excelFile = "file.xlsx";

// CSV File
$readCsv = fopen($csvFile, 'r');
$data = fgetcsv($readCsv, 1000, ",");
$resultData = [];

while (($data = fgetcsv($readCsv, 1000, ',')) !== false) {
    $resultData[] = $data;
}
fclose($readCsv);

// Excel File
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$spreedsheet = $reader->load($excelFile);
$worksheet = $spreedsheet->getActiveSheet()->protectCells('A1',false);


// Txt File
$readTxt = fopen("file.txt", 'r') or die("There is problem");
$txt =  fread($readTxt, filesize("file.txt"));
fclose($readTxt);

// Doc File
function readWord($filename) {
    if(file_exists($filename))
    {
        if(($fh = fopen($filename, 'r')) !== false ) 
        {
           $headers = fread($fh, 0xA00);
  
           // 1 = (ord(n)*1) ; Document has from 0 to 255 characters
           $n1 = ( ord($headers[0x21C]) - 1 );
  
           // 1 = ((ord(n)-8)*256) ; Document has from 256 to 63743 characters
           $n2 = ( ( ord($headers[0x21D]) - 8 ) * 256 );
  
           // 1 = ((ord(n)*256)*256) ; Document has from 63744 to 16775423 characters
           $n3 = ( ( ord($headers[0x21E]) * 256 ) * 256 );
  
           // 1 = (((ord(n)*256)*256)*256) ; Document has from 16775424 to 4294965504 characters
           $n4 = ( ( ( ord($headers[0x21F]) * 256 ) * 256 ) * 256 );
  
           // Total length of text in the document
           $textLength = ($n1 + $n2 + $n3 + $n4);
  
           $extracted_plaintext = fread($fh, $textLength);
  
           // if you want to see your paragraphs in a new line, do this
           // return nl2br($extracted_plaintext);
           return $extracted_plaintext;
        } else {
          return false;
        }
    } else {
      return false;
    }  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 5 | File</title>
</head>
<style>
    table{
        margin: 0 auto;
        width: 50%;
    }
</style>
<body>
    <div style="text-align: center;">
        <h1>Tutorial 5</h1>
        <div>
            <h2>Csv File Read</h2>
            <table border="1">
                <thead>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Color</th>
                </thead>

                <tbody>
                    <?php 
                        foreach($resultData as $rd){?>
                            <tr>
                                <td><?= $rd[0] ?></td>
                                <td><?= $rd[1] ?></td>
                                <td><?= $rd[2] ?></td>
                            </tr>
                        <?php }
                    ?>
                </tbody>
            </table>
        </div>

        <div>
            <h2>Excel File Read</h2>
            <table border="1">
                <thead>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Color</th>
                </thead>

                <tbody>
                    <?php 
                        foreach($worksheet->getRowIterator() as $row){
                            $cellIterate = $row->getCellIterator();
                            $cellIterate->setIterateOnlyExistingCells(false);
                            echo "<tr>";
                                foreach($cellIterate as $cell){?>
                                    <td><?= $cell->getValue(); ?></td>
                            <?php }
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <div>
            <h2>Txt File Read</h2>
            <h3><?php echo $txt;?></h3>
        </div>

        <div>
            <h2>Doc File Read</h2>
            <h3><?php echo readWord('file.doc'); ?></h3>
        </div>
    </div>
</body>
</html>
