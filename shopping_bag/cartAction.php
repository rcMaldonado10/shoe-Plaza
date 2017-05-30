<!--Step 3 on shopping bag -->
<?php

if(isset($_POST['placeOrder'])|| !empty($_SESSION['sessCustomerID'])){
        // insert order details into database
        // Find a way to check id of the customer sign in so it can be compared to data base
        // Once That insert the id in order
        session_start();
        session_destroy(); // termina todas las sessiones eliminando los items y customer
                          // sale de su cuenta, si cause problemas eliminarlo.
        $connect = mysqli_connect("localhost", "root", "", "shoeplaza");
        $query ="SELECT * FROM Customer ";
        $result = mysqli_query($connect,$query);
        $row = mysqli_fetch_assoc($result);

        $sql ="INSERT INTO order_ VALUES ('','$row[CustomerID]','$_POST[hidden_id]','1')";
        mysqli_query($connect,$sql);

// insert order items into database
        $sql ="INSERT INTO has VALUES ('','1',' ','1')";
        mysqli_query($connect,$sql);

        $query ="SELECT * FROM order_ ";
        $result = mysqli_query($connect,$query);
        $row = mysqli_fetch_assoc($result);
        $orderID = $row["orderID"];
            // insert order items into database

            // once donde go to orderSuccess.php
            header("Location: orderSuccess.php?id=$orderID");

            }else{
                header("Location: checkout.php");
            }

?>
