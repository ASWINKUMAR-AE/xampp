
<?php
session_start();
?> 
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>kani</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
     

        <link href="css/bootstrap.min.css" rel="stylesheet">

<link rel="website icon" type="png"  href="img/logo.png"  >
<link href="css/style.css" rel="stylesheet">


</head>

<style>
#acart{
display:none;
}
</style>
<body>




   <!--   --------------------------------------------------------------------------------- -->
   <?php
include ('header.php');
?><!--   --------------------------------------------------------------------------------- -->


<br><br><br><br><br><br><br><br><br><br>
               <div class="container my-5" id="my-5">
                <div class="row">
                    <div class="col-md-5">
                        <img src="img/b.jpg" class="img-fluid" id="adim" alt=""style="border-radius: 10px; box-shadow: 1px 1px 31px 1px black;">
                    </div>
                    <div class="col-md-7">
                        <div class="main-description px-2">
                         
                            <div class="product-title text-bold my-3 text-secondary">
                                Banana
                            </div>
        
        
                            <div class="price-area my-4">
                                <p class="old-price mb-1"><del>Rs.150/-</del> <span class="old-price-discount text-danger">(20% off)</span></p>
                                <p class="new-price text-bold mb-1">Rs.50/-</p>
                          
        
                            </div>
        
        
                            <div class="buttons d-flex my-5">
                                
                                <div class="block">
                                <button class="shadow btn custom-btn" onclick="cart()">Add to cart</button>
                                </div>
        
                          
                            </div>
        
        
        
        
                        </div>
        
                        <div class="product-details my-4">
                            <p class="details-title text-color mb-1">Product Details</p>
                            <p class="description">Whether you enjoy them as a quick and nutritious snack on the go, sliced atop your morning cereal or yogurt, or blended into a delicious smoothie, our bananas are the perfect addition to any meal or occasion.</p>
                        </div>
                      
                               
        
                        <div class="delivery my-4">
                            <p class="font-weight-bold mb-0"><span><i class="fa-solid fa-truck"></i></span> <b>Delivery done in 3 days from date of purchase</b> </p>
                            <p class="text-secondary">Order now to get this product delivery</p>
                        </div>
     
                        
                     
                    </div>
                </div>
            </div>
        
        
        
           
        
        
        
        
            </div>
        


 
   
                <script src="js/main.js"></script><script src="js/click.js"></script><script src="js/incdec.js"></script> <script src="js/script.js"></script><script src="js/sea.js"></script>

            <div id="acart" >




            <form action="prodb.php" method="POST" id="myForm">


   
<center>
       <table class="table align-middle mb-0 bg-dark  "  id="table" >
        <thead class="bg-dark">
          <tr>
            <th>Products</th>
            <th>Price / <span style="font-size: 10px; color: white;">kg</span></th>
         
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody >
      
        <tr id="pro">
                <td>
                  <div class="d-flex align-items-center">
                    <img src="img/b.jpg" 
                        alt=""
                        style="width: 45px; height: 45px"
                        class="rounded-circle"
                        />
                    <div class="ms-3">
                      <p class="fw-bold mb-1 3" id="named3">Banana</p>
                 
                    </div>
                  </div>
                </td>
                <td>
                  &#8360; <p class="fw-normal mb-1 3" id="numb3">50/-</p>
               
                </td>
            
                <td><button onclick="vis3()" style="background-color: orange;" type="button" class="btn btn-link btn-sm btn-rounded buy">
                Quantity
                  </button></td>
                <td>
                  <div id="incdec3">
                    <input type="button" onclick="decrementValue3()" value="-" />
                    <input type="text" name="quantity" value="1" maxlength="2" max="10" size="1" id="number3" />
                    <input type="button" onclick="incrementValue3()" value="+" />
                  </div>
                </td>
              </tr>
              <input type="hidden" id="product_value" name="product_price" value="50">
                          <input type="hidden" id="product_value" name="product_name" value="Banana">










        </tbody>
      </table>
</center>
  <!--   --------------------------------------------------------------------------------- -->
 <br><br><br>
 
 <center id="login">
          <div class="card-body col-md-6">
              
             
                
          <?php if(isset($_SESSION['name'])): ?>
                <button type="submit" >Buy &nbsp; <img class='ad' src='img/buy.png' width='30' height='30'></button>
                <?php else: ?>
                <a href="form.php">Login to Buy</a>
                <?php endif; ?>
                <div id="message" style="font-size:10px; display:none;">To remove PRODUCT click the price of the product</div>

            
             
        
        <br>
       
          </div>
        </center>
        </form>
        <
        <br>
        
        
        
        </div>
        
        <script>
        
        function cart(){
     
     document.getElementById("acart").style="display:inline";
     document.getElementById("login").style="display:inline; position:relative; left:-5px;"
     document.getElementById("my-5").style.display="none";

     

}



       
    </script>

</div>
<script src="js/php.js"></script>
</div>


</div>









                <!--   --------------------------------------------------------------------------------- -->

                <?php
    include ('foot.php');
?>
                      <!--   --------------------------------------------------------------------------------- -->
        
        
             
        
        
        
        
                
                
        
          
         
           
        
        
            <script src="js/main.js"></script>
        
            </body>
        
        </html>