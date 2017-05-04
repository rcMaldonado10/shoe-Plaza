<?php
/*
$con = mysqli_connect('localhost','root','', 'shoeplaza');
$id = $_POST['ProductID'];
$id = (int)$id;
$sql="SELECT * FROM shoe WHERE ProductID = '$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
*/
?>
<!--Details Light Box-->
<?php echo ob_start(); //start a buffer of all the details model and send to ajax ?>
<div class="modal fade details-1" id="details-modal" tabindex="-1" role= "dialog" aria-labelledby="detail-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <buttom class="close" type="buttom" onclick="closemodal()" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </buttom>
            <h4 class="modal-title text-center"><?php $row['Brand']?> </h4>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="center-block">
                            <img src="<?php $row['img-source']?>" alt="<?php $row['Brand']?>" class="detail img-responsive">
                        </div>

                    </div>
                    <div class="col-ms-6">
                        <h4>Details</h4>
                        <p><?php $row['Brand']?></p>
                        <hr>
                        <p>Price: <?php $row['Price']?></p>
                        <p>Model: <?php $row['Model']?></p>
                        <form action="add_cart.php" method="post">
                            <div class="form-group">
                                <div class="col-xs-3">
                                  <label for="quantity">Quantity: <label>
                                  <p><?php $row['Quantity_Stock']?></p>
                                  </select>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="size">Size: <label>
                                <select name="size" id="size" class="form-control">
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button class="btn btn-default" onclick="closemodal()">Close</buttom>
            <button class="btn btn-warning" type="submit"><span class= glyphicon glyphicon-shopping-cart></span>Add to cart</button>
        </div>
    </div>
</div>
</div>
<script>

function close Modal(){
  JQuery('#details-modal').modal('hide'); //jquery
  setTimeout(function(){
    JQuery('#details-modal').remove();
    JQuery('.modal-backdrop').remove();
  },500);

  }

</script>
<?php echo ob_get_clean(); ?>
