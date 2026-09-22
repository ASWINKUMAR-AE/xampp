<?php include("header.php")?>
<style type="text/css">

	body{
	background:#cddc36 !important;

}



.best-plan__head{
	text-align: center;
	margin-bottom: 45px;	
}

.best-plan__title{
	font-size: 36px;
	margin-bottom: 15px;
	margin-top:50px;
	font-weight: 800;
	color:#3c2f17;
}
.best-plan__title + p{
	font-size: 18px;
	font-weight: 300;
}

.b-price-plan{
	border: 1px solid rgba(125,138,164,.25);
	max-width: 450px;
	margin: 0 auto 30px auto;
	background: #fff;	
	-webkit-border-radius: 5px;
	        border-radius: 5px;
	-webkit-transition: opacity .35s linear, -webkit-transform .35s linear, -webkit-box-shadow .3s linear;
	transition: opacity .35s linear, -webkit-transform .35s linear, -webkit-box-shadow .3s linear;
	-o-transition: transform .35s linear, opacity .35s linear, box-shadow .3s linear;
	transition: transform .35s linear, opacity .35s linear, box-shadow .3s linear;
	transition: transform .35s linear, opacity .35s linear, box-shadow .3s linear, -webkit-transform .35s linear, -webkit-box-shadow .3s linear;	
}

.b-price-plan__item{
	padding: 15px 30px;	
}

.b-price-plan__head{
	padding-top: 20px;	
	padding-bottom: 20px;
	text-align: center;		
	overflow: hidden;
	position: relative;
}

.b-price-plan__head > h3{
	font-size: 18px;
	text-align: center;	
	position: relative;
	z-index: 1;
	margin: 0;
	letter-spacing: 1px;	
}

.price_foot{		
	text-align: center;
	position: relative;	
	overflow: hidden;	
}
.price_foot:before{
	content: '';
	position: absolute; top: 100%; left: 0;
	width: 100%;
	height: 100%;
	background: rgba(125,138,164,.1);
	-webkit-transition: top .6s linear;
	-o-transition: top .6s linear;
	transition: top .6s linear;
}

.b-price-plan__cost{	
	font-size: 20px;
	font-weight: 600;
	position: relative;
	z-index: 99;
	text-align: center;	
	background: rgba(125,138,164,.1);
}
.cost-title{
	font-size: 55px;
	line-height: 1;
	font-weight: 700;	
	color: rgba(125,138,164,1);
}
.cost-title:before{
	content: '\f155';
	font-family: 'FontAwesome';
	display: inline-block;
	margin-right: 5px;
	font-size: 20px;
	position: relative; top: -20px;
}
.cost-title > span{
	position: relative; top: -25px; left: 5px;
    font-size: 18px;	
}
.cost-time{
	font-size: 13px;
	color: rgba(125,138,164,.75);
}


.price-plan_pro{
	position: relative;
	z-index: 99;
	-webkit-box-shadow: 0 0 0 6px rgba(255, 255, 255, 0.3);
	        box-shadow:0 0 0 6px rgba(255, 255, 255, 0.3);
}

.p_plan_list{	
	padding: 0;
	margin: 0;
}
.p_plan_list > li{
	position: relative;
	padding: 15px 30px 15px 54px;
	margin: 0;
	list-style: none;
	background-color: #fff;
	border-top: 1px solid rgba(125,138,164,.1);
	-webkit-transition: all .3s ease;
	-o-transition: all .3s ease;
	transition: all .3s ease;
}
.p_plan_list > li:hover{	
    border-color: rgba(125,138,164,.1);
	-webkit-border-radius: 5px;
	        border-radius: 5px;
    -webkit-box-shadow: 0 2px 4px rgba(125,138,164,.06);
            box-shadow: 0 2px 4px rgba(125,138,164,.06);
    position: relative;
    -webkit-transform: scale(1.05);
        -ms-transform: scale(1.05);
            transform: scale(1.05);
    z-index: 99;
}

.p_plan_list > li .fa{	
	color: rgba(125,138,164,1);
	margin-right: 8px;	
	width: 16px;
	height: 16px;
	position: absolute; top: 50%; left: 30px;
	margin-top: -8px;
}
.p_plan_list > li .fa.text-success{
	color: rgba(160,206,78,1)!important;
}
.p_plan_list > li .fa.text-danger{
	color: rgba(253,99,71,1)!important;
}
.p_plan_list > li:first-of-type{
	border-top: none;
}

/* price_btn style */

.price_btn{	
	overflow: hidden;	
	position: relative;
	z-index: 99;
	margin: 15px auto;
	font-size: 13px;
	font-weight: 700;
	letter-spacing: 2px;
	color: rgba(125,138,164,1) ;
	text-decoration: none;		
	text-transform: uppercase;
	width: 70%;
	border: 2px solid rgba(125,138,164,1) !important;
	background: #fff !important;
	padding: 15px 20px !important;	    
    -webkit-border-radius: 5px;	    
            border-radius: 5px;				
}
.price_btn:before,
.price_btn:after{
	content: '';
	position: absolute; top: 0; left: 0;
	width: 0;
	height: 50%;
	background: rgba(125,138,164,1) !important;
	-webkit-transition: width .3s ease-in;
	-o-transition: width .3s ease-in;
	transition: width .3s ease-in;
}
.price_btn:after{
	top: auto;
	bottom: 0;
	-webkit-transition: width .4s ease-in;
	-o-transition: width .4s ease-in;
	transition: width .4s ease-in;
}
.price_btn:hover:before,
.price_btn:hover:after{
	width: 100%;
}

.price_btn > span{
	position: relative;
	z-index: 99;
}

.price_btn .fa{
	font-size: 18px;
	position: absolute; top: 50%; left: 100%;
	z-index: 99;
	width: 30px;		
	opacity: 0;
	-webkit-transition: left .55s linear, opacity .55s linear;
	-o-transition: left .55s linear, opacity .55s linear;
	transition: left .55s linear, opacity .55s linear;
	-webkit-transform: translateY(-50%);
	    -ms-transform: translateY(-50%);
	        transform: translateY(-50%);
}
.price_btn:hover .fa{
	left: 80%;
	opacity: 1;
}

.price_btn:hover{
	overflow: visible;
	background: #fff;
	border-color: rgba(125,138,164,1) !important;	
  
}
.price_btn:active,
.price_btn:focus{	
	background: rgba(125,138,164,1) !important;
	border-color: rgba(125,138,164,1) !important;
}

.b-price-plan:hover{
	-webkit-box-shadow: 0 10px 20px rgba(125,138,164,.25) !important;
	        box-shadow: 0 10px 20px rgba(125,138,164,.25) !important;
}
.b-price-plan:hover .price_foot:before{
	top: 0;
}

.b_plan_body:hover .b-price-plan{
	opacity: .25;
	-webkit-transform: scale(.95);
	    -ms-transform: scale(.95);
	        transform: scale(.95);
}
.b_plan_body:hover .b-price-plan:hover{
	opacity: 1;
	-webkit-transform: scale(1);
	    -ms-transform: scale(1);
	        transform: scale(1);
}

.ftr{
    text-align: center;
}

	</style>

<!-- Back-To-Top -->
<div class="container"> <a href="#" class="back-to-top text-center" style="display: inline;"> <i class="fa fa-angle-up"></i> </a> </div>
<!--/#Back-To-Top--> 

<!--header-->
<?php include("menu.php")?>
<!--/#header--> 

<?php require("dbcon.php"); ?>

<section style="background:url(images/page-banner-1.jpg)repeat scroll 0 0 / cover" class="page-banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h2 class="page-banner-heading wow fadeInLeft animated animated" style="visibility: visible; animation-name: fadeInLeft;">SRWWO-MADURAI</h2>
        <div class="bread-crumb wow fadeInRight animated animated" style="visibility: visible; animation-name: fadeInRight;"> <span class="initial-text"> <a href="index.php">Home</a>/ Events </span> </div>
      </div>
    </div>
  </div>
</section>

<section id="feature" class="pading">
        <div class="container">
          	<div class="row wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
           	<div class="col-md-12 text-center">
                    <h2 class="heading-margin"></h2>
                  
                </div>
            </div>

            <div class="row">
                
                
                
   <div class="best-plan">
<div class="container">
					<div class="best-plan__head">
						<div class="row">
							<div class="col-md-12">
								<h3 class="best-plan__title">EVENTS</h3>								
							</div>
						</div>
					</div>
					<div class="b_plan_body">					
						<div class="row">
							<div class="col-md-4 col-sm-4">
								<!-- price plans item begin -->
								<div class="b-price-plan">
									<div class="b-price-plan__item b-price-plan__head">
										<h3>SPORT'S DAY</h3>
									</div>
									<div class="b-price-plan__item b-price-plan__cost">											
										<div class="">SRWWO</div>
										
									</div>
									<ul class="p_plan_list">
								<p align="justify">In India, sports days are held for two to three days. These include games like football, cricket, throwball, dodgeball, volleyball, track and field, basketball etc. These sports days are held between the various houses in a particular school. In India, many traditional games such as Kho-Kho and Kabaddi are played.</p>
								
										
									</ul>								
									<div class="b-price-plan__item price_foot">																			
										<a href="booknow.php" class="btn btn-warning price_btn">
											<span>Book now</span> <i class="fa fa-caret-right" aria-hidden="true"></i>
										</a>
									</div>
								</div>
								<!-- price plans item end -->
							</div>
							<div class="col-md-4 col-sm-4">
								<!-- price plans item begin -->
								<div class="b-price-plan price-plan_pro">
									<div class="b-price-plan__item b-price-plan__head">
										<h3>	
TEACHER'S DAY</h3>
									</div>
									<div class="b-price-plan__item b-price-plan__cost">											
										<div class="">SRWWO</div>
										
									</div>
									<ul class="p_plan_list">
									<p align="justify">September 5th, birthday of Dr.Sarvepalli Radhakrishnan, was celebrated in our school. His footsteps, the teachers follow, are being proved on Teacher's Day. The performance of students on stage exclusively for teachers was a memorable one. Students exhibited their talents as a treat to the teachers. Dance, music, mimicry and skit made the day explicable. The students took great effort and ensured that teachers enjoy every minute. Followed by the cultural programme, games like musical chair and tug of war were conducted for the teachers by the students.</p>
										
									</ul>								
									<div class="b-price-plan__item price_foot">																			
										<a href="booknow.php" class="btn btn-warning price_btn">
											<span>Book now</span> <i class="fa fa-caret-right" aria-hidden="true"></i>
										</a>
									</div>
								</div>
								<!-- price plans item end -->								
							</div>	
							<div class="col-md-4 col-sm-4">
								<!-- price plans item begin -->
								<div class="b-price-plan">
									<div class="b-price-plan__item b-price-plan__head">
										<h3>INPLANT TRAINING</h3>
									</div>
									<div class="b-price-plan__item b-price-plan__cost">											
										<div class="">SRWWO</div>
										
									</div>
									<ul class="p_plan_list">
								<p align="justify">The Railnet Centre coordinates in-plant training for Engineering students from different colleges of madurai and outside. We have guided more than 2000 students doing B.E, During summer and winter vacations for inplant training. This includes seminars by prominent persons in IT and Telecommunication industry, and field visits to different departments of Railways where Railway Officers and technical heads will deliver the knowledge of work. Through Railnet, we guide acadamic students ( MCA, ME, BE, M.SC ) to do their Acadamic Projects here. The projects are helping the ongoing computerisation process of the Southern Railway,Madurai Division.</p>
										
									</ul>								
									<div class="b-price-plan__item price_foot">																			
										<a href="booknow.php" class="btn btn-warning price_btn">
											<span>Book now</span> <i class="fa fa-caret-right" aria-hidden="true"></i>
										</a>
									</div>
								</div>
								<!-- price plans item end -->								
							</div>
						</div>	
                      
                      
            
            
					</div>
				</div>
                </div>
					  <!--
<div class="col-md-12 col-sm-12 col-xs-12 wow fadeInDown animated" data-wow-duration="1000ms" data-wow-delay="600ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 600ms; animation-name: fadeInDown;">
                        <div class="feature-wrap">
                            <i class="fa fa-bolt"></i>
                            <h4 style="font-size:18px; color:#88ae31;">SPORT'S DAY </h4>
                            <p style="margin-top:1em; line-height:1.6;">In India, sports days are held for two to three days. These include games like football, cricket, throwball, dodgeball, volleyball, track and field, basketball etc. These sports days are held between the various houses in a particular school. In India, many traditional games such as Kho-Kho and Kabaddi are played. </p>
                        </div>
                    </div>

<div class="col-md-12 col-sm-12 col-xs-12 wow fadeInDown animated" data-wow-duration="1000ms" data-wow-delay="600ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 600ms; animation-name: fadeInDown;">
                        <div class="feature-wrap">
                            <i class="fa fa-briefcase"></i>
                            <h4 style="font-size:18px; color:#88ae31;">INPLANT TRAINING</h4>
                            <p style="margin-top:1em; line-height:1.6;">Smt. E. Yogavi Nadesh/ Secretary Railnet The Centre coordinates in-plant training for Engineering students from different colleges of madurai and outside. We have guided more than 2000 students doing B.E, During summer and winter vacations for inplant training. This includes seminars by prominent persons in IT and Telecommunication industry, and field visits to different departments of Railways where Railway Officers and technical heads will deliver the knowledge of work. Through Railnet, we guide acadamic students ( MCA, ME, BE, M.SC ) to do their Acadamic Projects here. The projects are helping the ongoing computerisation process of the Southern Railway,Madurai Division. </p>
                        </div>
                    </div>
-->


                   
                </div><!--/.services-->
            
            </div><!--/.row--> 

			
            <!--/.get-started-->
        </div><!--/.container-->
    </section>
<!--Partner-->
<?php include("logoslider.php")?>

<!--/#Partner--> 

<!-- Footer -->
<?php include("footer.php")?>
