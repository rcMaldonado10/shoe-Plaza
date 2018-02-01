<?php
include 'includes/topbar.php';

?>
  <div class="break" ></div>
 <h1 style="text-align: center;">About</h1>

<div class="break" ></div>

<div class="row"><!--Bootstrap grid row-->
    <div class="col-xs-12 col-sm-6 col-lg-8">
          <h1>The Place Your Feet Always Wanted!</h1>
          <h2>With variety for men and women, the best brands and pricing</br>
                   that no one can compare. </h2>
          <div class="imgaboutsize"><img src="Images/Men-section-Wallpaper.jpg" /></div>
    </div><!--end of row col-xs-12 col-sm-6 col-lg-8" on the Map-->

    <div class="col-xs-6 col-lg-4">
          <!--Google Maps-->
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
    </div><!--end of row col-xs-6 col-lg-4 on the Map-->

</div><!--end of row class -->


<div class="copyright">

<p>*Your email address will be subject to the terms and conditions of our Privacy Policy.
<p>© 2017 Shoe-Plaza.com, Inc. or its affiliates. Shoe-Plaza.com is operated by XAMPP.</p>
<p><a href="admin/login.php" style="text-decoration:none; color:black;">Admin member</a></p></div>
</body>
</html>
