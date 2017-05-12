<?php
$user = 'root';
$pass = '';
$db = 'shoeplaza';


$con = mysqli_connect('localhost', $user, $pass, $db);
if ($con->connect_error) {
    die("Unable to connect database: " . $con->connect_error);
}
define('BASEURL', '/shoe-Plaza/');
?>
