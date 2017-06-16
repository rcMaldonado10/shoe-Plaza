
<?php
// UPDATE PRODUCT
include 'recycle/topbar.php';

$db =  new mysqli("localhost", "root", "", "shoeplaza") or die("Unable to connect");

//  delete a product by Product ID

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update Customer
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Update</a></li>
        <li class="active">Update Customer</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
          <!--.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table Of Customer</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <?php
                  $sql ="SELECT * FROM Customer";
                  $result=mysqli_query($db,$sql);
                  ?>
            <table class="table table-bordered table-striped">
                  <thead>
                  <form method="post" action="editors2.php">
                  <tr>
                  <th>Action</th>
                  <th>Status</th>
                  <th>Email</th>
                  <th>Full Name</th>
                  <th>Password</th>
                  <th>Shipping</th>
                  <th>Billing</th>

                  </tr>
                  </thead>
                  <tbody>

                 <?php
                  while ($row =mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                    <td> <button class="btn btn-info"name="editCustomer" value=" <?= $row['CustomerID'] ?>"> Edit</button></td>
                    <td><?php echo $row["Status"]; ?></td>
                    <td><?php echo $row["Email"]; ?></td>
                    <td><?php echo $row["Full_Name"]; ?></td>
                    <td><?php echo $row["Password"]; ?></td>
                    <td><?php echo $row["Shipping_Address"]; ?></td>
                    <td><?php echo $row["Billing_Address"]; ?></td>

                    </tr>

              <?php } ?>
                  </table>
                    </form>
                  </tbody>
            </div>
            <!-- /.box-body -->
          </div>

  <!-- /.content-wrapper -->
  <?php include 'recycle/footer.php'; ?>

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
