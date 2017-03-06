<!-- Detail Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <img class="imgsize" src="Images/men1.jpg" />
    </div>
    <div class="modal-body">
     <h3>Brand: Nike</h3><br>
     <h3>Model: Nike Air Max 95 Sneakerboots</h3><br>
     <div class="form-group">
             <label for="size">Size: <label>
                 <select name="size" id="size" class="form-control">
                     <option value="8">8</option>
                     <option value="9">9</option>
                     <option value="10">10</option>
                     <option value="11">11</option>
                </select>
    </div>
    </div>
    <div class="modal-footer">
     <button><a href="#" class="btn btn-info btn-lg">
            <span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart
            </a></button>
    </div>
  </div>

</div>


<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
