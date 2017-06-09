<!--Step 3 on shopping bag -->
<?php

if(isset($_POST['placeOrder'])|| !empty($_SESSION['sessCustomerID'])){
        // insert order details into database
        // Find a way to check id of the customer sign in so it can be compared to data base
        // Once That insert the id in order
        if(isset($_POST["placeOrder"]))
        {
          $item_array = array(
               "item_id"               =>     $_GET["id"],
               "item_name"               =>     $_POST["hidden_name"],
               "item_price"          =>     $_POST["hidden_price"],
               "item_quantity"          =>     $_POST["quantity"]
          );
                  $_SESSION["shopping_cart"][0] = $item_array;

        }
        $connect = mysqli_connect("localhost", "root", "", "shoeplaza");
        $query ="SELECT * FROM Customer ";
        $result = mysqli_query($connect,$query);
        $row = mysqli_fetch_assoc($result);
 //insert order items into database
        $sql ="INSERT INTO order_ VALUES ('','$row[CustomerID]','$_POST[hidden_id]','')";
        mysqli_query($connect,$sql);

// insert has  into database
        $sql2 ="INSERT INTO has (CustomerID,OrderID, DateOrderMade) VALUES ('$row[CustomerID]',' ',' ','1')";
        $result=mysqli_query($connect,$sql2);

        //insert order items into database
        $sql3 ="INSERT INTO is_in (OrderID,ProductID,Price, Quantity) VALUES ('','$_POST[hidden_id]','$_POST[hidden_price] ','$values[item_quantity]')";
        $result=mysqli_query($connect,$sql3);

        $query ="SELECT * FROM order_ ";
        $result = mysqli_query($connect,$query);
        $row = mysqli_fetch_assoc($result);
      //  $orderID = $row["orderID"];
            // insert order items into database

            //mail customer
            $from = 'donotreply@ShoePlaza.com';
            $to ='' ; // needs to be the customer
            $subject = 'Order Confirmation';

            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
            $headers .= "From: Shoe Plaza <$from>\r\n";

            $msg = '
            <html>
            <head>
            <link href="http://linktocss/.../etc" rel="stylesheet" type="text/css" />

               <link href="../css/bootstrap.min.css" rel="stylesheet">
               <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
               <!-- Include all compiled plugins (below), or include individual files as needed -->
               <script src="../js/bootstrap.min.js"></script>
               <style>
               .container{padding: 50px;}
               input[type="number"]{width: 20%;}
               </style>

           </head>
           <body>



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

            }else{
                header("Location: checkout.php");
            }

?>
