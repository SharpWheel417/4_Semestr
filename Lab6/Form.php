<?php
$fio = $_POST['fio'];
$now = time();
$date = strtotime($_POST['date']);
$lang = $_POST['lang'];
$solution = $_POST['solution'];
$answer = 20;
$age = floor(($now - $date) / (60 * 60 * 24 * 366));
echo "
			<meta charset='UTF-8'>
			<title>Ответ</title>
			<style>
			body {
				text-align: center;
				margin-top: 250px;
				color: purple;
				font-size: 75px;
				font-weight: 900;
				display: flex;
				justify-content: center;
				align-items: center;
				
				background-size: 400% 400%;
				animation: gradient 10s ease infinite;
			}
	
			
			</style>
			<div>
				<p>Добро пожаловать, $fio!</p>	
				<p>Ты знаешь целых ", count($lang), " ";
if (count($lang) == 0)
	echo "языков";
elseif (count($lang) == 1)
	echo "язык";
else
	echo "языка";
echo "</p>
			<p>Вам: $age полных лет</p>
			<p>Ответ на пример 5×4 вы ответили: $solution, и это ", ($answer == $solution ? 'Верно!' : 'Неверно!'), "</p>
</  div>";
?>