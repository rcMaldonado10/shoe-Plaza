<?php
    include 'includes/topbar.php';
    $connect = mysqli_connect("localhost","root","","shoeplaza");
    $sql;

    if(isset($_GET['Filter']) && !empty($_GET['Filter']))
    {
        if($_SESSION["page"] == "home"){

            if ($_GET['Filter'] == 'FilterAsc') $sql = "SELECT * FROM shoe ORDER BY Price ASC";
            if ($_GET['Filter'] == 'FilterDesc') $sql = "SELECT * FROM shoe ORDER BY Price DESC";
        
        } else if($_SESSION["page"] == "men"){

            if ($_GET['Filter'] == 'FilterAsc') $sql = "SELECT * FROM shoe WHERE Gender='M' ORDER BY Price ASC";
            if ($_GET['Filter'] == 'FilterDesc') $sql = "SELECT * FROM shoe WHERE Gender='M' ORDER BY Price DESC";
        
        } else if($_SESSION["page"] == "woman") {

            if ($_GET['Filter'] == 'FilterAsc') $sql = "SELECT * FROM shoe WHERE Gender='F' ORDER BY Price ASC";
            if ($_GET['Filter'] == 'FilterDesc') $sql = "SELECT * FROM shoe WHERE Gender='F' ORDER BY Price DESC";
        }

        $result = mysqli_query($connect,$sql);
    } else {
        if($_SESSION["page"] == "home"){
            header('location:home.php');
        } else if($_SESSION["page"] == "men"){
            header('location:men.php');
        } else if ($_SESSION["page"] == "woman"){
            header('location:women.php');
        }
        
    }

    
?>
 <h1 style="text-align: center;">Filtered Results</h1>
 <main class="main">
<?php
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo '<div class="product"><form action="viewProduct.php" method="post"><label for="brand">'
            .$row['Brand'].'</label><img src="'.$row['img-source'].'" width="230" height="230" alt="Nike"/>
            <br>'.$row['Model'].'</br>
            <br>Price: $'.$row['Price'].'</br>
            <br/>
            <button  class="btn btn-info"name="Details" value="'.$row['ProductID'].'">Details</button>
            </form></div>';
        }
    }
?>
 </main>

 <?php
include 'includes/footer.php';
 ?>

</body>
</html>
