<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign Up/Sign In Form</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

      <link href="includes/signUpStyle.css" rel="stylesheet" type="text/css">
      <?PHP
      session_start();
      if ($_SESSION["message"] == 1)
      {
        echo "";
      }
      else
      {
        echo $_SESSION["message"];
        $_SESSION["message"] = 1;
      }
        if(isset($_POST['SingUP']))
          {
            //@session_destroy();
            // session_start();
            $emailToChek = $_POST['email'];
            $con= new mysqli("localhost", "root", "", "shoeplaza") OR die("Fail to query database ");
            $sql = "SELECT Email FROM customer";
            $result = mysqli_query($con, $sql) or die("Bad query: $sql");
            if (mysqli_num_rows($result) > 0)
              {
                while($row = mysqli_fetch_assoc($result))
                {
                  $emailDB = $row["Email"];
                  if($emailToChek != $emailDB)
                  {
                    // echo $emailToChek . "<br>";
                    // echo $emailDB . "<br>";;
                    // echo "entro aqui <br>";
                    $_SESSION['cosFirstName'] = $_POST['firstNameSignUp'] . " " . $_POST['lastNameSignUp'];
                    //echo $_SESSION['cosFirstName'];
                    //echo $_SESSION['cosLastName'];
                    $_SESSION['cosEmail'] = $_POST['email'];
                    //echo $_SESSION['cosEmail'];
                    $_SESSION['cosPassword'] = $_POST['password'];
                    //echo $_SESSION['cosPassword'];
                    $_SESSION['creName'] = $_POST['first-name'];
                    //echo $_SESSION['creName'];
                    $_SESSION['creNumber'] = $_POST['number'];
                    //echo $_SESSION['creNumber'];
                    $_SESSION['creCVC'] = $_POST['cvc'];
                    //echo $_SESSION['creCVC'];
                    $_SESSION['creExpiry'] = $_POST['expiry'];
                    //echo $_SESSION['creExpiry'];
                    header("location:signUp2nd.php");
                  }
                  else {
                    //echo "este email existe <br>";
                    $_SESSION["message"] = "This email is already used";
                    header("location:singUpPage.php");
                  }
                }
            }
          }
        if(isset($_POST['LogIn']))
          {
            //@session_destroy();
            session_start();
            $emailLog = ($_POST['logEmail']);
            $passLog = ($_POST['logPass']);
            if( "" !== $emailLog || "" !==$passLog)
            {
                    $con= new mysqli("localhost", "root", "", "shoeplaza") OR die("Fail to query database ");
                $sql = "SELECT CustomerID, Full_Name, Email, Billing_Address, Shipping_Address, Password FROM customer";
                $result = mysqli_query($con, $sql) or die("Bad query: $sql");
                if (mysqli_num_rows($result) > 0)
                  {
                    while($row = mysqli_fetch_assoc($result))
                    {
                      $cheqEmail= $row["Email"];
                      $cheqPass=  $row["Password"];
                      $cheqStatus= $row["Status"];
                      echo  "email: " . $cheqEmail. " " . $cheqPass. "<br>";
                      if ($emailLog==$cheqEmail AND $passLog == $cheqPass and $cheqStatus !=0)
                        {

                          //this variable needs to be 1 if he wants to Sign IN




                          //echo " esto se ve bien :D";
                          $_SESSION['cosCustomerID'] = $row['CustomerID'];
                          $LogCos = $row['CustomerID'];
                          //echo $_SESSION['cosCustomerID'];
                          $_SESSION['message'] = "You are now logged in";
                          // $_SESSION['cosFirstName'] = $row['FirstName'];
                          // $_SESSION['cosEmail'] = $row['Email'];
                          // $_SESSION['cosBillingAdd'] = $row['Billing_Address'];
                          // $_SESSION['cosShipAdd'] = $row['Shipping_Address'];
                          // $_SESSION['cosPassword'] = $row['Password'];
                        //  header("location:home.php");
                        

                      }else
                        {
                          echo '<script>alert("email/password combination incorrect")</script>';
                      $_SESSION["message"] = "email/password combination incorrect";
                      //echo $message;
                      header("location:singUpPage.php");
                      //header("location:login.php");
                        }
                    }
                  }
                  $sqlSelHas = "SELECT CustomerID,Credit_Card_ID FROM has_a";
                  $LogCos = $_SESSION['cosCustomerID'];
                  //$sqlSelCred = "SELECT Credit_Card_ID, Number, Name, Exp_Date, CVC FROM customer_credit_card";
                  $resultHas = mysqli_query($con, $sqlSelHas) or die("Bad query: $sqlSelHas");
                  if (mysqli_num_rows($resultHas) > 0)
                    {
                      while($row = mysqli_fetch_assoc($resultHas))
                      {
                        $cheqCos=  $row["CustomerID"];
                        echo  " Name: " . $cheqCos. "<br>";
                        if ($LogCos == $cheqCos)//$cheqNum==$NumLog AND
                          {

                            echo " esto se ve bien has_a :D";
                            $_SESSION['creCustomerID'] = $row['Credit_Card_ID'];
                            echo $_SESSION['creCustomerID'];
                            header("location:home.php");

                          }
                      }
                    }
            }
          }

        ?>
</head>
<body>
  <div class="form">

      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Sign In</a></li>
      </ul>

      <div class="tab-content">
        <div id="signup">
          <h1>Sign Up for Free</h1>
          <form action="singUpPage.php" method="post">

          <div class="top-row">
            <div class="field-wrap">
               <label>
                 First Name<span class="req">*</span>
               </label>
              <input type="text" required autocomplete="off" name="firstNameSignUp" />
             </div>

             <div class="field-wrap">
               <label>
                 Last Name<span class="req">*</span>
               </label>
             <input type="text"required autocomplete="off" name="lastNameSignUp"/>
             </div>
           </div>

           <div class="field-wrap">
             <label>
               Email Address<span class="req">*</span>
             </label>
            <input type="email"required autocomplete="off" name="email"/>
           </div>

           <div class="field-wrap">
             <label>
               Set A Password<span class="req">*</span>
             </label>

            <input type="password"required autocomplete="off" name="password"/>
           </div>

  <form>
    <div class="form-container">
      <div class="personal-information">
        <h1>Payment Information</h1>
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
          <input type="submit" class="button button-block" VALUE="Continue" Name="SingUP" >
  </form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/121761/card.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/121761/jquery.card.js'></script>

    <script src="includes/ChuleriaCC.js"></script>

           </form>

         </div>

        <div id="login">
          <h1>Welcome Back!</h1>

          <form action="singUpPage.php" method="post">

            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name=logEmail />
          </div>

          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name=logPass />
          </div>

          <p class="forgot"><a href="forgotPass.php">Forgot Password?</a></p>

          <button class="button button-block" name="LogIn" />Sign In</button>

          </form>

        </div>

      </div><!-- tab-content -->

</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="includes/chuleria.js"></script>

</body>
</html>
