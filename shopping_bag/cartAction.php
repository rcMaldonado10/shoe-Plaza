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
        $date = date("Y-m-d H:i:s");
        echo $date;
        $sql ="INSERT INTO order_ (status, DateOrderMade, Credit_Payment) VALUES ('0','$date','$IDCre')";
        mysqli_query($connect,$sql)or die("Bad query: $sql");
        $queryOrder ="SELECT * FROM `order_` WHERE `DateOrderMade` = '$date' and `Credit_Payment` = '$IDCre'";
        $resultOrder = mysqli_query($connect,$queryOrder) or die("Bad query: $queryOrder");
        $rowOrder = mysqli_fetch_assoc($resultOrder);
        $total = 0;
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
          $total = $total + 1;
          echo "total:".$total . " <br> ";
              // echo $values["item_id"]."<br>";
              // echo $values["item_id"]."<br>";
              // echo $values["item_size"]."<br>";
              // echo $values["item_quantity"]."<br>";
              // echo $values["item_price"]."<br>";
              // echo number_format($values["item_quantity"] * $values["item_price"], 2);
              // $total = $total + ($values["item_quantity"] * $values["item_price"]);

              $sql2 ="INSERT INTO has (CustomerID,OrderID) VALUES ('$IDCos','$rowOrder[OrderID]')";//change date
              $result2=mysqli_query($connect,$sql2) or die("Bad query: $sql2");

              $sql3 ="INSERT INTO is_in (OrderID,ProductID, Quantity) VALUES ('$rowOrder[OrderID]','$values[item_id]','$values[item_quantity]')";
              $result3=mysqli_query($connect,$sql3) or die("Bad query: $sql3");

              $sql4 = "SELECT Quantity_Stock from shoe where ProductID = $values[item_id]";
              $result4 = mysqli_query($connect,$sql4) or die("Bad query: $sql4");
              $row4 = mysqli_fetch_assoc($result4);
              $New_Quantity =   $row4['Quantity_Stock'] - $values['item_quantity'];

              $sql5 = "UPDATE `shoe` SET `Quantity_Stock`= '$New_Quantity' WHERE `ProductID`= $values[item_id]";
              $result5 = mysqli_query($connect,$sql5) or die("Bad query: $sql5");

              $CompanyID = $_POST['shipper'];
              $dateYear = date("Y-m-d");
              date_add($dateYear,date_interval_create_from_date_string("15 days"));
              echo $dateYear;
              $sql6 = "INSERT INTO `Shipping`(`OrderID`, `CompanyID`, `Completed_Date`, `Traking_Number`) VALUES ('$rowOrder[OrderID]',$CompanyID,$dateYear,20)";
              $result6 = mysqli_query($connect,$sql6) or die("Bad query: $sql6");
              $row6 = mysqli_fetch_assoc($result6);

              echo "<br> variables en el ciclo <br>";
              echo "Order: ". $rowOrder['OrderID']."<br>";
              echo "ID Item: ". $values['item_id']."<br>";
              echo "Item price: ".$values['item_price']."<br>";
              echo "Item quan: ".$values['item_quantity']."<br>";
        }


        //
        // // insert has  into database
        // $sql2 ="INSERT INTO has (CustomerID,OrderID, DateOrderMade, Credit_Payment) VALUES ('$IDCos','$rowOrder[OrderID]','1000-01-01','$IDCre')";//change date
        // $result=mysqli_query($connect,$sql2);
        //
        // //insert order items into database
        // $sql3 ="INSERT INTO is_in (OrderID,ProductID,Price, Quantity) VALUES ('$rowOrder[OrderID]','$values[item_id]','$values[item_price] ','$values[item_quantity]')";
        // $result=mysqli_query($connect,$sql3);


          $orderID = $rowOrder['OrderID'];
            // insert order items into database

            echo "<br> variables <br>";
            echo "Order: ". $rowOrder['OrderID']."<br>";
            echo "ID Item: ". $values['item_id']."<br>";
            echo "Item price: ".$values['item_price']."<br>";
            echo "Item quan: ".$values['item_quantity']."<br>";
            $_SESSION['orderIDD'] = $orderID;
            unset($_SESSION["shopping_cart"]);
//buscalo en el desktop esta alli
            header("Location: orderSuccess.php?id=$orderID");
// else{
//             //header("Location: checkout.php");
//             }

?>
