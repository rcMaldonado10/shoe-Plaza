<!doctype html>
<html>
<head>
    <title>Shoe Plaza</title>

    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" type="text/css" href="stylesstore.css"/>
</head>
<body>

    <div id="container">
        <div id="topbar">

                <div class="fixedwith">

                     <div id="logodiv">  <p id="titleheader">Shoe Store Plaza<span id="pr">PR</span> </p></div>

                    <div id="signindiv">
                        <img src="images/singnin.png"/><h class="default"><a class="default" href="singUpPage.php">Sign In</a></h>
                    </div>

                    </div>
            <div id="topmenudiv">
                <ul>
                    <li class="default"><a href="home.php">Home</a></li>
                    <li class="default"><a href= "women.php">Women </a></li>
                    <li class = "current_page-item"><a href="men.php">Men</a></li>
                    <li class="default"><a href="about.php">About us</a></li>

                </ul>
            </div>
               

            <div class="break" ></div>

             <h1 style="text-align: center;">Men</h1>
            <div id="content">
  <div class="boxCheck">  <!-- These are the checkbox division -->
  <h3>Brand</h3>
    <input type="checkbox" name="brand1" value="Nike">Nike<br>
    <input type="checkbox" name="brand2" value="Nike">Rebook<br>
    <input type="checkbox" name="brabd3" value="Fila">Fila
  <h3>Color</h3>
    <input type="checkbox" name="color1" value="Black">Black<br>
    <input type="checkbox" name="color2" value="Brown">Brown<br>
    <input type="checkbox" name="color3" value="Gray">Gray<br>
    <input type="checkbox" name="color4" value="White">White
  <h3>Price</h3>
    <input type="checkbox" name="price1" value="25">$25.00<br>
    <input type="checkbox" name="price2" value="35">$35.00<br>
    <input type="checkbox" name="price3" value="45">$45.00<br>
    <input type="checkbox" name="price4" value="55">$55.00<br>
    <input type="checkbox" name="price5" value="65">$65.00<br>
    <input type="checkbox" name="price6" value="75">$75.00<br>
    <input type="checkbox" name="price7" value="85">$85.00<br>
    <input type="checkbox" name="color8" value="95">$95.00</div>  <!-- End checkbox division -->

                        <div class ="fixedwith">
                                    <!-- This is the table -->
                                <table border ="1" class="tablestyle">
                                    <tr>
                                        <th><a href="checkout.php">Nike <img class="imgsize" src="Images/men1.jpg" />
                                        <br/>Nike Air Max 95 Sneakerboots - Men<br/>$95.00</a>
                                        <br/><!-- Trigger/Open The Modal -->
                                        <button id="myBtn">Details</button></th>

                                        <th>Rebook <img class="imgsize" src="Images/men2.jpg" />
                                        <br/>Reebok Classic<br/>$45.00<br/>
                                        </th>

                                        <th>Skechers <img class="imgsize" src="Images/men3.jpg" />
                                        <br/>Men's Skech-Air Varsity<br/>$55.00</th>

                                    </tr>
                                </table> <!--Table ends -->

                      </div>


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <img class="imgsize" src="Images/men1.jpg" />
    </div>
    <div class="modal-body">
     <p>Brand: Nike</p><br>
     <p>Model: Nike Air Max 95 Sneakerboots</p><br>
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

                        



                        
               


       

    
    <br/>
<div class="break" ></div>
  <div class="copyright">
 <p>*Your email address will be subject to the terms and conditions of our Privacy Policy.
<p>© 2017 Shoe-Plaza.com, Inc. or its affiliates. Shoe-Plaza.com is operated by XAMPP.</p> 
</body>
</html>
