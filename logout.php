<?php
  session_start();
  session_destroy();
  unset($_SESSION['firstNameCos']);
  $_SESSION['message']= "you are logged out";
  header("location:signUpPage.php");


 ?>
