<?php
include 'includes/topbar.php';
  if(mysqli_num_rows($search_result) > 0){
    echo '<h1 style="text-align: center;">Results</h1>';
    while($row = mysqli_fetch_assoc($search_result)){
      echo '<main class="main"><div class="product"><form action="viewProduct.php" method="post"><label for="brand">'
            .$row['Brand'].'</label><img src="'.$row['img-source'].'" width="230" height="230" alt="Nike"/>
            <br>'.$row['Model'].'</br>
            <br>Price: $'.$row['Price'].'</br>
            <br/>
            <button  class="btn btn-info"name="Details" value="'.$row['ProductID'].'">Details</button>
            </form></div></main>';
    }
  } else{
    echo '<h1 style="text-align: center;">:( Sorry, shoe not available at the moment.</h1>';
  }
?>
 <div class="copyright">
    <p>*Your email address will be subject to the terms and conditions of our Privacy Policy.
    <p>© 2017 Shoe-Plaza.com, Inc. or its affiliates. Shoe-Plaza.com is operated by XAMPP.</p>
</div>
