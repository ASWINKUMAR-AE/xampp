<?php 
  include('components/head.php'); 
?>
<body class="index-page">
<?php include('components/header.php'); ?>
  <main class="main  ">

    <section id="hero" class="hero section dark-background vh-100">
      <img src="assets/img/bg2.png" alt="" class="hero-bg" data-aos="fade" data-aos-duration="2000">
    
      <div class="container h-100 d-flex flex-column justify-content-center">
        <div class="row gy-4 justify-content-between h-100">
          <!-- 3D Model Viewer -->
          <div class="col-lg-4 order-lg-last hero-img custom-div-height align-self-center position-relative" data-aos="flip-left" data-aos-duration="1500">
            <model-viewer 
              id="bee-model" 
              src="./assets/3d/bee_gltf.glb" 
              alt="3D Bee Model" 
              auto-rotate 
              camera-controls 
              shadow-intensity="2" 
              autoplay>
            </model-viewer>
            <!-- Comic Speech Bubble -->
            <div id="speech-bubble" class="speech-bubble position-absolute top-0 start-0 bg-white text-dark border rounded p-2 shadow-sm fs-6 fw-bold" style="display: none;">
              Hi army! Welcome to the Web Design!
            </div>
          </div>
          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-duration="2000">
            <h1 data-aos="zoom-in" data-aos-delay="500">Playground for Web Design Students</h1>
            <p data-aos="slide-right" data-aos-delay="1000">
              We provide unique web hosting solutions tailored specifically for college students to unleash their creativity.
            </p>
            <div class="d-flex" data-aos="fade-up" data-aos-delay="1500">
              <a href="#about" class="btn btn-primary">Get Started</a>
            </div>
          </div>
        </div>
      </div>
    
      <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" data-aos="fade-up" data-aos-duration="2500">
        <defs>
          <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
        </defs>
        <g class="wave1">
          <use xlink:href="#wave-path" x="50" y="3"></use>
        </g>
        <g class="wave2">
          <use xlink:href="#wave-path" x="50" y="0"></use>
        </g>
        <g class="wave3">
          <use xlink:href="#wave-path" x="50" y="9"></use>
        </g>
      </svg>
    </section>
    <style>
      /* Enhanced Speech Bubble */
      .speech-bubble {
        position: absolute;
        top: -30px;
        left: -60px;
        background: linear-gradient(135deg, #ffde59, #ffa751);
        color: #fff;
        border-radius: 20px;
        padding: 15px 20px;
        font-size: 16px;
        font-weight: bold;
        max-width: 220px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        text-align: center;
        font-family: "Comic Sans MS", "Arial", sans-serif;
        border: 3px solid rgba(255, 255, 255, 0.8);
        opacity: 0;
        transform: translateY(-15px);
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
      }
    
      /* Speech Bubble Tail */
      .speech-bubble::after {
        content: "";
        position: absolute;
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 0;
        border: 15px solid transparent;
        border-top-color: #ffa751;
        border-bottom: 0;
        margin-left: -15px;
      }
    
      /* Show/Hide Animation */
      .speech-bubble.show {
        opacity: 1;
        transform: translateY(0);
      }
    
      .speech-bubble.hide {
        opacity: 0;
        transform: translateY(-15px);
      }
    
      /* Speech Bubble Glow Effect */
      .speech-bubble {
        box-shadow: 0 0 10px #ffa751, 0 0 20px #ffde59, 0 0 30px #ffa751;
      }
    </style>
    
    
   
    
    

    <!-- About Section -->
    <section id="about" class="about section " >

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-xl-center gy-5">
    
          <div class="col-xl-5 content">
            <h2 stylle="color: #0b48ff !important; ">About Us</h2>
            <h2>Playground for Web Design Students</h2>
            <p>We provide unique web hosting solutions tailored specifically for college students to unleash their creativity. Our mission is to empower students by providing them with the tools and platforms they need to build and showcase their projects effortlessly.</p>

          </div>
    
          <div class="col-xl-7">
            <div class="row gy-4 icon-boxes">
    
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box">
                  <i class="bi bi-cloud-upload"></i>
                  <h3>Easy Hosting</h3>
                  <p>Host your projects quickly and effortlessly with our user-friendly platform designed for students.</p>
                </div>
              </div> <!-- End Icon Box -->
    
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box">
                  <i class="bi bi-laptop"></i>
                  <h3>Responsive Tools</h3>
                  <p>Access modern tools and resources to create responsive and visually stunning web designs.</p>
                </div>
              </div> <!-- End Icon Box -->
    
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box">
                  <i class="bi bi-lightbulb"></i>
                  <h3>Creative Freedom</h3>
                  <p>Unleash your creativity with complete freedom to design and develop innovative projects.</p>
                </div>
              </div> <!-- End Icon Box -->
    
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                <div class="icon-box">
                  <i class="bi bi-people"></i>
                  <h3>Community Support</h3>
                  <p>Collaborate with a community of like-minded students and gain support from experts.</p>
                </div>
              </div> <!-- End Icon Box -->
    
            </div>
          </div>
    
        </div>
      </div>
    
    </section><!-- /About Section -->

<?php include "components/batch.php"?>

  </main>
  

  <section id="student-banner" class="py-5 position-relative" style="min-height: 80vh; width: 100%; overflow: hidden;">
  <!-- Gradient Overlay -->
  <div class="position-absolute top-0 start-0 w-100 h-100 bg-gradient" 
       style="pointer-events: none; background: linear-gradient(180deg, rgba(0,0,0,0.8), rgba(0,0,0,0.5));">
  </div>

  <div class="container-fluid position-relative px-0">
    <div class="row align-items-center gy-4 mx-0">
      <!-- Text Content -->
      <div class="col-lg-6 col-12 text-center text-lg-start px-4 px-lg-5">
        <h1 class="display-5 fw-bold text-light">
          Welcome, Aspiring Web Designers!
        </h1>
        <p class="lead text-light">
          We provide unique web hosting solutions tailored specifically for college students to unleash their creativity. 
          Our mission is to empower students by providing them with the tools and platforms they need to build and 
          showcase their projects effortlessly.
        </p>
        <a href="#about" class="btn btn-primary btn-lg mt-3">
          Get Started
        </a>
      </div>

      <!-- 3D Model (Hidden on Mobile) -->
      <div class="col-lg-6 col-12 text-center d-none d-lg-block">
        <model-viewer 
          src="./assets/3d/3d_clipart_-_webdev.glb" 
          alt="3D Model" 
          auto-rotate 
          camera-controls 
          animation-name="Idle" 
          shadow-intensity="1.5"
          shadow-softness="1" 
          rotation-per-second="6" 
          style="height: 80vh; width: 100%; max-width: 500px; max-height: 500px;">
        </model-viewer> 
      </div>
    </div>
  </div>
</section>



  
  
  <?php include('components/footer.php'); ?>
  <!-- Preloader -->
  <div id="preloader">
    <div class="container">
      <div class="loader">
        <div class="crystal"></div>
        <div class="crystal"></div>
        <div class="crystal"></div>
        <div class="crystal"></div>
        <div class="crystal"></div>
        <div class="crystal"></div>
      </div>
    </div>
  </div>
  
<!-- Vendor JS Files from a CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/glightbox/1.0.8/js/glightbox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/purecounter/1.1.0/purecounter_vanilla.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.1.2/swiper-bundle.min.js"></script>

<script>
  AOS.init();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanta/dist/vanta.waves.min.js"></script>




  <script src="assets/js/main.js"></script>
  <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
<script src="assets/js/main2.js"></script>
</body>

</html>