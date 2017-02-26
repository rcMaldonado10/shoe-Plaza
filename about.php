
<!doctype html>
<html>
<head>
    <title>About Shoe Plaza</title>

    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" type="text/css" href="stylesstore.css"/>


    </head>
<body>

<div id="container">
     <div id="topbar">

        <div class="fixedwith">

          <div id="logodiv"><p id="titleheader">Shoe Store Plaza<span id="pr">PR</span> </p></div><!--end logodiv-->

            <div id="signindiv">
                <img src="images/singnin.png"/><h class="default"><a class="default" href="singUpPage.php">Sign In</a></h>
             </div><!--end signindiv-->

        </div><!--end topbar-->
            <div id="topmenudiv">
                    <ul>
                    <li class="default"><a href="home.php">Home</a></li>
                    <li class="default"><a href= "women.php">Women </a></li>
                    <li class="default"><a href="men.php">Men</a></li>
                    <li class="current_page-item"><a href="about.php">About us</a></li> 

                </ul>
            </div>
            
             <div class="break" ></div>
            <div id="content">
                        <div class ="fixedwith">

                            <h1>The Place Your Feet Always Wanted!</h1>
                            <h2>With variety for men and women, the best brands and pricing</br>
                            that no one can compare. </h2>
                     <div class="imgaboutsize"><img src="Images/Men-section-Wallpaper.jpg" /></div>
      
                 </div><!--end fixedwith-->
 <div id="mapdiv"> 
    <h3>Our headquarters at University of Puerto Rico in Arecibo</h3>
 <div id="map"></div><!--Google Maps-->
    
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
        </div><!--end content-->
        
    </div><!--end container-->
  <div class="break" ></div>
  <div class="copyright">
 <p>*Your email address will be subject to the terms and conditions of our Privacy Policy.
<p>© 2017 Shoe-Plaza.com, Inc. or its affiliates. Shoe-Plaza.com is operated by XAMPP.</p>
<p>For luxury and designer styles, visit <a href="http://www.6pm.com">6pm.com.</a></p></div> 
</body>
</html>
