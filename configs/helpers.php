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

?>