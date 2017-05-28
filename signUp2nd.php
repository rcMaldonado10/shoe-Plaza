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
      $shippingAdd = $_POST['shipState'] . '^|^' . $_POST['shipZipcode'] . '^|^' . $_POST['shipCity'] . '^|^' . $_POST['shipStreetAddr'] . '^|^' . $_POST['shipPostalAddress'];
        //echo $shippingAdd;
      $billingAdd = $_POST['billState'] . '^|^' . $_POST['billZipcode'] . '^|^' . $_POST['billCity'] . '^|^' . $_POST['billStreet'] . '^|^' . $_POST['billPostalAddress'];
        //echo $billingAdd;
      $sql = "INSERT INTO customer (Email,FirstName,LastName,Password,Shipping_Address,Billing_Address,Status) VALUES ('$emailCos','$firstNameCos','$lastNameCos','$passwordCos','$shippingAdd','$billingAdd','1')";
      //INSERT INTO customer (Email,FirstName,LastName,Password,Shipping_Address,Billing_Address,Status) VALUES ('Pepe@you.com','Pepe','Pepe','IDK','Puerto Rico|00669|Lares|Callejones|box 8545','Puerto Rico|00669|Lares|Callejones|box 8545','1')
      // INSERT INTO `customer_credit_card` (`Credit_Card_ID`, `Number`, `Name`, `Exp_Date`, `CVC`) VALUES (NULL, '123456789', 'Pepe pepe', '2017-09-01', '1234');
      $sql2 = "INSERT INTO customer_credit_card (Number,Name,Exp_Date,CVC) VALUES ('$numberCre','$nameCre','$expiryCre','$CVCCre')";
      //
      $resultss = 0;
      if ($resultss == 0)
      {
        $result = mysqli_query($con,$sql) or die("Bad query: $sql");
        $result2 = mysqli_query($con,$sql2) or die("Bad query: $sql2");
        $sqlSelCos = "SELECT CustomerID, FirstName, LastName, Email, Billing_Address, Shipping_Address, Password FROM customer";

        $emailLog = $emailCos;
        $passLog = $passwordCos;
        $resultCos = mysqli_query($con, $sqlSelCos) or die("Bad query: $sqlSelCos");
        if (mysqli_num_rows($resultCos) > 0)
          {
            while($row = mysqli_fetch_assoc($resultCos))
            {
              $cheqEmail= $row["Email"];
              $cheqPass=  $row["Password"];
              //echo  "email: " . $cheqEmail. " " . $cheqPass. "<br>";
              if ($emailLog==$cheqEmail AND $passLog == $cheqPass)
                {
                  echo " esto se ve bien :D";
                  session_destroy();
                  session_start();

                  $_SESSION['cosCustomerID'] = $row['CustomerID'];
                  $_SESSION['message'] = "You are now logged in";
                  $message="You are now logged in";
                  $_SESSION['cosFirstName'] = $row['FirstName'];
                  $_SESSION['cosLastName'] = $row['LastName'];
                  $_SESSION['cosEmail'] = $row['Email'];
                  $_SESSION['cosBillingAdd'] = $row['Billing_Address'];
                  $_SESSION['cosShipAdd'] = $row['Shipping_Address'];
                  $_SESSION['cosPassword'] = $row['Password'];
                }
            }
          }

          $sqlSelCred = "SELECT Credit_Card_ID, Number, Name, Exp_Date, CVC FROM customer_credit_card";
          $NumLog = $numberCre;
          $NameLog = $nameCre;
          $resultCre = mysqli_query($con, $sqlSelCred) or die("Bad query: $sqlSelCred");
          if (mysqli_num_rows($resultCre) > 0)
            {
              while($row = mysqli_fetch_assoc($resultCre))
              {
                $cheqNum= $row["Number"];
                $cheqName=  $row["Name"];
                echo  "number: " . $cheqNum. " Name: " . $cheqName. "<br>";
                if ($cheqName == $NameLog)//$cheqNum==$NumLog AND
                  {
                    echo " esto se ve bien Credit Card :D";
                    $_SESSION['creCustomerID'] = $row['Credit_Card_ID'];
                    $_SESSION['creNumber'] = $row['Number'];
                    $_SESSION['creName'] = $row['Name'];
                    $_SESSION['creExp'] = $row['Exp_Date'];
                    $_SESSION['creCVC'] = $row['CVC'];
                  }
              }
            }
//($_SESSION['cosCustomerID'],$_SESSION['creCustomerID'])";
$customerID = $_SESSION['cosCustomerID'];
$creditID = $_SESSION['creCustomerID'];
$sqlHas_a = "INSERT INTO has_a (CustomerID,Credit_Card_ID) VALUES ($customerID,$creditID)";
$resultHas_a =  mysqli_query($con, $sqlHas_a) or die("Bad query: $sqlHas_a");





        header("location:home.php");
      }

  }
?>


</head>
<body>
  <div class="form">
          <h1>One more Step!</h1>
          <h2 style="color:#FFFFFF">Customer Shipping Address</h2>
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
