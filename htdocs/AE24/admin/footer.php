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


</style>

<!-- Footer -->
<footer class="px-4 py-4  text-white" style="   position: fixed !important;
  bottom: 0 !important;
  width: 100% !important;">
    <div class="flex justify-around items-center max-w-4xl mx-auto" style="margin-top: -20px !important;  background-color: rgb(27, 26, 26) !important;">
 
 
    <div class="item"> 
      

</div>






      <!-- Add other icons here -->
      <svg aria-label="Post" class="x1lliihq x1n2onr6 cursor-pointer hover:text-gray-400" fill="currentColor"
        height="24" role="img" viewBox="0 0 24 24" width="24">
        <title>Post</title>
        <path
          d="M2 12v3.45c0 2.849.698 4.005 1.606 4.944.94.909 2.098 1.608 4.946 1.608h6.896c2.848 0 4.006-.7 4.946-1.608C21.302 19.455 22 18.3 22 15.45V8.552c0-2.849-.698-4.006-1.606-4.945C19.454 2.7 18.296 2 15.448 2H8.552c-2.848 0-4.006.699-4.946 1.607C2.698 4.547 2 5.703 2 8.552Z"
          fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
        <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          x1="6.545" x2="17.455" y1="12.001" y2="12.001"></line>
        <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          x1="12.003" x2="12.003" y1="6.545" y2="17.455"></line>
      </svg>

   <?php // Start the session
        if(isset($_SESSION['admin_name'])) {
            $name = $_SESSION['admin_name'];       

     
            echo "<div style='     border-radius:50px; margin:10px;'><a href='admin_user.php' style='color:white; '  > $name </a>  </div>"; // Display user details and logout option
        }
        else {
          echo '<a href="form.php">
          <img src="images/login.png" width="50">
            </a>';
      }
        ?> 
 

    </div>
  </footer>
  