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
        <small>by Order ID, Customer ID and Product ID</small>
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

                        <!--WEEK -->
                        <?php
                        $db= mysqli_connect("localhost", "root", "", "shoeplaza");
                        //echo $CosID;
                        $OrderID = $_POST['IdOrder'];
                        echo $OrderID;
                             //SELECT CompanyID,order_.status,order_.DateOrderMade,order_.Credit_Payment, is_in.ProductID,is_in.Quantity,is_in.OrderID  from has,order_,is_in,shipper  where order_.OrderID = 53       and order_.OrderID = has.OrderID and has.OrderID = 53       and has.OrderID = is_in.OrderID and has.CustomerID = 2   GROUP BY is_in.ProductID
                        $sql ="SELECT CompanyID,order_.status,order_.DateOrderMade,order_.Credit_Payment, is_in.ProductID,is_in.Quantity,is_in.OrderID,Size  from has,order_,is_in,shipper  where order_.OrderID = $OrderID and order_.OrderID = has.OrderID and has.OrderID = $OrderID and has.OrderID = is_in.OrderID  GROUP BY is_in.ProductID";
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
                                <th>Image</th>
                                <th>Brand and Model</th>
                                <th>Quantity</th>
                                <th>Size</th>
                                <th>Status</th>
                              </tr>
                              </thead>
                              <tbody>

                                <?php
                                $veces = 0;

                                while ($row =mysqli_fetch_array($result))
                                {

                                  $sqlShoe = "SELECT * from shoe where ProductID = $row[ProductID]";
                                  $resultShoe=mysqli_query($db,$sqlShoe) or die("Bad query: $sqlShoe");
                                  $rowShoe =mysqli_fetch_array($resultShoe);
                                  $sqlShipper = "SELECT CompanyName from shipper where CompanyID = $row[CompanyID]";
                                  $resultShipper=mysqli_query($db,$sqlShipper) or die("Bad query: $sqlShipper");
                                  $rowShipper =mysqli_fetch_array($resultShipper);
                                  // echo $row['ProductID'] ;
                                ?>
                                <tr>
                                <td><?php echo $row["OrderID"]; ?></td>
                                <td><?php echo $rowShipper["CompanyName"]; ?></td>
                                <?php //$sqlShoe = "SELECT 'img-source' from shoe where ProductID = $row[ProductID]";
                                      //$resultShoe=mysqli_query($db,$sqlShoe) or die("Bad query: $sqlShoe");
                                      //$rowShoe =mysqli_fetch_array($resultShoe);
                                      // echo $row['ProductID'] ;?>
                                      
                                <td><img src="../../../<?php echo $rowShoe['img-source']; ?>" width="100" height="100" alt="Shoe"/></td>

                                <td><?php echo $rowShoe['Brand']." ".$rowShoe['Model'] ;?> </td>
                                <td><?php echo $row["Quantity"]; ?></td>
                                <td><?php echo $row['Size']?></td>
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
