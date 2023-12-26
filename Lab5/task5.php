<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    
    // Создаем двумерный массив размером 5x6, заполненный случайными значениями
$array = array();
for ($i = 0; $i < 5; $i++) {
    for ($j = 0; $j < 6; $j++) {
        $array[$i][$j] = rand(-10, 10);
    }
}
echo"<h1>Задание 5</h1>";
echo"<h2>Исходный массив</h2>";

echo "<table>";
for ($i = 0; $i < 5; $i++) {
    echo "<tr>";
    for ($j = 0; $j < 6; $j++) {
        echo "<td>" . $array[$i][$j] . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

// Заменяем максимальный элемент каждой строки на противоположный по знаку
for ($i = 0; $i < 5; $i++) {
    $max_idx = array_keys($array[$i], max($array[$i]));
    $array[$i][$max_idx[0]] = -$array[$i][$max_idx[0]];
}


echo"<h2>Готовый массив</h2>";
echo "<table>";
for ($i = 0; $i < 5; $i++) {
    echo "<tr>";
    for ($j = 0; $j < 6; $j++) {
        echo "<td>" . $array[$i][$j] . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
    
    ?>
</body>
</html>