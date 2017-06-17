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
              $sql ="SELECT order_.OrderID, CustomerID, ProductID, STATUS , Quantity FROM order_, is_in, has where 'order_.OrderID' = 'has.OrderID' and 'order_.OrderID' = 'is_in.OrderID' and 'is_in.OrderID' = 'has.OrderID'";
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
                      <th>CustomerID</th>
                      <th>ProductID</th>
                      <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>

                      <?php
                      while ($row =mysqli_fetch_array($result)) {
                      ?>
                      <tr>
                      <td><?php echo $row["order_.OrderID"]; ?></td>
                      <td><?php echo $row["CustomerID"]; ?></td>
                      <td><?php echo $row["ProductID"]; ?></td>
                      <td><?php echo $row["STATUS"]; ?></td>
                      <td><?php echo $row["Quantity"]; ?></td>
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
