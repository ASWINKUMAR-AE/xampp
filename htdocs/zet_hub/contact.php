<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Me Design - Dark Mode</title>
  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <!-- AOS Animation CSS -->
  <link
    href="https://unpkg.com/aos@2.3.1/dist/aos.css"
    rel="stylesheet"
  />
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #121212;
      color: #e0e0e0;
      overflow-x: hidden !important;
    }
    html {
  scroll-behavior: smooth;
}
    .contact-section {
      background-color: #1e1e1e;
      padding: 50px;
      border-radius: 50px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
    }
    .form-control, .btn {
      border-radius: 0;
      background-color: #333;
      color: #e0e0e0;
      border: 1px solid #444;
    }
    .form-control::placeholder {
      color: #888;
    }
    .form-control:focus {
      background-color: #444;
      border-color: #ff4a00;
      color: #fff;
      box-shadow: none;
    }
    .btn {
      background-color:rgb(31, 30, 30);
      border-radius:50px;
      color: #fff;
    }
    .btn:hover {
      background-color:rgb(45, 44, 43);
    }
    .social-icons a {
      color: #e0e0e0;
      font-size: 1.5rem;
      margin: 0 10px;
    }
    .social-icons a:hover {
      color: #ff4a00;
    }
    footer {
      text-align: center;
      padding: 20px 0;
      font-size: 0.9rem;
      color: #888;
    }
    @media (max-width: 768px) {
      .contact-section {
        padding: 30px;
      }
      .social-icons a {
        font-size: 1.2rem;
        margin: 0 5px;
      }
    }
    @media (max-width: 576px) {
      h1, h2 {
        font-size: 1.5rem;
      }
      .btn {
        font-size: 0.9rem;
      }
    }
    *,
*::before,
*::after {
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
  background-color: #121212;
  color: #e0e0e0;
  overflow-x: hidden !important; /* Prevent horizontal overflow */
  margin: 0;
}

.container-fluid {
  padding-left: 0;
  padding-right: 0;
}

  </style>
</head>
<body>

<?php include 'components/loader.php'; ?>
<script>
  window.addEventListener('load', function() {
    const loader = document.getElementById('loader');
    const content = document.getElementById('content');

    loader.classList.add('hidden');
    setTimeout(() => {
      content.style.display = 'block';
    }, 500);
  });
</script>

<center class="container-fluid">
  <?php include "components/header.php";?>
</center>
<div class="container-fluid py-5">
  <div class="row align-items-center">
    <!-- Left Column -->
    <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
      <h4 class="text-muted">Who We Are</h4>
      <h1 class="display-4">We're <span class="text-primary">not your normal</span> virtual event solution.</h1>
      <p class="lead">TeamUp is a branch of Executivevents … a full-service event planning provider. While the world is hesitant to meet in large groups for the short-term, our team is here to help you go virtual (and ultimately hybrid)!</p>
      <a href="/about-us" class="btn btn-primary">About Us</a>
    </div>
    
    <!-- Right Column with Graphic -->
    <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
   <?php include 'assets/img/svg.php'; ?>
    </div>
  </div>
</div>

<div class="about-ee-section py-5 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h4 data-aos="fade-up" data-aos-duration="1000" class="font-weight-bold">TeamUp is powered by Executivevents, with over 24 years of event planning and customer service experience.</h4>
      </div>
      <div class="col-lg-12 text-center">
        <h1 data-aos="fade-up" data-aos-duration="1000" class="display-4">An <span class="text-primary">industry leader</span> in event production.</h1>
      </div>
    </div>
  </div>
</div>

  <div class="container py-5">
    <div class="row g-4 align-items-center">
      <!-- Left Section -->
      <div class="col-lg-6 col-md-12" data-aos="fade-right">
        <div class="contact-section">
          <h1 class="mb-4">Contact Me.</h1>
          <p>
            I will read all my emails one by one and reply to them. Send me any
            message you want, and I will get back to you.
          </p>
          <p>
            I need your <strong>Name</strong> and <strong>Email Address</strong>,
            but you won't receive anything except your reply only.
          </p>
          <div class="mt-4">
            <p class="mb-1">
              <strong>Social Media Seriously Harms Your Mental Health</strong>
            </p>
            <div class="social-icons">
              <a href="#"><i class="fab fa-facebook"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
          </div>
        </div>
      </div>
      <!-- Right Section -->
      <div class="col-lg-6 col-md-12" data-aos="fade-left">
        <div class="contact-section">
          <h2 class="mb-4">Send Me A Message</h2>
          <form>
            <div class="mb-3">
              <input
                type="text"
                class="form-control"
                placeholder="First Name"
              />
            </div>
            <div class="mb-3">
              <input
                type="email"
                class="form-control"
                placeholder="Email Address"
              />
            </div>
            <div class="mb-3">
              <input
                type="text"
                class="form-control"
                placeholder="Subject"
              />
            </div>
            <div class="mb-3">
              <textarea
                class="form-control"
                rows="4"
                placeholder="Message"
              ></textarea>
            </div>
            <div class="form-check mb-4">
              <input
                class="form-check-input"
                type="checkbox"
                id="newsletter"
              />
              <label class="form-check-label" for="newsletter">
                Send me your Newsletter
              </label>
            </div>
            <button type="submit" class="btn btn-lg w-100">
              SEND MESSAGE
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php include 'components/footer.php' ?>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- AOS Animation JS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <!-- FontAwesome for Icons -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <?php include 'components/chat_bot.php' ?>
  <?php include 'components/social.php' ?>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=5ea5b4c87899696c40cef083" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://assets.website-files.com/5ea5b4c87899696c40cef083/js/webflow.25c38b484.js" type="text/javascript"></script>
  <?php include 'components/chat_bot.php' ?>

</body>
</html>
