<?php include("header.php")?>

<!-- Back-To-Top -->
<div class="container"> <a href="#" class="back-to-top text-center" style="display: inline;"> <i class="fa fa-angle-up"></i> </a> </div>
<!--/#Back-To-Top--> 

<!--header-->
<?php include("menu.php")?>
<!--/#header--> 

<section style="background:url(images/page-banner-1.jpg)repeat scroll 0 0 / cover" class="page-banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
             <h2 class="page-banner-heading wow fadeInLeft animated animated" style="visibility: visible; animation-name: fadeInLeft;">SRWWO-MADURAI</h2>
        <div class="bread-crumb wow fadeInRight animated animated" style="visibility: visible; animation-name: fadeInRight;"> <span class="initial-text"> <a href="index.php">Home</a>/ Contact Us </span> </div>
      </div>
    </div>
  </div>
</section>
<section class="heading top-padding">
<div class="container">
<div class="col-md-12 trip-heading text-center jw-animate-gen noOpacity" data-gen-offset="80%" data-gen="fadeInDown">
    <h2 class="heading-margin">How to Reach Us? </h2>
   
</div>
 
</div>
</section>
<div id="contact-info-2">

<div class="container">
<div class="row contact-us-section">
<div class="col-md-8 col-sm-8">
  <form method="post" class="jw-animate-gen noOpacity" action="conadd.php" data-gen-offset="75%" data-gen="fadeInLeft">
    <div class="form-group">
      <label class="sr-only" for="inputName">Name</label>
      <input type="text" name="name" value="" class="form-control" id="name" placeholder="Name" required="">
    </div>
    <div class="form-group">
      <label class="sr-only" for="inputEmail">Email address</label>
      <input type="email" name="email" value="" class="form-control" id="email" placeholder="Email" required="">
    </div>
    <div class="form-group">
     <textarea class="form-control" rows="3" name="msg" placeholder="Message" id="msg" required=""></textarea>
    </div>
    <button type="submit" class="btn btn-default btn-contact-usNow">      Submit Now!
    </button>
  </form>
</div>
<div class="col-md-4 col-sm-4 contact-detail jw-animate-gen noOpacity" data-gen-offset="75%" data-gen="fadeInRight">
    <div class="col-md-12 col-sm-12 contact-text">
      <div class="col-md-2 col-sm-2 text-center contact-detail-icon">
        <i class="fa fa-map-marker"></i>
      </div>            
      <p class="col-md-10 col-sm-10 contact-detail-text">               
        Vaigai Club, Railway Colony, Madurai - 625016, 
      </p>
    </div>
    <div class="col-md-12 col-sm-12 contact-text">
      <div class="col-md-2 col-sm-2 text-center contact-detail-icon">
        <i class="fa fa-envelope-o"></i>
      </div>            
      <p class="col-md-10 col-sm-10 contact-detail-text">                
       <a href="#">railnetmdu@gmail.com </a>
      
      </p>
    </div>
    <div class="col-md-12 col-sm-12 contact-text">
      <div class="col-md-2 col-sm-2 text-center contact-detail-icon">
        <i class="fa fa-phone"></i>
      </div>            
      <p class="col-md-10 col-sm-10 contact-detail-text">               
       <a href="#">+(91) 0452 - 2308785</a>
       
      </p>
    </div>
 </div>
</div>
  </div>
</div>

<div class="gmap-area-2">

            <div class="">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3930.1632976415763!2d78.10810451434196!3d9.920354492905794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b00cf7d86a9502b%3A0x57b3b8f68a12e336!2sMadurai+Junction+Railway+Station!5e0!3m2!1sen!2sin!4v1475221145339" width="1020" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
</div>

<!-- Footer -->
<?php include("footer.php")?>
