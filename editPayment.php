<?php
include 'Core/init.php';
 $sql = "SELECT * FROM customer_credit_card";
 $result = mysqli_query($con,$sql);
   function getCreditCardInfo($id) {
     $user = 'root';
     $pass = '';
     $db = 'shoeplaza';


    $con = mysqli_connect('localhost', $user, $pass, $db);
    if ($con->connect_error) {
        die("Unable to connect database: " . $con->connect_error);
    }
    $query = "SELECT * FROM customer_credit_card WHERE Credit_Card_ID=$id";
     $result = mysqli_query($con,$query);
     if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        return $row;
      }
  }

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $ccInfo = getCreditCardInfo($id);
  }
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign Up/Sign In Form</title>
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
          <a href='editPayment.php?id=<?=$row["Credit_Card_ID"]?>' class="btn btn-primary">Select</a>
          <a class="btn btn-danger">Delete</a>
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
    ?>
      <h3>Please Verify Information, If Correct Press DONE</h3><br>
      <label>Credit Card Number:</label><br>
      <input class="form-control" type="text" placeholder="Credit Card Number" value="<?=$ccInfo["Number"]?>"/><br>
      <label>Credit Card Name:</label>
      <input class="form-control" type="text" placeholder="Credit Card Name" value="<?=$ccInfo["Name"]?>"/><br>
      <label>Expiration Date:</label>
      <input class="form-control" type="text" placeholder="Credit Card Expiration Date" value="<?=$ccInfo["Exp_Date"]?>"/><br>
      <label>Credit Card CVC:</label>
      <input class="form-control" type="text" placeholder="Credit Card CVC" value="<?=$ccInfo["CVC"]?>"/><br>
      <a  href="shopping_bag/checkout.php?number=<?=$ccInfo["Number"]?>"class="btn btn-success btn-lg btn-block">DONE</a>
    </div>

</div>
</body>
</html>