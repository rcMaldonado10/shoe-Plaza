<!DOCTYPE html>

<html >
<head>
  <meta charset="UTF-8">
  <title>Adrress</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link href="includes/signUpStyle.css" rel="stylesheet" type="text/css">

  <?php
  if(isset($_POST['Save']))
  {
      $con= new mysqli("localhost", "root", "", "shoeplaza") OR die("Fail to query database ");
      session_start();

      $emailForEdit = $_SESSION['Email'];
      echo $_POST['firstNameEdit'];
      if($_POST['firstNameEdit'] != $_SESSION['cosFirstName'])
      $sql = "UPDATE customer SET FirstName = '$_POST['firstNameEdit']' WHERE Email = $emailForEdit";

      if($_POST['lastNameEdit'] != $_SESSION['cosLastName'])
      $sql = "UPDATE customer SET LastName=$_POST['lastNameEdit'] WHERE Email= $emailForEdit";

      if($_POST['passwordEdit'] != $_SESSION['cosPassword'])
      echo "waka waka eh eh";
      //$sql = "UPDATE customer SET LastName=$_POST['lastNameEdit'] WHERE Email=emailForEdit";

      // if()
      // $sql = "UPDATE customer SET Shipping_Address='' WHERE Email=emailForEdit";
      // $sql = "UPDATE customer SET Billing_Address='lastNameSignUp' WHERE Email=emailForEdit";
      //
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
          <h1>Account Setings</h1>
          <form action="userSettings.php" method="post">
            <div class="top-row">
              <div class="field-wrap">
                <input type="text" value=<?php session_start(); echo $_SESSION['cosFirstName']; ?> name="firstNameEdit" />
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
              <select name=shipStateEdit>
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
             <input type="text"name="shipZipcodeEdit"maxlength="6"/>
             </div>
           </div>

           <div class="field-wrap">
            <input type="text" name="shipCityEdit"/>
           </div>

           <div class="field-wrap">
            <input type="text" name="shipStreetAddrEdit"/>
           </div>

           <div class="field-wrap">
            <input type="text"name="shipPostalAddressEdit"/>
           </div>

           <h2 style="color:#FFFFFF">Costumer Billing Address</h2>

           <div class="top-row">
             <div class="field-wrap">
                <select name=billStateEdit>
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
              <input type="text"name="billZipcodeEdit"maxlength="6"/>
              </div>
            </div>

            <div class="field-wrap">
             <input type="text" name="billCitEdity"/>
            </div>

            <div class="field-wrap">
             <input type="text"name="billStreetEdit"/>
            </div>

            <div class="field-wrap">
             <input type="text"name="billPostalAddressEdit"/>
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
