<?php
require "configs/db.php";

    if(!empty($_POST)) {
        echo $_POST['name'] . " - " . $_POST['email']; 
    
        $sql = "INSERT INTO `users` (`username`, `email`) VALUES ('" . $_POST['name'] . "', '" . $_POST['email'] . "');";
        
        if (mysqli_query($conn, $sql)) {
            echo "INSERT";
            header("Location: /");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);    
    }
    ?> 