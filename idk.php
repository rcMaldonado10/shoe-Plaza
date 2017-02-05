<html>
<head>
<title>A BASIC HTML FORM</title>
<?PHP

if (isset($_POST['Submit1'])) {

$firstName = $_POST['firstName'];


          $serverName = "localhost";
          $userName = "Yatio";
          $password = "mayo1996";
          $Table = "testdb1";

          $dateBase = new mysqli($serverName,$userName,$password,$Table) or die("Unable to connect");

          $firstName = $_POST['firstName'];
          $lastName = 'Snow';
          //$_POST['lastName'];
          $number = '16';
          $sql = "INSERT INTO table1 (Nombre,Apellido,numero) VALUES('$firstName','$lastName','$number')";
          //$sql = "INSERT INTO table1 (Nombre,Apellido,numero) VALUES('Yatio','Snow','46')";
          $result = mysqli_query($dateBase, $sql) or die("Bad query: $sql");
          echo "Good Query";

}
else {

$firstName ="";

}

?>

</head>
<body>

<FORM NAME ="form1" METHOD ="POST" ACTION = "idk.php">

<INPUT TYPE = "TEXT" VALUE ="firstName" Name = "firstName">
<INPUT TYPE = "Submit" Name = "Submit1" VALUE = "Login">

</FORM>

</body>
</html>
