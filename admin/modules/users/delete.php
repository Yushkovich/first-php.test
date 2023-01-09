<?php
    require($_SERVER['DOCUMENT_ROOT']. '/admin/partials/header.php');
    if(!empty($_GET)) {
    var_dump($_GET); 
        $sql = 'DELETE FROM users WHERE id=' . $_GET["id"];
        if (mysqli_query($conn, $sql)) {
            echo "Данные удаленны";
            header("Location: /admin/users.php");
        } else {
            echo "Ошибка удаления данных: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>