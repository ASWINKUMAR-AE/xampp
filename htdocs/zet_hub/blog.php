<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to ZET HUB - Blogs</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000;
            overflow-x: hidden !important;
            color: #fff;
        }
        #header {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            position: relative;
        }
        .content {
            z-index: 2;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1;
        }
        .section-title {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #fff;
        }
        .card {
            background-color: #1a1a1a;
            color: #fff;
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        html {
  scroll-behavior: smooth;
}
    </style>
</head>
<body>

<!-- Header Section -->

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


<center class="container">
<?php include "components/header.php";?>
</center>


<div class="container py-5" style="
background: rgba(97, 93, 93, 0.38);
border-radius: 50px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(10.9px);
padding:20px;
-webkit-backdrop-filter: blur(10.9px);">
    <div class="row align-items-center">
      <!-- Left Column: Content -->
      <div class="col-lg-6 col-md-6 col-12" data-aos="fade-up" data-aos-duration="1000">
        <div class="text-start">
          <h4 class="text-primary fw-bold">Who We Are</h4>
          <h1 class="display-4 fw-bold">
            We're 
            <span class="" style="color:wheat" >not your normal</span> virtual event solution.
          </h1>
          <p class="text-muted fs-5 mt-3">
            TeamUp is a branch of Executivevents … a full-service event planning provider. While the world is hesitant to meet in large groups for the short-term, our team is here to help you go virtual (and ultimately hybrid)!
          </p>
          <div class="mt-4">
            <a href="/about-us" class="btn  btn-lg" style="background:rgba(29, 28, 28, 0.824); border-radius: 50px;color:white;">About Us</a>
          </div>
        </div>
      </div>
  
      <!-- Right Column: Lottie Animation -->
      <div class="col-lg-6 col-md-6 col-12 text-center" data-aos="fade-up" data-aos-duration="1200">
        <div class="graphic-wrapper">
          <div class="sidegraphiclottie mx-auto" 
               data-w-id="b7d66227-0956-edf6-2ac7-8488dfbd2b70" 
               data-animation-type="lottie" 
               data-src="https://cdn.prod.website-files.com/5ea5b4c87899696c40cef083/5eb7243ffb1f1eac39b7461b_Whoweare.json" 
               data-loop="0" 
               data-direction="1" 
               data-autoplay="1" 
               data-renderer="svg" 
               style="max-width: 500px; width: 100%;">
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Blogs Section -->
<div class="container my-5">
    <!-- Case Study Section -->
    <section data-aos="fade-up">
        <h2 class="section-title text-center">Case Study</h2>
        <div class="row g-4">
            <?php include 'components/case.php'; ?>
            </div>
        </div>
    </section>

    <!-- Articles Section -->
    <section class="mt-5" data-aos="fade-up">
        <h2 class="section-title text-center">Articles</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Article 1">
                    <div class="card-body">
                        <h5 class="card-title">Article 1</h5>
                        <p class="card-text">Insights into the latest trends in web development.</p>
                        <a href="#" class="btn btn-secondary">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Article 2">
                    <div class="card-body">
                        <h5 class="card-title">Article 2</h5>
                        <p class="card-text">Practical tips and tricks for developers.</p>
                        <a href="#" class="btn btn-secondary">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Article 3">
                    <div class="card-body">
                        <h5 class="card-title">Article 3</h5>
                        <p class="card-text">Exploring the future of technology and innovation.</p>
                        <a href="#" class="btn btn-secondary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<?php include 'components/chat_bot.php' ?>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanta/dist/vanta.waves.min.js"></script>
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=5ea5b4c87899696c40cef083" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://assets.website-files.com/5ea5b4c87899696c40cef083/js/webflow.25c38b484.js" type="text/javascript"></script>
<script>
    // Initialize AOS
    AOS.init();

    // Initialize Vanta.js
    VANTA.WAVES({
        el: "#vanta-bg",
        color: 0x1e90ff,
        shininess: 50,
        waveHeight: 20,
        waveSpeed: 1.2,
        zoom: 1.1
    });
</script>
<?php include 'components/chat_bot.php' ?>

<?php include 'components/social.php' ?>
</body>
</html>
