<?php

include "boot.html";
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $login = $_POST['login'];
    $full_name = $_POST['full_name'];
    $course = $_POST['study_group'];
    $faculty = $_POST['faculty'];
    $average_score = $_POST['average_score'];

    // Запрос на обновление данных записи
    $q = "UPDATE users 
          SET login = '$login', full_name = '$full_name', study_group = '$study_group', faculty = '$faculty'
          WHERE id = $id";
    $pdo->exec($q);

    // Редирект на страницу со всеми записями
    header('Location: /');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Изменить запись</title>
</head>
<body class="w-50 p-5">
    <h1>Изменить запись</h1>
    <form action="update.php" method="POST">
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">ID</span>
        <input type="text" class="form-control" placeholder="login" aria-label="Username" aria-describedby="basic-addon1" name="id" id="id">
        </div>
        
        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="text" class="form-control" placeholder="login" aria-label="Username" aria-describedby="basic-addon1" name="login" id="login">
        </div>

        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Password</span>
        <input type="text" class="form-control" placeholder="login" aria-label="Username" aria-describedby="basic-addon1" name="password" id="password">
        </div>

        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">ФИО</span>
        <input type="text" class="form-control" placeholder="Петров Иван Иванович" aria-label="Username" aria-describedby="basic-addon1" name="full_name" id="full_name">
        </div>

        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Группа</span>
        <input type="text" class="form-control" placeholder="590-1" aria-label="Username" aria-describedby="basic-addon1" name="study_group" id="study_group">
        </div>

        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Факультет</span>
        <input type="text" class="form-control" placeholder="ФВС" aria-label="Username" aria-describedby="basic-addon1" name="faculty" id="faculty">
        </div>

        <input type="submit" value="Изменить">
    </form>
</body>
</html>