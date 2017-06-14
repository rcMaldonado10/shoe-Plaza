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
          $sql ="SELECT * FROM order_";
          $result=mysqli_query($db,$sql);
          ?>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Report of Orders of Customer and Product</h3>
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
                  <td><?php echo $row["OrderID"]; ?></td>
                  <td><?php echo $row["CustomerID"]; ?></td>
                  <td><?php echo $row["ProductID"]; ?></td>
                  <td><?php echo $row["status"]; ?></td>
                  </tr>
                  <?php  } ?>


                </tbody>
                <tfoot>
                <tr>
                  <th>OrderID</th>
                  <th>CustomerID</th>
                  <th>ProductID</th>
                  <th>Status</th>
                </tr>
                </tfoot>
              </table>
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
