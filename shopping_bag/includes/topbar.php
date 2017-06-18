<!doctype html>
<html>
<head>
    <title>Shoe Plaza</title>
    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>

    <link href="includes/stylesstore.css" rel="stylesheet" type="text/css">
    </head>


<?php
session_start();
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
<div id="logo"> <img src="../images/headerlogo.png" width="401" height="110"/></div><!--end logodiv-->
</header>


<!--Navigation Bar-->

  <nav class="navbar" style="background-color: #243a6a;" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>

        </button>

      </div>

            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav">
                <li ><a href="../home.php">Home</a></li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Men<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="../men.php?cat=sport">Sport</a></li>
                    <li><a href="../men.php?cat=fashion">Fashion</a></li>
                    <li><a href="../men.php?cat=casual">Casual</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Women<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="../women.php?cat=sport">Sport</a></li>
                    <li><a href="../women.php?cat=fashion">Fashion</a></li>
                    <li><a href="../women.php?cat=casual">Casual</a></li>
                  </ul>
                </li>
                <li><a href="../about.php">About</a></li>

                <?php if(isset($_SESSION["cosCustomerID"]) == ""){ ?>
                    <li><a href="../singUpPage.php">Sign Up/Sign In</a></li>
                <?php } ?>
               <li><a href="shopping_bag/viewCart.php?var=<?=$_SESSION["cosCustomerID"]?>" class="glyphicon glyphicon-shopping-cart" title="View Cart"></a></li>

                <?php if(isset($_SESSION["cosCustomerID"]) != ""){ ?>
                  <li class="dropdown">
                    <a class="glyphicon glyphicon-user" data-toggle="dropdown"></a>
                    <ul class="dropdown-menu">
                      <li><a href="../userSettings.php">Update Account Settings</a></li>
                      <li><a href="../historyOrder.php">History of Order </a> </li>
                      <li><a href="../addNewCard.php">Add Card</a></li>
                      <li><a href="../logout.php">Sign out</a></li>
                    </ul>
                  </li>
                 <?php } ?>

                <form class="navbar-form navbar-right" action="Results.php" method="post">
              <div class="input-group">
                <input type="text" class="form-control" name="ValueToSearch" placeholder="Search">
                <div class="input-group-btn">
                  <button class="btn btn-default" type="submit" name="Search" value="Search">
                    <i class="glyphicon glyphicon-search"></i>
                  </button>
                </div>
              </div>
            </form>
              </ul>
            </div>
          </div>
        </nav>
