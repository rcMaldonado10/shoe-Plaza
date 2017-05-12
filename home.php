<?php
include 'Core/init.php';
include 'includes/topbar.php';
?>


<div class="break" ></div>
 <h1 style="text-align: center;">Home</h1>

 <?php
include 'includes/checkbox.php';

 ?>
 <main class="main">

<?php
    $query = "SELECT * FROM shoe";
    mysqli_query($con, $query) or die('Error querying database.');

    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)) {
            echo '<div class="product">'.$row['Brand'].'<img src="'.$row['img-source'].'" width="230" height="230" alt="Nike"/>
            <br>'.$row['Model'].'</br>
            <br>Price: $'.$row['Price'].'</br>
            <br/><!-- Trigger/Open The Modal -->
            <button type="button" class="btn btn-sm btn-success" onclick="about.php"><a href="about.php" style="color:white;">Details</a></button></br></div>';
         }
   }
?>
 </main>

 <?php
include 'includes/detailsmodal.php';
include 'includes/footer.php';
 ?>

</body>
</html>
