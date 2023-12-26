<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <a href="./index.php">Главная</a>
  <img src="./task_img_one.png">
<form method="POST" action="task1.php">
  <label for="name">Введите x:</label>
  <input type="text" id="inputX" name="inputX">
  <label for="name">Введите y:</label>
  <input type="text" id="inputY" name="inputY">
  <label for="name">Введите z:</label>
  <input type="text" id="inputZ" name="inputZ">
  <input type="submit" value="Отправить">
</form>
    <?php

    //Функция факториала
    function fac($number){
      $factorial = 1; // Инициализация переменной для хранения факториала
      for ($i = 1; $i <= $number; $i++) {// Вычисление факториала
          $factorial *= $i;
      }
      return $factorial;}// Возвращение факториала

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $x = $_POST['inputX'];
  $y = $_POST['inputY'];
  $z = $_POST['inputZ'];

  $a = log10(abs($y-pow(abs($x),0.5)))*($x-($y/($z+pow($x, 2)/(4*$z))));
  $b = $y-((pow($x,2)/fac(3)*$y)+(pow($z,2)/(fac(5)*$x)));
  // Выполните необходимые действия с полученным значением
    echo "Значение x=$x\n Значение y=$y\n Значение z=$z\n";
    echo "Значение a=$a\n Значение b=$b\n";
}
    ?>
</body>
</html>