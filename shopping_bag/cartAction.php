<!--Step 3 on shopping bag -->
<?php

        // insert order details into database
        // Find a way to check id of the customer sign in so it can be compared to data base
        // Once That insert the id in order\

        // aqui seria un for hasta q termine el array
        $connect = mysqli_connect("localhost", "root", "", "shoeplaza");
        $query ="SELECT * FROM Customer";
        $result = mysqli_query($connect,$query);
        $row = mysqli_fetch_assoc($result);
       session_start();
        echo "cos: ".$_SESSION['cosCustomerID']."<br>";
        echo "cre: ".$_SESSION['creCustomerID']."<br>";
        //insert order items into database
        $IDCos = $_SESSION['cosCustomerID'];
        $IDCre = $_SESSION['creCustomerID'];
        $sql ="INSERT INTO order_ (CustomerID,ProductID,status) VALUES ('$IDCos','$_POST[hidden_id]','0')";
        mysqli_query($connect,$sql);
        $queryOrder ="SELECT * FROM order_ ";
        $resultOrder = mysqli_query($connect,$queryOrder);
        $rowOrder = mysqli_fetch_assoc($resultOrder);
        // insert has  into database
        $sql2 ="INSERT INTO has (CustomerID,OrderID, DateOrderMade, Credit_Payment) VALUES ('$IDCos','$rowOrder[orderID]','1000-01-01','$IDCre')";//change date
        $result=mysqli_query($connect,$sql2);

        //insert order items into database
        $sql3 ="INSERT INTO is_in (OrderID,ProductID,Price, Quantity) VALUES ('$rowOrder[orderID]','$_POST[hidden_id]','$_POST[hidden_price] ','$values[item_quantity]')";
        $result=mysqli_query($connect,$sql3);


        //  $orderID = $row["orderID"];
            // insert order items into database

//buscalo en el desktop esta alli
            //header("Location: orderSuccess.php?id=$orderID");
// else{
//             //header("Location: checkout.php");
//             }

?>
