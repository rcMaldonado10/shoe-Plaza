<!DOCTYPE html>

<html >
<head>
  <meta charset="UTF-8">
  <title>History order</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link href="includes/signUpStyle.css" rel="stylesheet" type="text/css">


</head>
<body>
  <div class="form" >
          <h1>History of Order</h1>

          <div class="row">
            <div class="col-xs-12">

              <!-- /.box -->
              <form method="post" action="historyOrder2.php?>">
              <!--WEEK -->
              <?php
              $db= mysqli_connect("localhost", "root", "", "shoeplaza");
              session_start();
              $CosID = $_SESSION['cosCustomerID'];
              //echo $CosID;
              //     SELECT CompanyID,order_.Credit_Payment,has.CustomerID,order_.OrderID from has,order_,is_in,shipper where has.CustomerID = '2'GROUP BY order_.OrderID
              $sql ="SELECT CompanyID,order_.Credit_Payment,order_.OrderID from has,Customer,order_,is_in,shipper where  has.CustomerID = '$CosID' AND Customer.CustomerID ='$CosID'  GROUP by order_.OrderID DESC";
              $result=mysqli_query($db,$sql) or die("Bad query: $sql");

              ?>
              <div class="box">
              <center>  <div class="box-header">
                  <h3 class="box-title">Your history order are:</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th> OrderID </th>
                      <th> Company </th>
                      <!-- <th>Quantity</th> -->
                      <th> Credit Payment </th>
                    </tr>
                    </thead>
                    <tbody>

                      <?php

                      while ($row =mysqli_fetch_array($result))
                      {
                        $sqlShipper = "SELECT CompanyName from shipper where CompanyID = $row[CompanyID]";
                        $resultShipper=mysqli_query($db,$sqlShipper) or die("Bad query: $sqlShipper");
                        $rowShipper =mysqli_fetch_array($resultShipper);
                        $sqlCredit = "SELECT Number from customer_credit_card where Credit_Card_ID = $row[Credit_Payment]";
                        $resultCredit=mysqli_query($db,$sqlCredit) or die("Bad query: $sqlCredit");
                        $rowCredit =mysqli_fetch_array($resultCredit);
                        // echo $row['ProductID'] ;
                      ?>
                      <tr>
                      <td><?php echo $row["OrderID"]; ?></td>
                      <td><?php echo $rowShipper["CompanyName"]; ?></td>
                      <?php //$sqlShoe = "SELECT 'img-source' from shoe where ProductID = $row[ProductID]";
                            //$resultShoe=mysqli_query($db,$sqlShoe) or die("Bad query: $sqlShoe");
                            //$rowShoe =mysqli_fetch_array($resultShoe);
                            // echo $row['ProductID'] ;?>
                            <?php $credit = explode(" ",$rowCredit["Number"])  ?>
                      <td><?php  error_reporting(0); echo "**** **** **** " . $credit[3]; ?></td>

                      <td><button type="submit" name = "IdOrder"  value= <?php echo $row["OrderID"] ?> >ViewOrder</button></td>
                      </tr>
                      <?php  } ?>


                    </tbody>

                  </table></center>
                </div>
                <!-- /.box-body -->
              </div>

              <!-- /.box -->
              <!--Month -->

              <!-- /.box -->
            </form>
            </div>
            <!-- /.col -->

          </div>

</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="includes/ChuleriaCC.js"></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="includes/chuleria.js"></script>

</body>
</html>
