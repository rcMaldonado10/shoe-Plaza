<?php
$msg="";
$serverName = "localhost";
$userName = "root";
$password = "";
$Table = "testdb2";

$db =  new mysqli($serverName,$userName,$password,$Table) or die("Unable to connect");

if(isset($_POST['upload']))
{
  if(isset($_FILES["image"]) && $_FILES['image']['size']>0)
  {
    if($_POST['imageName']!="")
    {
      if($_POST['text']!="")
      {
        $target = "images/".basename($_FILES['image']['name']);
        $image = $_FILES['image']['name'];
        $text = $_POST['text'];
        $fileImage = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

        $tempImage = explode(".", $image);//esto hace el texto en un array y es mas facil manejar asi(para ejemplos busca en internet)
        $newfilename = "images/" . $_POST['imageName'] . '.' . end($tempImage);

        $query = "SELECT * FROM testuser WHERE image = '$newfilename' ";


        $resultSelect = mysqli_query($db, $query) or die("Bad query: $query");///////////////////////////////////////////////////////////////////////////////////////////me quede aqui

        if(mysqli_num_rows ( $resultSelect ) < 1 )//hacer que
        {

                  $msg = "<br> Image Uploaded successfully";
                  echo $target;

                  $sql = "INSERT INTO testuser(image,texts,imageBlob) VALUES('$newfilename','$text','$fileImage')";
                  $result = mysqli_query($db, $sql) or die("Bad query: $sql");
                  move_uploaded_file($_FILES['image']['tmp_name'], $newfilename);

        }
        else
        {

              echo "<br> The name ".$_POST['imageName']." is in use";
        }

      }
      else
      {
          echo "Insert a Description";
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
