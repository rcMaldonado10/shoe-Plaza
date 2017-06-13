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
        mysqli_query($connect,$sql);

// insert has  into database
        $sql2 ="INSERT INTO has (CustomerID,OrderID, DateOrderMade) VALUES ('$row[CustomerID]',' ',' ','1')";
        $resultOrder = mysqli_query($connect,$queryOrder);
        $rowOrder = mysqli_fetch_assoc($resultOrder);
        // insert has  into database
        $sql2 ="INSERT INTO has (CustomerID,OrderID, DateOrderMade, Credit_Payment) VALUES ('$IDCos','$rowOrder[orderID]','1000-01-01','$IDCre')";//change date
        $result=mysqli_query($connect,$sql2);

        //insert order items into database
        $sql3 ="INSERT INTO is_in (OrderID,ProductID,Price, Quantity) VALUES ('$rowOrder[orderID]','$_POST[hidden_id]','$_POST[hidden_price] ','$values[item_quantity]')";
        $result=mysqli_query($connect,$sql3);



           <div class="container">
               <h1>Order</h1>
               <table class="table">
               <thead>
                   <tr>
                       <th>Product</th>
                       <th>Size</th>
                       <th>Quantity</th>
                       <th>Price</th>
                       <th>Subtotal</th>
                   </tr>
               </thead>
               <tbody>
                 <?php
                      if(!empty($_SESSION["shopping_cart"]))
                      {
                           $total = 0;
                           foreach($_SESSION["shopping_cart"] as $keys => '.$values.')
                           {
                      ?>
                      <tr>

                        <input type="hidden" name="hidden_id" value=" $values["item_id"];"></input>
                           <td><?php='.$values["item_name"].' -  '.$values["item_gender"].' ?></td>
                           <td><?php= '.$values["item_size"].' ?></td>
                           <td><?php= '.$values["item_quantity"].' ?></td>
                           <td> $ <?php='.$values["item_price"].' ?></td>
                           <td>$ <?php='.number_format($values["item_quantity"] * $values["item_price"], 2).' ?></td>

                      </tr>

                                '.$total = $total + ($values["item_quantity"] * $values["item_price"]).'
                           }

                      <tr>
                           <td colspan="3" align="right">Total $ <?php= '.number_format($total, 2).' ?></td>
                           <td></td>
                      </tr>

                      <?php
                    }
                      ?>

                 </table>


            visist us here: www.shoeplaza.com
            </body>
            </html>
            ';

            //mail($to, $subject, $msg, $headers)or die("mail error");

          //  unset($_SESSION["shopping_cart"][0]);
          //  session_start();
            //session_destroy(); // termina todas las sessiones eliminando los items y customer
                              // sale de su cuenta, si cause problemas eliminarlo.
            // once donde go to orderSuccess.php
            header("Location: orderSuccess.php?id=$orderID");

//buscalo en el desktop esta alli
            //header("Location: orderSuccess.php?id=$orderID");
// else{
//             //header("Location: checkout.php");
//             }

?>
