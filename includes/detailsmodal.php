<?php

?>
<!--Details Light Box-->
<?php ob_start(); //start a buffer of all the details model ?>
<div class="modal fade details-1" id="myModal" tabindex="-1" role= "dialog" aria-labelledby="detail-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <buttom class="close" type="buttom" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </buttom>
            <h4 class="modal-title text-center"> Nike 1 </h4>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="center-block">
                            <img src="images/men1.jpg" alt="Nike 1" class="detail img-responsive">
                        </div>

                    </div>
                    <div class="col-ms-6">
                        <h4>Details</h4>
                        <p>These shoes are awesome! Get Them!</p>
                        <hr>
                        <p>Price: $95.00</p>
                        <p>Brand: Nike</p>
                        <form action="add_cart.php" method="post">
                            <div class="form-group">
                                <div class="col-xs-3">
                                  <label for="quantity">Quantity: <label>
                                  <select name="quantity" id="quantity" class="form-control">
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
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
            <button class="btn btn-default" data-dismiss="modal">Close</buttom>
            <button class="btn btn-warning" type="submit"><span class= glyphicon glyphicon-shopping-cart></span>Add to cart</button>
        </div>
    </div>
</div>
</div>

<?php echo ob_get_clean(); ?>
