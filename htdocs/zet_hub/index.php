<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ZET HUB</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">   
<style>
html {
  scroll-behavior: smooth !important;
}

.hero-section {
    position: relative;
    min-height: 100vh; /* Ensure full height */
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 0 15px; /* Add padding for small screens */
  }
  #vanta-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1; /* Send background behind content */
  }
  .hero-title {
    font-size: 3rem;
    font-weight: bold;
    margin-bottom: 10px;
    word-wrap: break-word; /* Prevent text from overflowing */
  }
  .hero-subtitle {
    font-size: 1.5rem;
    margin-bottom: 20px;
  }
  .model-viewer-container {
    max-width: 100%;
    margin: 0 auto;
    padding: 15px;
    box-sizing: border-box;
  }
  .model-viewer-container model-viewer {
    max-width: 100%;
    height: auto;
  }
  .island-box {
    width: 100%; /* Ensure responsiveness */
    max-width: 350px;
    height: 100px;
    margin: 10px auto;
    background-color: #444;
    border-radius: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease;
  }
  .island-box:hover {
    transform: scale(1.05);
    box-shadow: 0px 0px 15px rgba(255, 255, 255, 0.3);
  }
  .about-section {
    padding: 60px 20px;
    background-color:rgb(22, 22, 22);
    overflow-x: hidden; /* Ensure no overflow */
  }
  .about-image {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
  }
  .about-content {
    text-align: center; /* Center text for smaller screens */
  }
  .about-content h2 {
    font-weight: bold;
    color: #343a40;
    margin-bottom: 20px;
  }
  .about-content p {
    font-size: 1.1rem;
    color: #6c757d;
  }
  .btn-custom {
    background-color: #007bff;
    color: #fff;
    border: none;
    display: inline-block;
    padding: 10px 20px;
  }
  .btn-custom:hover {
    background-color: #0056b3;
  }
  @media (max-width: 768px) {
    .hero-title {
      font-size: 2rem;
    }
    .hero-subtitle {
      font-size: 1.2rem;
    }
    .model-viewer-container {
      padding: 10px;
    }
  }

</style>


</head>
<body>

<?php include 'components/loader.php'; ?>
    <script>
    // Wait for the page to load completely
    window.addEventListener('load', function() {
      const loader = document.getElementById('loader');
      const content = document.getElementById('content');

      // Hide loader and show content
      loader.classList.add('hidden');
      setTimeout(() => {
        content.style.display = 'block';
      }, 500); // Match the CSS transition duration
    });
  </script>


<center class="container-fluid">
<?php include "components/header.php";?>
</center>
<section id="home" class="hero-section d-flex align-items-center col-12">
  <div id="vanta-bg"></div>
  <div class="container">
    <div class="row">
      <!-- Left Side: Text with Vivus Animation -->
      <div class="col-12 col-md-6 text-start" data-aos="fade-right" data-aos-duration="1000">
      <svg
          id="hero-title-svg"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 600 100"
          style="width: 100%; max-width: 600px;"
        >
          <text
            x="0"
            y="50%"
            text-anchor="start"
            fill="url(#gradient-title)"
            stroke="#fff"
            stroke-width="2"
            dy=".3em"
            font-size="50"
            font-family="Arial, sans-serif"
          >
            Welcome to ZET HUB
          </text>
          <defs>
            <linearGradient id="gradient-title" x1="0%" y1="0%" x2="100%" y2="0%">
              <stop offset="0%" style="stop-color: #ff6f61; stop-opacity: 1;" />
              <stop offset="100%" style="stop-color: #ffeb3b; stop-opacity: 1;" />
            </linearGradient>
          </defs>
        </svg>
        <!-- SVG for Subtitle -->
        <svg
          id="hero-subtitle-svg"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 600 50"
          style="width: 100%; max-width: 600px;"
        >
          <text
            x="0"
            y="50%"
            text-anchor="start"
            fill="#fff"
            stroke="#000"
            stroke-width="1.5"
            dy=".3em"
            font-size="30"
          >
            Innovative Web Development Solutions
          </text>
        </svg>
        <p style="font-size:10px; color:lightgray;">
        ZET HUB is a forward-thinking web development company specializing in delivering innovative and cutting-edge digital solutions. Our mission is to empower businesses with high-performance websites and applications that drive growth and success in the ever-evolving digital landscape.
        </p>
      </div>
      <!-- Right Side: 3D Model -->
      <div class="col-12 col-md-6 text-center" data-aos="fade-left" data-aos-duration="1000">
        <div class="model-viewer-container" style="touch-action: manipulation; overflow: hidden;">
         
        </div>
      </div>
    </div>
  </div>
</section>

<section class="about-section" style="overflow: hidden;">
  <div class="container">
    <div class="row align-items-center">
      <!-- Image Column -->
      <div class="col-md-6" data-aos="fade-up" data-aos-duration="1000">
  <div class="benefit-graphic-wrapper">
    <div class="lottie-animation-2 mx-auto" 
         data-w-id="dba2d1f8-2137-8b09-64a3-727dc348cb97" 
         data-animation-type="lottie" 
         data-src="https://cdn.prod.website-files.com/5ea5b4c87899696c40cef083/5eb9b7a8e22fd021fd368845_rocketman.json" 
         data-loop="1" 
         data-direction="1" 
         data-autoplay="1" 
         data-is-ix2-target="0" 
         data-renderer="svg" 
         data-default-duration="2" 
         data-duration="0" 
         style="filter: grayscale(100%); max-width: 500px; width: 100%; height: auto;">
    </div>
  </div>
</div>

      <!-- Content Column -->
      <div class="col-md-6 about-content" data-aos="fade-up" data-aos-duration="1000">
      <div class="about-content">
          <h2 class="section-title text-white">About Our Company</h2>
          <p>
            ZET HUB is a team of passionate developers, designers, and digital strategists dedicated to creating exceptional digital experiences.
          </p>
          <p>
            With years of industry experience, we combine technical expertise with creative vision to deliver solutions that make a real impact.
          </p>
          <a class="btn btn-primary mt-3" href="#services">Our Services</a>
        </div>
      </div>
    </div>
  </div>
</section>




<?php 
include 'components/service2.php'
 ?>

<?php 
include 'components/price.php'
 ?>




<?php include 'components/footer.php' ?>

<?php include 'components/chat_bot.php' ?>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Vanta.js Scripts -->
  <script src="assets/threejs/three.min.js"></script>
  <script src="assets/threejs/vanta.net.min.js"></script>
  <!-- Model Viewer -->
  <script type="module" src="assets/threejs/model-viewer.min.js"></script>
  <!-- GSAP -->
  <script src="assets/threejs/gsap.min.js"></script>

<script>
  // Initialize Vanta.js
  VANTA.NET({
    el: "#vanta-bg",
    mouseControls: true,
  touchControls: true,
  gyroControls: false,
  minHeight: 200.00,
  minWidth: 200.00,
  scale: 1.00,
  scaleMobile: 1.00,
  color: 0xfcf6f8,
  backgroundColor: 0x0
  });

  
  // Initialize AOS
  AOS.init();

  // Initialize GSAP Animation
// Initialize GSAP ScrollTrigger
gsap.registerPlugin(ScrollTrigger);

// Animate elements as they come into view
gsap.from(".about-image", {
  scrollTrigger: {
    trigger: ".about-image",
    start: "top 80%", // Start animation when element is 80% visible
    toggleActions: "play none none none",
  },
  x: -100,
  opacity: 0,
  duration: 1.5,
  ease: "power2.out",
});

gsap.from(".about-content h2", {
  scrollTrigger: {
    trigger: ".about-content h2",
    start: "top 90%",
    toggleActions: "play none none none",
  },
  y: 50,
  opacity: 0,
  duration: 1.5,
  ease: "power2.out",
});

gsap.from(".about-content p, .about-content .btn-custom", {
  scrollTrigger: {
    trigger: ".about-content p",
    start: "top 85%",
    toggleActions: "play none none none",
  },
  y: 30,
  opacity: 0,
  duration: 1,
  stagger: 0.2,
  ease: "power2.out",
});


  // Add interactivity for the island boxes
  const islandBoxes = document.querySelectorAll(".island-box");
  islandBoxes.forEach((box) => {
    box.addEventListener("mouseenter", () => {
      box.style.transform = "scale(1.1)";
      box.style.transition = "transform 0.3s ease";
    });
    box.addEventListener("mouseleave", () => {
      box.style.transform = "scale(1)";
      box.style.transition = "transform 0.3s ease";
    });
  });

  // Hero Text Animation on Scroll

</script>
<?php include 'components/social.php' ?>
</body>
</html>
