<?php
require_once 'Core/init.php';
include 'includes/topbar.php';

?>
  <div class="break" ></div>
 <h1 style="text-align: center;">Men</h1>

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

    <div class="product">Skechers<img src="Images/men5.jpg" width="230" height="230" alt="Skechers "/>
        <br>Men's Skech-Air Varsity</br>
        <br>Price: $95.00</br>
        <br/><!-- Trigger/Open The Modal -->
        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail-3">Details</button>
    </div>


</main>


 <?php
include 'includes/detailsmodal.php';
include 'includes/footer.php';
 ?>

</body>
</html>
