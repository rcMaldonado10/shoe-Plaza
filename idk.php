<html>
<head>
<title>A BASIC HTML FORM</title>
<?PHP
//
// if (isset($_POST['Submit1'])) {
//
//$firstName = $_POST['firstName'];


          $serverName = "localhost";
          $userName = "root";
          $password = "";
          $Table = "testdb2";

          $firstName =$_REQUEST['firstName'];
          $lastName =$_REQUEST['lastName'];
          $email =$_REQUEST['email'];
          $passwords =$_REQUEST['password'];
          //$number = '16';
          echo "$firstName";
          $dateBase = new mysqli($serverName,$userName,$password,$Table) or die("Unable to connect");

//          $firstName = $_POST['firstName'];
//          $lastName = 'Snow';
          //$_POST['lastName'];

          $sql = "INSERT INTO testuser (firstName,lastName,email,password) VALUES('$firstName','$lastName','$email','$passwords')";
          //$sql = "INSERT INTO table1 (Nombre,Apellido,numero) VALUES('Yatio','Snow','46')";
          $result = mysqli_query($dateBase, $sql) or die("Bad query: $sql");
          //echo "Good Query";

// }
// else {
//
// $firstName ="";
//
// }

?>
  <meta http-equiv="refresh" content="3;url=shoeStore.php" />

</head>
<body>
  Muchas gracias por entrar a la pagina :D
  Espere 3 segundos y lo redireccionaremos a la pagina principal
  sino quiere esperar esos 3 segudos puede undir aqui
<!-- <FORM NAME ="form1" METHOD ="POST" ACTION = "idk.php">

<!-- <INPUT TYPE = "TEXT" VALUE ="firstName" Name = "firstName"> -->
<INPUT TYPE = "Submit" Name = "Submit1" VALUE = "Login" action = "shoeStore.php"> -->
echo "<a href='shoeStore.php'>ir apagina shoeStroe</a>"
</FORM>

</body>
</html>
