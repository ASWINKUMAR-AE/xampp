<!-- Footer -->
<footer id="footer-top">
  <div class="container">
    <div class="row  wow fadeInDown">
      <div class="col-md-4 col-sm-4 col-xs-12 footer-box">
        <h3>RAIL NET</h3>
        <ul class="news-letter">
          <li>
            <p class="first-time">We are Providing Inplant Training, Internship & Project BE(ECE, EEE, CIVIL, MECH, IT), MCA, MSC, BSc,.</p>
          </li>
         
          <li>
            <input type="search" placeholder="E-mail" class="subscibe">
            <input type="submit" class="subbutton" value="Subscribe">
          </li>
        </ul>
      </div>
      
      <div class="col-md-4 col-sm-4 col-xs-12 footer-box">
        <h3>Our Services</h3>
        <ul class="links">
          <li><a href="srwwoschool.php">Cloud Computing</a></li>
          <li><a href="akshayaschool.php">Big Data Prpcessing</a></li>
     
          
        </ul>
      </div>
	 
      <div class="col-md-4 col-sm-4 col-xs-12 footer-box">
        <h3>Get in Touch</h3>
        <ul class="adress">
          
          <li><i class="fa fa-map-marker"></i>  Vaigai Club,
 Railway Colony, Madurai - 625016, </li>
          
          <li><i class="fa fa-phone-square"></i>+(91)  0452 - 2308785</li>
         
          <li><i class="fa fa-envelope-o"></i> <a href="#"> railnetmdu@gmail.com </a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>
<div class="copyright dark">
  <div class="container">
    <div class="row wow fadeInDown">
      <div class="col-sm-12 text-center">
        <p>&copy; 2023  All Rights Reserved-Railnet Software Solutions</p><p style="font-size:18px; color:#FFFFFF" >                                                            </p>
      </div>
    </div>
  </div>
</div>


<script src="js/jquery-2.1.4.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.fancybox.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/viedobox_video.js"></script> 
<script src="js/jquery.easing.min.js"></script> 
<script src="js/hoverintent.min.js"></script> 
<script src="js/jquery.mixitup.min.js"></script> 
<script src="js/wow.min.js"></script> 
<script src="js/main.js"></script> 
<script type="text/javascript">
	$(function () {
		
		var filterList = {
		
			init: function () {
			
				// MixItUp plugin
				// http://mixitup.io
				$('#portfoliolist').mixitup({
					targetSelector: '.portfolio',
					filterSelector: '.filter',
					effects: ['fade'],
					easing: 'snap',
					// call the hover effect
					onMixEnd: filterList.hoverEffect()
				});				
			
			},
			
			hoverEffect: function () {
			
				// Simple parallax effect
				$('#portfoliolist .portfolio').hover(
					function () {
						$(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
						$(this).find('img').stop().animate({top: -30}, 500, 'easeOutQuad');				
					},
					function () {
						$(this).find('.label').stop().animate({bottom: -40}, 200, 'easeInQuad');
						$(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');								
					}		
				);				
			
			}

		};
		
		// Run the show!
		filterList.init();
		
		
	});
	</script>
</body>
</html>
