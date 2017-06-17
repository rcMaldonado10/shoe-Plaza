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
  <div class="form">
          <h1>History Order</h1>

          <div class="row">
            <div class="col-xs-12">

              <!-- /.box -->

              <!--WEEK -->
              <?php
              $db= mysqli_connect("localhost", "root", "", "shoeplaza");
              session_start();
              $CosID = $_SESSION['cosCustomerID'];
              echo $CosID;

              $sql ="SELECT order_.CompanyID,order_.status,order_.DateOrderMade,order_.Credit_Payment,has.CustomerID, is_in.ProductID,is_in.Quantity,is_in.OrderID from has,order_,is_in where order_.OrderID = has.OrderID and has.OrderID = is_in.OrderID and has.CustomerID = '$CosID' Order by OrderID";
              $result=mysqli_query($db,$sql) or die("Bad query: $sql");

              ?>
              <div class="box">
              <center>  <div class="box-header">
                  <h3 class="box-title">Your history order Where</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>OrderID</th>
                      <th>CompanyID</th>
                      <th>ProductID</th>
                      <th>Quantity</th>
                      <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>

                      <?php
                      while ($row =mysqli_fetch_array($result)) {
                      ?>
                      <tr>
                      <td><?php echo $row["OrderID"]; ?></td>
                      <td><?php echo $row["CompanyID"]; ?></td>
                      <?php //$sqlShoe = "SELECT 'img-source' from shoe where ProductID = $row[ProductID]";
                            //$resultShoe=mysqli_query($db,$sqlShoe) or die("Bad query: $sqlShoe");
                            //$rowShoe =mysqli_fetch_array($resultShoe);
                            // echo $row['ProductID'] ;?>
                     <img src="<?php echo$rowShoe['img-source']?>" width="150" height="150" alt="Shoe"/> 
                      <td><?php echo$row['ProductID']; ?> </td>
                      <td><?php echo $row["Quantity"]; ?></td>
                      <td><?php echo $row["status"]; ?></td>
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
