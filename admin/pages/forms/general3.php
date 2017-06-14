
<?php
// ADD PRODUCTS PAGE
include 'recycle/topbar.php';

$db =  new mysqli("localhost", "root", "", "shoeplaza") or die("Unable to connect");

//  delete a product by Product ID

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update Products
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Update</a></li>
        <li class="active">Update Products</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
          <!--.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table Of Products</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <?php
                  $sql ="SELECT * FROM shoe";
                  $result=mysqli_query($db,$sql);
                  ?>
            <table class="table table-bordered table-striped">
                  <thead>
                  <form method="post" action="editors.php">
                  <tr>
                  <th>ProductID</th>
                  <th>Brand</th>
                  <th>Model</th>
                  <th>Category</th>
                  <th>Gender</th>
                  <th>Size</th>
                  <th>Quantity Stock</th>
                  <th>Price</th>
                  <th>img-source</th>
                  <th>Details</th>
                  <th>Action</th>
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
                    <td><?php echo $row["img-source"]; ?></td>
                    <td><?php echo $row["Details"]; ?></td>
                    <td> <button class="btn btn-info"name="edit" value=" <?= $row['ProductID'] ?>"> Edit</button></td>

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
