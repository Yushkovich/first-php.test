<?php
require('partials/header.php');
if (!empty($_POST)) {
  var_dump($_POST);
  echo "<br>";
  if (isset($_POST['email_log'])) {
    var_dump("LOGIN");
    $sql = "SELECT * FROM `users` WHERE `email` = '" . $_POST['email_log'] . "' AND `password` = '" . $_POST['password_log'] . "'";
    $result = mysqli_query($conn, $sql);
    $user = $result->fetch_assoc();

    if ($user) {
      if (isset($_POST['remember']) ) {
        setcookie('user_id', $user['id'], time() + 60 * 60 * 24 * 30, '/');
      } else {
        $_SESSION['user_id'] = $user['id'];
      }
      header("Location: /");
    } else {
      var_dump("Нет такого пользователя с таким паролем!");
        $_SESSION['user_id'] = null;
        setcookie('user_id', '', 0, '/');
    }
  }

  if (isset($_POST['email_reg'])) {
    var_dump("REGISTRATION");
    $sql = "INSERT INTO `users` (`username`, `email`, `password`) VALUES ('" . $_POST['username'] . "', '" . $_POST['email_reg'] . "', '" . $_POST['password_reg'] . "');";
    if (mysqli_query($conn, $sql)) {
        echo "INSERT";
        $sql = "SELECT * FROM `users` WHERE `email` = '" . $_POST['email_reg'] . "' AND `password` = '" . $_POST['password_reg'] . "'";
        $result = mysqli_query($conn, $sql);
        $user = $result->fetch_assoc();
        if (isset($_POST['remember']) ) {
          setcookie('user_id', $user['id'], time() + 60 * 60 * 24 * 30, '/');
        } else {
          $_SESSION['user_id'] = $user['id'];
        }
        header("Location: /");
    } else {
        echo "Error: " . $sql . " <br> " . mysqli_error($conn);
    }
    mysqli_close($conn);
  }
}
 
?>

<section class="forms-section">
  <h1 class="section-title">WELCOME!!!</h1>
  <div class="forms">

    <div class="form-wrapper is-active">
      <button type="button" class="switcher switcher-login">
        Login
        <span class="underline"></span>
      </button>
      <form class="form form-login" action="#" method="POST">
        <fieldset>
          <legend>Please, enter your email and password for login.</legend>
          <div class="input-block">
            <label for="login-email">E-mail</label>
            <input id="login-email" type="email" name="email_log" required>
          </div>
          <div class="input-block">
            <label for="login-password">Password</label>
            <input id="login-password" type="password" name="password_log" required>
          </div>
          <div class="remember">
            <label for="login-remember">
              <input id="login-remember" type="checkbox" name="remember" value="1">
              Remeber me
            </label>
          </div>
        </fieldset>
        <button type="submit" class="btn-login">Login</button>
      </form>
    </div>

    <div class="form-wrapper">
      <button type="button" class="switcher switcher-signup">
        Sign Up
        <span class="underline"></span>
      </button>
      <form class="form form-signup" action="#" method="POST">
        <fieldset>
          <legend>Please, enter your email, password and password confirmation for sign up.</legend>
          <div class="input-block">
            <label for="signup-name">Username</label>
            <input id="signup-name" type="text" name="username" required>
          </div>
          <div class="input-block">
            <label for="signup-email">E-mail</label>
            <input id="signup-email" type="email" name="email_reg" required>
          </div>
          <div class="input-block">
            <label for="signup-password">Password</label>
            <input id="signup-password" type="password" name="password_reg" required>
          </div>
          <div class="remember">
            <label for="login-remember">
              <input id="login-remember" type="checkbox" name="remember" value="1">
              Remeber me
            </label>
          </div>
        </fieldset>
        <button type="submit" class="btn-signup">Continue</button>
      </form>
    </div>

  </div>
</section>


<?php
require('partials/footer.php');
?>