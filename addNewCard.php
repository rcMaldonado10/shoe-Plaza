<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Add New Credit Card</title>
  <meta charset="utf-8" />
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link href="includes/signUpStyle.css" rel="stylesheet" type="text/css">
<?php
$con= new mysqli("localhost", "root", "", "shoeplaza") OR die("Fail to query database ");
session_start();
echo $_SESSION['cosCustomerID'];
echo " ";
echo $_SESSION['creCustomerID'];
if(isset($_POST['ADD']))
{
  if($_POST['first-name']!="" || $_POST['number'] !="" || $_POST['cvc'] !="" || $_POST['expiry'] !="" ){
      echo "aibsd";
            //header("location:home.php");
    $nameCre = $_POST['first-name'];
            //echo $_SESSION['creName'];
    $numCre =  $_POST['number'];
            //echo $_SESSION['creNumber'];
    $cvcCre = $_POST['cvc'];
            //echo $_SESSION['creCVC'];
    $expCre = $_POST['expiry'];

            //echo $_SESSION['creExpiry'];

    $sqlSelCred = "INSERT INTO customer_credit_card (Number,Name,Exp_Date,CVC) VALUES ('$numCre','$nameCre','$expCre','$cvcCre')";
    $resultCre = mysqli_query($con, $sqlSelCred) or die("Bad query: $sqlSelCred");

    $LogCos = $_SESSION['cosCustomerID'];

    $sqlSelHas = "SELECT * FROM customer_credit_card";
    $resultHas = mysqli_query($con, $sqlSelHas) or die("Bad query: $sqlSelHas");

    while($row = mysqli_fetch_assoc($resultHas))
    {
       if ($nameCre == $row["Name"] AND $numCre == $row["Number"] AND $cvcCre == $row["CVC"] AND $expCre AND $row["Exp_Date"] ){
         $_SESSION['creCustomerID'] = $row['Credit_Card_ID'];
         $LogCre = $_SESSION['creCustomerID'];

          $sqlHas_a = "INSERT INTO has_a (CustomerID,Credit_Card_ID) VALUES ($LogCos,$LogCre)";
          $resultHas_a = mysqli_query($con, $sqlHas_a) or die("Bad query: $sqlHas_a");
          echo '<script>alert("Card has been Added")</script>';
          header("location:home.php");
      }

    }
  }else {
    echo '<script>alert("Enter correctly all the fields")</script>';
  }

}
?>
</head>
<body>
  <div class="form">

  <form method="post" action="addNewCard.php">
    <div class="form-container">
      <div class="personal-information">
        <h1>Add New Credit Card</h1>
      </div> <!-- end of personal-information -->

        <div class="field-wrap">
           <label>
             Full name as it appears on card<span class="req">*</span>
           </label>
          <input type="text" name="first-name" required="required" autocomplete="off" maxlength="40"/>
         </div>

        <div class="card-wrapper"></div><br>

          <div class="field-wrap">
             <label>
               Card Number<span class="req">*</span>
             </label>
            <input type="text" required="required" name="number"/>
           </div>

           <div class="top-row">
             <div class="field-wrap">
                <label>
                  MM/YYYY<span class="req">*</span>
                </label>
                 <input type="text" required="required" name="expiry"/>
              </div>

              <div class="field-wrap">
                <label>
                  CVC<span class="req">*</span>
                </label>
                <input type="text" required="required" name="cvc"/>
              </div>
            </div>
          <input type="submit" class="button button-block" VALUE="Add Credit Card" name="ADD" >

  </form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/121761/card.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/121761/jquery.card.js'></script>
    <script src="includes/ChuleriaCC.js"></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="includes/chuleria.js"></script>

</body>
</html>
