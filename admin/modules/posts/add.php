<?php
    require($_SERVER['DOCUMENT_ROOT']. '/admin/partials/header.php');
?>

<form action="/admin/posts.php?namepost=add"  method="POST">
  <div class="mb-3">
    <label for="User_id" class="form-label">User_id</label>
    <input type="text" class="form-control" id="User_id" name="user_id" value="" required>
  </div>
  <div class="mb-3">
    <label for="twit" class="form-label">Twit</label>
    <input type="text" class="form-control" id="Twit" name="twit" value="" required>
  </div>
  <button type="submit" class="btn btn-success"><i class="far fa-save"></i> Save</button>
</form>



<?php
include "partials/footer.php";
?>