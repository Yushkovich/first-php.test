<?php
    require($_SERVER['DOCUMENT_ROOT']. '/admin/partials/header.php');
    $sql = "SELECT * FROM `users` WHERE id = " . $_GET['id'];
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
?>

<form action="/admin/users.php?namepost=edit&id=<?php echo $row['id']; ?>"  method="POST">
  <div class="mb-3">
    <label for="Username" class="form-label">Username</label>
    <input type="text" class="form-control" id="Username" name="name" value="<?php echo $row['username']?>" required>
  </div>
  <div class="mb-3">
    <label for="Email" class="form-label">Email</label>
    <input type="email" class="form-control" id="Email" name="email" value="<?php echo $row['email']?>" required>
  </div>
  <button type="submit" class="btn btn-success"><i class="far fa-save"></i>Save</button>
</form>

<?php
include "partials/footer.php";
?>