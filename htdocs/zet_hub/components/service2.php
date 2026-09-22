<!DOCTYPE html>
<html data-wf-domain="teamup-ee.webflow.io" data-wf-page="5ea5b4c87899698f2ccef084" data-wf-site="5ea5b4c87899696c40cef083" data-wf-status="1">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Responsive Design with Bootstrap</title>
    
    <!-- Stylesheets -->

    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous" />
    

    <!-- Custom Styles -->
    <style>/* Base Styles - Desktop */
.w-webflow-badge {
  display: none !important;
}

.accordion__item > .accordion-header:after {
  font-family: "Font Awesome 5 Free";
  font-weight: 900;
  font-size: 16px;
  content: "\f077";
  color: #29283e;
  float: right;
  position: relative;
  display: block;
  top: 2px;
  transition: 0.3s all;
  transform: rotate(-180deg);
  opacity: 100;
}

.accordion__item.active > .accordion-header:after {
  transform: rotate(0deg);
}

.home-hero {
  display: flex;
  margin-top: 150px;
  flex-direction: column;
  justify-content: flex-start;
  background:rgba(31, 30, 30, 0.759);
  align-items: center;
}

.hero-service-wrapper {
  display: flex;
  justify-content: center;
  align-items: flex-start;
  flex-wrap: wrap; /* Allow wrapping for smaller screens */
}

.hero-service-block {
  position: relative;
  display: flex;
  width: 280px;
  height: 350px;
  margin: 10px; /* Simplified margin for consistent spacing */
  padding: 20px 20px 10px;
  flex-direction: column;
  justify-content: flex-end;
  align-items: flex-start;
  border-radius: 50px;
  background-color:rgba(33, 31, 31, 0.82);  
  color: #29283e;
  text-decoration: none;
}

.hero-service-block.w--current {
    background-color:rgba(33, 31, 31, 0.82);  
}

.hero-service-block.color-1 {
    background-color:rgba(33, 31, 31, 0.82);  
}

.hero-service-block.color-2 {
    background-color:rgba(33, 31, 31, 0.82);  
}

.hero-service-block.color-3 {
    background-color:rgba(33, 31, 31, 0.82);  
}
.service-text{
    color:white;
    text-align:center !important;
}
.hero-cta {
  position: relative;
  display: flex;
  width: 1180px;
  height: 500px;
  margin-top: 60px;
  padding: 50px;
  flex-direction: column;
  align-items: flex-start;
  border-radius: 20px;
  background-color: #f7f7f7;
}

/* Responsive Styles */

/* Tablets (768px - 1024px) */
@media (max-width: 1024px) {
  .hero-service-block {
    width: 220px;
    height: 300px;
    margin: 8px;
  }

  .hero-cta {
    width: 90%; /* Make it relative to screen size */
    height: auto; /* Adjust height automatically */
    padding: 30px;
  }
}

/* Smartphones (480px - 767px) */
@media (max-width: 767px) {
  .home-hero {
    margin-top: 100px;
  }

  .hero-service-wrapper {
    flex-direction: column; /* Stack items vertically */
    align-items: center; /* Center-align items */
  }

  .hero-service-block {
    width: 90%; /* Full-width for mobile */
    height: auto; /* Adjust height automatically */
    padding: 15px;
  }

  .hero-cta {
    width: 95%; /* Slight padding for mobile screens */
    padding: 20px;
    margin-top: 40px;
  }
}

/* Small Devices (Below 480px) */
@media (max-width: 480px) {
  .home-hero {
    margin-top: 80px;
  }

  .hero-service-block {
    width: 90%; /* Utilize full screen width */
    padding: 10px;
  }

  .hero-cta {
    width: 100%; /* Full-width for small devices */
    padding: 15px;
  }
}


    </style>
</head>
<body data-w-id="5ea5b4c8fc326439eabd7301" class="body">

  
  <div class="home-hero" style="filter: none;">
    <div class="hero-service-wrapper" style="max-width:100%;">
        <div class="hero-service-block w-inline-block">
            <div data-is-ix2-target="1" class="lottie-animation" data-w-id="8f143375-2616-ce89-270e-64d17c917eea" data-animation-type="lottie" data-src="https://cdn.prod.website-files.com/5ea5b4c87899696c40cef083/5eb31d7e2c43275f7cd13005_testcomp.json" data-loop="0" data-direction="1" data-autoplay="0" data-renderer="svg" data-default-duration="0.20833333333333334" data-duration="0" data-ix2-initial-state="0" style="filter: grayscale(100%);" onmouseover="this.style.filter='none'" onmouseout="this.style.filter='grayscale(100%)'"></div>
            <center>
                <h3 class="" style="color:white">Web Development</h3>
                <p style="color: gray;">Custom websites built with modern technologies and best practices.</p>
            </center>
        </div>
        <div class="hero-service-block color-1 w-inline-block">
            <div data-is-ix2-target="1" class="lottie-animation" data-w-id="8f143375-2616-ce89-270e-64d17c917eee" data-animation-type="lottie" data-src="https://cdn.prod.website-files.com/5ea5b4c87899696c40cef083/5eb3228bcb9a36f59c234b91_Manone.json" data-loop="0" data-direction="1" data-autoplay="0" data-renderer="svg" data-default-duration="0.125" data-duration="0" data-ix2-initial-state="0" style="filter: grayscale(100%);" onmouseover="this.style.filter='none'" onmouseout="this.style.filter='grayscale(100%)'"></div>
            <center>
                <h3 class="" style="color:white">Software Development</h3>
                <p style="color: gray;">Robust software solutions tailored to your business needs.</p>
            </center>
        </div>
        <div class="hero-service-block color-2 w-inline-block">
            <div data-is-ix2-target="1" class="lottie-animation" data-w-id="8f143375-2616-ce89-270e-64d17c917ef2" data-animation-type="lottie" data-src="https://cdn.prod.website-files.com/5ea5b4c87899696c40cef083/5eb31f3e6501814afefacaab_testcomp2.json" data-loop="0" data-direction="1" data-autoplay="0" data-renderer="svg" data-default-duration="0.2916666666666667" data-duration="0" data-ix2-initial-state="0" style="filter: grayscale(100%);" onmouseover="this.style.filter='none'" onmouseout="this.style.filter='grayscale(100%)'"></div>
            <center>
                <h3 class="" style="color:white">Desktop App Development</h3>
                <p style="color: gray;">Powerful desktop applications for enhanced productivity.</p>
            </center>
        </div>
        <div class="hero-service-block color-3 w-inline-block">
            <div data-is-ix2-target="1" class="lottie-animation" data-w-id="8f143375-2616-ce89-270e-64d17c917ef6" data-animation-type="lottie" data-src="https://cdn.prod.website-files.com/5ea5b4c87899696c40cef083/5eb3259c9cbe3c116972940c_Mantwo.json" data-loop="0" data-direction="1" data-autoplay="0" data-renderer="svg" data-default-duration="0.20833333333333334" data-duration="0" data-ix2-initial-state="0" style="filter: grayscale(100%);" onmouseover="this.style.filter='none'" onmouseout="this.style.filter='grayscale(100%)'"></div>
            <center>
                <h3 class="" style="color:white">Canva Designing</h3>
                <p style="color: gray;">Creative designs that capture your brand essence.</p>
            </center>
        </div>
    </div>
</div>
    <center>
    <div class="container py-5 " style="background-color: #222225; border-radius: 50px;margin:0px; margin-top:40px; padding: 50px; margin-bottom: 40px;">
      <div class="row align-items-center">
        <!-- Left Column: Content -->
        <div 
          class="col-lg-6 col-md-6 col-12 text-center text-md-start" 
          data-aos="fade-up" 
          data-aos-duration="1000" 
          data-aos-delay="200">
          <h1 class="display-5 fw-bold mb-4" style="color:gray">
            Providing <span class="text-white">your business</span> with Virtual &amp; Hybrid Event Solutions.
          </h1>
          <h2 class="h6 text-muted mb-4">
            We provide virtual event solutions to associations, corporations, and independent meeting providers.
          </h2>
          <a href="/contact" class="btn btn-primary btn-lg">Get Started</a>
        </div>
    
        <!-- Right Column: Lottie Animation -->
        <div 
          class="col-lg-6 col-md-6 col-12 text-center" 
          data-aos="fade-down" 
          data-aos-duration="1000" 
          data-aos-delay="400">
          <div
            class="lottie-animation mx-auto"
            data-animation-type="lottie"
            data-src="https://cdn.prod.website-files.com/5ea5b4c87899696c40cef083/5eb9af65b7ef1a5234308a32_better.json"
            data-loop="0"
            data-direction="1"
            data-autoplay="0"
            data-renderer="svg"
            style="
              max-width: 400px;
              width: 100%;
              filter: grayscale(100%) drop-shadow(10px 10px 20px rgba(0, 0, 0, 0.721));
            "
          ></div>
        </div>
      </div>
    
      <!-- Powered By Block -->
      <div 
        class="row mt-5" 
        data-aos="fade-up" 
        data-aos-duration="1000" 
        data-aos-delay="600">
        <div class="col-12 text-center">
          <a href="#">
            <!-- Optional Content -->
          </a>
        </div>
      </div>
    </div>
  </center>


  
    

    <!-- Scripts -->
    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=5ea5b4c87899696c40cef083" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://assets.website-files.com/5ea5b4c87899696c40cef083/js/webflow.25c38b484.js" type="text/javascript"></script>
</body>
</html>
