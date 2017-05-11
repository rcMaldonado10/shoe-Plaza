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
  echo $cosShip[1];
  echo $cosShip[2];
  echo $cosShip[3];
  echo $cosShip[4];

  echo $cosBill[0];
  echo $cosBill[1];
  echo $cosBill[2];
  echo $cosBill[3];
  echo $cosBill[4];

  if(isset($_POST['Save']))
  {
      $con= new mysqli("localhost", "root", "", "shoeplaza") OR die("Fail to query database ");
      $aaaaa =mysqli_real_escape_string($con,'asassasssas');
      $emailForEdit = mysqli_real_escape_string( $con,$_SESSION['cosEmail']);
      echo $_POST['firstNameEdit'];

      $shippingAdd = $_POST['shipStateEdit'] . ' | ' . $_POST['shipZipcodeEdit'] . ' | ' . $_POST['shipCityEdit'] . ' | ' . $_POST['shipStreetAddrEdit'] . ' | ' . $_POST['shipPostalAddressEdit'];
      $billingAdd = $_POST['billStateEdit'] . ' | ' . $_POST['billZipcodeEdit'] . ' | ' . $_POST['billCityEdit'] . ' | ' . $_POST['billStreetEdit'] . ' | ' . $_POST['billPostalAddressEdit'];


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
                <input type="text" value="<?php  echo $_SESSION['cosFirstName']; ?>" name="firstNameEdit" />
               </div>

               <div class="field-wrap">
               <input type="text" value=<?php echo $_SESSION['cosLastName']; ?> name="lastNameEdit"/>
               </div>
             </div>

             <div class="field-wrap">
              <input type="password" value=<?php echo $_SESSION['cosPassword'] ?> name="passwordEdit"/>
             </div>

             <h2 style="color:#FFFFFF">Costumer Shipping Address</h2>
          <div class="top-row">
            <div class="field-wrap">
              <select VALUE=<?php echo $cosShip[0]; ?> name=shipStateEdit>
                <option value="">State</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Chicago">Chicago</option>
                <option value="Florida">Florida</option>
                <option value="Massachusets">Massachusets</option>
                <option value="New York">New York</option>
                <option value="Texas">Texas</option>
              </select>
             </div>

             <div class="field-wrap">
             <input type="text" VALUE=<?php echo $cosShip[1]; ?> name="shipZipcodeEdit"maxlength="6"/>
             </div>
           </div>

           <div class="field-wrap">
            <input type="text" VALUE=<?php echo $cosShip[2]; ?> name="shipCityEdit"/>
           </div>

           <div class="field-wrap">
            <input type="text" VALUE=<?php echo $cosShip[3]; ?> name="shipStreetAddrEdit"/>
           </div>

           <div class="field-wrap">
            <input type="text" VALUE=<?php echo $cosShip[4]; ?> name="shipPostalAddressEdit"/>
           </div>

           <h2 style="color:#FFFFFF">Costumer Billing Address</h2>

           <div class="top-row">
             <div class="field-wrap">
                <select VALUE=<?php echo $cosBill[0]; ?> name=billStateEdit>
                  <option value="">State</option>
                  <option value="Puerto Rico">Puerto Rico</option>
                  <option value="Chicago">Chicago</option>
                  <option value="Florida">Florida</option>
                  <option value="Massachusets">Massachusets</option>
                  <option value="New York">New York</option>
                  <option value="Texas">Texas</option>
                </select>
            </div>

              <div class="field-wrap">
              <input type="text" VALUE=<?php echo $cosBill[1]; ?> name="billZipcodeEdit"maxlength="6"/>
              </div>
            </div>

            <div class="field-wrap">
             <input type="text" VALUE=<?php echo $cosBill[2]; ?> name="billCityEdit"/>
            </div>

            <div class="field-wrap">
             <input type="text" VALUE=<?php echo $cosBill[3]; ?> name="billStreetEdit"/>
            </div>

            <div class="field-wrap">
             <input type="text" VALUE=<?php echo $cosBill[4]; ?> name="billPostalAddressEdit"/>
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
