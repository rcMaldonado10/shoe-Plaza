<!--Step 2 on shopping bag -->
<?php
 session_start();
 $connect = mysqli_connect("localhost", "root", "", "shoeplaza");
 if(isset($_POST["add_to_cart"]))
 {
      if(isset($_SESSION["shopping_cart"]))
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

      $custmerID = $_SESSION['cosCustomerID']; //ID del cliente
      $creditID = $_SESSION['creCustomerID'];//ID de la tarjeta de credito

      $query = "SELECT * FROM customer_credit_card WHERE Credit_Card_ID=$creditID";
      $result = mysqli_query($connect,$query);
      if(mysqli_num_rows($result) > 0){
       $row = mysqli_fetch_assoc($result);
   }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <style>
    .container{padding: 50px;}
    input[type="number"]{width: 20%;}
    </style>

</head>
<body>
<div class="container">
    <div class="col-md-6">
        <h1>Payment Information</h1><a href="../editPayment.php">Edit Payment Information</a><br><br>
        <label>Credit Card Number (last four digits): <?= $row["Number"]?></label><br>
        <label>Credit Card Name:<?=$row["Name"]?></label><br>
        <label>Credit Card Expiration Date:<?=$row["Exp_Date"]?></label><br>
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
    <h1>View Cart</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Size</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Subtotal</th>
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
