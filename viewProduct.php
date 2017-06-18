<?php
include 'includes/topbar.php';

$connect = mysqli_connect("localhost","root","","shoeplaza");

$details = $_POST['Details'];
$query="SELECT * FROM shoe WHERE ProductID=$details";
if(isset($_POST['buttonSize']))
{
  $size = $_POST['buttonSize'];
  $_SESSION['size'] = $size;

  //header("location:shopping_bag/viewCart.php");
}
//action="shopping_bag/viewCart.php?action=add&id=<?php echo $row["ProductID"]; "
$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
?>

<!--Left side grid-->
<div class="col-md-2"></div>

    <!--Main cotent grid-->
<div class="col-md-8">
  <div class="row">
      <h1 class="text-center">Details Product</h1>

        <div class="col-md-6">
            <h1 style="padding-left: 15px; color: orange;"><?=$row['Brand']?> - <?=$row['Model']?></h1>
            <img style="padding-left: 15px;"src="<?=$row['img-source']?>" width="375" height="375"/>
        </div><!--col-md-6 end-->

        <div class="col-md-6">

            <form method="post" action="shopping_bag/viewCart.php?action=add&id=<?php echo $row["ProductID"]; ?>">
            <h3 style="float:;">Details: <?=$row['Details']?></h3><br>
            <h3>Category: <?=$row['Category']?></h3>
            <h3>Price: $<?=$row['Price']?></h3>
            <h3>In Stock <br> Size 6: <?=$row['6']?> <br> Size 7: <?=$row['7']?> <br> Size 8: <?=$row['8']?> <br> Size 9: <?=$row['9']?> <br> Size 10: <?=$row['10']?>  </h3>
            <h3 for="Quantity_Stock">Quantity: </h3>

          <div style="float: ; padding: 0 200px 0 0px;">
            <input type="number" name="quantity" min="1" max= "10"  value="1"  class="form-control text-center">
            <br>

            <input type="hidden" name="hidden_id" value="<?php echo $row["ProductID"]; ?>" />
            <?php $_SESSION["ProductID"] = $row["ProductID"]; ?>
            <input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>" />
            <input type="hidden" name="hidden_stock_check" value="quantity" />
            <!-- <input type="hidden" name="hidden_Sise" value="size" /> -->

            <?php
            $Size6 = "<input type='submit' name='buttonSize' class='btn btn-warning' value='6' />";
            $Size7 = "<input type='submit' name='buttonSize' class='btn btn-warning' value='7' />";
            $Size8 = "<input type='submit' name='buttonSize' class='btn btn-warning' value='8' />";
            $Size9 = "<input type='submit' name='buttonSize' class='btn btn-warning' value='9' />";
            $Size10 = "<input type='submit' name='buttonSize' class='btn btn-warning' value='10' />";
              if($row['6'] == 0)
              {
                $Size6 = "<label class='btn btn-danger'>Sold</label>";
              }
              if($row['7'] == 0)
              {
                $Size7 = "<label class='btn btn-danger'>Sold</label>";
              }
              if($row['8'] == 0)
              {
                $Size8 = "<label class='btn btn-danger'>Sold</label>";
              }
              if($row['9'] == 0)
              {
                $Size9 = "<label class='btn btn-danger'>Sold</label>";
              }
              if($row['10'] == 0)
              {
                $Size10 = "<label class='btn btn-danger'>Sold</label>";
              }
              ?>
              <h3 for="size">Size: </h3>
              <?php
              echo $Size6;
              echo $Size7 ;
              echo  $Size8 ;
              echo  $Size9 ;
              echo  $Size10;
               ?>
              </form>




          </div>
        </div><!--col-md-6 end-->

    </div><!--row end-->
</div><!--col-md-8 end-->

<!--Right side grid-->
<div class="col-md-2"></div>

<?php
} else {
    echo '<h1 style="text-align:center;">No shoe was selected</h1>';
}

?>
