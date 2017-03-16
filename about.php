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

    <link rel="stylesheet" type="text/css" href="stylesstore.css"/>
    </head>
<body>

<div id="container">
     
<header class="header">
<div id="logo"> <img src="images/headerlogo.png" width="401" height="110"/></div><!--end logodiv-->
</header>

        
<!--Navigation Bar-->
<nav class="nav">
<span id="menu"><a href="home.php" class="menunav">Home</a></span>
<span id="menu"><a href="woman.php" class="menunav">Woman</a></span>
<span id="menu"><a href="men.php" class="menunav">Men</a></span>
<span id="menu"><a href="about.php" class="menunav">About</a></span>
<span id="menu"><a href="singUpPage.php" class="menunav">Sign In</a></span>
<span id="menu"><a href="viewCart.php" class="cart-link" title="View Cart"><img class="cartlogo" src="Images/shopping-cart-logo.png" /></a></span>
</nav>
            
<div class="break" ></div>

<div id="content">
   <div class ="fixedwith">
     <h1>The Place Your Feet Always Wanted!</h1>
     <h2>With variety for men and women, the best brands and pricing</br>
         that no one can compare. </h2>
           <div class="imgaboutsize"><img src="Images/Men-section-Wallpaper.jpg" /></div>
   </div><!--end fixedwith-->


<!--Google Maps-->
 <div id="mapdiv"> 
    <h3>Our headquarters at University of Puerto Rico in Arecibo</h3>
 <div id="map"></div>
    
    <script>
      function initMap() {
        var uluru = {lat: 18.468226, lng:-66.740657,}; // UPRA location
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16, 
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxh13VatPGZhppQfC1g92fPrBj0oK-w_M&callback=initMap">
    </script>
 </div> <!--end mapdiv-->
    
</div>  
    
</div>   
  <div class="break" ></div>
  <div class="copyright">
 <p>*Your email address will be subject to the terms and conditions of our Privacy Policy.
<p>© 2017 Shoe-Plaza.com, Inc. or its affiliates. Shoe-Plaza.com is operated by XAMPP.</p></div>
</body>
</html>
