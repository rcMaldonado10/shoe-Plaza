<!-- <html>
<body>

<form method="GET" action=" " >
 <input type="file" name="your_imagename">
 <input type="submit" name="display_image" value="Display">
</form>

</body>
</html> -->


<?php

// $getname = $_GET[' your_imagename '];
//
// echo "< img src = fetch_image.php?name=".$getname." width=200 height=200 >";
$msg="";
$serverName = "localhost";
$userName = "root";
$password = "";
$Table = "testdb2";

$db =  new mysqli($serverName,$userName,$password,$Table) or die("Unable to connect");
if(isset($_POST['upload']))
{

      $target = "images/".basename($_FILES['image']['name']);


      $image = $_FILES['image']['name'];
      $text = $_POST['text'];

        $fileImage = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

      // $image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
      // $image_name = addslashes($_FILES['image']['name']);
      // $sql = "INSERT INTO testuser (`password`, `images`) VALUES ('{$image_name}','{$image}')";
      // if (!mysql_query($sql)) { // Error handling
      //     echo "Something went wrong! :(";
      // }
      $temp = explode(".", $image);
      // echo $temp[0]."1 <br> ";
      // echo $temp[1]."2 <br>";
      // echo $temp[2]."3 <br>";
      // $tempo = explode("images/",$target);// esta no sirve muy bien esta forma
      // echo $tempo[0]."1 <br> ";
      // echo $tempo[1]."2 <br>";
      // echo $tempo[2]."3 <br>";
      $newfilename = "images/" . $_POST['imageName'] . '.' . end($temp);
      $sql = "INSERT INTO testuser(image,texts,imageBlob) VALUES('$newfilename','$text','$fileImage')";
      if(move_uploaded_file($_FILES['image']['tmp_name'], $newfilename))
      {
        $msg = "Image Uploaded successfully";
        echo $target;
        $result = mysqli_query($db, $sql) or die("Bad query: $sql");
      }
      else {
        $msg = "There was a problem uploading image";
      }
  }
?>
<html>
  <body>
     <div id="content">
       <!-- action="idkDisplay_image.php" -->
       <form method="post"  enctype="multipart/form-data">
         <input type="hidden" name="size" value="100000">
         <div>
           <input type="file" name="image">
         </div>
         <div>
         <textarea name="imageName" cols="40" rows="4" placeholder="image name..."></textarea>
       </div>
         <div>
         <textarea name="text" cols="40" rows="4" placeholder="Say something..."></textarea>
       </div>
       <div>
         <input type="submit" name="upload" value="Upload Image">
       </div>
       </form>
       <table class="table table-bordered">
                     <tr>
                          <th>Image</th>
                     </tr>
                <?php

                $query = "SELECT * FROM testuser ORDER BY id DESC";
                $result = mysqli_query($db, $query);
                while($row = mysqli_fetch_array($result))//esto ense~a las imagenes en la pagina
                {
                    $temp = explode(".", $row['image']);
                     echo $temp[0]. " . " .$temp[1] . '<br>
                          <tr>
                               <td>
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['imageBlob'] ).'" height="200" width="200" class="img-thumnail" />
                               </td>
                          </tr>
                     ';
                }
                ?>
                </table>
     </div>
  </body>
</html>
<!-- <script>
$(document).ready(function(){
      $('#insert').click(function(){
           var image_name = $('#image').val();
           if(image_name == '')
           {
                alert("Please Select Image");
                return false;
           }
           else
           {
                var extension = $('#image').val().split('.').pop().toLowerCase();
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                {
                     alert('Invalid Image File');
                     $('#image').val('');
                     return false;
                }
           }
      });
 });
 </script> -->
