<html>
<head>
<title>A BASIC HTML FORM</title>
<?PHP

          // $sql = "INSERT INTO testuser (firstName,lastName,email,password) VALUES('$firstName','$lastName','$email','$passwords')";
          //$sql = "INSERT INTO table1 (Nombre,Apellido,numero) VALUES('Yatio','Snow','46')";
          //$result = mysqli_query($dateBase, $sql) or die("Bad query: $sql");
          //echo "Good Query";

?>
<html>
<body>

<form method="get" action=" " >
<input type="file" name="your_imagename">
<input type="submit" name="display_image" value="Display">
</form>

</body>
</html>


<?php

          $serverName = "localhost";
          $userName = "root";
          $password = "";
          $Table = "testdb2";

          $dateBase = new mysqli($serverName,$userName,$password,$Table) or die("Unable to connect");
          $sql = "SELECT * FROM testuser";
$getname = $_GET[' your_imagename '];

echo "< img src = fetch_image.php?name=".$getname." width=200 height=200 >";

?>
