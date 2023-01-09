<?php
    require($_SERVER['DOCUMENT_ROOT']. '/admin/partials/header.php');
    $sql3 = "SELECT * FROM `posts` WHERE id = " . $_GET['id'];
    $result3 = mysqli_query($conn, $sql3);
    $twit3 = $result3->fetch_assoc();
?>

<!-- Форма для ввода данных -->
<form action="/admin/posts.php?namepost=edit&id=<?php echo $twit3['id']; ?>"  method="POST">
  <div class="mb-3">
    <label for="User_id" class="form-label">User_id</label>
    <input type="text" class="form-control" id="User_id" name="user_id" value="<?php echo $twit3['user_id']?>" required>
  </div>
  <div class="mb-3">
    <label for="Twit" class="form-label">Twit</label>
    <input type="text" class="form-control" id="Twit" name="twit" value="<?php echo $twit3['twit']?>" required>
  </div>
  <button type="submit" class="btn btn-success"><i class="far fa-save"></i> Save</button>
</form>



<?php
include "partials/footer.php";
?>