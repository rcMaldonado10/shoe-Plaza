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

    <link href="recycle/stylesstore.css" rel="stylesheet" type="text/css">
    </head>



<body>


<header class="header">
<div id="logo"> <a href="../home.php"><img src="../images/headerlogo.png" width="401" height="110"/></a></div><!--end logodiv-->
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
          <li ><a href="#">Home</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Men<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Sport</a></li>
              <li><a href="#">Fashion</a></li>
              <li><a href="#">Casual</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Women<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Sport</a></li>
              <li><a href="#">Fashion</a></li>
              <li><a href="#">Casual</a></li>
            </ul>
          </li>
          <li><a href="#">About</a></li>
          <li><a href="#">Sign Up/Sign In</a></li>
          <li><a href="#" class="glyphicon glyphicon-shopping-cart" title="View Cart"></a></li>


            <li class="dropdown">
              <a class="glyphicon glyphicon-user" data-toggle="dropdown"></a>
              <ul class="dropdown-menu">
                <li><a href="#">Account Settings</a></li>
                <li><a href="#">Logout</a></li>
              </ul>
            </li>

        </ul>
      </div>
    </div>
  </nav>
