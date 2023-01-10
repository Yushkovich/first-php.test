<?php
require($_SERVER['DOCUMENT_ROOT']. '/configs/db.php');
if (!isset($_SESSION)) session_start();
require($_SERVER['DOCUMENT_ROOT']. '/configs/helpers.php');
?>

<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Blog test</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  

  <link rel="stylesheet" href="assets/css/normalize2.css">
  <link rel="stylesheet" href="/assets/css/main2.css">

  <meta name="theme-color" content="#fafafa">
</head>

<body>
  <nav>
    <a href="register.php">Registrtion</a>
    <a href="logout.php"> Logout</a>
    
    <?php
      if (isset($_SESSION['user_id'])) {
        $sql = "SELECT * FROM users WHERE id = " . $_SESSION['user_id'];
        $result = mysqli_query($conn, $sql); 
        $user = $result->fetch_assoc();
        echo "<h2> Hello, " . $user['username'] . "! (SESSION) Вы зарегестрированы как " . $user['role'] . ".</h2>";
      } elseif (isset($_COOKIE['user_id'])) {
        $sql = "SELECT * FROM users WHERE id = " . $_COOKIE['user_id'];
        $result = mysqli_query($conn, $sql); 
        $user = $result->fetch_assoc();
        echo "<h2> Hello, " . $user['username'] . "! (COOKIES)  Вы зарегестрированы как " . $user['role'] . ".</h2>";
        if ($user['role'] === 'admin') {
          echo '<a href="/admin/"> Admin</a>';
        }
      } else {
        echo "<h2> Hello! Register please!</h2>";
      } 
    ?>
  </nav>

    
