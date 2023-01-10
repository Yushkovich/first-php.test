<?php

//авторизован ли пользователь
function isLogin() {

$is_session = isset($_SESSION["user_id"]) && $_SESSION["user_id"] != null; //true/false
$is_cookie = isset($_SESSION["user_id"]) && $_COOKIE["user_id"] != null; //true/false

if ( $is_session || $is_cookie){
        return true;
    } else {
        return false;
    }
}

// получение текущего (авторизованного) пользователя
function getCurrentUser() {
    global $conn;
    $is_session = isset($_SESSION["user_id"]) && $_SESSION["user_id"] != null; //true/false
    $is_cookie = isset($_SESSION["user_id"]) && $_COOKIE["user_id"] != null; //true/false

    if ( $is_session || $is_cookie){
        $userID = $is_session ? $_SESSION["user_id"] : $_COOKIE["user_id"];
        $sql = "SELECT * FROM users WHERE id = " . $userID;
        $result = mysqli_query($conn, $sql); 
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

function getUserID() {
    $is_session = isset($_SESSION["user_id"]) && $_SESSION["user_id"] != null; //true/false
    $is_cookie = isset($_SESSION["user_id"]) && $_COOKIE["user_id"] != null; //true/false

    if ( $is_session || $is_cookie){
            return $is_session ? $_SESSION["user_id"] : $_COOKIE["user_id"];;
        } else {
            return 0;
        }
}

?>