<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Запрос на удаление записи
    $q = "DELETE FROM users WHERE id = $id";
    $pdo->exec($q);

    // Редирект на главную страницу
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Удалить запись</title>
</head>
<body>
    <h1>Удалить запись</h1>
    <form action="delete.php" method="POST">
        <label for="id">ID записи:</label>
        <input type="number" name="id" id="id" required><br>

        <input type="submit" value="Удалить">
    </form>
</body>
</html>