<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign Up/Sign In Form</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link href="includes/signUpStyle.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="form">

      <div class="tab-content">

  <form>
    <div class="form-container">
      <div class="personal-information">
        <h1>Edit Payment Information</h1>
      </div> <!-- end of personal-information -->

        <div class="field-wrap">
          <!-- <label>
             Full name as it appears on card<span class="req">*</span>
           </label> -->
          <input type="text" name="first-name" placeholder="Full name as it appears on card*" required="required" autocomplete="off" maxlength="40"/>
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
          <input type="submit" class="button button-block" value="Done" name="done" >
  </form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/121761/card.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/121761/jquery.card.js'></script>

    <script src="includes/ChuleriaCC.js"></script>

           </form>

         </div>

      
      </div><!-- tab-content -->

</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="includes/chuleria.js"></script>

</body>
</html>