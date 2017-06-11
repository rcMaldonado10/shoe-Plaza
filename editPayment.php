<?php
include 'Core/init.php';
     session_start();
     $custmerID = $_SESSION['cosCustomerID']; //ID del cliente
     $creditID = $_SESSION['creCustomerID'];//ID de la tarjeta de credito de ese cliente
     $_SESSION["name"] = "";
     $user = 'root';
     $pass = '';
     $db = 'shoeplaza';

    $con = mysqli_connect('localhost', $user, $pass, $db);
    if ($con->connect_error) {
        die("Unable to connect database: " . $con->connect_error);
    }
    $query = "SELECT * FROM customer_credit_card WHERE Credit_Card_ID=$creditID";
    $result = mysqli_query($con,$query);

    if(isset($_POST["done"])){
      echo 'Boom';
    }
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Select Payment Method</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
  <h1>Select Payment Method</h1><br>
  <div class="col-md-6" >
<table class="table table-striped">
  <tbody>
    <?php 
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
    ?>
    <tr>
      <td>
        <div class="col-md-8">
        <label>Credit Card Num.: <?=$row["Number"]?></label><br>
        <label>Credit Card Name: <?=$row["Name"]?></label><br>
        <label>Expiration Date: <?=$row["Exp_Date"]?></label>
        </div>
        <div class="col-md-4">
          <br>
          <form method="post"><input type="submit" name="select" value="Select" class="btn btn-primary">
          <input type="submit" class="btn btn-danger" name="delete" value="Delete"></form>
        </div>
      </tr>
        <?php }
        }
        ?>
  </tbody>
</table>
</div>
    <div class="col-md-6">
    <?php
     if(isset($_POST["select"])){
     $_SESSION["name"] = $row["Name"];

     echo '<h3>Please Verify Information, If Correct Press DONE</h3><br>';
     echo '<form method="post" action="shopping_bag/checkout.php">
      <label>Credit Card Name:</label>
      <input class="form-control" type="text" placeholder="Credit Card Name" name="ccName" value="'.$_SESSION["name"].'"/><br>
      <label>Expiration Date:</label>
      <input class="form-control" type="text" placeholder="Credit Card Expiration Date" name="ccDate" value=""><br>
      <input  type="submit" class="btn btn-success btn-lg btn-block" name="done" value="DONE">
      </form>';
     }
    ?>  
    </div>
</div>
</body>
</html>