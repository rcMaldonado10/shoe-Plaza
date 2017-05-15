<?php
include 'includes/topbar.php';

$connect = mysqli_connect("localhost","root","","shoeplaza");

$details = $_POST['Details'];
$query="SELECT * FROM shoe WHERE ProductID=$details";

$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
} else {
    echo '<h1 style="text-align:center;">No shoe was selected</h1>';
}
?>
<div style="float: left;">
    <h1 style="padding-left: 15px;"><?=$row['Brand']?> - <?=$row['Model']?></h1>
    <img style="padding-left: 15px;"src="<?=$row['img-source']?>" width="375" height="375"/>
    <div style="float: right; padding: 30px;">
        <p style="float: left;"><?=$row['Details']?></p><br><br>
        <label>Categorie: <?=$row['Category']?></label><br><br>
        <label>Quantity:</label>
        <select class="selectpicker">
            <option>1</option>
            <option>2</option>
            <option>3</option>
        </select><br><br>
        <label>Size:</label>
        <select>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
            <option>11</option>
        </select><br><br>
        <button class="btn btn-warning">Add to Cart</button>
        <button class="btn btn-success">Buy</button>
    </div>
</div>

<?php
    include 'includes/footer.php';
?>
