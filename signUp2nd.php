<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Adrress</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

      <link href="includes/signUpStyle.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="form">
          <h1>One more Step!</h1>
          <form action="home.php" method="get">

          <div class="top-row">
            <div class="field-wrap">
               <label>
                 State<span class="req">*</span>
               </label>
              <input type="text" required autocomplete="off" name="state" />
             </div>

             <div class="field-wrap">
               <label>
                 Zipcode<span class="req">*</span>
               </label>
             <input type="text" pattern="[0-9]" required autocomplete="off" name="zipcode"maxlength="6"/>
             </div>
           </div>

           <div class="field-wrap">
             <label>
               City<span class="req">*</span>
             </label>
            <input type="text"required autocomplete="off" name="city"/>
           </div>

           <div class="field-wrap">
             <label>
               Billing Address<span class="req">*</span>
             </label>

            <input type="text"required autocomplete="off" name="billingaddress"/>
           </div>

           <div class="field-wrap">
             <label>
               Shipping Address<span class="req">*</span>
             </label>

            <input type="text"required autocomplete="off" name="billingaddress"/>
           </div>
          <input type="submit" class="button button-block" VALUE = "Submit" Name = "SingUP" >
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
