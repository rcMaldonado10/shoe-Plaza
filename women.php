<?php
require_once 'Core/init.php';
include 'includes/topbar.php';
 ?>
      <div class="break" ></div>
 <h1 style="text-align: center;">Women</h1>

 <?php
include 'includes/checkbox.php';
 ?>

 <main class="main">
    <div class="product">Rebook<img src="Images/woman1.jpg" width="230" height="230" alt="Rebook"/>
        <br>Reebok Air Max 95 Sneakerboots</br>
        <br>Price: $95.00</br>
        <br/><!-- Trigger/Open The Modal -->
        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail-4">Details</button>
    </div>

    <div class="product">Rebook<img src="Images/woman2.jpg" width="230" height="230" alt="Rebook"/>
        <br>Reebok Fit</br>
        <br>Price: $95.00</br>
        <br/><!-- Trigger/Open The Modal -->
         <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail-5">Details</button>
    </div>

    <div class="product">Rebook<img src="Images/woman3.jpg" width="230" height="230" alt="Rebook"/>
        <br>Reebok Crossfit</br>
        <br>Price: $95.00</br>
        <br/><!-- Trigger/Open The Modal -->
        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail-6">Details</button>
    </div>


</main>


 <?php
include 'includes/detailsmodal.php';
include 'includes/footer.php';
 ?>


</body>
</html>
