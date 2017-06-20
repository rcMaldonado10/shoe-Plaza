<!-- Report Order Page -->
<?php

include 'recycle/topbar.php';

$db= mysqli_connect("localhost", "root", "", "shoeplaza");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Report Order
        <!-- <small>by Order ID, Customer ID and Product ID</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active"> Report Order</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">


            <!-- /.box -->
            <form method="post" action="data22.php?>">
            <!--WEEK -->
            <?php
            
            //$CosID = $_SESSION['cosCustomerID'];
            //echo $CosID;
            //     SELECT CompanyID,order_.Credit_Payment,has.CustomerID,order_.OrderID from has,order_,is_in,shipper where has.CustomerID = '2'GROUP BY order_.OrderID
            $sql ="SELECT CompanyID,order_.Credit_Payment,order_.OrderID,CustomerID from has,order_,is_in,shipper GROUP by order_.OrderID";
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
                    <th> OrderID </th>
                    <th> Company </th>
                    <th> Customer </th>
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
                    <?php $sqlCus = "SELECT Full_Name from customer where CustomerID =  $row[CustomerID]";
                          $resultCus=mysqli_query($db,$sqlCus) or die("Bad query: $sqlCus");
                          $rowCus =mysqli_fetch_array($resultCus);
                          echo $row['CustomerID'] ;?>
                          <td><?php echo $rowCus["Full_Name"]; ?></td>
                          <?php $credit = explode(" ",$rowCredit["Number"])  ?>
                    <td><?php echo "**** **** **** ".$credit[3]; ?></td>

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
