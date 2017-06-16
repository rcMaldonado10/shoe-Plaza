<!DOCTYPE html>

<html >
<head>
  <meta charset="UTF-8">
  <title>Update Account Settings</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link href="includes/signUpStyle.css" rel="stylesheet" type="text/css">

  <?php
  session_start();
  $cosID = $_SESSION['cosCustomerID'];
  $con= new mysqli("localhost", "root", "", "shoeplaza") OR die("Fail to query database ");
  $sqlSelCos = "SELECT CustomerID, Full_Name, Email, Billing_Address, Shipping_Address, Password FROM customer";
  $resultCos = mysqli_query($con, $sqlSelCos) or die("Bad query: $sqlSelCos");
  if (mysqli_num_rows($resultCos) > 0)
    {
      while($row = mysqli_fetch_assoc($resultCos))
      {
        $cheqID= $row["CustomerID"];
        //echo  "email: " . $cheqEmail. " " . $cheqPass. "<br>";
        if ($cosID==$cheqID)
          {
            // echo " esto se ve bien :D";
            // session_destroy();
            // session_start();
            $_SESSION['cosCustomerID'] = $row['CustomerID'];
            $_SESSION['cosFirstName'] = $row['Full_Name'];
            $_SESSION['cosEmail'] = $row['Email'];
            $_SESSION['cosBillingAdd'] = $row['Billing_Address'];
            $_SESSION['cosShipAdd'] = $row['Shipping_Address'];
            $_SESSION['cosPassword'] = $row['Password'];
          }
      }
    }
  $cosBill = explode("^|^",$_SESSION['cosBillingAdd']);
  $cosShip = explode("^|^",$_SESSION['cosShipAdd']);

  // echo $cosShip[0];
  // echo "<br>".$cosShip[1];
  // echo "<br>".$cosShip[2];
  // echo "<br>".$cosShip[3];
  // echo "<br>".$cosShip[4];
  // echo "<br>".end($cosShip);
  // echo "<br>";
  // echo "<br>".$cosBill[0];
  // echo "<br>".$cosBill[1];
  // echo "<br>".$cosBill[2];
  // echo "<br>".$cosBill[3];
  // echo "<br>".$prueba=$cosBill[4];
  // echo $prueba ;
  // echo "<br>".end($cosBill);

  if(isset($_POST['Save']))
  {
      $con= new mysqli("localhost", "root", "", "shoeplaza") OR die("Fail to query database ");
      //$aaaaa =mysqli_real_escape_string($con,'asassasssas');
      $emailForEdit = mysqli_real_escape_string( $con,$_SESSION['cosEmail']);
      echo $_POST['firstNameEdit'];
      $ShipStateEdit = $_POST['shipStateEdit'];
      $BillStateEdit = $_POST['billStateEdit'];
      $customerStatus = $_POST['status']; // save the status value 1 or 0
      if($ShipStateEdit ==" ")
      {
        $ShipStateEdit = $cosShip[0];
      }

      if($BillStateEdit==" ")
      {
        $BillStateEdit = $cosBill[0];
      }

      $shippingAdd = $ShipStateEdit . '^|^' . $_POST['shipZipcodeEdit'] . '^|^' . $_POST['shipCityEdit'] . '^|^' . $_POST['shipStreetAddrEdit'] . '^|^' . $_POST['shipPostalAddressEdit'];
      $billingAdd = $BillStateEdit . '^|^' . $_POST['billZipcodeEdit'] . '^|^' . $_POST['billCityEdit'] . '^|^' . $_POST['billStreetEdit'] . '^|^' . $_POST['billPostalAddressEdit'];

      $sql = "UPDATE customer SET Full_Name = '$_POST[firstNameEdit]',Password='$_POST[passwordEdit]',Shipping_Address= '$shippingAdd' ,Billing_Address='$billingAdd',Status = '$customerStatus'  WHERE Email='$emailForEdit'";
      $_SESSION['cosFirstName'] = $_POST['firstNameEdit'];
      $_SESSION['cosPassword'] = $_POST['passwordEdit'];
      $_SESSION['cosBillingAdd'] = $billingAdd;
      $_SESSION['cosShipAdd'] = $shippingAdd;
      $result = mysqli_query($con,$sql) or die("Bad query: $sql");

      if ($result >= 0)
      {
        if($customerStatus == 0){
          session_start();
          session_destroy();
          unset($_SESSION['firstNameCos']);
          $_SESSION['message']= "you are logged out";

          header("location:home.php");
        }else{
        header("location:home.php");
      }
      }
  }
  ?>

</head>
<body>
  <div class="form">
          <h1>Update Account Settings</h1>
          <form action="userSettings.php" method="post">
            <div class="top-row">
              <div class="field-wrap">
                <!-- <input type="text" value="<?php  //echo $_SESSION['cosFirstName']; ?>" name="firstNameEdit" /> -->
                <textarea name="firstNameEdit" ><?php echo $_SESSION['cosFirstName']; ?></textarea>
               </div>
             </div>

             <div class="field-wrap">
              <!-- <input type="password" value=<?php //echo $_SESSION['cosPassword'] ?> name="passwordEdit"/> -->
              <textarea name="passwordEdit" ><?php echo $_SESSION['cosPassword']; ?></textarea>
             </div>

             <h2 style="color:#FFFFFF">Customer Shipping Address</h2>
          <div class="top-row">
            <div class="field-wrap">
              <?php echo $cosShip[0];?>
               <select  name=shipStateEdit>
                 <option  selected hidden value = " "></option> <!-- selected hidden -->
                 <option value="Puerto Rico">Puerto Rico</option>
                 <option value="Chicago">Chicago</option>
                 <option value="Florida">Florida</option>
                 <option value="Massachusets">Massachusets</option>
                 <option value="New York">New York</option>
                 <option value="Texas">Texas</option>
               </select>
           </div>

             <div class="field-wrap">
             <!-- <input type="text" VALUE=<?php //echo $cosShip[1]; ?> name="shipZipcodeEdit" maxlength="6"/> -->
             <textarea   name="shipZipcodeEdit" maxlength="6"><?php echo $cosShip[1]; ?></textarea>
             </div>
           </div>

           <div class="field-wrap">
            <!-- <input type="text" VALUE=<?php //echo $cosShip[2]; ?> name="shipCityEdit"/> -->
            <textarea   name="shipCityEdit"><?php echo  $cosShip[2]; ?></textarea>
           </div>

           <div class="field-wrap">
            <!-- <input type="text" VALUE=<?php //echo $cosShip[3]; ?> name="shipStreetAddrEdit"/> -->
            <textarea   name="shipStreetAddrEdit"><?php echo $cosShip[3]; ?></textarea>
           </div>

           <div class="field-wrap">
            <!-- <input type="text" VALUE=<?php //echo end($cosShip); ?> name="shipPostalAddressEdit"/> -->
            <textarea   name="shipPostalAddressEdit"><?php echo end($cosShip); ?></textarea>
           </div>

           <h2 style="color:#FFFFFF">Customer Billing Address</h2>

           <div class="top-row">
             <div class="field-wrap">
                <select name=billStateEdit>
                  <option selected hidden value= " ">State</option>
                  <option value="Puerto Rico">Puerto Rico</option>
                  <option value="Chicago">Chicago</option>
                  <option value="Florida">Florida</option>
                  <option value="Massachusets">Massachusets</option>
                  <option value="New York">New York</option>
                  <option value="Texas">Texas</option>
                </select>
            </div>


              <div class="field-wrap">
              <!-- <input type="text" VALUE=<?php //echo $cosBill[1]; ?> name="billZipcodeEdit"maxlength="6"/> -->
              <textarea   name="billZipcodeEdit" maxlength="6"><?php echo $cosBill[1]; ?></textarea>
              </div>
            </div>

            <div class="field-wrap">
             <!-- <input type="text" VALUE=<?php //echo $cosBill[2]; ?> name="billCityEdit"/> -->
             <textarea   name="billCityEdit"><?php echo $cosBill[2]; ?></textarea>
            </div>

            <div class="field-wrap">
             <!-- <input type="text" VALUE=<?php //echo $cosBill[3]; ?> name="billStreetEdit"/> -->
             <textarea name="billStreetEdit"><?php echo $cosBill[3]; ?></textarea>
            </div>

            <div class="field-wrap">
             <!-- <input type="text" VALUE=<?php //echo "$prueba" ." ". $prueba; ?> name="billPostalAddressEdit"/> -->
             <textarea name="billPostalAddressEdit"><?php echo end($cosBill); ?></textarea>
            </div>

            <div class="field-wrap">
              <h2 style="color:#FFFFFF">Do you want to have this account close?</h2>
              <h3 style="color:red">Warning: if you close this account, you will be sign out and have no access until you contact our Services</h3>
               <select  name=status>
                  <!-- selected hidden -->
                 <option value="1">Never</option>
                 <option value="0">Always</option>

               </select>
           </div>
        <input type="submit" class="button button-block" VALUE="Save Changes" Name="Save" >

  </form>
</div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="includes/ChuleriaCC.js"></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="includes/chuleria.js"></script>

</body>
</html>
