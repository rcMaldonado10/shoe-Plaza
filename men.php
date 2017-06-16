<?php
require_once 'Core/init.php';
include 'includes/topbar.php';
$_SESSION["page"] = "men";
$query = "SELECT * FROM shoe WHERE Gender='M'";
if(isset($_GET['cat'])){
    $category = $_GET['cat'];
    if($category == "sport"){
      $query = "SELECT * FROM shoe WHERE Gender='M' AND Category='Sport'";
    } else if($category == "casual"){  
      $query = "SELECT * FROM shoe WHERE Gender='M' AND Category='Casual'";
    } else if($category == "fashion"){
        $query = "SELECT * FROM shoe WHERE Gender='M' AND Category='Fashion'";
    }
}
?>
  <div class="break" ></div>
 <h1 style="text-align: center;">Men</h1>
  <?php
 include 'includes/checkbox.php';
 ?>

 <main class="main">

<?php
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
