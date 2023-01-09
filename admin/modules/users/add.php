<?php
    require($_SERVER['DOCUMENT_ROOT']. '/admin/partials/header.php');
?>

<form action="/admin/users.php?namepost=add"  method="POST">
  <div class="mb-3">
    <label for="Username" class="form-label">Username</label>
    <input type="text" class="form-control" id="Username" name="name" value="" required>
  </div>
  <div class="mb-3">
    <label for="Email" class="form-label">Email</label>
    <input type="email" class="form-control" id="Email" name="email" value="" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="" required>
  </div>
  <button type="submit" class="btn btn-success"><i class="far fa-save"></i>Save</button>
</form>



<?php
include "partials/footer.php";
?>