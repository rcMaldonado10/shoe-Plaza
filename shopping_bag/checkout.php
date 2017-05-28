<!--Step 2 on shopping bag -->
<?php
 session_start();
 $connect = mysqli_connect("localhost", "root", "", "shoeplaza");
 if(isset($_POST["add_to_cart"]))
 {
      if(isset($_SESSION["shopping_cart"]))
      {
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");

           if(!in_array($_GET["id"], $item_array_id))
           {
             //save all "name" variables from the viewProduct of html to an array
                $count = count($_SESSION["shopping_cart"]);
                $item_array = array(
                  'item_id'               =>     $_GET["id"],
                  'item_name'               =>     $_POST["hidden_name"],
                  'item_price'          =>     $_POST["hidden_price"],
                  'item_quantity'          =>     $_POST["quantity"]
                );
                $_SESSION["shopping_cart"][$count] = $item_array;
           }
           else
           {
             // alert you if the product arleady Exist
                echo '<script>alert("Item Already Added")</script>';
                echo '<script>window.location="viewCart.php"</script>';
           }
      }
      else
      {
           $item_array = array(
                'item_id'               =>     $_GET["id"],
                'item_name'               =>     $_POST["hidden_name"],
                'item_price'          =>     $_POST["hidden_price"],
                'item_quantity'          =>     $_POST["quantity"]
           );
           $_SESSION["shopping_cart"][0] = $item_array;
      }
 }
 if(isset($_GET["action"]))
 {
      if($_GET["action"] == "delete")
      {
           foreach($_SESSION["shopping_cart"] as $keys => $values)
           {
                if($values["item_id"] == $_GET["id"])
                {
                     unset($_SESSION["shopping_cart"][$keys]);
                     echo '<script>alert("Item Removed")</script>';
                     echo '<script>window.location="viewCart.php"</script>';
                }
           }
      }
 }

  $ccNumber="";
  if(isset($_GET["id"])){
   $id = $_GET["id"];
  // echo $id;
 }
 if(isset($_GET["number"])){
   $ccNumber = $_GET["number"];
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shopping Cart</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .container{padding: 50px;}
    input[type="number"]{width: 20%;}
    </style>

</head>
<body>
<div class="container">
    <div class="col-md-6">
        <h1>Payment Information</h1><a href="../editPayment.php">Edit Payment Information</a><br><br>

        <label>Credit Card Number (last four digits):<?= ' '.$ccNumber?></label><br>
        <label>Credit Card Name:</label><br>
        <label>Credit Card Expiration Date:</label><br>
    </div>
    <div class="col-md-4">
        <h1>Shipping Method</h1><h5 style="color:orange;">FREE SHIPPING IN ALL OUR PURCHASES!</h5><br>
        <input type="radio" name="shipper" value="UPS"><label style="padding-left: 5px;padding-right: 10px;"> UPS</label><img src="../Images/ups_logo.jpg" width="55px" height="55px"/><br>
        <input type="radio" name="shipper" value="FedEx"><label style="padding-left: 5px;padding-right: 10px;"> FedEx</label><img src="../Images/fedex_logo.png" width="80px" height="80px"/><br>
        <input type="radio" name="shipper" value="USPS"><label style="padding-left: 5px;padding-right: 10px;">USPS</label><img src="../Images/usps-logo.png" width="90px" height="90px"/>
    </div>
</div>
<hr>
<div class="container">
    <h1>Shopping Cart</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Size</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
      <?php
           if(!empty($_SESSION["shopping_cart"]))
           {
                $total = 0;
                foreach($_SESSION["shopping_cart"] as $keys => $values)
                {
           ?>
           <tr>
             <form method="post" action="cartAction.php">
             <input type="hidden" name="hidden_id" value="<?php echo $values["item_id"]; ?>"></input>
                <td><?php echo $values["item_name"];?> - <?php echo $values["item_gender"]; ?></td>
                <td><?php echo $values["item_size"]; ?></td>
                <td><?php echo $values["item_quantity"]; ?></td>
                <td>$ <?php echo $values["item_price"]; ?></td>
                <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>

           </tr>
           <?php
                     $total = $total + ($values["item_quantity"] * $values["item_price"]);
                }
           ?>
           <tr>
                <td colspan="3" align="right">Total $ <?php echo number_format($total, 2); ?></td>
                <td></td>
           </tr>

           <?php
         }
           ?>

      </table>
      <button type="submit" name ="placeOrder" class="btn btn-success orderBtn">Place Order <i class="glyphicon glyphicon-menu-right"></i></a>
        </form>
 </div>
</body>
</html>
