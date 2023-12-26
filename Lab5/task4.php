<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="POST" action="task4.php">
  <label for="name">Введите элементы массива через пробел:</label>
  <input type="text" id="mass" name="mass">
  <input type="submit" id="button1 name="button1" value="Отправить">
</form>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $string = $_POST['mass'];
    $matrix = explode(" ", $string);

    //Среднеарифметическое
    $sum = array_sum($matrix);
    $count = count($matrix);
    $average = $sum / $count;

    //Минимальный элемент
    $min = min($matrix);

    //В обратном поряке
    $reversedArray = array_reverse($matrix);

    echo "минимальный емент: " . $min . "<br>";
    echo "среднеарфиметическое: " . $average . "<br>";
    echo "В обратном порядке: ";
    foreach ($reversedArray as $value) {
        echo $value . " ";}
}
?>
</body>
</html>