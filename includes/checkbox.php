<?php

  if(isset($_POST["ASC"])) {
    $acs_query = "SELECT * FROM shoe GROUP BY Price ASC";
    $result = executeQuery($acs_query);
 }  elseif (isset($_POST["DESC"])) {
      $desc_query = "SELECT * FROM shoe GROUP BY Price DESC";
      $result = executeQuery($desc_query);
     }
    function executeQuery($query){
      $connect = mysqli_connect("localhost", "root", "", "shoeplaza");
      $result = mysqli_query($connect, $query);
      return $result;
    } 
 
?>
<form action="Results.php" method="post">
<div class="boxCheck">  <!-- These are the checkbox division -->
  <h3>Price by</h3>
    <input type="radio" name="Filter" value="Filter">  Lower to Highest<br>
    <input type="radio" name="Filter" value="Filter">  Highest to Lower<br><br>
    <input  class="btn btn-sm btn-primary" value="Filter" name="submit" type="submit">

</div>  <!-- End checkbox division -->
</form>