<?php
require('partials/header.php');
if (isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = null;
} elseif (isset($_COOKIE['user_id'])) {
    setcookie('user_id', '', 0, '/');
}
header("Location: /register.php");
?>