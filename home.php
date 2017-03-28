<?php
include 'includes/topbar.php';

 ?>


            <div class="break" ></div>
 <h1 style="text-align: center;">Home</h1>

 <?php
include 'includes/checkbox.php';

 ?>
 <main class="main">
     <div class="product">Nike<img src="Images/men1.jpg" width="230" height="230" alt="Nike"/>
         <br>Nike Air Max 95 Sneakerboots</br>
         <br>Price: $95.00</br>
         <br/><!-- Trigger/Open The Modal -->
         <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail-1">Details</button>
     </div>

     <div class="product">Rebook<img src="Images/men2.jpg" width="230" height="230" alt="Rebook"/>
         <br>Reebok Classic</br>
         <br>Price: $95.00</br>
         <br/><!-- Trigger/Open The Modal -->
          <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail-2">Details</button>
     </div>

     <div class="product">Rebook<img src="Images/woman3.jpg" width="230" height="230" alt="Rebook"/>
         <br>Xtreme Runner V</br>
         <br>Price: $95.00</br>
         <br/><!-- Trigger/Open The Modal -->
         <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail-6">Details</button>
     </div>
 </main>

 <?php
include 'includes/detailsmodal.php';

 ?>

<div class="break" ></div>
  <div class="copyright">
 <p>*Your email address will be subject to the terms and conditions of our Privacy Policy.
<p>© 2017 Shoe-Plaza.com, Inc. or its affiliates. Shoe-Plaza.com is operated by XAMPP.</p></div>
</body>
</html>
