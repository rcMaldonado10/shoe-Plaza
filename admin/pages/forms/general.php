
<?php
// ADD PRODUCTS PAGE
$db =  new mysqli("localhost", "root", "", "shoeplaza") or die("Unable to connect");

if(isset($_POST['submit_data']))
{
    if(isset($_FILES["fileToUpload"]) && $_FILES['fileToUpload']['size']>0)
      {
          if($_POST['imageName']!="")
            {
                if($_POST['details']!="" || $_POST['brand']!="" || $_POST['model']!="")
                {

                  $image = $_FILES['fileToUpload']['name'];
                  $text = $_POST['details'];
                  $fileImage = addslashes(file_get_contents($_FILES["fileToUpload"]["tmp_name"]));

                  $tempImage = explode(".", $image);
                  $target = "images/".$_POST['imageName'] . '.' . end($tempImage);
                  $newfilename = "../../../images/". $_POST['imageName'] . '.' . end($tempImage);

                  $query = "SELECT * FROM shoe WHERE `img-source` = '$target'";

                  $resultSelect = mysqli_query($db, $query) or die("Bad query: $query");

                  if(mysqli_num_rows ( $resultSelect ) < 1 )//hacer que
                  {

                            $msg = "<br> Image Uploaded successfully";
                            echo $target;
                            $brand = $_POST['brand'];
                            $model = $_POST['model'];
                            $category = $_POST['category'];
                            $gender = $_POST['gender'];
                            $size = $_POST['size'];
                            $stock = $_POST['stock'];
                            $price = $_POST['price'];
                            // $sql = "INSERT INTO shoe(Brand,Model,Category,Gender,Size,Quantity_Stock,Price,img-source,ImageBlob,Detals) VALUES('$newfilename','$text','$fileImage')";
                            //$sql ="INSERT INTO shoe(Brand,Model,Category,Gender,Size,Quantity_Stock,Price,img-source,imageBlob,Details)VALUES($brand,$model,$category,$gender,$size,$stock,,$newfilename,$fileImage,$text)";
                            $sql ="INSERT INTO shoe(`Brand`,`Model`,`Category`,`Gender`,`Size`,`Quantity_Stock`,`Price`,`img-source`,`Details`)VALUES('$brand','$model','$category','$gender',$size,$stock,$price,'$target','$text')";

                            $result = mysqli_query($db, $sql) or die("Bad query: $sql");
                            move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$newfilename);
                            echo '<script>alert("Item Added")</script>';
                          }
                          else
                          {

                                echo "<br> The name '".$_POST['imageName']."' of the shoe is in use";
                          }

                        }
                        else
                        {
                            echo "Insert all the following fields";
                        }
                      }
                      else
                      {
                          echo "Insert a Name";
                      }
                    }
                    else
                    {
                      echo "Insert a Image";
                    }
                  }
//
if(isset($_POST['delete'])){

    $sql ="DELETE FROM shoe WHERE ProductID='$_POST[delete]'";
    mysqli_query($db,$sql);
    echo '<script>alert("Item Deleted")</script>';

  }
//   //image properties
// //$image= $_FILES["fileToUpload"]["name"]; // name
// //$sourcePath = $_FILES['fileToUpload']['tmp_name']; // Storing source path of the file in a variable
//
// $uploads_dir = '/../../../images';
//
//
//         $tmp_name = $_FILES["fileToUpload"]["tmp_name"];
//         // basename() puede evitar ataques de denegación de sistema de ficheros;
//         // podría ser apropiada más validación/saneamiento del nombre del fichero
//         $name = basename($_FILES["fileToUpload"]["name"]);
//       if(move_uploaded_file("$uploads_dir/$name" , $tmp_name ))
//         {
//           echo "The file ". basename($image). " has been uploaded.";
//         }
//       else
//         {
//           echo "Sorry, there was an error uploading your file.";
//         }
//
//   /*  if (move_uploaded_file($target_file, $sourcePath)) { // move file to folder
//         echo "The file ". basename($image). " has been uploaded.";
//     } else {
//         echo "Sorry, there was an error uploading your file.";
//     }*/
//
// /////////////
// // insert products
//     $sql ="INSERT INTO shoe VALUES ('','$_POST[brand]','$_POST[model]','$_POST[category]','$_POST[gender]','$_POST[size]','$_POST[stock]', '$_POST[price]','Images/$name','$_POST[details]')";
//     mysqli_query($db,$sql);
//         }
//       }
//     }
// }

?>

<?php
include 'recycle/topbar.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add or Delete Products
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Update</a></li>
        <li class="active">Add / Delete Products</li>
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
            <form action="general.php" method="post" enctype="multipart/form-data">
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
                  <select name="category" class="form-control">
                    <option value="Sport">Sport</option>
                    <option value="Casual">Casual</option>
                    <option value="Fation">Fashion</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="InputGender">Gender</label>
                  <select name="gender" class="form-control">
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="InputSize">Size</label>
                  <select name="size" class="form-control">
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="Inputquantity">Quantity Stock</label>
                  <input type="number" name="stock" min="1" max="255"  value="1"  class="form-control text-rigth">
                </div>
                <div class="form-group">
                  <label for="Inputprice">Price ($)</label>
                  <select name="price" id="size" class="form-control">
                    <option value="39.99">$39.99</option>
                    <option value="49.99">$49.99</option>
                    <option value="59.99">$59.99</option>
                    <option value="69.99">$69.99</option>
                    <option value="79.99">$79.99</option>
                    <option value="89.99">$89.99</option>
                    <option value="99.99">$99.99</option>
                  </select><br>
                </div>
                <div class="form-group">
                  <label for="InputDetails">Details</label>
                  <textarea  name="details" class="form-control" id="InputImage_source" placeholder="This Shoe is great!"></textarea>
                </div>
                <div class="form-group">
                  <label for="InputImageName">Image Name</label>
                  <textarea name="imageName" id="InputImage_source2" class="form-control" placeholder="Name of the file"></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="fileToUpload" name="fileToUpload" >


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
                  ?>
            <table class="table table-bordered table-striped">
                  <thead>
                    <form method="post" action="general.php">
                  <tr>
                  <th>ProductID</th>
                  <th>Brand</th>
                  <th>Model</th>
                  <th>Category</th>
                  <th>Gender</th>
                  <th>Size</th>
                  <th>Quantity Stock</th>
                  <th>Price</th>
                  <th>Image</th>
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
                    <td><img src="../../../<?php echo $row["img-source"]; ?>" width="50" height="50"/></td>
                    <td><?php echo $row["Details"]; ?></td>
                    <td> <button class="btn btn-danger"name="delete" value=" <?= $row['ProductID'] ?>"> Delete</button></td>

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
