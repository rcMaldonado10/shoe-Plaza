<?php
//EDIT PRODUCTS

$db = mysqli_connect("localhost","root","","shoeplaza") or die("Unable to connect");
if(isset($_POST['submit']))
{
$id = $_POST['id'];
$newBrand = $_POST['newbrand'];
$newModel = $_POST['newmodel'];
$newCategory = $_POST['newcategory'];
$newGender = $_POST['newgender'];
$newSize6 = $_POST['newsize6'];
$newSize7 = $_POST['newsize7'];
$newSize8 = $_POST['newsize8'];
$newSize9 = $_POST['newsize9'];
$newSize10 = $_POST['newsize10'];
$newModel = $_POST['newmodel'];
$newPrice = $_POST['newprice'];
$newSource = $_POST['newsource'];
$newDetails = $_POST['newdetails'];

  $sql = "UPDATE shoe SET Brand='$newBrand', Model='$newModel',Category='$newCategory',Gender='$newGender' ,`6` ='$newSize6', `7` = '$newSize7',`8` = '$newSize8',`9` = '$newSize9',`10` = '$newSize10', Price='$newPrice',Details = '$newDetails' WHERE ProductID='$id'";
  $result = mysqli_query($db,$sql) or die("Bad query: $sql");
  echo '<script>alert("Product has been updated!")</script>';

  header("location:general3.php");
}

?>
<?php
include 'recycle/topbar.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Text Editors
        <small>Edit the field you desire</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Update Product</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped">

                    <?php

                     if(isset($_POST['edit'])){
                      $edit = $_POST['edit'];
                      $query="SELECT * FROM shoe WHERE ProductID= '$edit'";

                      $result = mysqli_query($db, $query);
                      if(mysqli_num_rows($result) > 0){
                      $row = mysqli_fetch_assoc($result);

                      ?>
                      <form action="editors.php" method="post">
                        ProductID: <?= $row["ProductID"]; ?> <input type="hidden"  name="id" value="<?= $row["ProductID"]; ?>"></input>
                        <div class="form-group">
                          <label for="Inputbrand">Brand</label>
                          <input type="text" name="newbrand" class="form-control"  value="<?= $row['Brand']; ?>">
                        </div>
                        <div class="form-group">
                          <label for="InputModel">Model</label>
                          <input type="text" name="newmodel" class="form-control" value="<?= $row["Model"]; ?>">
                        </div>
                        <div class="form-group">
                          <label for="InputCategory">Category</label>
                          <input name="newcategory" class="form-control" value="<?= $row["Category"]; ?>">
                        </div>
                        <div class="form-group">
                          <label for="InputGender">Gender</label>
                          <input name="newgender" class="form-control" value="<?= $row["Gender"]; ?>">
                        </div>
                        <div class="form-group">
                          <label for="InputSize">Size 6:</label>
                          <input name="newsize6" class="form-control" value="<?= $row["6"]; ?>"></input>
                          <label for="InputSize">Size 7:</label>
                          <input name="newsize7" class="form-control" value="<?= $row["7"]; ?>"></input>
                          <label for="InputSize">Size 8:</label>
                          <input name="newsize8" class="form-control" value="<?= $row["8"]; ?>"></input>
                          <label for="InputSize">Size 9:</label>
                          <input name="newsize9" class="form-control" value="<?= $row["9"]; ?>"></input>
                          <label for="InputSize">Size 10:</label>
                          <input name="newsize10" class="form-control" value="<?= $row["10"]; ?>"></input>
                        </div>

                        <div class="form-group">
                          <label for="Inputprice">Price ($)</label>
                          <input name="newprice" class="form-control" value="<?= $row["Price"]; ?>"></input>
                        </div>
                        <div class="form-group">
                          <label for="Inputprice">Image Source</label>
                          <input name="newsource" class="form-control" value="<?= $row["img-source"]; ?>"></input>
                        </div>
                        <div class="form-group">
                          <label for="InputDetails">Details</label>
                          <input name="newdetails" class="form-control" value="<?= $row["Details"]; ?>"></input>
                        </div>

                      <button class="btn btn-info" name="submit"> Update</button><br>
                    </form>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col-->
      </div>
      <?php
      } else {
          echo '<h1 style="text-align:center;">No shoe was selected</h1>';
      } } ?>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include 'recycle/footer.php'; ?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

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
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIphp5 -->
<script src="../../plugins/bootstrap-wysiphp5/bootstrap3-wysiphp5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIphp5 - text editor
    $(".textarea").wysiphp5();
  });
</script>
</body>
</html>
