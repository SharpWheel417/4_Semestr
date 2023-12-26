
<?php
$name=$_POST['name'];
$lastName=$_POST['lastName'];
$place = $_POST['place'];
$postIndex = $_POST['postIndex'];
$number=$_POST['number'];
$birthday = $_POST['birthday'];
$sex = $_POST['sex'];
$email=$_POST['email'];
$password = $_POST['password'];
$checkPassword = $_POST['checkPassword'];
$secretQuestion = $_POST['secretQuestion'];
$secretAnswer = $_POST['secretAnswer'];
$timezone = $_POST['timezone'];
$alarmOperation = $_POST['alarmOperation'];
$alarpNews = $_POST['alarmNews'];
$submitUs = $_POST['submitUs'];



echo "
			<meta charset='UTF-8'>
			<title>Ответ сервера</title>
			<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65' crossorigin='anonymous'>
			<table style='font-size: 20px;'>
				<tr><td colspan='2' align ='center' style='font-size:25px;font-weight:900;'>Ваша анкета</tr></td>
				<tr><td> Имя:</td>				<td> $name 	</td></tr>	
				<tr><td>Фамилия:</td>	<td> $lastName </td></tr>		
				<tr><td>Место рождения:</td> 				<td> $place 	</td></tr>	
				<tr><td>Почтовый индекс:</td><td> $postIndex</td></tr>
				<tr><td>Телефон:</td><td> $number</td></tr>
				<tr><td>Дата рождения:</td><td> $birthday</td></tr>
				<tr><td>Пол:</td><td> $sex</td></tr>
				<tr><td>Емаил:</td><td> $email</td></tr>
				<tr><td>Пароль:</td><td> $password</td></tr>
				<tr><td>Подтверждение пароля:</td><td> $checkPassword</td></tr>
				<tr><td>Секретный вопрос:</td><td> $secretQuestion</td></tr>
				<tr><td>Секретный ответ:</td><td> $secretAnswer</td></tr>
				<tr><td>Часовой пояс:</td><td> $timezone</td></tr>
				<tr><td>Разрешение на оповещения:</td><td> $alarmOperation</td></tr>
				<tr><td>Разрешение на новости:</td><td> $alarpNews</td></tr>
				<tr><td>Вы согласились на наши условия:</td><td> $submitUs</td></tr>
				";
				// <tr><td>Ваши предпочтения :</td><td>;
				// foreach ($job as $name){
				// 	echo "$j[$name], ";
				// }
				
echo "			</td></tr>	
			</table>";
echo "<br><br>
		<a href='/task2.php' style='color:black; font-size:25px; font-weight:800;'> Задание 2 </a>
";
?>