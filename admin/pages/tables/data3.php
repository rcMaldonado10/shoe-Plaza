<?php
include 'recycle/topbar.php';
$db= mysqli_connect("localhost", "root", "", "shoeplaza");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Report Revenue
        <small>by day, week and month</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active"> Report Revenue</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <?php

          //$CosID = $_SESSION['cosCustomerID'];
          //echo $CosID;
          //     SELECT CompanyID,order_.Credit_Payment,has.CustomerID,order_.OrderID from has,order_,is_in,shipper where has.CustomerID = '2'GROUP BY order_.OrderID
          $sql ="select * from order_, is_in where order_.OrderID= is_in.OrderID GROUP by DateOrderMade";
          $result=mysqli_query($db,$sql) or die("Bad query: $sql");

          ?>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Report Revenue by day</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Day <small>(Year-Month-Day)</small></th>
                  <!-- <th>Event</th>
                  <th>Status</th> -->
                  <!-- <th>customer email</th> -->
                  <th>Amount Earn</th>
                </tr>
                </thead>
                <tbody>
                  <?php

                  while ($row =mysqli_fetch_array($result))
                  {
                    $Total_Price = 0;
                    $sql2="select price, is_in.ProductID,Size,is_in.Quantity from order_, is_in,shoe where order_.OrderID = is_in.OrderID and is_in.OrderID = $row[OrderID] and is_in.ProductID = shoe.ProductID";
                    $result2=mysqli_query($db,$sql2) or die("Bad query: $sql2");
                    while ($row2 =mysqli_fetch_array($result2))
                    {
                      $Total_Price = $Total_Price + $row2['price'];
                    }
                    // $sqlShipper = "SELECT CompanyName from shipper where CompanyID = $row[CompanyID]";
                    // $resultShipper=mysqli_query($db,$sqlShipper) or die("Bad query: $sqlShipper");
                    // $rowShipper =mysqli_fetch_array($resultShipper);
                    // $sqlCredit = "SELECT Number from customer_credit_card where Credit_Card_ID = $row[Credit_Payment]";
                    // $resultCredit=mysqli_query($db,$sqlCredit) or die("Bad query: $sqlCredit");
                    // $rowCredit =mysqli_fetch_array($resultCredit);
                    // echo $row['ProductID'] ;
                  ?>

                  <tr><?php $day = explode(" ",$row['DateOrderMade'])  ?>
                    <td><?php echo $day[0] ?></td>
                    <!-- <td>sale
                    </td>
                    <td>paid</td>
                    <td>ex@gmail.com</td> -->
                    <td><?php echo $Total_Price; ?></td>

                  </tr>
                    <?php  } ?>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!--WEEK -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Report Sales by week</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <form method="post" action="data1.php">
                    <input type="date" name="today" value="<?php echo date("Y-m-d");?>">
                    <input type="submit" name="a">
                </form>
                <tr>
                  <th>Week</th>
                  <th>Event</th>
                  <th>Status</th>
                  <th>customer email</th>
                  <th>Amount Earn</th>
                </tr>
                </thead>
                <tbody>

                  <tr>
                    <td>Sunday</td>
                    <td>sale
                    </td>
                    <td>paid</td>
                    <td>ex@gmail.com</td>
                    <td>$65.99</td>
                  </tr>
                  <tr>
                    <td>Monday</td>
                    <td>sale</td>
                    <td>paid</td>
                    <td>ex@gmail.com</td>
                    <td>$65.99</td>
                  </tr>
                  <tr>
                    <td>Tuesday</td>
                    <td>sale</td>
                    <td>paid</td>
                    <td>ex@gmail.com</td>
                    <td>$65.99</td>
                  </tr>
                  <tr>
                    <td>Wednesday</td>
                    <td>sale
                    </td>
                    <td>paid</td>
                    <td>ex@gmail.com</td>
                    <td>$65.99</td>
                  </tr>
                  <tr>
                    <td>Thursday</td>
                    <td>sale</td>
                    <td>paid</td>
                    <td>ex@gmail.com</td>
                    <td>$65.99</td>
                  </tr>
                  <tr>
                    <td>Friday</td>
                    <td>sale</td>
                    <td>paid</td>
                    <td>ex@gmail.com</td>
                    <td>$65.99</td>
                  </tr>
                  <tr>
                    <td>Saturday</td>
                    <td>sale</td>
                    <td>paid</td>
                    <td>ex@gmail.com</td>
                    <td>$65.99</td>
                  </tr>

                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!--Month -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Report Sales by Month</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Month</th>
                  <th>2016</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>January</td>
                    <td>$65.99</td>
                  </tr>
                  <tr>
                    <td>February</td>
                    <td>$65.99</td>
                  </tr>
                  <tr>
                    <td>March</td>
                    <td>$65.99</td>
                  </tr>
                  <tr>
                    <td>April</td>
                    <td>$65.99</td>
                  </tr>
                  <tr>
                    <td>May</td>
                    <td>$65.99</td>
                  </tr>
                  <tr>
                    <td>June</td>
                    <td>$65.99</td>
                  </tr>
                  <tr>
                    <td>July</td>
                    <td>$65.99</td>
                  </tr>
                  <tr>
                    <td>August</td>
                    <td>$65.99</td>
                  </tr>
                  <tr>
                    <td>September</td>
                    <td>$65.99</td>
                  </tr>
                  <tr>
                    <td>October</td>
                    <td>$65.99</td>
                  </tr>
                  <tr>
                    <td>November</td>
                    <td>$65.99</td>
                  </tr>
                  <tr>
                    <td>December</td>
                    <td>$65.99</td>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include 'recycle/footer.php'; ?>
<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
