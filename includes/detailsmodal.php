<!-- Detail Modal 1-->
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


<!-- Detail Modal 2-->
<div id="myModal2" class="modal">

  <!-- Modal content 2 -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <img class="imgsize" src="Images/men2.jpg" />
    </div>
    <div class="modal-body">
     <h3>Brand: Nike</h3><br>
     <h3>Model: Reebok Classic</h3><br>
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


<!-- Detail Modal 3-->
<div id="myModal3" class="modal">

  <!-- Modal content 3 -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <img class="imgsize" src="Images/men3.jpg" />
    </div>
    <div class="modal-body">
     <h3>Brand: Nike</h3><br>
     <h3>Model: Men's Skech-Air Varsity</h3><br>
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
// Get the modal 1
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


//////////////////////////////////////////////////////////////
// Get the modal 2
var modal2 = document.getElementById('myModal2');

// Get the button that opens the modal
var btn2 = document.getElementById("myBtn2");

// Get the <span> element that closes the modal
var span2 = document.getElementsByClassName("close")[1];

// When the user clicks the button, open the modal 
btn2.onclick = function() {
    modal2.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span2.onclick = function() {
    modal2.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal2) {
        modal2.style.display = "none";
    }
}

//////////////////////////////////////////////////////////////
// Get the modal 3
var modal3 = document.getElementById('myModal3');

// Get the button that opens the modal
var btn3 = document.getElementById("myBtn3");

// Get the <span> element that closes the modal
var span3 = document.getElementsByClassName("close")[2];

// When the user clicks the button, open the modal 
btn3.onclick = function() {
    modal3.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span3.onclick = function() {
    modal3.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal3) {
        modal3.style.display = "none";
    }
}
</script>
