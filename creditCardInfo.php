<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Credit card validation with card.js</title>
      <link rel="stylesheet" href="creditCardStyle.css">
</head>

<body background="images/Shoes-WallpaperHD.jpg">
  <div class="body-text">Please enter credit card information</div>
  <form>
    <div class="form-container">
      <div class="personal-information">
        <h1>Payment Information</h1>
      </div> <!-- end of personal-information -->

      <input id="input-field" type="text" name="streetaddress" required="required" autocomplete="on" maxlength="45" placeholder="Street Address"/>
      <input id="column-left" type="text" name="city" required="required" autocomplete="on" maxlength="20" placeholder="City"/>
      <input id="column-right" type="text" name="zipcode" required="required" autocomplete="on" pattern="[0-9]*" maxlength="5" placeholder="ZIP code"/>
      <input id="input-field" type="text" name="full-name" required="required" autocomplete="on" maxlength="40" placeholder="Full name as it appears on the card"/>

        <div class="card-wrapper"></div>
          <input id="input-field" type="text" name="number" placeholder="Card Number"/>
          <input id="column-left" type="text" name="expiry" placeholder="MM / YY"/>
          <input id="column-right" type="text" name="cvc" placeholder="CCV"/>
          <input id="input-button" type="submit" value="Submit"/>
  </form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/121761/card.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/121761/jquery.card.js'></script>

    <script src="ChuleriaCC.js"></script>

</body>
</html>
