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
        if(isset($_POST['Save']))
          {
            $newpass = $_POST['password'];
            $emailToChek = $_SESSION['cosEmail'];
            $con= new mysqli("localhost", "root", "", "shoeplaza") OR die("Fail to query database ");
            $sql = "UPDATE `customer` SET `Password`= '$newpass' WHERE Email = '$emailToChek'";
            $result = mysqli_query($con, $sql) or die("Bad query: $sql");
            header("location:singUpPage.php");
          }
        ?>
</head>
<body>
  <div class="form">


      <div class="tab-content">
        <div id="signup">
          <h1>Forgot Password :(</h1>
          <form method="post">
            <div class="field-wrap">
              <label>
                New Password<span class="req">*</span>
              </label>
            <input type="password"required autocomplete="off" name="password"/>
           </div>


  <form>
    <div class="form-container">
            </div>
          <input type="submit" class="button button-block" VALUE="Save" Name="Save" >
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
