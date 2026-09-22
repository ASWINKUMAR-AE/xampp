<?php include("header.php")?>
    <style>
        .box-area{
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    margin-top: 70px;
}
.single-box{
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 300px;
    height: auto;
    border-radius: 4px;
    background-color: #fafafa;
    text-align: center;
    margin: 20px;
    padding: 20px;
    transition: .3s;
    box-shadow: 1px 0 5px 0 rgba(0,0,0,0.6) ;
}
.img-area{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 150px;
    height:150px;
    border: 6px solid #cecb09;
    border-radius: 50%;
    margin-bottom: 10px;
    padding: 20px;
    background-size: cover;
    background-position: center center;

}
.single-box:nth-child(1) .img-area{
    background-image: url('images/rank1.jpg');
    background-position-y:50%
}
.single-box:nth-child(2) .img-area{
    background-image: url('images/rank2.jpg');
}
.single-box:nth-child(3) .img-area{
    background-image: url('images/rank3.jpg');
}
.header-text{
    font-size: 24px;
    font-weight: 500px;
    line-height: 48px;
}
.img-text h3{
    margin: 10px 0;
}
.img-text p{
    font-size: 15px;
    font-weight: 400px;
    line-height: 30px;
}

.i1:hover{
    background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(118,9,121,1) 0%, rgba(150,164,6,1) 0%, rgba(205,187,3,1) 50%, rgba(255,209,0,1) 100%, rgba(103,34,137,1) 100%);    color: #fff;
}
.i2:hover{
    background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,121,44,1) 0%, rgba(40,99,32,1) 42%, rgba(52,81,87,1) 100%, rgba(103,34,137,1) 100%);    color: #fff;
}
.i3:hover{
   background: rgb(236,147,21);
background: linear-gradient(90deg, rgba(236,147,21,1) 0%, rgba(155,78,92,1) 100%, rgba(103,34,137,1) 100%);
}
.single-box:hover .line{
    background-color: #11ccb3f3;
}

.projcard-container {
    margin: 50px 0;
}


.projcard-container,
.projcard-container * {
    box-sizing: border-box;
}

.projcard-container {
    margin-left: auto;
    margin-right: auto;
    width: 1000px;
}

.projcard {
    position: relative;
    width: 100%;
    height: 300px;
    margin-bottom: 40px;
    border-radius: 10px;
    background-color: #fff;
    border: 2px solid #ddd;
    font-size: 18px;
    overflow: hidden;
    cursor: pointer;
    box-shadow: 0 4px 21px -12px rgba(0, 0, 0, .66);
    transition: box-shadow 0.2s ease, transform 0.2s ease;
}

.projcard:hover {
    box-shadow: 0 34px 32px -33px rgba(0, 0, 0, .18);
    transform: translate(0px, -3px);
}

.projcard::before {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-image: linear-gradient(-70deg, #424242, transparent 50%);
    opacity: 0.07;
}

.projcard:nth-child(2n)::before {
    background-image: linear-gradient(-250deg, #424242, transparent 50%);
}

.projcard-innerbox {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}

.projcard-img {
    position: absolute;
    height: 300px;
    width: 400px;
    top: 0;
    left: 0;
    transition: transform 0.2s ease;
}

.projcard:nth-child(2n) .projcard-img {
    left: initial;
    right: 0;
}

.projcard:hover .projcard-img {
    transform: scale(1.05) rotate(1deg);
}

.projcard:hover .projcard-bar {
    width: 70px;
}

.projcard-textbox {
    position: absolute;
    top: 7%;
    bottom: 7%;
    left: 430px;
    width: calc(100% - 470px);
    font-size: 17px;
}

.projcard:nth-child(2n) .projcard-textbox {
    left: initial;
    right: 430px;
}

.projcard-textbox::before,
.projcard-textbox::after {
    content: "";
    position: absolute;
    display: block;
    background: #ff0000bb;
    background: #fff;
    top: -20%;
    left: -55px;
    height: 140%;
    width: 60px;
    transform: rotate(8deg);
}

.projcard:nth-child(2n) .projcard-textbox::before {
    display: none;
}

.projcard-textbox::after {
    display: none;
    left: initial;
    right: -55px;
}

.projcard:nth-child(2n) .projcard-textbox::after {
    display: block;
}

.projcard-textbox * {
    position: relative;
}

.projcard-title {
    font-family: 'Voces', 'Open Sans', arial, sans-serif;
    font-size: 24px;
}

.projcard-subtitle {
    font-family: 'Voces', 'Open Sans', arial, sans-serif;
    color: #888;
}

.projcard-bar {
    left: -2px;
    width: 50px;
    height: 5px;
    margin: 10px 0;
    border-radius: 5px;
    background-color: #424242;
    transition: width 0.2s ease;
}

.projcard-blue .projcard-bar {
    background-color: #0088FF;
}

.projcard-blue::before {
    background-image: linear-gradient(-70deg, #0088FF, transparent 50%);
}

.projcard-blue:nth-child(2n)::before {
    background-image: linear-gradient(-250deg, #0088FF, transparent 50%);
}

.projcard-red .projcard-bar {
    background-color: #D62F1F;
}

.projcard-red::before {
    background-image: linear-gradient(-70deg, #D62F1F, transparent 50%);
}

.projcard-red:nth-child(2n)::before {
    background-image: linear-gradient(-250deg, #D62F1F, transparent 50%);
}
.projcard-yellow .projcard-bar {
    background-color: #F5AF41;
}

.projcard-yellow::before {
    background-image: linear-gradient(-70deg, #F5AF41, transparent 50%);
}

.projcard-yellow:nth-child(2n)::before {
    background-image: linear-gradient(-250deg, #F5AF41, transparent 50%);
}
.projcard-description {
    z-index: 10;
    font-size: 15px;
    color: #424242;
    height: 125px;
    overflow: hidden;
    text-overflow: ellipsis;
}

.projcard-tagbox button {
    bottom: 3%;
    font-size: 25px;
    cursor: default;
    user-select: none;
    padding: 10px 20px;
    border-radius: 25px;
    text-decoration: none;
    border: none;
    outline: none;
    background: purple;
    box-shadow: 0 4px 21px -12px rgba(0, 0, 0, .66);
    transition: box-shadow 0.2s ease, transform 0.2s ease;
}

.projcard-tagbox a{
    text-decoration: none;
    color: #ddd;
}


.wrapper{
   display: flex;
   justify-content: center;
   align-items: center;
   padding-top: 12%;
 }
 .user-card {
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	background-color: #fff;
	border-radius: 10px;
	padding: 40px;
	width: 75%;
	position: relative;
	overflow: hidden;
	box-shadow: 0 2px 20px -5px rgba(0,0,0,0.5);
}
 
.user-card:before {
   content: '';
   position: absolute;
   height: 300%;
   width: 173px;
   background: #e8cd06;
   top: -60px;
   left: -125px;
   z-index: 0;
   transform: rotate(17deg);
 }
 
 .user-card-img {
   display: flex;
   justify-content: center;
   align-items: center;   
   z-index: 3;
 }
 
 .user-card-img img {
   width: 150px;
   height: 150px;
   object-fit: cover;
   	border-radius: 50%;
 }
 
 .user-card-info {
   text-align: center;
 }
 
 .user-card-info h2 {
   font-size: 24px;
   margin: 0;
   margin-bottom: 10px;
   font-family: 'Bebas Neue', sans-serif;
   letter-spacing: 3px;
 }
 
 .user-card-info p {
   font-size: 14px;
   margin-bottom: 2px;
 }
 .user-card-info p span {
	font-weight: 700;
	margin-right: 10px;
}
 @media only screen and (min-width: 768px) {
   .user-card {
     flex-direction: row;
     align-items: flex-start;
   }   
   .user-card-img {
     margin-right: 20px;
     margin-bottom: 0;
   }
 
   .user-card-info {
     text-align: left;
   }
   .kl{
    position: absolute;
    left: 10px;
   }


 }

 @media (max-width: 767px){
   .wrapper{
      padding-top: 3%;
   }
   .user-card:before {
      width: 300%;
      height: 200px;
      transform: rotate(0);
   }
   .user-card-info h2 {
      margin-top: 25px;
      font-size: 35px;
   }
   .user-card-info p span {
      display: block;
      margin-bottom: 15px;
      font-size: 18px;
   }
   .kl{
    position: absolute !important;
    left: 30px !important;
    text-align: center !important;
   }
 }
 .asw{
    transition: all 2s ;


 }
 .asw:hover{
    transform: scale(2);


 }

    </style>
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
        <h2 class="page-banner-heading wow fadeInLeft animated animated" style="visibility: visible; animation-name: fadeInLeft;">SRWWO</h2>
        <div class="bread-crumb wow fadeInRight animated animated" style="visibility: visible; animation-name: fadeInRight;"> <span class="initial-text"> <a href="index.html">Home</a>/ SRWWO Matriculation School </span> </div>
      </div>
    </div>
  </div>
</section>
<section class="services pading" style="margin-top:3em;">
<div class="container">
	
	<div class="col-md-12 wow fadeInRight animated animated" style="visibility: visible; animation-name: fadeInRight;">
	
                    <div class="row">
                            
                                <div class="section-title mb-38 mt-31">
                                    
                                    <h2 class="uppercase text-center" style="margin:1em 0px 1em 0px;">SRWWO Matriculation School</h2>
                                </div>
								<div class="col-md-5">
								<img src="images/srwwoschool.jpg" class="img-responsive" alt=""/>
								<img src="images/srwwoschool1.jpg" class="img-responsive" style="margin-top:25px;" alt=""/>
								</div>
								<div class="col-md-7">
                            	<p class="23">By successfully running  SRWWO Matriculation School (LKG to X stds), the society fulfills the objective of imparting and promoting quality education to railway wards, in-turn it has enlighten many persons life to a bright future. This school was initiated and inaugurated as Bunny Land in 1962 for KG standards.  Renamed in 2002 as SRWWO Matriculation School running from KG to X stds and got the recognition from the Department of Education, Govt. of TamilNadu.   We are proud that our students are now serving the country from their  distinguished positions. </p>
                            	<p class="34">Kanthimathi Block,  the new building consists of 5 classrooms is being opened in the memory of the sincere and dedicated service rendered by our former  Principal (Late) Ms. Kanthimathi , who served this institution for more than 35 years.  Recently a new stage was build inside the campus and the 58th Annual Day was celebrated with color, fun and gaiety on this stage.</p>
								
                            	
                            
							<p class="34">A library is being maintained with a collection of more than 1500 books of informative and subject related topics as a repository of information.  </p>
								<p class="34">For the development of students physical and mental orientation, Yoga classes are being conducted regularly.    Musical and dance sessions are conducted to enable students to get trained in different forms of our rich culture. </p>
								<p class="34">To promote the awareness of keeping our places clean, Cleanliness Drive was arranged in the school where students and teachers participated with full enthusiasm and cleaned the campus to be free from leaves and debris.   </p>
								<p class="34" style="margin-bottom:4em;">We release the book called Pratiba, which consists of articles and drawings from students and also photos related to the achievements of students in sports and games. </p>
							</div>
                        </div>
               
	</div>
</div>
</section>

   <div class="container" style="margin-bottom:">
        <h2 class="col text-warning text-center" >Our Principal's Message</h2>
    </div>
    <div class="wrapper" style="display: fixed; margin-bottom: 20px !important;"	>
        <div class="user-card" id="frt">
            <div class="user-card-img">
              <img src="images/principal.jpg" alt="">
             <p class="container kl align-center" style="position: absolute;top: 190px;left: 80px;color: #000000;font-weight:bolder;font-size: 12px;align-items: center;"> G.V.KIRUTHIKA, <br>
                M.Com.,M.B.A.,M.Phil.,B.Ed., ICWAI(Inter)</p> 
            </div><br>
            <div class="user-card-info mt-3">
              <h2></h2>
              <p style="color: #888888;">"Attitude is a little thing that makes a big difference" - Winston Churchill I am very happy with the progress the school has made by imbibing in its students value based education syner</p>
            </div>
        </div>
    </div>
    <h2 class="col text-warning text-center" style="margin-bottom:-60px;">Rank Holders of SSLC (2024)</h2>
    <div class="box-area">
        <div class="single-box i1">
            <div class="img-area"></div>
            <div class="img-text">
                <span class="header-text"><strong>First Rank</strong> <i class="fas fa-trophy text-gold"></i></span>
                <div class="line"></div>
                <h5>Mohammed Malik Imran.P</h3>
                <p><b> Scored </b> 492/500 </p>
            </div>
        </div>
        <div class="single-box i2">
            <div class="img-area"></div>
            <div class="img-text">
                <span class="header-text"><strong> Second Rank</strong> <i class="fas fa-trophy text-silver"></i></span>
                <div class="line"></div>
                <h5>Sethraa.R</h3>
                <p> <b> Scored </b> 467/500 </p>
            </div>
        </div>
        <div class="single-box i3">
            <div class="img-area"></div>
            <div class="img-text">
                <span class="header-text"><strong> Third Rank </strong> <i class="fas fa-trophy text-bronze"></i></span>
                <div class="line"></div>
                <h5>Nivetha. P</h3>
                <p> <b> Scored </b> 465/500 </p>
            </div>
        </div>
    </div>
    





<!-- Footer -->
<?php include("footer.php")?>
