<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="./index.php">Главная</a>
    <img src="./task_two.png">

<?php 

$x = 1;
$sum = 0;

for ($i = 0; $i < 50; $i++) {
    echo "Sum= " . $sum . "<br>";
    
    $sum = $sum + 1/pow($x, 3);
    $x = $x+1;
}

echo "Финальныя сумма". $sum ."<br>";

?>
    
</body>
</html>