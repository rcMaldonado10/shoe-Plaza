<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

      <link rel="stylesheet" href="signUpStyle.css">
      <?PHP

      if (isset($_POST['SingUP']))
      {
            session_start();
            $_SESSION['firstName'] = $_POST['firstNameS'];
            $_SESSION['lastName']  = $_POST['lastNameS'];
            $_SESSION['email']  = $_POST['emailS'];
            $_SESSION['password']  = $_POST['passwordS'];
            $_SESSION['']  = $_POST['']
            $number = '16';

            $serverName = "localhost";
            $userName = "root";
            $pass = "";
            $Table = "testdb2";

            $dateBase = new mysqli($serverName,$userName,$pass,$Table) or die("Unable to connect");
            //
            // $sql = "INSERT INTO table1 (Nombre,Apellido,numero) VALUES('$firstName','$lastName','$number')";
            // //$sql = "INSERT INTO table1 (Nombre,Apellido,numero) VALUES('Yatio','Snow','46')";
            // $result = mysqli_query($dateBase, $sql) or die("Bad query: $sql");
            // echo "Good Query";
      }



      ?>
</head>

<body background="images/Shoes-WallpaperHD.jpg">
  <div class="form">

      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>

      <div class="tab-content">
        <div id="signup">
          <h1>Sign Up for Free</h1>
          <form action="home.php" method="post">

          <div class="top-row">
            <div class="field-wrap">
               <label>
                 First Name<span class="req">*</span>
               </label>
              <input type="text" required autocomplete="off" name="firstName" />
             </div>

             <div class="field-wrap">
               <label>
                 Last Name<span class="req">*</span>
               </label>
             <input type="text"required autocomplete="off" name="lastName"/>
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

      <input id="input-field" type="text" name="streetaddress" required="required" autocomplete="off" maxlength="45" placeholder="Street Address*"/><br>
      <input id="column-left" type="text" name="city" required="required" autocomplete="off" maxlength="20" placeholder="City*"/>
      <input id="column-right" type="text" name="zipcode" required="required" autocomplete="off" pattern="[0-9]*" maxlength="5" placeholder="ZIP code*"/><br><br><br>
      <input id="input-field" type="text" name="first-name" required="required" autocomplete="off" maxlength="40" placeholder="Full name as it appears on the card*"/>

        <div class="card-wrapper"></div>
          <input id="input-field" type="text" name="number" placeholder="Card Number*"/><br>
          <input id="column-left" type="text" name="expiry" placeholder="MM / YY *"/>
          <input id="column-right" type="text" name="cvc" placeholder="CCV*"/><br><br><br><br>
          <input type="submit" class="button button-block" VALUE = "Submit" Name = "SingUP" >
  </form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/121761/card.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/121761/jquery.card.js'></script>

    <script src="ChuleriaCC.js"></script>

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

    <script src="chuleria.js"></script>

</body>
</html>
