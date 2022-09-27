<?php
$createFile = fopen("file.txt", 'w') or die("There is problem");
$txt = "Hello PHP";
fwrite($createFile, $txt);
fclose($createFile);

$readFile = fopen("file.txt", 'r') or die("There is problem");
echo fread($readFile, filesize("file.txt"));
fclose($readFile);
