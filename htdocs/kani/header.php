
        <style>

.navbar{
    height:125px !important;
}
.logo{
    position: absolute !important;
    top:0px !important;
}

       </style>
<div class="container-fluid fixed-top" style="background-color: orange;">
    <div id="log" style="float:right; color:white; margin-left:-10px; margin-top:10px; margin-right:40px;">
     
        <?php // Start the session
        if(isset($_SESSION['name'])) {
            $name = $_SESSION['name']; 
         // Retrieve user name from session
            echo "<a href='user.php' style='color:white;' > $name </a>  <a href='form.php' style='background-color:rgb(43, 42, 42); border-radius:50px; color:red; padding:10px; font-size:10px; '>Logout</a>"; // Display user details and logout option
        } else {
            echo "<a href='form.php' style='color:white;' id='notlog'>User not logged in</a>";
        }
        ?>   

    </div> 
    <?php 
    if(isset($_SESSION['name'])) {
        echo '<a href="user.php"class="nav-item nav-link" style="float:right;"><img src="img/05.jpg" style="background-color:rgb(43, 42, 42); border-radius:50%;" width="25" height="25"></a>';
    } else {
        echo '<a href="form.php" class="nav-item nav-link" style="float:right;"><img src="img/05.jpg" style="background-color:rgb(43, 42, 42); border-radius:50%;" width="25" height="25"></a>';
    }
    ?>









    <div class="container px-0">
        <nav class="navbar navbar-light  col-12 navbar-expand-xl">
            <a href="index.html" class="navbar-brand"><h1 class="display-3 kani">kani<span class="h6 text-white subtitle" > Organic Fruits</span> <img width="150" height="150" class="img-fluid  logo" alt="Responsive image" style="position: absolute;left: 50px; top:3px; " src="img/logo.png" alt=""></h1></a>
            
            <div class="navbar-nav mx-auto" style="position: absolute; right: 20px; margin-top:10px;">
                <a href="index.html" class="nav-item nav-link active">Home</a>
                <a href="shop.php" class="nav-item nav-link">Shop</a>
            </div>
        </nav>
    </div>
</div>

<script>

function ki(){
    const viewElement = document.getElementById('view');

function toggleDisplay() {
  if (viewElement.style.display === 'none') {
    viewElement.style.display = 'inline';
  } else {
    viewElement.style.display = 'none';
  }
}

// Call toggleDisplay function whenever you want to toggle the display
toggleDisplay();
    
}

</script>



