<?php
require($_SERVER['DOCUMENT_ROOT']. '/configs/db.php');
session_start();

if (isset($_SESSION['user_id']) || $_COOKIE['user_id']) {
    if (isset($_SESSION['user_id'])) {
        $sql = "SELECT * FROM users WHERE id = " . $_SESSION['user_id'];
    } else if (isset($_COOKIE['user_id'])) {
        $sql = "SELECT * FROM users WHERE id = " . $_COOKIE['user_id'];
    }
    $result = mysqli_query($conn, $sql);
    $user = $result->fetch_assoc();

    if($user['role'] != "admin") {
        header("Location: /register.php");
    }
} else {
    header("Location: /register.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="/admin/assets/vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/admin/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">