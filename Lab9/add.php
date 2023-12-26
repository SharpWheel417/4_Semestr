<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $full_name = $_POST['full_name'];
    $study_group = $_POST['study_group'];
    $faculty = $_POST['faculty'];

    $get = "SELECT MAX(id) FROM users;";
    $id = $pdo->query($get)->fetchColumn() + 1;




    $q = "INSERT INTO users (id, login, password, full_name, email, registration_date, study_group, faculty) VALUES ($id,'$login', '$password', '$full_name', 'email', '02-11-2022', '$study_group', '$faculty');";

    echo "$q";

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
    <title>Добавить запись</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body class="w-50 p-5">
    <h1>Добавить запись</h1>
    <form action="add.php" method="POST">

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

        <input type="submit" value="Добавить">
    </form>
</body>

</html>