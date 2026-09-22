<?php 

include("header.php")
	 
?>

 <script>
 $(window).load(function(){
                $('#onload').modal('show');
            });
</script>  
<!-- Back-To-Top -->
<style type="text/css">
<!--
.style1 {font-size: 22px}
-->
</style>

<div class="container"> <a href="#" class="back-to-top text-center" style="display: inline;"> <i class="fa fa-angle-up"></i> </a> </div>
<!--/#Back-To-Top--> 

<!--header-->
<?php include("menu.php")?>
<!--/#header--> 

<!--main-slider-->
<?php include("slider.php")?>

<!--/#main-slider--> 

<!--About-Us-->
<section id="Services" class="pading">

<div class="container">

<div>
                    <div class="container">
                        <div class="row">
                        	<div class="col-md-5">
                        		<div class="b-s-image">
                        <img src="images/gmm.jpg" alt="Team Member" class="img-responsive">
                        		</div>
                        	</div>
                            <div class="col-md-7">
								
                                <div class="section-title mb-38 mt-31">
                                    
                                    <h3 class="uppercase mb-38" style="margin-bottom:1em; font-size:20px; text-transform:uppercase;">Southern Railway  <span class="text-color" style="color:#3f51b5;">Women's Welfare Organization-Madurai</span></h3>
                                </div>
                            	<p style="line-height:1.6;">Since Nation's Independence, Southern Railway Women's Welfare Organization has been working assiduously and achieved a lot in rendering remarkable and dedicated services to Railwaymen and to their wards. SRWWO seeks guidance and draws strength from its parent organization IRWWO (Indian Railway women's Welfare Organisation). SRWWO has been fully devoted to the laudable objective of uplifting the persons, who are in the need of Social and Economical inspiring elevations. SRWWO engages in women empowerment to achieve the goal of women self-sufficiency and non-dependency. Every Home, Every Heart, Every Feeling, Every Moment of Happiness is incomplete without a woman Only women can fullfill this world in all these aspects...  </p>
								<h3 class="uppercase mb-38" style="margin-bottom:1em; font-size:20px; text-transform:uppercase;"> <span class="text-color style1" style="color:#3f51b5;">PRESIDENT HQ</span></h3>
                            	<p class="pt-7" style="line-height:1.6;">Divisional Organisations are running their activities framed and guided by the Head Quarters Organisation in Chennai. Under the Leadership of our<strong> Honorable President Dr.Bina John </strong>Divisional organisations gain strength. Her continued guidance and support makes the Charity and educational services lively. Her auspicious presence as the Head Person of Southern Railway Women's Welfare Organisation helps the Railway Woman flock, to innovate new things in and around toward its betterment for the future. </p>
                            	
                            </div>
                        </div>
                    </div>
    </div>
</div>
</section>


<!--/#about-us--> 


<!--Experts-->
<section id="team" style="margin-bottom:2em;">
  <div class="container">
    <div class="row margin wow fadeInUp animated" data-wow-duration="700ms">
      <div class="col-md-3 col-sm-3">
        <h3 class="text-center">SRWWO- MADURAI	</h3>
      </div>
     
    </div>
	
    <div class="row">
        <?php
include("dbcon.php");
							$result= mysqli_query($con,"select * from members order by member_id ASC") or die (mysqli_error());
							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['member_id'];
							?>
        <div class="team-member col-md-2 col-sm-2 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms">
        <div class="member-thumb">
            
             <?php if($row['member_image'] != ""): ?>
						<img src="admin/members/<?php echo $row['member_image']; ?>" alt="Team Member" class="img-responsive" />
                        <?php else: ?>
									<img src="admin/upload/user.png" alt="Load" class="img-responsive" />
									<?php endif; ?>
            
          <div class="overlay2">
            <h5><?php echo $row['member_name']; ?> </h5>
            <ul class="social-links text-center">
              <li><a href="#"><i class="fa fa-facebook" style="margin-top:10px;"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter" style="margin-top:10px;"></i></a></li>
            </ul>
          </div>
        </div>
        <h4><?php echo $row['member_name']; ?> </h4>
        <span class="price"><?php echo $row['position']; ?></span></div>
	<!--
<div class="team-member col-md-2 col-sm-2 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms">
        <div class="member-thumb"> <img src="admin/members/11.jpg" alt="Team Member" class="img-responsive">
          <div class="overlay2">
            <h5>Smt. Anita Lenin </h5>
            <ul class="social-links text-center">
              <li><a href="#"><i class="fa fa-facebook" style="margin-top:10px;"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter" style="margin-top:10px;"></i></a></li>
            </ul>
          </div>
        </div>
        <h4>Smt. Anita Lenin </h4>
        <span class="price">PRESIDENT</span></div>
		<div class="team-member col-md-2 col-sm-2 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms">
        <div class="member-thumb"> <img src="images/1.jpg" alt="Team Member" class="img-responsive">
          <div class="overlay2">
            <h5>Smt. Manjula Mansukani </h5>
            <ul class="social-links text-center">
              <li><a href="#"><i class="fa fa-facebook" style="margin-top:10px;"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter" style="margin-top:10px;"></i></a></li>
            </ul>
          </div>
        </div>
		
        <h5 style="margin-top:18px;">Smt.Manjula Mansukani </h5>
        <span class="price">VICE PRESIDENT</span></div>
	  <div class="team-member col-md-2 col-sm-2 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms">
        <div class="member-thumb"> <img src="images/2.jpg" alt="Team Member" class="img-responsive">
          <div class="overlay2">
            <h5>Smt. Pratibha Shaw </h5>
            <ul class="social-links text-center">
              <li><a href="#"><i class="fa fa-facebook" style="margin-top:10px;"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter" style="margin-top:10px;"></i></a></li>
            </ul>
          </div>
        </div>
        <h4>Smt.Pratibha Shaw </h4>
        <span class="price">VICE PRESIDENT</span></div>

		<div class="team-member col-md-2 col-sm-2 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms">
        <div class="member-thumb"> <img src="images/3.jpg" alt="Team Member" class="img-responsive">
          <div class="overlay2">
            <h5>Smt.Remya Sugind</h5>
            <ul class="social-links text-center">
              <li><a href="#"><i class="fa fa-facebook" style="margin-top:10px;"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter" style="margin-top:10px;"></i></a></li>
            </ul>
          </div>
        </div>
        <h4>Smt.Remya Sugind </h4>
        <span>General Secretary</span> </div>
	  <div class="team-member col-md-2 col-sm-2 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms">
        <div class="member-thumb"> <img src="images/7.jpg" alt="Team Member" class="img-responsive">
          <div class="overlay2">
            <h5>Smt.Vasanthi Giri</h5>
            <ul class="social-links text-center">
              <li><a href="#"><i class="fa fa-facebook" style="margin-top:10px;"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter" style="margin-top:10px;"></i></a></li>
            </ul>
          </div>
        </div>
        <h4>Smt.Vasanthi Giri</h4>
        <span>TREASURER</span> </div>
	  <div class="team-member col-md-2 col-sm-2 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms">
        <div class="member-thumb">
          <img src="images/13.jpg" alt="Team Member" class="img-responsive" />
          <div class="overlay2">
            <h5>Smt.Abinaya Sudhagaran</h5>
            <ul class="social-links text-center">
              <li><a href="#"><i class="fa fa-facebook" style="margin-top:10px;"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter" style="margin-top:10px;"></i></a></li>
            </ul>
          </div>
        </div>
        <h4>Smt.Abinaya Sudhagaran</h4>
        <span class="price">Secretary / Railnet</span></div>
		
    
	
		  <div class="team-member col-md-2 col-sm-2 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms">
        <div class="member-thumb">
          <img src="images/9.jpg" alt="Team Member" class="img-responsive" />
          <div class="overlay2">
            <h5>Smt. Gowri Giridhar</h5>
            <ul class="social-links text-center">
              <li><a href="#"><i class="fa fa-facebook" style="margin-top:10px;"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter" style="margin-top:10px;"></i></a></li>
            </ul>
          </div>
        </div>
        <h4>Smt. Gowri Giridhar</h4>
        <span class="price">Secretary / SRWWO SCHOOL</span></div>
			  <div class="team-member col-md-2 col-sm-2 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms">
        <div class="member-thumb">
          <img src="images/7.jpg" alt="Team Member" class="img-responsive" />
          <div class="overlay2">
            <h5>Smt.Vasanthi Giri</h5>
            <ul class="social-links text-center">
              <li><a href="#"><i class="fa fa-facebook" style="margin-top:10px;"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter" style="margin-top:10px;"></i></a></li>
            </ul>
          </div>
        </div>
        <h4>Smt.Vasanthi Giri</h4>
        <span class="price">Secretary / AKSHAYA SCHOOL</span></div>
-->
		
        <?php 
                            } ?>
    </div>
    
  </div>
</section>
<!--/#Experts--> 

<?php include("logoslider.php")?>


<!--Partner-->

<!--/#Partner--> 

<?php include("footer.php")?>
