
<?php
require($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');

session_start();

// проверяем что мы используем сессии
$is_session = isset($_SESSION["user_id"]) && $_SESSION["user_id"] != null; // true/ false
// проверяем что мы используем cookie
$is_cookie = isset($_COOKIE["user_id"]) && $_COOKIE["user_id"] != null; // true/ false

// если пользователь не авторизован - то на главную страницу
if($is_session || $is_cookie) {
// выбираем пользователя
    $userID = $is_session ? $_SESSION["user_id"] : $_COOKIE["user_id"]; //тринарный оператор
    $sql = "SELECT * FROM users WHERE id =" . $userID; 
     
    $result = mysqli_query($conn, $sql);
    $user = $result->fetch_assoc(); //сохраняемв в юзере нашего пользователя
      
// если пользователь role не админ, то делаем редирект на другую страницу
       if($user['role'] != "admin"){
           header("Location: /login.php");
        }
    } else { //если вообще нет авторизации тоже редирект
            header("Location: /login.php");
    }
?>


<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="assets/css/normalize.css">
  <link rel="stylesheet" href="assets/css/main.css">
  

  <meta name="theme-color" content="#fafafa">
</head>
<body>

<?php
    if(isset($_SESSION["user_id"]) && $_SESSION["user_id"] != null) {
    echo '<a href="logout.php">Logout</a>';
    } else if(isset($_COOKIE["user_id"]) && $_COOKIE["user_id"] != null) {
      echo '<a href="logout.php">Logout</a>';
      } else {
?>
      <a href="login.php">Login</a>
      <a href="register.php">Register</a>
    <?php
    }
?>  