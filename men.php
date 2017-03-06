<?php
include 'includes/topbar.php'
?>


            <div id="topmenudiv">
                <ul>
                    <li class="default"><a href="home.php">Home</a></li>
                    <li class="default"><a href= "women.php">Women </a></li>
                    <li class = "current_page-item"><a href="men.php">Men</a></li>
                    <li class="default"><a href="about.php">About us</a></li>

                </ul>
            </div>
               

            <div class="break" ></div>

             <h1 style="text-align: center;">Men</h1>
            <div id="content">
  <?php
include 'includes/checkbox.php'

 ?>

                        <div class ="fixedwith">
                                    <!-- This is the table -->
                                <table border ="1" class="tablestyle">
                                    <tr>
                                        <th><a href="checkout.php">Nike <img class="imgsize" src="Images/men1.jpg" />
                                        <br/>Nike Air Max 95 Sneakerboots - Men<br/>$95.00</a>
                                        <br/><!-- Trigger/Open The Modal -->
                                        <button id="myBtn">Details</button></th>

                                        <th>Rebook <img class="imgsize" src="Images/men2.jpg" />
                                        <br/>Reebok Classic<br/>$45.00<br/>
                                        </th>

                                        <th>Skechers <img class="imgsize" src="Images/men3.jpg" />
                                        <br/>Men's Skech-Air Varsity<br/>$55.00</th>

                                    </tr>
                                </table> <!--Table ends -->

                      </div>


 <?php
include 'includes/detailsmodal.php'

 ?>
    
    <br/>
<div class="break" ></div>
  <div class="copyright">
 <p>*Your email address will be subject to the terms and conditions of our Privacy Policy.
<p>© 2017 Shoe-Plaza.com, Inc. or its affiliates. Shoe-Plaza.com is operated by XAMPP.</p> 
</body>
</html>
