<?php
include 'Core/init.php';
include 'includes/topbar.php';
$_SESSION["page"] = "home";
$_SESSION["message"] = 1;
?>

<div class="break" ></div>
 <h1 style="text-align: center;">Home</h1>

 <?php
include 'includes/checkbox.php';
 //echo $_SESSION['cosCustomerID']; //ID del cliente
 //echo $_SESSION['creCustomerID'];//ID de la tarjeta de credito
 ?>
 <main class="main">
<?php
    $query = "SELECT * FROM shoe LIMIT 9,18";
   // mysqli_query($con, $query) or die('Error querying database.');

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
<input type="button" onclick="alert('<?php echo $query; ?>')" value="Querys">
</body>
</html>
