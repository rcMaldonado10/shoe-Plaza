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
            $_SESSION['firstName'] = $_POST['firstName'];
            $_SESSION['lastName']  = $_POST['lastName'];
            $number = '16';

            $serverName = "localhost";
            $userName = "Yatio";
            $password = "mayo1996";
            $Table = "testdb1";

            // $dateBase = new mysqli($serverName,$userName,$password,$Table) or die("Unable to connect");
            //
            // $sql = "INSERT INTO table1 (Nombre,Apellido,numero) VALUES('$firstName','$lastName','$number')";
            // //$sql = "INSERT INTO table1 (Nombre,Apellido,numero) VALUES('Yatio','Snow','46')";
            // $result = mysqli_query($dateBase, $sql) or die("Bad query: $sql");
            // echo "Good Query";
      }



      ?>
</head>

<body>
  <div class="form">

      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>

      <div class="tab-content">
        <div id="signup">
          <h1>Sign Up for Free</h1>

          <form action="idk.php" method="post">

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
            <INPUT type="submit" class="button button-block" VALUE = "Get Started" Name = "SingUP" >

<!-- <?php
function myChange(){
$servername = "localhost";
$username = "Yatio";
$password = "mayo1996";
$Table = "testdb1";

$dateBase = new mysqli($servername,$username,$password,$Table) or die("Unable to connect");

$firstName = $_POST['firstName'];
echo firstName;

$sql = "INSERT INTO table1 (Nombre,Apellido,numero) VALUES('Hola','idk','16')";
$result = mysqli_query($dateBase, $sql) or die("Bad query: $sql");
echo "Good Query";
}



 ?> -->
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
