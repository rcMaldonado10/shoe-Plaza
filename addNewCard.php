<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Add Card</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link href="includes/signUpStyle.css" rel="stylesheet" type="text/css">

      <?PHP
      session_start();
      echo $_SESSION['cosCustomerID'];
      echo $_SESSION['creCustomerID'];
      if(isset($_POST['ADD']))
      {
            echo "aibsd";
            header("location:home.php");
            $nameCre = $_POST['first-name'];
            //echo $_SESSION['creName'];
            $numCre =  $_POST['number'];
            //echo $_SESSION['creNumber'];
            $cvcCre = $_POST['cvc'];
            //echo $_SESSION['creCVC'];
            $expCre = $_POST['expiry'];
            //echo $_SESSION['creExpiry'];
            $sqlSelCred = "INSERT INTO customer_credit_card (Number,Name,Exp_Date,CVC) VALUES ('$numCre','$nameCre','$expCre','$cvcCre')";
            $resultCre = mysqli_query($con, $sqlSelCred) or die("Bad query: $sqlSelCred");

            $LogCos = $_SESSION['cosCustomerID'];

            $sqlSelHas = "SELECT CustomerID,Credit_Card_ID FROM has_a";
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


                      //$sqlSelCred = "INSERT INTO has_a (CustomerID,Credit_Card_ID) VALUES ('$LogCos',)";
                      $sqlSelHas = "SELECT CustomerID,Credit_Card_ID FROM has_a";
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
                                $LogCre = $_SESSION['creCustomerID'];
                                $sqlSelCred = "INSERT INTO has_a (CustomerID,Credit_Card_ID) VALUES ('$LogCos',$LogCre)";
                                //header("location:home.php");
                              }
                          }
                        }

                      echo $_SESSION['creCustomerID'];

                      // header("location:home.php");
                    }
                }
              }
          }
        ?>
</head>
<body>
  <div class="form">

  <form>
    <div class="form-container">
      <div class="personal-information">
        <h1>Add Credit Card</h1>
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
                  <span class="req">*</span>
                </label>
                 <input type="month" required="required" name="expiry"/>
              </div>

              <div class="field-wrap">
                <label>
                  CVC<span class="req">*</span>
                </label>
                <input type="text" required="required" name="cvc"/>
              </div>
            </div>
          <input type="submit" class="button button-block" VALUE="Add Credit Card" name="ADD" >

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
