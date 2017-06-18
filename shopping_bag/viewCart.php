<!--Step 1 on shopping bag -->
<?php
session_set_cookie_params(0);
 session_start();
 $connect = mysqli_connect("localhost", "root", "", "shoeplaza");
 echo "no hace nada";
 if(isset($_POST['buttonSize']))
 {

   echo "entro al buttonSize";
    if($_POST["quantity"]<= $_POST["hidden_stock_check"])
    {
      echo "entro al quantity";
      if(isset($_SESSION["shopping_cart"]))
      {
        echo "entro al shopping_cart";
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");

           if(!in_array($_GET["id"], $item_array_id))
           {
                $count = count($_SESSION["shopping_cart"]);
                $item_array = array(
                  'item_id'               =>     $_GET["id"],
                  'item_price'          =>     $_POST["hidden_price"],
                  'item_quantity'          =>     $_POST["quantity"],
                  'item_size'          =>     $_POST['buttonSize']

                );
                $_SESSION["shopping_cart"][$count] = $item_array;
           }
           else
           {
                echo '<script>alert("Item Already Added")</script>';
                echo '<script>window.location="viewCart.php"</script>';
           }
      }
      else
      {
           $item_array = array(
             'item_id'               =>     $_GET["id"],
             'item_price'          =>     $_POST["hidden_price"],
             'item_quantity'          =>     $_POST["quantity"],
             'item_size'          =>     $_POST['buttonSize']
           );
           $_SESSION["shopping_cart"][0] = $item_array;
      }
    }else{
  echo '<script>alert("The Quantity you selected is higher than the stock available")</script>';

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


 if(isset($_GET["var"])){
   $id = $_GET["var"];
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Cart</title>
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
    <h1>View Cart</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Size</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Subtotal</th>
            <th>&nbsp;</th>
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
              <input type="hidden" name="hidden_id" value="<?php echo $values["item_id"]; ?>"></input>
              <td><?php echo $values["item_id"]; ?></td>
              <td><?php echo $values["item_size"]; ?></td>
              <td><?php echo $values["item_quantity"]; ?></td>
              <td>$ <?php echo $values["item_price"]; ?></td>
                <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                <td><a href="viewCart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></span></a></td>
           </tr>
           <?php
                     $total = $total + ($values["item_quantity"] * $values["item_price"]);
                }
           ?>
           <tr>
             <td colspan="4" align="right">Total</td>
             <td align="right">$ <?php echo number_format($total, 2); ?></td>
             <td></td>
           </tr>

           <?php
         }else {
           echo ' <td>Your cart is empty.....</td>';
           $values["item_quantity"] = 0;
         }
           ?>

           <tr><td><a href="../home.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Shopping</a></td>

          <?php if(isset($_SESSION["cosCustomerID"]) != ""){ ?>


              <?php if($values["item_quantity"] > 0){ ?>

                <td><a href="checkout.php?id=<?= $id ?>" class="btn btn-success btn-block">Checkout <i class="glyphicon glyphicon-menu-right"></i></a></td>

            <?php } }else { ?>
              <td><a href="../singUpPage.php" class="btn btn-success btn-block">Sign in <i class="glyphicon glyphicon-menu-right"></i></a></td>
              <?php  } ?>
      </table>
 </div>
</body>
</html>
