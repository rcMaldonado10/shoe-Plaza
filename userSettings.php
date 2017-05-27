<!DOCTYPE html>

<html >
<head>
  <meta charset="UTF-8">
  <title>Adrress</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link href="includes/signUpStyle.css" rel="stylesheet" type="text/css">

  <?php
  session_start();
  $cosBill = explode("|",$_SESSION['cosBillingAdd']);
  $cosShip = explode("|",$_SESSION['cosShipAdd']);

  echo $cosShip[0];
  echo "<br>".$cosShip[1];
  echo "<br>".$cosShip[2];
  echo "<br>".$cosShip[3];
  echo "<br>".$cosShip[4];
  echo "<br>".end($cosShip);
  echo "<br>";
  echo "<br>".$cosBill[0];
  echo "<br>".$cosBill[1];
  echo "<br>".$cosBill[2];
  echo "<br>".$cosBill[3];
  echo "<br>".$prueba=$cosBill[4];
  echo $prueba ;
  echo "<br>".end($cosBill);

  if(isset($_POST['Save']))
  {
      $con= new mysqli("localhost", "root", "", "shoeplaza") OR die("Fail to query database ");
      //$aaaaa =mysqli_real_escape_string($con,'asassasssas');
      $emailForEdit = mysqli_real_escape_string( $con,$_SESSION['cosEmail']);
      echo $_POST['firstNameEdit'];
      $ShipStateEdit = $_POST['shipStateEdit'];
      $BillStateEdit = $_POST['billStateEdit'];
      if($ShipStateEdit ==" ")
      {
        $ShipStateEdit = $cosShip[0];
      }

      if($BillStateEdit==" ")
      {
        $BillStateEdit = $cosBill[0];
      }

      $shippingAdd = $_POST['shipStateEdit'] . '|' . $_POST['shipZipcodeEdit'] . '|' . $_POST['shipCityEdit'] . '|' . $_POST['shipStreetAddrEdit'] . '|' . $_POST['shipPostalAddressEdit'];
      $billingAdd = $_POST['billStateEdit'] . '|' . $_POST['billZipcodeEdit'] . '|' . $_POST['billCityEdit'] . '|' . $_POST['billStreetEdit'] . '|' . $_POST['billPostalAddressEdit'];


      $sql = "UPDATE customer SET FirstName= '$_POST[firstNameEdit]',LastName='$_POST[lastNameEdit]',Password='$_POST[passwordEdit]',Shipping_Address= '$shippingAdd' ,Billing_Address='$billingAdd'  WHERE Email='$emailForEdit'";
      $_SESSION['cosFirstName'] = $_POST['firstNameEdit'];
      $_SESSION['cosLastName'] = $_POST['lastNameEdit'];
      $_SESSION['cosPassword'] = $_POST['passwordEdit'];
      $_SESSION['cosBillingAdd'] = $billingAdd;
      $_SESSION['cosShipAdd'] = $shippingAdd;

      $result = mysqli_query($con,$sql) or die("Bad query: $sql");
      if ($result >= 0)
      {
        header("location:home.php");
      }
  }
  ?>

</head>
<body>
  <div class="form">
          <h1>Account Setings</h1>
          <form action="userSettings.php" method="post">
            <div class="top-row">
              <div class="field-wrap">
                <!-- <input type="text" value="<?php  //echo $_SESSION['cosFirstName']; ?>" name="firstNameEdit" /> -->
                <textarea name="firstNameEdit" ><?php echo $_SESSION['cosFirstName']; ?></textarea>
               </div>

               <div class="field-wrap">
               <!-- <input type="text" value=<?php //echo $_SESSION['cosLastName']; ?> name="lastNameEdit"/> -->
               <textarea name="lastNameEdit" ><?php echo $_SESSION['cosLastName']; ?></textarea>
               </div>
             </div>

             <div class="field-wrap">
              <!-- <input type="password" value=<?php //echo $_SESSION['cosPassword'] ?> name="passwordEdit"/> -->
              <textarea name="passwordEdit" ><?php echo $_SESSION['cosPassword']; ?></textarea>
             </div>

             <h2 style="color:#FFFFFF">Costumer Shipping Address</h2>
          <div class="top-row">
            <div class="field-wrap">
              <?php echo $cosShip[0];?>
               <select  name=shipStateEdit>
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

           <h2 style="color:#FFFFFF">Costumer Billing Address</h2>

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
        <input type="submit" class="button button-block" VALUE="Save Changes" Name="Save" >

  </form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="includes/ChuleriaCC.js"></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="includes/chuleria.js"></script>

</body>
</html>
