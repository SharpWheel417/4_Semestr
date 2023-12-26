<?php
echo "<hr />";
echo "<h1>Задание 2</h1>";

$A[] = array("name" => "Павел", "age" => "21", "email" => "pavel_scretch@mail.ru", "lastname" => "Отегов");
$A[] = array("name" => "Никита", "age" => "21", "email" => "nikita_alshevsky@mail.ru", "lastname" => "Альшевский");
$A[] = array("name" => "Дмитрий", "age" => "21", "email" => "fupper_pupper@mail.ru", "lastname" => "Давыденко");
$A[] = array("name" => "Богдан", "age" => "26", "email" => "ilves_bogdan@mail.ru", "lastname" => "Джумабаев");
$A[] = array("name" => "Глеб", "age" => "21", "email" => "kotejackwhite@mail.ru", "lastname" => "Петров");

// Получение списка столбцов
foreach ($A as $key => $row) {
	$lastname[$key] = $row['lastname'];
	$age[$key] = $row['age'];
}

// Сортируем lastname по возр
// Добавляем $A для сортировки
array_multisort($lastname, SORT_ASC, $A);


echo "<table border='4' align='center' style='font-size:25px;'>";
echo "<tr> 
		<td>lastname</td>
		<td>name</td>
		<td>age</td>
		<td>email</td>
	   </tr>";
for ($i = 0; $i <= 4; $i++) {
	echo "<tr>";
	echo "<td>", $A[$i]['lastname'], "</td>";
	echo "<td>", $A[$i]['name'], "</td>";
	echo "<td>", $A[$i]['age'], "</td>";
	echo "<td>", $A[$i]['email'], "</td>";
	echo "</tr>";
}
echo "</table>";
?>