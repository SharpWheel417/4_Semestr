<?php
$host = 'localhost';
$port = '5432';
$dbname = 'users_and_tasks';
$user = 'admin';
$password = 'admin';

$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";

try {
    $pdo = new PDO($dsn);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>