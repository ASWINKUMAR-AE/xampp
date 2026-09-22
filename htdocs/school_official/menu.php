<header id="header">
  <div class="top-bar">
    <div class="container">
      <div class="row">
        <div class="col-sm-2 col-md-2 col-xs-12">
          <div class="top-number">
            <p><i class="fa fa-phone-square"></i>+(91) 0452 - 2308785</p>
          </div>
        </div>
        <div class="col-sm-3 col-md-3 col-xs-12">
          <div class="top-email">
            <p><i class="fa fa-envelope"></i> <a href="#"> railnetmdu@gmail.com </a></p>
          </div>
        </div>
        <div class="col-sm-5 col-md-5 col-xs-12">
          <div class="top-number">
            <p><i ></i> Southern Railway Women's Welfare Organization-Madurai</p>
          </div>
        </div>
        <div class="col-sm-2 col-md-2 col-xs-12">
          <div class="social">
            <ul class="social-share">
              <li><a href="https://www.facebook.com/profile.php?id=100012406026705"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://www.facebook.com/profile.php?id=100012406026705"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://www.youtube.com/@techwithashok5250"><i class="fa fa-youtube"></i></a></li>
              
           
            </ul>
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/#top-bar--> 
  <!--nav-->
  <div class="navigation" id="navigation" data-spy="affix" data-offset-top="2">
    <nav class="navbar navbar-inverse" id="fixed-collapse-navbar">
      <div class="container">
	  <?php
	  include("dbcon.php");
							$result= mysqli_query($con,"select * from texts order by event_id ASC") or die (mysql_error());
							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['event_id'];
							?>
							<div class="welcome-msg hidden-xs" style="font-size:20px" col><marquee behaviou="alternate"><?php echo $row['h_text']; ?></marquee></div><?php } ?>
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand" href="index.php"><img src="images/log.png" alt="logo"></a> </div>
        <div class="collapse navbar-collapse navbar-right">
          <ul class="nav navbar-nav">
	
            <li class="active"> <a href="index.php">Home</a></li>
            <li><a href="about-us.php">About Us</a></li>
			<li><a href="gallery.php">Gallery</a></li>
			<li><a href="Events.php">Events</a></li>
            <li><a href="Railnet.php">Rail Infotech  Services</a></li>
			 <!-- <li><a href="Railnet Software Solutions.php">Railnet Software Solutions</a></li> -->
        <li><a href="Contact.php">Contact Us</a></li>
         
          </ul>
        </div>
      </div>
      <!--/.container--> 
    </nav>
  </div>
  <!--/#nav--> 
  
</header>