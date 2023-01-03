<?php
require($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');

require($_SERVER['DOCUMENT_ROOT'] . '/admin/partials/header.php');

// если пользователь не авторизован - то на главную страницу
if(isset($_SESSION["user_id"]) && $_SESSION["user_id"] != null) {
// выбираем пользователя
    $sql = "SELECT * FROM users WHERE id =" . $_SESSION["user_id"]; // 
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

    <h2>PHP</h2>

   
    <form action="/admin/add_user.php" method="POST">
        <label>Name: <input type="test" name="name"></label>
        <br/>
        <label>Email: <input type="text" name="email"></label>
        <br/>
        <button>Save</button>
    </form>

    <?php
    $sql = "SELECT * FROM users";

    $result= mysqli_query($conn, $sql);

    ?>

    <table id="customers">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Option</th>
        </tr>

        <?php
            while($row = $result->fetch_assoc())// получаем все строки в цикле по одной
            {   
        ?>

                <tr>
                    <td><?php echo $row['ID']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <a href="/edit_user.php?id=<?php echo $row['ID']; ?>">Edit</a>
                        <button class="btnDelete" data-id="<?php echo $row['ID']; ?>" > Delete </button>
                    </td>
                </tr>

        <?php
            }
        ?>

  
    </table>
<?php
require ("partials/footer.php");
?>
