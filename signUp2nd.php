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
  $firstNameCos = $_REQUEST['firstNameSignUp'];
  $lastNameCos = $_REQUEST['lastNameSignUp'];
  $emailCos = $_REQUEST['email'];
  $passwordsCos = $_REQUEST['password'];

  $nameCre = $_REQUEST['first-name'];
  $numberCre = $_REQUEST['number'];
  $cvcCre = $_REQUEST['cvc'];
  $expCre = $_REQUEST['expiry'];

  echo "name = ".$firstNameCos;
  echo "<br> last = ".$lastNameCos;
  echo "<br> email = ".$emailCos;
  echo "<br> pass = ".$passwordsCos;

  echo "<br> nameCre = ".$nameCre;
  echo "<br> num = ".$numberCre;
  echo "<br> cvc = ".$cvcCre;
  echo "<br> exp = ".$expCre;



  if (isset($_POST['SingUP']))
  {
      $serverName = "localhost";
      $userName = "root";
      $password = "";
      $Table = "shoeplaza";
//asi es como lo tenias antes quisas lo necesites despues
      // $firstNameCos = $_REQUEST['CosFirstName'];
      // $lastNameCos = $_REQUEST['CosLastName'];
      // $emailCos = $_REQUEST['CosEmail'];
      // $passwordsCos = $_REQUEST['CosPassword'];
      //
      // $nameCre = $_REQUEST['CreName'];
      // $numberCre = $_REQUEST['CreNumber'];
      // $cvcCre = $_REQUEST['CosCvc'];
      // $expCre = $_REQUEST['CreExpiry'];

      //$number = '16';
      // // remove all session variables
      // session_unset();
      //
      // // destroy the session
      // session_destroy();


      $dateBase = new mysqli($serverName,$userName,$password,$Table) or die("Unable to connect");

      //          $firstName = $_POST['firstName'];
      //          $lastName = 'Snow';
      //$_POST['lastName'];
      $shippAddress = $_POST['shipState'] . ' | ' . $_POST['shipZipcode'] . ' | ' . $_POST['shipCity'] . ' | ' . $_POST['shipStreetAddr'] . ' | ' . $_POST['shipPostalAddress'];
      $billAddress = $_POST['billState'] . ' | ' . $_POST['billZipcode'] . ' | ' . $_POST['billCity'] . ' | ' . $_POST['billStreetAddr'] . ' | ' . $_POST['billPostalAddress'];
      echo $_POST['shipState'];
      echo $shippAddress;
      echo $billAddress;
        $sql = "INSERT INTO `customer`(`Email`, `FirstName`, `LastName`, `Password`, `Shipping_Address`, `Billing_Address`, `Status`) VALUES ($emailCos  ,$firstNameCos  ,$lastNameCos  ,$passwordsCos  ,$shippAddress  ,$billAddress,  '1')";
//asi me lo dio mysqladmin o como se llame xD^^^^^^^
        //$sql = "INSERT INTO customer (Email,FirstName,LastName,Password,Shipping_Address,Billing_Address,Status) VALUES ($emailCos  ,$firstNameCos  ,$lastNameCos  ,$passwordsCos  ,$shippAddress  ,$billAddress,  1)";
      //$sql = "INSERT INTO customer (email,firstName,lastName,password,Shipping_Address,Billing_Address,status) VALUES('$emailCos','$firstNameCos','$lastNameCos','$passwordsCos','$shippAddress','$billAddress','1')";

      //$sql = "INSERT INTO table1 (Nombre,Apellido,numero) VALUES('Yatio','Snow','46')";
      $result = mysqli_query($dateBase, $sql) or die("Bad query: $sql");
      //echo "Good Query";
      //header("location:signUp2nd.php");
  }

  ?>

</head>
<body>
  <div class="form">
          <h1>One more Step!</h1>
          <h2 style="color:#FFFFFF">Costumer Shipping Address</h2>
          <form action="home.php" method="get">

          <div class="top-row">
            <div class="field-wrap">
               <label>
                 State<span class="req">*</span>
               </label>
              <input type="text" required autocomplete="off" name="shipState" />
             </div>

             <div class="field-wrap">
               <label>
                 Zipcode<span class="req">*</span>
               </label>
             <input type="text" required autocomplete="off" name="shipZipcode"maxlength="6"/>
             </div>
           </div>

           <div class="field-wrap">
             <label>
               City<span class="req">*</span>
             </label>
            <input type="text"required autocomplete="off" name="shipCity"/>
           </div>

           <div class="field-wrap">
             <label>
               Street Address<span class="req">*</span>
             </label>

            <input type="text"required autocomplete="off" name="shipStreetAddr"/>
           </div>

           <div class="field-wrap">
             <label>
               Postal Address<span class="req">*</span>
             </label>

            <input type="text"required autocomplete="off" name="shipPostalAddress"/>
           </div>


           <h2 style="color:#FFFFFF">Costumer Billing Address</h2>


           <div class="top-row">
             <div class="field-wrap">
                <label>
                  State<span class="req">*</span>
                </label>
               <input type="text" required autocomplete="off" name="billState" />
              </div>

              <div class="field-wrap">
                <label>
                  Zipcode<span class="req">*</span>
                </label>
              <input type="text"  required autocomplete="off" name="billZipcode"maxlength="6"/>
              </div>
            </div>

            <div class="field-wrap">
              <label>
                City<span class="req">*</span>
              </label>
             <input type="text"required autocomplete="off" name="billCity"/>
            </div>

            <div class="field-wrap">
              <label>
                Street Address<span class="req">*</span>
              </label>

             <input type="text"required autocomplete="off" name="billStreet"/>
            </div>

            <div class="field-wrap">
              <label>
                 Postal Address<span class="req">*</span>
              </label>

             <input type="text"required autocomplete="off" name="billPostalAddress "/>
            </div>
        <input type="submit" class="button button-block" VALUE = "Continue" Name = "SingUP" >

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
