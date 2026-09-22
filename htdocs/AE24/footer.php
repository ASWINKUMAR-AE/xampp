<style>
.list{
  color:white !important;
  transition: all 2s !important;
}
footer{
  height: 0px !important;
  background-color: rgb(27, 26, 26) !important;
}
a {
  color:white !important;

  background-size: 200% 100%;
  background-position: -100%;
  display: inline-block;
transition:all 2s;
  position: relative;

}

a:before{
  content: '';
  background: orange;
 
  transition: all 0.3s ease-in-out;
}
.dropdown-item{color:black !important;}
a:hover {
 background-position: 0;
 color:orange !important;
}


i{
  color:orange;
}
.list:hover{

  transform: none !important;
  color:orange !important;
  text-decoration: none;
}
.item {

  transform: none !important;
  border-radius: 20px;

 
}
/* General styling for the heart icon */


</style>

<!-- Footer -->
<footer class="px-4 py-4  text-white"  style="   position: fixed !important;
  bottom: 0 !important;
  width: 100% !important; background-image:url(images/header.png) !important;">
    <div class="flex justify-around items-center max-w-4xl mx-auto" style="margin-top: -20px !important;">
 
 
    <div class="item"> 
      
    <a href="./index.html" style="color:orange;" class="list" data-aos="fade-right" data-aos-duration="1000">
        <svg aria-label="Home" class="_ab6- cursor-pointer hover:text-gray-400" fill="orange" height="24"
          role="img" viewBox="0 0 24 24" width="24">
          <title>Home</title>
          <path
            d="M9.005 16.545a2.997 2.997 0 0 1 2.997-2.997A2.997 2.997 0 0 1 15 16.545V22h7V11.543L12 2 2 11.543V22h7.005Z"
            fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2"></path>
        </svg>
      </a>
</div>
<span id="heart" class="heart-icon" style="color:red !important; font-size:30px;" data-aos="fade-right" data-aos-duration="1000">
  <!-- &#9829; -->
   <img src="images/like.png" width="26" class="img-fluid">
</span>
<script>
  // JavaScript to toggle the 'clicked' class on click
document.getElementById('heart').addEventListener('click', function() {
    this.classList.toggle('clicked');
});

</script>


<a href="index.php" data-aos="fade-up" data-aos-duration="1000"><img src="images/logo.png" width="55">
</a>



      <!-- Add other icons here -->
  <a href="shop.php" data-aos="fade-left" data-aos-duration="1000">  <div><img src="images/buy.png" width="30"></div></a>


   <?php // Start the session
        if(isset($_SESSION['user_name'])) {
            $name = $_SESSION['user_name'];       

     
            echo "<div data-aos='fade-left' data-aos-duration='1000' style='     border-radius:50px; margin:10px;'><a href='user_profile.php' style='color:white; '  > $name </a>  </div>"; // Display user details and logout option
        }
        else {
          echo '<a href="form.php">
          <img data-aos="fade-left" data-aos-duration="1000" class="footerlogo" src="images/login.png" width="50" style="filter:grayscale(100);">
            </a>';
      }

        ?> 
 

    </div>
  </footer>
  <script>
    AOS.init();
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  </body>
</html>