<?php
include 'recycle/topbar.php';

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
        <li><a href="#">Report</a></li>
        <li class="active"> Report Revenue</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </thead>
                <tbody>


              
                </tbody>
                <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!--WEEK -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Report Revenue by week</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
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
              <h3 class="box-title">Report Revenue by Month</h3>
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
