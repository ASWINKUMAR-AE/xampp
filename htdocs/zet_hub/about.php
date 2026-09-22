<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About | ZET HUB</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <style>
    :root {
      --black-100: #000000;
      --black-90: #121212;
      --black-80: #1e1e1e;
      --black-70: #2a2a2a;
      --black-60: #363636;
      --black-50: #424242;
      --black-40: #4e4e4e;
      --black-30: #5a5a5a;
      --black-20: #666666;
      --black-10: #727272;
      --white: #ffffff;
    }
    
    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
      background-color: var(--black-100);
      color: var(--white);
      overflow-x: hidden;
      line-height: 1.6;
    }
    
    /* Typography */
    .display-1 {
      font-size: clamp(2.5rem, 8vw, 5rem);
      font-weight: 800;
      letter-spacing: -0.03em;
      line-height: 0.9;
    }
    
    .display-2 {
      font-size: clamp(1.8rem, 5vw, 3rem);
      font-weight: 700;
      letter-spacing: -0.02em;
    }
    
    .lead {
      font-size: 1.25rem;
      color: var(--black-30);
      max-width: 600px;
    }
    
    /* Section Styles */
    .section {
      padding: 8rem 0;
      position: relative;
    }
    
    .section-divider {
      height: 1px;
      background: linear-gradient(90deg, transparent 0%, var(--black-60) 50%, transparent 100%);
      margin: 4rem 0;
    }
    
    /* Hero Section */
    .hero {
      min-height: 100vh;
      display: flex;
      align-items: center;
      background: 
        radial-gradient(circle at 30% 50%, var(--black-80) 0%, transparent 30%),
        radial-gradient(circle at 70% 30%, var(--black-90) 0%, transparent 30%);
    }
    
    .hero-content {
      position: relative;
      z-index: 2;
    }
    
    .hero-highlight {
      position: relative;
      display: inline-block;
    }
    
    .hero-highlight::after {
      content: '';
      position: absolute;
      bottom: 5px;
      left: 0;
      width: 100%;
      height: 12px;
      background-color: var(--black-40);
      z-index: -1;
      transform: skewX(-15deg);
    }
    
    /* Grid Pattern Background */
    .grid-pattern {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: 
        linear-gradient(var(--black-70) 1px, transparent 1px),
        linear-gradient(90deg, var(--black-70) 1px, transparent 1px);
      background-size: 40px 40px;
      opacity: 0.15;
      pointer-events: none;
    }
    
    /* Card Styles */
    .card {
      background: var(--black-90);
      border: 1px solid var(--black-80);
      border-radius: 12px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      overflow: hidden;
    }
    
    .card:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 40px rgba(0,0,0,0.3);
    }
    
    .card-img {
      height: 200px;
      object-fit: cover;
      filter: grayscale(100%) contrast(120%);
    }
    
    /* Team Member */
    .team-member {
      position: relative;
      margin-bottom: 2rem;
    }
    
    .team-member-img {
      width: 100%;
      height: 400px;
      object-fit: cover;
      filter: grayscale(100%) contrast(110%);
      transition: filter 0.3s ease;
    }
    
    .team-member:hover .team-member-img {
      filter: grayscale(70%) contrast(110%);
    }
    
    .team-member-info {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      padding: 2rem;
      background: linear-gradient(transparent, rgba(0,0,0,0.8));
    }
    
    /* Button Styles */
    .btn-outline-light {
      border: 1px solid var(--black-40);
      color: var(--white);
      padding: 0.75rem 1.5rem;
      border-radius: 50px;
      font-weight: 500;
      transition: all 0.3s ease;
    }
    
    .btn-outline-light:hover {
      background-color: var(--black-80);
      border-color: var(--black-30);
    }
    
    /* Animation */
    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-20px); }
    }
    
    .floating {
      animation: float 6s ease-in-out infinite;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
      .section {
        padding: 4rem 0;
      }
      
      .display-1 {
        font-size: 3rem;
      }
    }
  </style>
</head>
<body style="">
<center class="container-fluid">
<?php include "components/header.php";?>
</center>
  <!-- Grid Pattern Background -->
  <div class="grid-pattern"></div>
  
  <!-- Hero Section -->
  <section class="hero section" style="position: relative; overflow: hidden;">
  <div class="container  col-9">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="hero-content">
          <h1 class="display-1 mb-4 text-white">
            We are <span class="hero-highlight">ZET HUB</span><br>
          </h1>
          <p class="lead mb-5 text-light">
            We craft digital experiences with precision and passion, blending technical excellence with artistic vision in perfect grayscale harmony.
          </p>
          <a href="#our-work" class="btn btn-outline-light">Explore Our Work ↓</a>
        </div>
      </div>
      <div class="col-md-6 d-flex justify-content-center">
        <div class="logo-container ">
          <img src="assets/img/logo1.png" alt="ZET HUB Logo" class="rotating-logo img-fluid" style="width: 200px !important; height: auto;">
        </div>
      </div>
    </div>
  </div>
  
  <!-- Background Animation Elements -->
  <div class="bg-grid"></div>
  <div class="bg-dots"></div>
  <div class="bg-pulse"></div>
  
  <style>
    .hero {
      background: #111;
      padding: 5rem 0;
      position: relative;
      color: #eee;
    }
    
    .hero-highlight {
      color: #fff;
      font-weight: 700;
      text-shadow: 0 0 10px rgba(255,255,255,0.3);
    }
    
    .text-muted {
      color: #aaa !important;
    }
    
    .rotating-logo {
      animation: rotate 20s linear infinite;
      max-width: 300px;
      filter: grayscale(100%) brightness(0.8);
      opacity: 0.9;
      position: relative;
      z-index: 2;
    }
    
    @keyframes rotate {
      from { transform: rotate(0deg); }
      to { transform: rotate(360deg); }
    }
    
    /* Background Grid Animation */
    .bg-grid {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: 
        linear-gradient(rgba(204, 194, 194, 0.17) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255, 255, 255, 0.17) 1px, transparent 1px);
      background-size: 40px 40px;
      animation: gridMove 60s linear infinite;
      z-index: 0;
    }
    
    @keyframes gridMove {
      from { background-position: 0 0; }
      to { background-position: 1000px 1000px; }
    }
    
    /* Background Dots Animation */
    .bg-dots {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: radial-gradient(circle, rgba(255,255,255,0.05) 1px, transparent 1px);
      background-size: 30px 30px;
      animation: dotsMove 40s linear infinite;
      z-index: 0;
    }
    
    @keyframes dotsMove {
      0% { background-position: 0 0; }
      100% { background-position: 500px 500px; }
    }
    
    /* Background Pulse Animation */
    .bg-pulse {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: radial-gradient(ellipse at center, rgba(100,100,100,0.2) 0%, rgba(0,0,0,0) 70%);
      animation: pulse 15s ease infinite alternate;
      z-index: 0;
    }
    
    @keyframes pulse {
      0% { transform: scale(1); opacity: 0.2; }
      100% { transform: scale(1.2); opacity: 0.4; }
    }
    
    .btn-outline-light {
      border-color: #999;
      color: #eee;
      transition: all 0.3s ease;
      position: relative;
      z-index: 2;
      background: rgba(0,0,0,0.3);
    }
    
    .btn-outline-light:hover {
      border-color: #fff;
      background-color: rgba(255,255,255,0.1);
      color: #fff;
    }
    
    .hero-content {
      position: relative;
      z-index: 2;
    }
   
  #about {
    padding: 100px 0;
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, #0a0a0a 0%, #222 100%);
  }

  /* Enhanced background effect with fallback */
  #about::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: 
      radial-gradient(circle at 70% 30%, rgba(255,255,255,0.05) 0%, transparent 20%),
      radial-gradient(circle at 30% 70%, rgba(255,255,255,0.03) 0%, transparent 20%),
      linear-gradient(45deg, rgba(0,0,0,0.95) 0%, rgba(30,30,30,0.85) 100%);
    z-index: -2;
    animation: rotateBackground 60s linear infinite;
  }

  /* High-contrast noise texture with reduced motion option */
  @media (prefers-reduced-motion: no-preference) {
    #about::after {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background-image: 
        url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><filter id="noise"><feTurbulence type="fractalNoise" baseFrequency="1.5" numOctaves="4" stitchTiles="stitch"/></filter><rect width="100%" height="100%" filter="url(%23noise)" opacity="0.25"/></svg>');
      z-index: -1;
      animation: grain 2s steps(5) infinite, rotateBackground 120s linear infinite reverse;
    }
  }

  @keyframes rotateBackground {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }

  @keyframes grain {
    0%, 100% { transform: translate(0, 0); }
    10% { transform: translate(-5%, -10%); }
    20% { transform: translate(-15%, 5%); }
    30% { transform: translate(7%, -25%); }
    40% { transform: translate(-5%, 25%); }
    50% { transform: translate(-15%, 10%); }
    60% { transform: translate(15%, 0%); }
    70% { transform: translate(0%, 15%); }
    80% { transform: translate(3%, -35%); }
    90% { transform: translate(-10%, 10%); }
  }

  #about h2 {
    font-size: 3.5rem;
    font-weight: 800;
    background: linear-gradient(45deg, #fff 30%, #aaa 80%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow: 0 4px 8px rgba(0,0,0,0.3);
    margin-bottom: 1.5rem;
    position: relative;
    display: inline-block;
  }

  #about h2::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 0;
    width: 100%;
    height: 2px;
    background: linear-gradient(90deg, transparent 0%, rgba(255,255,255,0.5) 50%, transparent 100%);
  }

  #about p {
    font-size: 1.2rem;
    color: #ddd;
    line-height: 1.8;
    max-width: 90%;
    text-shadow: 0 1px 2px rgba(0,0,0,0.5);
  }

  .about-image {
    border-radius: 30px;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
    filter: grayscale(80%) contrast(120%) brightness(0.9);
    transition: all 0.5s cubic-bezier(0.215, 0.61, 0.355, 1);
    border: 2px solid rgba(255,255,255,0.15);
    transform: perspective(1000px) rotateY(-5deg) rotateX(2deg);
  }

  .about-image:hover {
    filter: grayscale(30%) contrast(110%) brightness(1);
    transform: perspective(1000px) rotateY(0deg) rotateX(0deg) scale(1.03);
    box-shadow: 0 35px 60px -10px rgba(0, 0, 0, 0.6);
  }

  .stat-box {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
    padding: 25px;
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    border: 1px solid rgba(255,255,255,0.15);
    min-width: 150px;
  }

  .stat-box:hover {
    transform: translateY(-8px) scale(1.05);
    background: rgba(255, 255, 255, 0.15);
    box-shadow: 0 15px 45px rgba(0, 0, 0, 0.5);
  }

  .count {
    font-size: 3rem;
    font-weight: 800;
    color: #fff;
    text-shadow: 0 2px 5px rgba(0,0,0,0.3);
    background: linear-gradient(45deg, #fff, #ddd);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    display: inline-block;
  }

  .text-muted {
    font-size: 1rem;
    color: #bbb !important;
    letter-spacing: 0.5px;
  }

  /* Glow effect for emphasis */
  @keyframes subtleGlow {
    0%, 100% { box-shadow: 0 0 10px rgba(255,255,255,0.05); }
    50% { box-shadow: 0 0 15px rgba(255,255,255,0.1); }
  }

  .stat-box:nth-child(1) { animation: subtleGlow 4s ease infinite; }
  .stat-box:nth-child(2) { animation: subtleGlow 4s ease infinite 1s; }
  .stat-box:nth-child(3) { animation: subtleGlow 4s ease infinite 2s; }

  /* Responsive adjustments */
  @media (max-width: 992px) {
    #about h2 { font-size: 2.8rem; }
    .about-image { transform: none; }
    .about-image:hover { transform: scale(1.03); }
  }

  </style>
</section>
  
  <!-- About Section -->

  <section class="section" id="about">
  <div class="container">
    <div class="row align-items-center">
      <!-- Image -->
      <div class="col-lg-6 mb-5 mb-lg-0">
        <img src="https://images.unsplash.com/photo-1579389083078-4e7018379f7e" 
             alt="Our Studio" 
             class="img-fluid about-image">
      </div>

      <!-- Text and Stats -->
      <div class="col-lg-6">
        <h2 class="mb-4">Our Philosophy</h2>
        <p class="mb-4">
          Embracing the elegance of simplicity, we find strength in the monochrome spectrum. 
          Our design ethos is both minimal and impactful, highlighting core functionality and design.
        </p>

        <div class="d-flex flex-wrap gap-4 mt-5">
          <div class="stat-box text-center flex-fill">
            <h3 class="mb-0 count" data-target="12">0</h3>
            <p class="text-muted mb-0">Years Experience</p>
          </div>
          <div class="stat-box text-center flex-fill">
            <h3 class="mb-0 count" data-target="200">0</h3>
            <p class="text-muted mb-0">Projects Delivered</p>
          </div>
          <div class="stat-box text-center flex-fill">
            <h3 class="mb-0 count" data-target="100">0</h3>
            <p class="text-muted mb-0">Monochrome Passion</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- JavaScript for Counter Animation -->
<script>
  document.querySelectorAll('.count').forEach(counter => {
    const updateCount = () => {
      const target = +counter.getAttribute('data-target');
      const current = +counter.innerText;
      const increment = target / 100;

      if (current < target) {
        counter.innerText = Math.ceil(current + increment);
        setTimeout(updateCount, 20);
      } else {
        counter.innerText = target;
      }
    };
    updateCount();
  });
</script>

  
  <!-- Tech Section -->
  <section class="section " style="margin-top:-150px;" id="tech" >
    <div class="container">
      <?php include "components/tech.php";?>
    </div>
    
  </section>

  <div class="section-divider">

  </div>
  
  <!-- Work Section -->
  <section class="section" id="our-work" style="margin-top:-150px; background-color: #111;">
  <div class="container">
    <h2 class="display-2 mb-5 text-center" style="color: #f0f0f0; text-shadow: 0 0 8px rgba(255,255,255,0.1);">Our Craft</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card h-100 border-0" style="background: linear-gradient(145deg, #1a1a1a, #0d0d0d); box-shadow: 0 4px 20px rgba(0,0,0,0.3); transition: all 0.4s ease;">
          <div style="overflow: hidden;">
            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71" class="card-img grayscale-image" alt="Web Development" style="filter: grayscale(100%) contrast(120%); transition: all 0.5s ease; transform: scale(1);">
          </div>
          <div class="card-body">
            <h3 class="h4" style="color: #e0e0e0; position: relative; display: inline-block;">
              <span style="position: absolute; bottom: -5px; left: 0; width: 40px; height: 2px; background: linear-gradient(90deg, #777, transparent);"></span>
              Web Architecture
            </h3>
            <p class="text-muted" style="color: #999 !important;">Building structural foundations with clean code and elegant solutions.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card h-100 border-0" style="background: linear-gradient(145deg, #1a1a1a, #0d0d0d); box-shadow: 0 4px 20px rgba(0,0,0,0.3); transition: all 0.4s ease;">
          <div style="overflow: hidden;">
            <img src="https://images.unsplash.com/photo-1547658719-da2b51169166" class="card-img grayscale-image" alt="UI Design" style="filter: grayscale(100%) contrast(120%); transition: all 0.5s ease; transform: scale(1);">
          </div>
          <div class="card-body">
            <h3 class="h4" style="color: #e0e0e0; position: relative; display: inline-block;">
              <span style="position: absolute; bottom: -5px; left: 0; width: 40px; height: 2px; background: linear-gradient(90deg, #777, transparent);"></span>
              Interface Design
            </h3>
            <p class="text-muted" style="color: #999 !important;">Creating intuitive experiences that speak in shades of clarity.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card h-100 border-0" style="background: linear-gradient(145deg, #1a1a1a, #0d0d0d); box-shadow: 0 4px 20px rgba(0,0,0,0.3); transition: all 0.4s ease;">
          <div style="overflow: hidden;">
            <img src="https://images.unsplash.com/photo-1626785774573-4b799315345d" class="card-img grayscale-image" alt="Creative Direction" style="filter: grayscale(100%) contrast(120%); transition: all 0.5s ease; transform: scale(1);">
          </div>
          <div class="card-body">
            <h3 class="h4" style="color: #e0e0e0; position: relative; display: inline-block;">
              <span style="position: absolute; bottom: -5px; left: 0; width: 40px; height: 2px; background: linear-gradient(90deg, #777, transparent);"></span>
              Creative Vision
            </h3>
            <p class="text-muted" style="color: #999 !important;">Shaping ideas into tangible forms with monochromatic precision.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  .grayscale-image:hover {
    filter: grayscale(50%) contrast(110%) !important;
    transform: scale(1.03) !important;
  }
  
  .card:hover {
    transform: translateY(-8px) !important;
    box-shadow: 0 8px 30px rgba(0,0,0,0.4) !important;
  }
  
  .h4:hover span {
    width: 100%;
    background: linear-gradient(90deg, #aaa, transparent);
    transition: all 0.3s ease;
  }
</style>
  
  <!-- Team Section -->
  <!-- <section class="section bg-black-90" style="margin-top:-200px; ">
  <?php   
  // include('components/teams.php');
  ?>
  </section>
   -->
  

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 800,
      easing: 'ease-in-out',
      once: true
    });
  </script>

  <?php include 'components/social.php' ?>

  <?php include 'components/footer.php' ?>
  <?php include 'components/chat_bot.php' ?>


</body>
</html>