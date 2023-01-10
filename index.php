<?php
require('partials/header.php');
?>

<?php 
if(isLogin()){
?>
    <h2> Hello, name </h2>
<?php
} else {
    ?>
    <h2>Hello</h2>

    <?php
}
?>


<?php
require('partials/footer.php');
?>
  
  