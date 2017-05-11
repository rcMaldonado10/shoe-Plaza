<!doctype html>
<html>
<head>
    <title>Shoe Plaza</title>
    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <link href="includes/stylesstore.css" rel="stylesheet" type="text/css">
    </head>


<?php
if(isset($_POST['Search'])){

  $valueToSearch = $_POST['ValueToSearch'];
  $query = "SELECT * FROM `shoe` WHERE CONCAT(Brand,Model,Category) LIKE '%".$valueToSearch."%'";
  $search_result = filterShoe($query);

} else {
  $query = "SELECT * FROM shoe";
  $search_result = filterShoe($query);
}

function filterShoe($query){
  $connect = mysqli_connect("localhost", "root", "", "shoeplaza");
  $filter_Result = mysqli_query($connect, $query);
  return $filter_Result;
}
?>
<body>


<header class="header">
<div id="logo"> <img src="images/headerlogo.png" width="401" height="110"/></div><!--end logodiv-->
</header>


<!--Navigation Bar-->
<nav class="nav">
<span id="menu"><a href="home.php" class="menunav">Home</a></span>
<span id="menu">  <li class="dropdown">

    <a href="javascript:void(0)"  class="menunav">Categories</a>
    <div class="dropdown-content">
      <a href="#"><b>Woman</b></a>
      <a href="women.php">Sport</a>
      <a href="#"><b>Men</b></a>
      <a href="men.php">Sport</a>
    </div>

  </li></span>
<span id="menu"><a href="about.php" class="menunav">About</a></span>
<?php if(isset($_POST['SingUP']) || isset($_POST[isset($_POST['LogIn'])]) ){
  $row = mysqli_fetch_assoc($result);
  echo '<span id="menu"><a href="javascript:void(0)"  class="menunav">Hello: '.$cheqEmail.'</a>
  <div class="dropdown-content">
    <a href="accout.php"><b>accout</b></a>
    <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
  </div>
</li></span>';

}else {
echo '<span id="menu"><a href="singUpPage.php" class="menunav">Sign Up/Sign In</a></span>';
}

 ?>
<span id="menu"><a href="shopping_bag/viewCart.php" class="cart-link" title="View Cart"><img class="cartlogo" src="Images/shopping-cart-logo.png" /></a></span>
<span <div class="dropdown">
  <button type="button" class="glyphicon glyphicon-user"  data-toggle="dropdown" ></button>
  <ul class="dropdown-menu">
    <li><a href="userSettings.php">Account Settings</a></li>
    <li><a href="logout.php">Logout</a></li>
  </ul>
  </div>
</span>
<span>
<form action="Results.php" method="post"><input type="text" name="ValueToSearch" placeholder="Search..." required><input type="submit" name="Search" value="Search"></form>
</span>
</nav>
