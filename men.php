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

<?php
  $query = "SELECT * FROM shoe WHERE Gender='M'";
    mysqli_query($con, $query) or die('Error querying database.');

    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)) {
            echo '<div class="product"><form action="viewProduct.php" method="post"><label for="brand">'
            .$row['Brand'].'</label><img src="'.$row['img-source'].'" width="230" height="230" alt="Nike"/>
            <br>'.$row['Model'].'</br>
            <br>Price: $'.$row['Price'].'</br>
            <br/>
            <button  class="btn btn-info"name="Details" value="'.$row['ProductID'].'">Details</button>
            </form></div>';
         }
   }
?>
</main>

<?php
include 'includes/footer.php';
?>

</body>
</html>
