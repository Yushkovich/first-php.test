<?php
    require('partials/header.php');

    if(!empty($_POST)) {
      $sql = "SELECT * FROM `users` WHERE `email`= '" . $_POST['email'] . "' AND `password`= '" . $_POST['password'] . "'";
      
      $result = mysqli_query($conn, $sql);
      $user = $result->fetch_assoc();
 
      if($user) {    
      var_dump($_POST); 
        
      if(isset($_POST['remember'])) {
        setcookie('user_id', $user['ID'], time()+60*60*24*30, '/');

        echo "<h2>" . $_COOKIE["user_id"] . "</h2>";
      } else {
        $_SESSION["user_id"] = $user['ID'];
      }
//       header("Location: /");   
      } else {
        $_SESSION["user_id"] = null;
        setcookie('user_id', '', 0, '/');
      }
    
    }

?>

<main class="form-signin w-100 m-auto">
  <form action="#" method="POST">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" name="remember" value="1"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
  </form>
</main>

<?php
    require('partials/footer.php');
?>