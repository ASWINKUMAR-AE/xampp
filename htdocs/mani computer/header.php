
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>


 

            <script src="js/jquery.min.js"></script>
   
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
 

 <script src="js/jquery.mCustomScrollbar.concat.min.js"></script> 

   <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(32, 32, 32);">
<h1 ><img src="images/logo3.gif" width="100" style="background:none !important;transform: scale(1.6) !important; margin:30px;"></h1>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" style="background:white !important;">
      <span class="navbar-toggler-icon" style="color: white !important;"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown" >
      <ul class="navbar-nav ml-auto" style=" border-radius:50px;">
        <li class="item active">
          <a class="list" href="index.php"><i class="fa fa-home" style="color:orange !important;"></i> Home
            <span class="sr-only">(current)</span></a>
        </li>
     
        <li class="item  dropdown">
          <a class="list dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"><i class="fa fa-calendar" style="color:orange !important;"></i> PROVIDING
          </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="ser.php" target="">System repair</a>
              <a class="dropdown-item" href="bsoft.php" target="">Billing Software</a>
              <a class="dropdown-item" href="cctv.php" target="">CCTV repair</a>
              <a class="dropdown-item" href="ups.php" target="">UPS repair</a>
              <a class="dropdown-item" href="pri.php" target="">Printer</a>
            </div>
        </li>
       
        <li class="item ">
          <a class="list " href="about.php" target="" rel="noopener noreferrer"><i class="fa fa-phone" style="color:orange !important;"></i> Contact Us</a>
        </li>
        
      </ul>
    </div>
  </nav>
  <style>
.navbar-brand {
  animation: animateLogo 3s forwards infinite;
  -webkit-animation: animateLogo 5s alternate infinite ease-in-out;
}
.nav-item {
  padding: 0 15px;
  font-size: 15px;
  font-weight: bold;
}

.nav-item:hover {
  display:inline-block;
  text-align:left;
  text-decoration:none;
  font-size:2em;
  letter-spacing:2px;
  color:#ffffff;


}


.dropdown-menu {
  font-size: 20px;
  background-color: rgb(255, 255, 255);
  color: rgb(255, 0, 0);
  font-weight: bold; 
}
.dropdown-item:hover{
  color:#ffffff;

}
.navbar {
  background:white;
  color:white;
  margin: 0 auto;
  padding: 16px;
}
/*.nav-item:hover {
  border-bottom: 2px solid #f82249;
}*/

section {
  text-align: center;
  height: 100%;
}
nav .list{
  color:white !important;
  transition: all 2s !important;
}
nav a {
  color:white !important;

  background-size: 200% 100%;
  background-position: -100%;
  display: inline-block;
  padding: 5px 0;
  position: relative;

}

nav a:before{
  content: '';
  background: orange;
  display: block;
  position: absolute;
  bottom: -3px;
  left: 0;
  width: 0;
  height: 3px;
  transition: all 0.3s ease-in-out;
}
nav .dropdown-item{color:black !important;}
nav a:hover {
 background-position: 0;
}

nav a:hover::before{
  width: 100%;
}

i{
  color:orange;
}
nav .list:hover{

  transform: none !important;
  color:orange !important;
  text-decoration: none;
}
nav .item {

  transform: none !important;
  border-radius: 20px;
  padding:10px;
  margin: 10px;
}
}
</style>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

  <!-- bootstrap js ends -->

  <!-- btn-to-top script start -->
  <script>
    const btn = document.querySelector('.btn-to-top');
    btn.addEventListener("click", function () {
      window.scrollTo({
        top: 0,
        left: 0,
        behavior: "smooth"
      });
    })
  </script>
  