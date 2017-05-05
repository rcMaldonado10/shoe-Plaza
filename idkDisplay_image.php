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
if(isset($_POST['upload']))
{
      $target = "images/".basename($_FILES['image']['name']);
      $db = mysql_connect("localhost", "root", "", "testdb2");

      $image = $_FILES['image']['name'];
      $text = $_POST['text'];

    $sql = "INSERT INTO testuser(image,texts) VALUES('$image','$text')";
      // $image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
      // $image_name = addslashes($_FILES['image']['name']);
      // $sql = "INSERT INTO testuser (`password`, `images`) VALUES ('{$image_name}','{$image}')";
      // if (!mysql_query($sql)) { // Error handling
      //     echo "Something went wrong! :(";
      // }
      if(move_uploaded_file($_FILES['image']['tmp_name'], $target))
      {
        $msg = "Image Uploaded successfully";
      }
      else {
        $msg = "There was a problem uploading image";
      }
  }
?>
<html>
  <body>
     <div id="content">
       <form method="post" action="idkDisplay_image.php" enctype="multipart/form-data">
         <input type="hidden" name="size" value="100000">
         <div>
           <input type="file" name="image">
         </div>
         <div>
         <textarea name="text" cols="40" rows="4" placeholder="Say something..."></textarea>
       </div>
       <div>
         <input type="submit" name="upload" value="Upload Image">
       </div>
       </form>
     </div>
  </body>
</html>
