<html>
 <body>
   <link href="includes/signUpStyle.css" rel="stylesheet" type="text/css">
   <div class="form">
     <h1>Thank You for Joining Us</h1>
          <div class="field-wrap">
            Hello <?php echo $_GET["firstNameSignUp"]; ?> <?php echo $_GET["lastNameSignUp"]; ?>
          </div>

          <div class="field-wrap">
            Your email is <?php echo $_GET["email"]; ?><br>
            With password: <?php echo $_GET["password"]; ?>
          </div>

          <div class="field-wrap">
            Linving in <?php echo $_GET["state"]; ?>, <?php echo $_GET["city"]; ?> with zipcode <?php echo $_GET["zipcode"]; ?>
          </div>

          <div class="field-wrap">
            Street Adress: <?php echo $_GET["streetaddress"]; ?><br>
          </div>

          <div class="field-wrap">
            With credit card in the name of <?php echo $_GET["first-name"]; ?> with number <?php echo $_GET["number"]; ?>
          </div>

          <div class="field-wrap">
            Expires at <?php echo $_GET["expiry"]; ?> and security code is <?php echo $_GET["cvc"]; ?>
          </div>
        </div>

 </body>
 </html>
