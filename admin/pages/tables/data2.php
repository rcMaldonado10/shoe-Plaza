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
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Report of Orders of Customer and Product </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <?php
                  $db= mysqli_connect("localhost", "root", "", "shoeplaza");
                  $sql ="SELECT * FROM order_";
                  $result=mysqli_query($db,$sql);
                  ?>
            <table class="table table-bordered table-striped">
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
                    <td><?php echo $row["OrderID"]; ?></td>
                    <td><?php echo $row["CustomerID"]; ?></td>
                    <td><?php echo $row["ProductID"]; ?></td>
                    <td><?php echo $row["status"]; ?></td>
                    </tr>
                <?php  } ?>
                  </table>
                  </tbody>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!--WEEK -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Customers</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <?php
                  $sql ="SELECT * FROM customer";
                  $result=mysqli_query($db,$sql);
                  ?>
            <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>CustomerID</th>
                  <th>Email</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Shipping Address</th>
                  <th>Billing Address</th>
                  <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>

                    <?php
                  while ($row =mysqli_fetch_array($result)) {
                    ?>

                    <tr>
                    <td><?php echo $row["CustomerID"]; ?></td>
                    <td><?php echo $row["Email"]; ?></td>
                    <td><?php echo $row["FirstName"]; ?></td>
                    <td><?php echo $row["LastName"]; ?></td>
                    <td><?php echo $row["Shipping_Address"]; ?></td>
                    <td><?php echo $row["Billing_Address"]; ?></td>
                    <td><?php echo $row["Status"]; ?></td>
                    </tr>
                <?php  } ?>
                  </table>
                  </tbody>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!--Month -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Product</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <?php
                  $sql ="SELECT * FROM shoe";
                  $result=mysqli_query($db,$sql);

                  ?>
            <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>ProductID</th>
                  <th>Brand</th>
                  <th>Model</th>
                  <th>Category</th>
                  <th>Gender</th>
                  <th>Size</th>
                  <th>Quantity Stock</th>
                  <th>Price</th>
                  </tr>
                  </thead>
                  <tbody>

                 <?php
                  while ($row =mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                    <td><?php echo $row["ProductID"]; ?></td>
                    <td><?php echo $row["Brand"]; ?></td>
                    <td><?php echo $row["Model"]; ?></td>
                    <td><?php echo $row["Category"]; ?></td>
                    <td><?php echo $row["Gender"]; ?></td>
                    <td><?php echo $row["Size"]; ?></td>
                    <td><?php echo $row["Quantity_Stock"];?></td>
                    <td><?php echo $row["Price"]; ?></td>
                    <td> </td>
                    </tr>
              <?php }  ?>
                  </table>
                  </tbody>
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
