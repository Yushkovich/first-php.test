<!-- Подключаем базу данных -->
<?php
$servername = "localhost";
$database = "blog_php";
$username = "root";
$password = "";
// Создаем соединение
$conn = mysqli_connect($servername, $username, $password, $database);
// Проверяем соединение
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
}
?>