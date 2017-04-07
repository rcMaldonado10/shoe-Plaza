<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign Up/Sign In Form</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

      <link href="includes/signUpStyle.css" rel="stylesheet" type="text/css">
      <?PHP

        if (isset($_POST['SingUP']))
      {

            // //session_unset();
            // @session_destroy();
            // session_start();
            // $_SESSION['CosFirstName'] = $_POST['firstNameSignUp'];
            // $_SESSION['CosLastName']  = $_POST['lastNameSignUp'];
            // $_SESSION['CosEmail']  = $_POST['email'];
            // $_SESSION['CosPassword']  = $_POST['password'];
            //
            // $_SESSION['CreName']  = $_POST['first-name'];
            // $_SESSION['CreNumber']  = $_POST['number'];
            // $_SESSION['CosCvc']  = $_POST['cvc'];
            // $_SESSION['CreExpiry']  = $_POST['expiry'];


            // $serverName = "localhost";
            // $userName = "root";
            // $pass = "";
            // $Table = "testdb2";

            //$dateBase = new mysqli($serverName,$userName,$pass,$Table) or die("Unable to connect");
            //
            // $sql = "INSERT INTO table1 (Nombre,Apellido,numero) VALUES('$firstName','$lastName','$number')";
            // //$sql = "INSERT INTO table1 (Nombre,Apellido,numero) VALUES('Yatio','Snow','46')";
            // $result = mysqli_query($dateBase, $sql) or die("Bad query: $sql");
            // echo "Good Query";

            header("location:signUp2nd.php");
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
          <form action="signUp2nd.php" method="get">

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
                  MM / YY<span class="req">*</span>
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
          <input type="submit" class="button button-block" VALUE = "Continue" Name = "SingUP" >
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

          <form action="/" method="post">

            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off"/>
          </div>

          <p class="forgot"><a href="#">Forgot Password?</a></p>

          <button class="button button-block"/>Log In</button>

          </form>

        </div>

      </div><!-- tab-content -->

</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="includes/chuleria.js"></script>

</body>
</html>
