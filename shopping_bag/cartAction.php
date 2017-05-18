<!--Step 3 on shopping bag -->
<?php
$connect = mysqli_connect("localhost", "root", "", "shoeplaza");
if(isset($_POST['placeOrder'])|| !empty($_SESSION['sessCustomerID'])){
        // insert order details into database

        $sql ="INSERT INTO order_ VALUES ('','1','$_POST[hidden_id]','1')";
        mysqli_query($connect,$sql);

// insert order items into database
        $sql ="INSERT INTO has VALUES ('','1',' ','1')";
        mysqli_query($connect,$sql);


            // insert order items into database

                header("Location: orderSuccess.php?id=$orderID");
            }else{
                header("Location: checkout.php");
            }

?>
