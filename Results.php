<?php
include 'includes/topbar.php';

  while($row = mysqli_fetch_assoc($search_result)){
    echo '<main class="main"><div class="product">'.$row['Brand'].'<img src="'.$row['img-source'].'" width="230" height="230" alt="Nike"/>
            <br>'.$row['Model'].'</br>
            <br>Price: $'.$row['Price'].'</br>
            <br/><!-- Trigger/Open The Modal -->
            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail-1">Details</button></br></div></main>';
  }
?>

 <div class="copyright">
    <p>*Your email address will be subject to the terms and conditions of our Privacy Policy.
    <p>© 2017 Shoe-Plaza.com, Inc. or its affiliates. Shoe-Plaza.com is operated by XAMPP.</p>
</div>
