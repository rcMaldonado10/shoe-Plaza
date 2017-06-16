<?php
// ADD Customer and and Cretidcart, and ADMIN PAGE
$db= mysqli_connect("localhost", "root", "", "shoeplaza");

  if(isset($_POST['submit_customer'])){

    if($_POST['first'] != " " || $_POST['last'] != " " || $_POST['email'] != " " || $_POST['password'] != " " )
    {
    $fullName = $_POST['first'] . " " . $_POST['last'];
    $shippingAdd = $_POST['state'] . ' | ' . $_POST['zipcode'] . ' | ' . $_POST['shipCity'] . ' | ' . $_POST['streetAddress'] . ' | ' . $_POST['shipPostalAddress'];
      //echo $shippingAdd;
    $billingAdd = $_POST['stateBill'] . ' | ' . $_POST['zipcodebill'] . ' | ' . $_POST['citybill'] . ' | ' . $_POST['streetAddressBill'] . ' | ' . $_POST['postalAddress'];
    //  echo $billingAdd;
    // inset the customer with all of his info
    $sql = "INSERT INTO customer VALUES (' ','$_POST[email]','$fullName','$_POST[password]','$shippingAdd','$billingAdd','1')";
    //insert all customer credicart info
    $sql2 = "INSERT INTO customer_credit_card VALUES (' ','$_POST[cardNumber]','$_POST[cardName]','$_POST[expCardDate]','$_POST[cardCVC]')";

    $result = mysqli_query($db,$sql) or die("Bad query: $sql");
    $result2 = mysqli_query($db,$sql2) or die("Bad query: $sql2");



// first look for the table customer so we can asign the id to the variable
    $sql3 = "SELECT * FROM customer";

    $email = $_POST["email"];
    $password = $_POST["password"];
    $result3 = mysqli_query($db, $sql3) or die("Bad query: $sql3");
    if (mysqli_num_rows($result3) > 0)
      {
        while($row = mysqli_fetch_assoc($result3))
        {
          $cheqEmail= $row["Email"];
          $cheqPass=  $row["Password"];
          //echo  "email: " . $cheqEmail. " " . $cheqPass. "<br>";
          if ($email==$cheqEmail AND $password == $cheqPass)
            {

              $customerID = $row["CustomerID"];
            }

          }
        }
        // Next look to the customer_credit_card table and id
          $sql4 = "SELECT * FROM customer_credit_card";
          $NumLog = $_POST["cardNumber"] ;
          $NameLog = $_POST["cardName"];
          $resultCre = mysqli_query($db, $sql4) or die("Bad query: $sql4");
          if (mysqli_num_rows($resultCre) > 0)
            {
              while($row = mysqli_fetch_assoc($resultCre))
              {
                $cheqNum= $row["Number"];
                $cheqName=  $row["Name"];
                //echo  "<br> number: " . $cheqNum. " Name: " . $cheqName;  // take slaches to see the entire result printed
                if ($NumLog == $cheqNum)//$cheqNum==$NumLog AND
                  {
                    $creditID = $row['Credit_Card_ID'];

                  }
              }
            }


// then insert the id of customer and credit card id to Table has_a

    $sqlHas_a = "INSERT INTO has_a (CustomerID,Credit_Card_ID) VALUES ($customerID,$creditID)";
    $resultHas_a =  mysqli_query($db, $sqlHas_a) or die("Bad query: $sqlHas_a");

    echo '<script>alert("Customer Added")</script>';
        }
        else {
          echo '<script>alert("Fill all the fields")</script>';
        }
  }

// this is is for inserting Admins
  if(isset($_POST['submit_admin'])){

    $sql ="INSERT INTO admin VALUES (' ','$_POST[email_admin]','$_POST[password_admin]','$_POST[user_admin]')";
    mysqli_query($db,$sql);
      echo '<script>alert("Admin has been Added")</script>';
  }
// this if is for deleting customer and its creidtcard id
  if(isset($_POST['delete_customer'])){
    // delete the customer from data base
      $sql ="DELETE FROM customer WHERE CustomerID='$_POST[delete_customer]'" ;
      mysqli_query($db,$sql);
      // delete his credit card info if the id is the same

      echo '<script>alert("Customer Removed")</script>';
  }


  // this if is for deleting Credit card
    if(isset($_POST['delete_card'])){

      $sql ="DELETE FROM customer_credit_card WHERE Credit_Card_ID ='$_POST[delete_card]'" ;
      mysqli_query($db,$sql);
          echo '<script>alert("Credit Card Removed")</script>';

    }

    // this if is for deleting has_a data base
    if(isset($_POST['delete_has'])){

            $sql ="DELETE FROM has_a WHERE CustomerID='$_POST[delete_has]'";
            mysqli_query($db,$sql);
            echo '<script>alert("Admin Removed")</script>';

    }

// this if is for deleting admins
  if(isset($_POST['delete_admin'])){

        $sql ="DELETE FROM admin WHERE AdminID='$_POST[delete_admin]'";
        mysqli_query($db,$sql);
        echo '<script>alert("Admin Removed")</script>';

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
        Manage Customer and Credit Card info, and Admins
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Update</a></li>
        <li class="active">Add User or Admin</li>
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
              <h3 class="box-title">Add a new customer</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="general2.php" method="post">
              <div class="box-body">

                <div class="form-group">
                  <label for="InputModel">First Name</label>
                  <input type="text" name="first" class="form-control" id="InputModel" placeholder="">
                </div>
                <div class="form-group">
                  <label for="InputCategory">Last Name</label>
                  <input type="text" name="last" class="form-control" id="InputCategory" placeholder="">
                </div>
                <div class="form-group">
                  <label for="Inputbrand">Email</label>
                  <input type="text" name="email" class="form-control" id="InputBrand" placeholder="user@example.com">
                </div>
                <div class="form-group">
                  <label for="InputGender">Password</label>
                  <input type="text" name="password" class="form-control" id="InputModel" placeholder="">
                </div>
                <h3 class="box-title">Credit Card Info</h3>
                <div class="form-group">
                  <label for="Inputprice">Name of The Card</label>
                  <input type="text" name="cardName" class="form-control" id="Inputprice" placeholder="Full Name">
                </div>
                <div class="form-group">
                  <label for="Inputprice">Number</label>
                  <input type="text" name="cardNumber" class="form-control" id="Inputprice" placeholder="555-555-555-555">
                </div>
                <div class="form-group">
                  <label for="Inputprice">Exp Date</label>
                  <input type="month" name="expCardDate" class="form-control" id="Inputprice" placeholder="2018-12-30">
                </div>

                <div class="form-group">
                  <label for="Inputprice">CVC</label>
                  <input type="text" name="cardCVC" class="form-control" id="Inputprice" placeholder="000">
                </div>
              <h3 class="box-title">Customer Shipping Address</h3>
                <div class="form-group">
                  <label for="InputSize">State</label>
                  <select name="state" class="form-control" id="InputSize" required autocomplete="off">
                    <option value="Puerto Rico">Puerto Rico</option>
                    <option value="Chicago">Chicago</option>
                    <option value="Florida">Florida</option>
                    <option value="Massachusets">Massachusets</option>
                    <option value="New York">New York</option>
                    <option value="Texas">Texas</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="Inputquantity">Zipcode</label>
                  <input type="text" name="zipcode" class="form-control" id="InputquantityStock" placeholder="">
                </div>
                <div class="form-group">
                  <label for="InputSize">City</label>
                  <input type="text" name="shipCity" class="form-control" id="InputSize" placeholder="">
                </div>
                <div class="form-group">
                  <label for="Inputquantity">Street Address</label>
                  <input type="text" name="streetAddress" class="form-control" id="InputquantityStock" placeholder="">
                </div>
                <div class="form-group">
                  <label for="Inputquantity">Postal Address</label>
                  <input type="text" name="shipPostalAddress" class="form-control" id="InputquantityStock" placeholder="">
                </div>
                <h3 class="box-title">Customer Billing Address</h3>
                <div class="form-group">
                  <label for="InputSize">State</label>
                  <select name="stateBill" class="form-control" id="InputSize" required autocomplete="off">
                    <option value="Puerto Rico">Puerto Rico</option>
                    <option value="Chicago">Chicago</option>
                    <option value="Florida">Florida</option>
                    <option value="Massachusets">Massachusets</option>
                    <option value="New York">New York</option>
                    <option value="Texas">Texas</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="Inputquantity">Zipcode</label>
                  <input type="text" name="zipcodebill" class="form-control" id="InputquantityStock" placeholder="">
                </div>
                <div class="form-group">
                  <label for="Inputquantity">City</label>
                  <input type="text" name="citybill" class="form-control" id="InputquantityStock" placeholder="">
                </div>
                <div class="form-group">
                  <label for="Inputquantity">Street Address</label>
                  <input type="text" name="streetAddressBill" class="form-control" id="InputquantityStock" placeholder="">
                </div>
                <div class="form-group">
                  <label for="Inputquantity">Postal Address</label>
                  <input type="text" name="postalAddress" class="form-control" id="InputquantityStock" placeholder="">
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
                <button type="submit" name ="submit_customer" class="btn btn-primary">Add Customer</button>
              </div>

          </div>
          </form>
          <!-- /.box -->
          <!-- Form Admin sizes -->
          <form action="general2.php" method="post">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add new Admin</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label for="InputproductID">Email</label>
                <input type="text" name="email_admin" class="form-control" id="Inputproduct_id" placeholder="user@example">
              </div>
              <div class="form-group">
                <label for="InputproductID">Password</label>
                <input type="text" name="password_admin" class="form-control" id="Inputproduct_id" placeholder="password">
              </div>
              <div class="form-group">
                <label for="InputproductID">Username</label>
                <input type="text" name="user_admin" class="form-control" id="Inputproduct_id" placeholder="username">
              </div>
              <div class="box-footer">
                <button type="submit" name ="submit_admin" class="btn btn-primary">Add Admin</button>
              </div>
            </div>
            </form>
            <!-- /.box-body -->
          </div>
          <!-- Form Delete Customer  -->


          <!--.box -->
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table Of Customer </h3>
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
                    <form method="post" action="general2.php">
                    <th>ID</th>
                    <th>Email</th>
                    <th>Full Name</th>
                    <th>Password</th>
                    <th>Shipping Address</th>
                    <th>Billing Address</th>
                    <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                  while ($row =mysqli_fetch_array($result)) {
                    ?>

                    <tr>
                    <td><?php echo $row["CustomerID"]; ?></td>
                    <td><?php echo $row["Email"]; ?></td>
                    <td><?php echo $row["Full_Name"]; ?></td>
                    <td><?php echo $row["Password"]; ?></td>
                    <td><?php echo $row["Shipping_Address"]; ?></td>
                    <td><?php echo $row["Billing_Address"]; ?></td>
                    <td> <button class="btn btn-danger" name="delete_customer" value=" <?=$row["CustomerID"]?>"> Delete</button></td>

                    </tr>
                <?php  } ?>
                  </table>
                  <form>
                  </tbody>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
        </div>
          <!--.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table Of Customer Credit Card</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <?php
                  $sql ="SELECT * FROM customer_credit_card";
                  $result=mysqli_query($db,$sql);
                  ?>
            <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <form method="post" action="general2.php">
                  <th>Credit Card ID</th>
                  <th>Number</th>
                  <th>Name</th>
                  <th>Exp date</th>
                  <th>CVC</th>
                  <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                    <?php
                  while ($row =mysqli_fetch_array($result)) {
                    ?>

                    <tr>
                    <td><?php echo $row["Credit_Card_ID"]; ?></td>
                    <td><?php echo $row["Number"]; ?></td>
                    <td><?php echo $row["Name"]; ?></td>
                    <td><?php echo $row["Exp_Date"]; ?></td>
                    <td><?php echo $row["CVC"]; ?></td>
                    <td> <button class="btn btn-danger" name="delete_card" value=" <?=$row["Credit_Card_ID"]?>"> Delete</button></td>

                    </tr>
                <?php  } ?>
                  </table>
                  </form>
                  </tbody>
            </div>
            <!-- /.box-body -->
          </div>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Table has_a</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <?php
                  $sql ="SELECT * FROM has_a";
                  $result=mysqli_query($db,$sql);
                  ?>
            <table class="table table-bordered table-striped">
                  <thead>
                  <form method="post" action="general2.php">
                  <tr>
                  <th>CustomerID</th>
                  <th>Credit Card ID</th>
                  <th>Action</th>

                  </tr>
                  </thead>
                  <tbody>

                  <?php
                  while ($row =mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                    <td><?php echo $row["CustomerID"];  ?></td>
                    <td><?php echo $row["Credit_Card_ID"]; ?></td>
                    <td> <button class="btn btn-danger" name="delete_has" value=" <?=$row["CustomerID"]?>"> Delete</button></td>

                    </tr>
                <?php  } ?>
                  </table>
                </form>
                  </tbody>



            </div>
            <!-- /.box-body -->
          </div>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table Of Admin</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <?php
                  $sql ="SELECT * FROM admin";
                  $result=mysqli_query($db,$sql);
                  ?>
            <table class="table table-bordered table-striped">
                  <thead>
                    <form method="post" action="general2.php">
                  <tr>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Username</th>
                  <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php
                  while ($row =mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                    <td><?php echo $row["email"];  ?></td>
                    <td><?php echo $row["password"]; ?></td>
                    <td><?php echo $row["username"]; ?></td>
                    <td> <button class="btn btn-danger" name="delete_admin" value=" <?=$row["AdminID"]?>"> Delete</button></td>

                    </tr>
                <?php  } ?>
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
