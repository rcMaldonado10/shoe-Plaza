
    <br/>
<div class="break" ></div>

  <div class="copyright">
 <p>*Your email address will be subject to the terms and conditions of our Privacy Policy.
<p>© 2017 Shoe-Plaza.com, Inc. or its affiliates. Shoe-Plaza.com is operated by XAMPP.</p></div>


<script>
//javascript magic
function detailsmodal(ProductID){
alert(ProductID);
var data = {"ProductID" : ProductID};
JQuery.ajax({ //jquery
  url :'/shoe-Plaza/includes/detailsmodal.php',
  method : "post",
  data : data,
  success:function(data){
    JQuery('body').append(data); //apended (add to) to our body of detailsmodal
    JQuery('#details-modal').modal('toggle'); //select details model id to open the modal
  },
    error: function(){
      alert("Something went wrong!");
    }
  });//No need to reload the page for details modal
}

</script>
