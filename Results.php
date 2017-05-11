<?php
include 'includes/topbar.php';

  if(mysqli_num_rows($search_result) > 0){
    echo '<h1 style="text-align: center;">Results</h1>';
    while($row = mysqli_fetch_assoc($search_result)){
      echo '<main class="main"><div class="product">'.$row['Brand'].'<img src="'.$row['img-source'].'" width="230" height="230" alt="Nike"/>
              <br>'.$row['Model'].'</br>
              <br>Price: $'.$row['Price'].'</br>
              <br/><!-- Trigger/Open The Modal -->
              <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail-1">Details</button></br></div></main>';
    }
  } else{
    echo '<h1 style="text-align: center;">:( Sorry shoe not available at the moment.</h1>';
  }

  $filteredShoes = mysqli_fetch_assoc($result);
  echo "hola".$filteredShoes["Price"]." dinero";
?>

 <div class="copyright">
    <p>*Your email address will be subject to the terms and conditions of our Privacy Policy.
    <p>© 2017 Shoe-Plaza.com, Inc. or its affiliates. Shoe-Plaza.com is operated by XAMPP.</p>
</div>
