
<?php
$db= mysqli_connect("localhost", "root", "", "shoeplaza");

  if(isset($_POST['submit_data'])){

    $sql ="INSERT INTO shoe VALUES ('','$_POST[brand]','$_POST[model]','$_POST[category]','$_POST[gender]','$_POST[size]','$_POST[stock]', '$_POST[price]','$_POST[imgsource]','$_POST[details]')";
    mysqli_query($db,$sql);}

    if(isset($_POST['delete_data'])){

      $sql ="DELETE FROM shoe WHERE ProductID='$_POST[id]'";
      mysqli_query($db,$sql);}

?>

<?php
include 'recycle/topbar.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Products Connectet To Data Base
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add a new product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="general.php" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="Inputbrand">Brand</label>
                  <input type="text" name="brand" class="form-control" id="InputBrand" placeholder="Reebook or Nike">
                </div>
                <div class="form-group">
                  <label for="InputModel">Model</label>
                  <input type="text" name="model" class="form-control" id="InputModel" placeholder="Model">
                </div>
                <div class="form-group">
                  <label for="InputCategory">Category</label>
                  <input type="text" name="category" class="form-control" id="InputCategory" placeholder="Sport, Casual, Heels">
                </div>
                <div class="form-group">
                  <label for="InputGender">Gender</label>
                  <input type="text" name="gender" class="form-control" id="InputModel" placeholder="Male (M) or Female (F)">
                </div>
                <div class="form-group">
                  <label for="InputSize">Size</label>
                  <input type="text" name="size" class="form-control" id="InputSize" placeholder="6-10">
                </div>
                <div class="form-group">
                  <label for="Inputquantity">Quantity Stock</label>
                  <input type="text" name="stock" class="form-control" id="InputquantityStock" placeholder="6-10">
                </div>
                <div class="form-group">
                  <label for="Inputprice">price</label>
                  <input type="text" name="price" class="form-control" id="Inputprice" placeholder="$95.00 (Don't include de '$' simbol)">
                </div>
                <div class="form-group">
                  <label for="InputImage_source">Image-source</label>
                  <input type="text" name="imgsource" class="form-control" id="InputImage_source" placeholder="Images/woman1.jpg (example)">
                </div>
                <div class="form-group">
                  <label for="InputDetails">Details</label>
                  <input type="text" name="details" class="form-control" id="InputImage_source" placeholder="This Shoe is great!">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile">


                </div>
                <?php /*if($productID== $row['ProductID']){
                                  echo "This Product Already Exist";
                                }else{
                                  echo "Product Has been added";
                                }
                                */?>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name ="submit_data" class="btn btn-primary">Add Product</button>
              </div>

          </div>
          <!-- /.box -->

          <!-- Form Element sizes -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Delete Product by ID</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label for="InputproductID">Type the Product ID</label>
                <input type="text" name="id" class="form-control" id="Inputproduct_id" placeholder="1-10">
              </div>

              <div class="box-footer">
                <button type="submit" name ="delete_data" class="btn btn-primary">Delete Product</button>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
        </form>
          <!-- /.box -->
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
            echo '<table class="table table-bordered table-striped">
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
                  <th>img-source</th>
                  <th>Details</th>
                  </tr>
                  </thead>
                  <tbody>';


                  while ($row =mysqli_fetch_array($result)) {

                    echo "<tr>";
                    echo "<td>"; echo $row["ProductID"]; echo "</td>";
                    echo "<td>"; echo $row["Brand"]; echo "</td>";
                    echo "<td>"; echo $row["Model"]; echo "</td>";
                    echo "<td>"; echo $row["Category"]; echo "</td>";
                    echo "<td>"; echo $row["Gender"]; echo "</td>";
                    echo "<td>"; echo $row["Size"]; echo "</td>";
                    echo "<td>"; echo $row["Quantity_Stock"]; echo "</td>";
                    echo "<td>"; echo $row["Price"]; echo "</td>";
                    echo "<td>"; echo $row["img-source"]; echo "</td>";
                    echo "<td>"; echo $row["Details"]; echo "</td>";
                    echo "</tr>";
                  }
                  echo "</table>";
                  echo "</tbody>";


                   ?>
            </div>
            <!-- /.box-body -->
          </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.12
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

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
</body>
</html>
