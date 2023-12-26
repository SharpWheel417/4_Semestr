<?php

include "boot.html";

include 'conn.php';

$q = "SELECT * FROM users";
$table = $pdo->query($q);

$q_g = "SELECT * FROM groups";
$groups = $pdo->query($q_g);

echo '<button class="btn btn-primary" type="submit">Удалить</button>';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $groupNumber = $_POST['groupNumber'];
    $faculty = $_POST['faculty'];

    if ($faculty !== ''){
        $q = "SELECT * FROM users WHERE faculty = '$faculty'";
        $table = $pdo->query($q);
    }

    if ($groupNumber !== ''){
        $q = "SELECT * FROM users WHERE study_group = '$groupNumber'";
        $table = $pdo->query($q);
    }
} else {
    $q = "SELECT * FROM users";
    $table = $pdo->query($q);
}


echo '<datalist id="groups">';
while ($row = $groups->fetch(PDO::FETCH_ASSOC)) {
    echo '<option value="' . $row['name'] . '"/>';
}
echo '</datalist>';


// Генерация формы
echo '<form action="table.php" method="POST">';
echo '<input type="text" name="groupNumber" placeholder="Номер группы" list="groups">';
echo '<input type="text" name="faculty" placeholder="Факультет">';
echo '<button type="submit">Фильтровать</button>';
echo '</form>';



// Генерация таблицы HTML
echo '<table class="table table-striped">';
echo '<tr>';
echo '<th scope="col">id</th>';
echo '<th>login</th>';
echo '<th>full_name</th>';
echo '<th>email</th>';
echo '<th>Факультет</th>';
echo '<th>Средний балл</th>';
echo '</tr>';

while ($row = $table->fetch(PDO::FETCH_ASSOC)) {
    echo '<tr>';
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['login'] . '</td>';
    echo '<td>' . $row['full_name'] . '</td>';
    echo '<td>' . $row['email'] . '</td>';
    echo '<td>' . $row['faculty'] . '</td>';
    echo '<td>' . $row['study_group'] . '</td>';
    echo '<td><input type="checkbox" id="dell" name="dell" value="' . $row['id'] . '"></td>';
    echo '</tr>';
}

echo '</table>';

// }

?>