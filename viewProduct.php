<?php
include 'includes/topbar.php';

$connect = mysqli_connect("localhost","root","","shoeplaza");

$details = $_POST['Details'];
$query="SELECT * FROM shoe WHERE ProductID=$details";

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
            <h3>In Stock: <?=$row['Quantity_Stock']?> Available </h3>
            <h3 for="Quantity_Stock">Quantity: </h3>
          <div style="float: ; padding: 0 200px 0 0px;">
            <select name="quantity" class="form-control">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select><br>
            <h3 for="size">Size: </h3>
            <select name="size" id="size" class="form-control">
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
            </select><br>
            <input type="hidden" name="hidden_name" value="<?php echo $row["Brand"]; ?>" />
            <input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>" />
            <input type="hidden" name="hidden_gender" value="<?php echo $row["Gender"]; ?>" />
              <input type="submit" name="add_to_cart" class="btn btn-warning" value="Add to Cart" />

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
    include 'includes/footer.php';
?>
