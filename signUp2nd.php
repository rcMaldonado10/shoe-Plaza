<!DOCTYPE html>

<html >
<head>
  <meta charset="UTF-8">
  <title>Adrress</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link href="includes/signUpStyle.css" rel="stylesheet" type="text/css">

  <?php
  if(isset($_POST['SingUP']))
  {
      session_start();
      $firstNameCos = $_SESSION['cosFirstName'];
        //echo $firstNameCos;
      $lastNameCos = $_SESSION['cosLastName'];
        //echo $lastNameCos;
      $emailCos = $_SESSION['cosEmail'];
        //echo $emailCos;
      $passwordCos = $_SESSION['cosPassword'];
        //echo $passwordCos;

      $nameCre = $_SESSION['creName'];
        //echo $nameCre;
      $numberCre = $_SESSION['creNumber'];
        //echo $numberCre;
      $CVCCre = $_SESSION['creCVC'];
        //echo $CVCCre;
      $expiryCre = $_SESSION['creExpiry'];
        //echo $expiryCre;

      $con= new mysqli("localhost", "root", "", "shoeplaza") OR die("Fail to query database ");
      $shippingAdd = $_POST['shipState'] . ' | ' . $_POST['shipZipcode'] . ' | ' . $_POST['shipCity'] . ' | ' . $_POST['shipStreetAddr'] . ' | ' . $_POST['shipPostalAddress'];
        echo $shippingAdd;
      $billingAdd = $_POST['billState'] . ' | ' . $_POST['billZipcode'] . ' | ' . $_POST['billCity'] . ' | ' . $_POST['billStreet'] . ' | ' . $_POST['billPostalAddress'];
        echo $billingAdd;
      $sql = "INSERT INTO customer (Email,FirstName,LastName,Password,Shipping_Address,Billing_Address,Status) VALUES ('$emailCos','$firstNameCos','$lastNameCos','$passwordCos','$shippingAdd','$billingAdd','1')";
      //
      // INSERT INTO `customer_credit_card` (`Credit_Card_ID`, `Number`, `Name`, `Exp_Date`, `CVC`) VALUES (NULL, '123456789', 'Pepe pepe', '2017-09-01', '1234');
      $sql2 = "INSERT INTO customer_credit_card (Number,Name,Exp_Date,CVC) VALUES ('$numberCre','$nameCre','$expiryCre','$CVCCre')";
      //
      if ($result == 0)
      {
        $result = mysqli_query($con,$sql) or die("Bad query: $sql");
        $result2 = mysqli_query($con,$sql2) or die("Bad query: $sql2");
        header("location:home.php");
      }

  }



  ?>

</head>
<body>
  <div class="form">
          <h1>One more Step!</h1>
          <h2 style="color:#FFFFFF">Costumer Shipping Address</h2>
          <form action="signUp2nd.php" method="post">

          <div class="top-row">
            <div class="field-wrap">
              <select name=shipState class="req" required autocomplete="off">
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
                <select name=billState class="req" required autocomplete="off">
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

             <input type="text"required autocomplete="off" name="billPostalAddress"/>
            </div>
        <input type="submit" class="button button-block" VALUE="Submit" Name="SingUP" >

  </form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="includes/ChuleriaCC.js"></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="includes/chuleria.js"></script>

</body>
</html>
