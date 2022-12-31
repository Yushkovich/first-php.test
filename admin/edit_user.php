<?php
    include "configs/db.php";
    

    if(!empty($_POST)) {
        $sql = "UPDATE `users` SET `username` = '" . $_POST['name'] . "', `email` = '" . $_POST['email'] . "' WHERE `users`.`id` = " . $_GET['id'] . ";";
        if (mysqli_query($conn, $sql)) {
            echo "Данные изминены";
            header("Location: /");
        } else {
            echo "Ошибка изминения данных: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    $sql = "SELECT * FROM `users` WHERE id = " . $_GET['id'];
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    
?>

<!-- Форма для ввода данных -->
<form action="edit_user.php?id=<?php echo $_GET['id']; ?>"" method="POST">
    <label>Name: <input type="text" name="name" value="<?php echo $row['username']?>"></label>
    <br>
    <label>Email: <input type="text" name="email" value="<?php echo $row['email']?>"></label>
    <button>Save</button>
</form>

<?php
include "partials/footer.php";
?>