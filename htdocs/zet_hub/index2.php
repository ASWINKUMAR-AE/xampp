<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home | Zet Hub </title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link href="assets/css/style.css" rel="stylesheet">   
<style>
html {
  scroll-behavior: smooth !important;
}

/* Pricing Section Styles */
.pricing-section {
  padding: 80px 0;
  background-color: #0a0a0a;
  position: relative;
}

.pricing-carousel {
  display: flex;
  flex-wrap: nowrap;
  justify-content: center;
  gap: 30px;
  padding: 20px;
}

.pricing-card {
  flex: 1;
  min-width: 300px;
  max-width: 350px;
  background: #1a1a1a;
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 15px;
  padding: 30px;
  text-align: center;
  position: relative;
  transition: all 0.3s ease;
}

.pricing-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

.pricing-card.featured {
  border-color: #2196F3;
  transform: scale(1.05);
}

.pricing-card .price {
  font-size: 2.5rem;
  font-weight: bold;
  color: #fff;
  margin: 20px 0;
}

.pricing-card .price span {
  font-size: 1rem;
  color: #888;
}

.pricing-card h3 {
  color: #fff;
  font-size: 1.8rem;
  margin-bottom: 20px;
}

.ribbon {
  position: absolute;
  top: 20px;
  right: -5px;
  padding: 5px 15px;
  font-size: 14px;
  font-weight: bold;
  border-radius: 3px;
}

.features {
  list-style: none;
  padding: 0;
  margin: 30px 0;
}

.features li {
  padding: 10px 0;
  text-align: left;
  color: #d0d0d0;
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.features li i {
  margin-right: 10px;
  color: #2196F3;
}

.features li i.fa-times {
  color: #dc3545;
}

.btn-pricing {
  background: #2196F3;
  color: #fff;
  border: none;
  padding: 12px 30px;
  border-radius: 25px;
  font-weight: 500;
  transition: all 0.3s ease;
  text-transform: uppercase;
  letter-spacing: 1px;
}

.btn-pricing:hover {
  background: #1976D2;
  transform: scale(1.05);
}

@media (max-width: 768px) {
  .pricing-carousel {
    gap: 20px;
    padding: 10px;
  }
  
  .pricing-card {
    min-width: 280px;
  }
  
  .pricing-card.featured {
    transform: scale(1.02);
  }
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
    .pricing-card {
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
   /* Pricing Section Styles */
    flex: 0 0 300px;
    display: flex;
    flex-wrap: nowrap;
    overflow-x: auto;
    padding: 20px 0;
    gap: 20px;
    scroll-snap-type: x mandatory;
    padding: 30px;
    border-radius: 10px;
  .pricing-card {
    flex: 0 0 3linear-gradient(135deg, #1a1a1a, #252525);
    scroll-snap-align: start;
    border: 1px solid #333;
    border-radius: 10px;
    background: linear-gradient(135deg, #1a1a1a, #252525);
    border: 1px solid #333;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
  }
  
  .pricing-card.featured {
    transform: translateY(-10px);
    border: 1px solid #2196F3;
    box-shadow: 0 15px 35px rgba(33, 150, 243, 0.2);
  }
  
  .pricing-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.4);
  }
  
  .pricing-card.featured:hover {
    transform: translateY(-15px);
  }
  
  .ribbon {
    position: absolute;
    top: 10px;
    right: -30px;
    width: 120px;
    text-align: center;
    line-height: 30px;
    letter-spacing: 1px;
    transform: rotate(45deg);
    font-size: 12px;
    font-weight: bold;
  }
  
  .pricing-card h3 {
    color: #fff;
    font-size: 1.5rem;
    margin-bottom: 20px;
    text-align: center;
  }
  
  .price {
    font-size: 2rem;
    font-weight: bold;
    color: #fff;
    margin-bottom: 20px;
    text-align: center;
  }
  
  .price span {
    font-size: 1rem;
    color: #aaa;
  }
  
  .features {
    list-style: none;
    padding: 0;
    margin: 20px 0;
    border-top: 1px solid #333;
    border-bottom: 1px solid #333;
    padding: 15px 0;
  }
  
  .features li {
    padding: 8px 0;
    color: #d0d0d0;
    display: flex;
    align-items: center;
  }
  
  .features i {
    margin-right: 10px;
    font-size: 1.1rem;
  }
  
  .features .fa-check {
    color: #4CAF50;
  }
  
  .features .fa-times {
    color: #f44336;
  }
  
  .btn-pricing {
    display: block;
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    background: #333;
    color: #fff;
    border: none;
    font-weight: 600;
    transition: all 0.3s;
  }
  
  .btn-pricing:hover {
    background: #444;
    color: #fff;
  }
  
  /* Industry Tabs */
  .nav-pills .nav-link {
    color: #aaa;
    background: transparent;
    border: 1px solid #333;
    margin: 0 5px;
    border-radius: 30px;
  }
  
  .nav-pills .nav-link.active {
    background: linear-gradient(90deg, #2196F3, #4CAF50);
    color: #fff;
    border: none;
  }
  
  /* Contact Options */
  .contact-methods {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-top: 20px;
  }
  
  .contact-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 12px;
    border-radius: 5px;
    color: white;
    text-decoration: none;
    transition: all 0.3s;
  }
  
  .contact-btn i {
    margin-right: 10px;
    font-size: 1.2rem;
  }
  
  .whatsapp {
    background: #25D366;
  }
  
  .phone {
    background: #2196F3;
  }
  
  .instagram {
    background: linear-gradient(45deg, #405DE6, #5851DB, #833AB4, #C13584, #E1306C, #FD1D1D);
  }
  
  .contact-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    color: white;
  }
  
  @media (max-width: 768px) {
    .pricing-card {
      flex: 0 0 85%;
    }
    
    .nav-pills {
      flex-wrap: nowrap;
      overflow-x: auto;
      padding-bottom: 10px;
    }
    
    .nav-item {
      flex-shrink: 0;
    }
  }
</style>
<style>
  .hosting-plans-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    margin: 0 auto;
    max-width: 1200px;
  }
  
  .hosting-plan-card {
    flex: 1;
    min-width: 280px;
    max-width: 350px;
    background: #1a1a1a;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    transition: all 0.3s ease;
    border: 1px solid #333;
  }
  
  .hosting-plan-card.featured {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.4);
    border: 1px solid #2196F3;
  }
  
  .hosting-plan-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.4);
  }
  
  .hosting-plan-card.featured:hover {
    transform: translateY(-15px);
  }
  
  .plan-header {
    padding: 20px;
    position: relative;
    text-align: center;
  }
  
  .plan-header h4 {
    margin: 0;
    font-size: 1.5rem;
    font-weight: 600;
  }
  
  .popular-badge {
    position: absolute;
    top: 15px;
    right: -30px;
    padding: 3px 30px;
    font-size: 12px;
    font-weight: bold;
    transform: rotate(45deg);
    color: white;
  }
  
  .plan-features {
    padding: 20px;
    background: #222;
  }
  
  .feature {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
    color: #e0e0e0;
  }
  
  .feature i {
    margin-right: 10px;
    font-size: 18px;
  }
  
  .plan-pricing {
    padding: 20px;
    text-align: center;
    background: #1a1a1a;
    border-top: 1px solid #333;
    border-bottom: 1px solid #333;
  }
  
  .price-main {
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 5px;
  }
  
  .price-renewal {
    font-size: 0.9rem;
  }
  
  .plan-select-btn {
    width: 100%;
    padding: 15px;
    background: #333;
    color: white;
    border: none;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  
  .plan-select-btn i {
    margin-left: 8px;
    transition: all 0.3s;
  }
  
  .plan-select-btn:hover {
    background: #444;
  }
  
  .plan-select-btn:hover i {
    transform: translateX(5px);
  }
  
  @media (max-width: 992px) {
    .hosting-plan-card {
      min-width: 250px;
    }
  }
  
  @media (max-width: 768px) {
    .hosting-plans-container {
      flex-direction: column;
      align-items: center;
    }
    
    .hosting-plan-card {
      max-width: 100%;
      width: 100%;
    }
    
    .hosting-plan-card.featured {
      transform: none;
    }
  }
 /* Additional Styles */
  .pricing-section {
    padding: 80px 0;
    position: relative;
    background-color: #0a0a0a;
    color: #fff;
  }

  .pricing-card {
    padding: 30px;
    border-radius: 15px;
    text-align: center;
    height: 100%;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
    background: #1a1a1a;
    border: 1px solid rgba(255, 255, 255, 0.1);
  }
  
  .pricing-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
  }
  
  .ribbon {
    position: absolute;
    top: 20px;
    right: -5px;
    padding: 5px 15px;
    font-size: 14px;
    font-weight: bold;
    border-radius: 3px;
  }
  
  .features {
    list-style: none;
    padding: 0;
    margin: 30px 0;
  }
  
  .features li {
    padding: 10px 0;
    text-align: left;
    color: #d0d0d0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
  }

  .features li i {
    margin-right: 10px;
    color: #2196F3;
  }

  .features li i.fa-times {
    color: #dc3545;
  }
  
  .btn-pricing {
    background: #2196F3;
    color: #fff;
    border: none;
    padding: 10px 30px;
    border-radius: 25px;
    font-weight: 500;
    transition: all 0.3s ease;
  }
  
  .btn-pricing:hover {
    background: #1976D2;
    transform: scale(1.05);
  }
  
  .section-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 15px;
    color: #f0f0f0;
    text-shadow: 0 2px 4px rgba(0,0,0,0.5);
  }
  
  .section-subtitle {
    font-size: 1.1rem;
    max-width: 700px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
  }
  
  .pricing-card.featured {
    transform: translateY(-10px);
    border: 1px solid #2196F3;
    box-shadow: 0 15px 35px rgba(33, 150, 243, 0.2);
  }
  
  .pricing-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.4);
  }
  
  .pricing-card.featured:hover {
    transform: translateY(-15px);
  }
  
  .ribbon {
    position: absolute;
    top: 10px;
    right: -30px;
    width: 120px;
    text-align: center;
    line-height: 30px;
    letter-spacing: 1px;
    transform: rotate(45deg);
    font-size: 12px;
    font-weight: bold;
  }
  
  .pricing-card h3 {
    color: #fff;
    font-size: 1.5rem;
    margin-bottom: 20px;
    text-align: center;
  }
  
  .price {
    font-size: 2rem;
    font-weight: bold;
    color: #fff;
    margin-bottom: 20px;
    text-align: center;
  }
  
  .price span {
    font-size: 1rem;
    color: #aaa;
  }
  
  .features {
    list-style: none;
    padding: 0;
    margin: 20px 0;
    border-top: 1px solid #333;
    border-bottom: 1px solid #333;
    padding: 15px 0;
  }
  
  .features li {
    padding: 8px 0;
    color: #d0d0d0;
    display: flex;
    align-items: center;
  }
  
  .features i {
    margin-right: 10px;
    font-size: 1.1rem;
  }
  
  .features .fa-check {
    color: #4CAF50;
  }
  
  .features .fa-times {
    color: #f44336;
  }
  
  .btn-pricing {
    display: block;
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    background: #333;
    color: #fff;
    border: none;
    font-weight: 600;
    transition: all 0.3s;
  }
  
  .btn-pricing:hover {
    background: #444;
    color: #fff;
  }
  
  /* Industry Tabs */
  .nav-pills .nav-link {
    color: #aaa;
    background: transparent;
    border: 1px solid #333;
    margin: 0 5px;
    border-radius: 30px;
  }
  
  .nav-pills .nav-link.active {
    background: linear-gradient(90deg, #2196F3, #4CAF50);
    color: #fff;
    border: none;
  }
  
  /* Contact Options */
  .contact-methods {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-top: 20px;
  }
  
  .contact-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 12px;
    border-radius: 5px;
    color: white;
    text-decoration: none;
    transition: all 0.3s;
  }
  
  .contact-btn i {
    margin-right: 10px;
    font-size: 1.2rem;
  }
  
  .whatsapp {
    background: #25D366;
  }
  
  .phone {
    background: #2196F3;
  }
  
  .instagram {
    background: linear-gradient(45deg, #405DE6, #5851DB, #833AB4, #C13584, #E1306C, #FD1D1D);
  }
  
  .contact-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    color: white;
  }
  
  @media (max-width: 768px) {
    .pricing-card {
      flex: 0 0 85%;
    }
    
    .nav-pills {
      flex-wrap: nowrap;
      overflow-x: auto;
      padding-bottom: 10px;
    }
    
    .nav-item {
      flex-shrink: 0;
    }
  }

  .hosting-plans-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    margin: 0 auto;
    max-width: 1200px;
  }
  
  .hosting-plan-card {
    flex: 1;
    min-width: 280px;
    max-width: 350px;
    background: #1a1a1a;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    transition: all 0.3s ease;
    border: 1px solid #333;
  }
  
  .hosting-plan-card.featured {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.4);
    border: 1px solid #2196F3;
  }
  
  .hosting-plan-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.4);
  }
  
  .hosting-plan-card.featured:hover {
    transform: translateY(-15px);
  }
  
  .plan-header {
    padding: 20px;
    position: relative;
    text-align: center;
  }
  
  .plan-header h4 {
    margin: 0;
    font-size: 1.5rem;
    font-weight: 600;
  }
  
  .popular-badge {
    position: absolute;
    top: 15px;
    right: -30px;
    padding: 3px 30px;
    font-size: 12px;
    font-weight: bold;
    transform: rotate(45deg);
    color: white;
  }
  
  .plan-features {
    padding: 20px;
    background: #222;
  }
  
  .feature {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
    color: #e0e0e0;
  }
  
  .feature i {
    margin-right: 10px;
    font-size: 18px;
  }
  
  .plan-pricing {
    padding: 20px;
    text-align: center;
    background: #1a1a1a;
    border-top: 1px solid #333;
    border-bottom: 1px solid #333;
  }
  
  .price-main {
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 5px;
  }
  
  .price-renewal {
    font-size: 0.9rem;
  }
  
  .plan-select-btn {
    width: 100%;
    padding: 15px;
    background: #333;
    color: white;
    border: none;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  
  .plan-select-btn i {
    margin-left: 8px;
    transition: all 0.3s;
  }
  
  .plan-select-btn:hover {
    background: #444;
  }
  
  .plan-select-btn:hover i {
    transform: translateX(5px);
  }
  
  @media (max-width: 992px) {
    .hosting-plan-card {
      min-width: 250px;
    }
  }
  
  @media (max-width: 768px) {
    .hosting-plans-container {
      flex-direction: column;
      align-items: center;
    }
    
    .hosting-plan-card {
      max-width: 100%;
      width: 100%;
    }
    
    .hosting-plan-card.featured {
      transform: none;
    }
  }
 /* Additional Styles */
  .pricing-section {
    padding: 80px 0;
    position: relative;
    background-color: #0a0a0a;
    color: #fff;
  }

  .pricing-card {
    padding: 30px;
    border-radius: 15px;
    text-align: center;
    height: 100%;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
    background: #1a1a1a;
    border: 1px solid rgba(255, 255, 255, 0.1);
  }
  
  .pricing-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
  }
  
  .ribbon {
    position: absolute;
    top: 20px;
    right: -5px;
    padding: 5px 15px;
    font-size: 14px;
    font-weight: bold;
    border-radius: 3px;
  }
  
  .features {
    list-style: none;
    padding: 0;
    margin: 30px 0;
  }
  
  .features li {
    padding: 10px 0;
    text-align: left;
    color: #d0d0d0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
  }

  .features li i {
    margin-right: 10px;
    color: #2196F3;
  }

  .features li i.fa-times {
    color: #dc3545;
  }
  
  .btn-pricing {
    background: #2196F3;
    color: #fff;
    border: none;
    padding: 10px 30px;
    border-radius: 25px;
    font-weight: 500;
    transition: all 0.3s ease;
  }
  
  .btn-pricing:hover {
    background: #1976D2;
    transform: scale(1.05);
  }
  
  .section-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 15px;
    color: #f0f0f0;
    text-shadow: 0 2px 4px rgba(0,0,0,0.5);
  }
  
  .section-subtitle {
    font-size: 1.1rem;
    max-width: 700px;
    margin: 0 auto;
    color: #a0a0a0;
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
        <p style="font-size: 14px; 
                  line-height: 1.6;
                  color: lightgray;
                  text-align: justify;
                  margin: 20px 0;
                  
                  max-width: 600px;">
          ZET HUB is a forward-thinking web development company specializing in delivering innovative and cutting-edge digital solutions. Our mission is to empower businesses with high-performance websites and applications that drive growth and success in the ever-evolving digital landscape.
        </p>
      </div>
      <!-- Right Side: 3D Model -->
      <div class="col-12 col-md-6 text-center" data-aos="fade-left" data-aos-duration="1000">
        <div class="model-viewer-container" style="touch-action: manipulation; overflow: hidden;">
          <model-viewer
            id="bee-model"
            src="3d/Coder_s_Companion_0113174953_texture.glb"
            alt="3D Bee Model"
            auto-rotate
            camera-controls
            disable-zoom
            shadow-intensity="9"
            autoplay
            style="width: 100%; max-width: 400px; height: 400px;"
          ></model-viewer>
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
                  <div class="divider" style="width: 80px; height: 4px;background: linear-gradient(90deg, #4CAF50, #2196F3); margin: 20px auto;"></div>

          <p>
            ZET HUB is a team of passionate developers, designers, and digital strategists dedicated to creating exceptional digital experiences.
          </p>
          <p>
            With years of industry experience, we combine technical expertise with creative vision to deliver solutions that make a real impact.
          </p>
          <a class="btn btn-outline-primary mt-3" href="#services">Our Services</a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php 
include 'components/service2.php'
 ?>
 
 <section class="pricing-section" id="pricing" style="background-color: #0a0a0a; padding: 80px 0;">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center mb-5">
        <h2 class="section-title" style="color: #f0f0f0; text-shadow: 0 2px 4px rgba(0,0,0,0.5);">Our Pricing Plans</h2>
        <div class="divider" style="width: 80px; height: 4px;background: linear-gradient(90deg, #4CAF50, #2196F3); margin: 20px auto;"></div>
        <p class="section-subtitle text-center" style="color: #a0a0a0;">Tailored solutions for businesses of all sizes</p>
      </div>
    </div>

    <!-- Industry Tabs -->
    <div class="row mb-5">
      <div class="col-12">
        <ul class="nav nav-pills justify-content-center flex-nowrap flex-sm-wrap overflow-auto pb-2" id="industryTabs" role="tablist" style="-webkit-overflow-scrolling: touch;">
          <li class="nav-item flex-shrink-0" role="presentation">
            <button class="nav-link active" id="webdev-tab" data-bs-toggle="pill" data-bs-target="#webdev" type="button" role="tab">Web Development</button>
          </li>
          <li class="nav-item flex-shrink-0" role="presentation">
            <button class="nav-link" id="cafe-tab" data-bs-toggle="pill" data-bs-target="#cafe" type="button" role="tab">Cafés & Restaurants</button>
          </li>
          <li class="nav-item flex-shrink-0" role="presentation">
            <button class="nav-link" id="medical-tab" data-bs-toggle="pill" data-bs-target="#medical" type="button" role="tab">Medical & Hospitals</button>
          </li>
          <li class="nav-item flex-shrink-0" role="presentation">
            <button class="nav-link" id="ecom-tab" data-bs-toggle="pill" data-bs-target="#ecom" type="button" role="tab">E-Commerce</button>
          </li>
        </ul>
      </div>
    </div>

    <!-- Tab Content -->
    <div class="tab-content" id="industryTabsContent">
      <!-- Web Development Tab -->
      <div class="tab-pane fade show active" id="webdev" role="tabpanel">
        <div class="row g-4 justify-content-center">
          <!-- Static Portfolio Card -->
          <div class="col-md-6 col-lg-4" data-aos="fade-up">
            <div class="pricing-card h-100 mb-4">
              <div class="ribbon" style="background: #555; color: #fff;">MOST BASIC</div>
              <h3>Static Portfolio</h3>
              <div class="price">₹9,000 <span>+GST</span></div>
              <ul class="features">
                <li><i class="fas fa-check"></i> Up to 5 Pages</li>
                <li><i class="fas fa-check"></i> Responsive Design</li>
                <li><i class="fas fa-check"></i> Basic SEO</li>
                <li><i class="fas fa-check"></i> 1 Month Support</li>
                <li><i class="fas fa-times"></i> No CMS</li>
              </ul>
              <button class="btn btn-pricing" onclick="showIndustryOptions('Static Portfolio', 'Web Development')">See More</button>
            </div>
          </div>
          
          <!-- Dynamic Website Card -->
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="pricing-card featured h-100 mb-4">
              <div class="ribbon" style="background: #2196F3; color: #fff;">POPULAR</div>
              <h3>Dynamic Website</h3>
              <div class="price">₹35,000 <span>+GST</span></div>
              <ul class="features">
                <li><i class="fas fa-check"></i> Up to 10 Pages</li>
                <li><i class="fas fa-check"></i> CMS Integration</li>
                <li><i class="fas fa-check"></i> Advanced SEO</li>
                <li><i class="fas fa-check"></i> Database Support</li>
                <li><i class="fas fa-check"></i> 3 Months Support</li>
              </ul>
              <button class="btn btn-pricing" onclick="showIndustryOptions('Dynamic Website', 'Web Development')">See More</button>
            </div>
          </div>
          
          <!-- Custom Solution Card -->
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="pricing-card h-100">
              <div class="ribbon" style="background: #FF9800; color: #fff;">CUSTOM</div>
              <h3>Custom Solution</h3>
              <div class="price">₹75,000+ <span>+GST</span></div>
              <ul class="features">
                <li><i class="fas fa-check"></i> Unlimited Pages</li>
                <li><i class="fas fa-check"></i> Custom CMS</li>
                <li><i class="fas fa-check"></i> Premium SEO</li>
                <li><i class="fas fa-check"></i> Advanced Features</li>
                <li><i class="fas fa-check"></i> 6 Months Support</li>
              </ul>
              <button class="btn btn-pricing" onclick="showIndustryOptions('Custom Solution', 'Web Development')">See More</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Café & Restaurants Tab -->
      <div class="tab-pane fade" id="cafe" role="tabpanel">
        <div class="row g-4 justify-content-center">
          <!-- Basic Café Card -->
          <div class="col-md-6 col-lg-4" data-aos="fade-up">
            <div class="pricing-card h-100 mb-4">
              <div class="ribbon" style="background: #555; color: #fff;">BASIC</div>
              <h3>Café Basic</h3>
              <div class="price">₹12,000 <span>+GST</span></div>
              <ul class="features">
                <li><i class="fas fa-check"></i> Menu Display</li>
                <li><i class="fas fa-check"></i> Gallery Section</li>
                <li><i class="fas fa-check"></i> Contact & Location</li>
                <li><i class="fas fa-check"></i> Social Media Links</li>
                <li><i class="fas fa-times"></i> No Online Ordering</li>
              </ul>
              <button class="btn btn-pricing" onclick="showIndustryOptions('Café Basic', 'Food Business')">See More</button>
            </div>
          </div>
          
          <!-- Restaurant Pro Card -->
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="pricing-card featured h-100 mb-4">
              <div class="ribbon" style="background: #2196F3; color: #fff;">PRO</div>
              <h3>Restaurant Pro</h3>
              <div class="price">₹25,000 <span>+GST</span></div>
              <ul class="features">
                <li><i class="fas fa-check"></i> Interactive Menu</li>
                <li><i class="fas fa-check"></i> Online Reservations</li>
                <li><i class="fas fa-check"></i> Food Gallery</li>
                <li><i class="fas fa-check"></i> SEO Optimized</li>
                <li><i class="fas fa-check"></i> 3 Months Support</li>
              </ul>
              <button class="btn btn-pricing" onclick="showIndustryOptions('Restaurant Pro', 'Food Business')">See More</button>
            </div>
          </div>
          
          <!-- E-Commerce Café Card -->
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="pricing-card h-100">
              <div class="ribbon" style="background: #FF9800; color: #fff;">PREMIUM</div>
              <h3>E-Commerce Café</h3>
              <div class="price">₹45,000+ <span>+GST</span></div>
              <ul class="features">
                <li><i class="fas fa-check"></i> Online Ordering</li>
                <li><i class="fas fa-check"></i> Payment Gateway</li>
                <li><i class="fas fa-check"></i> Delivery Tracking</li>
                <li><i class="fas fa-check"></i> Loyalty Program</li>
                <li><i class="fas fa-check"></i> 6 Months Support</li>
              </ul>
              <button class="btn btn-pricing" onclick="showIndustryOptions('E-Commerce Café', 'Food Business')">See More</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Medical & Hospitals Tab -->
      <div class="tab-pane fade" id="medical" role="tabpanel">
        <div class="row g-4 justify-content-center">
          <!-- Clinic Basic Card -->
          <div class="col-md-6 col-lg-4" data-aos="fade-up">
            <div class="pricing-card h-100 mb-4">
              <div class="ribbon" style="background: #555; color: #fff;">BASIC</div>
              <h3>Clinic Basic</h3>
              <div class="price">₹15,000 <span>+GST</span></div>
              <ul class="features">
                <li><i class="fas fa-check"></i> Service Pages</li>
                <li><i class="fas fa-check"></i> Doctor Profiles</li>
                <li><i class="fas fa-check"></i> Appointment Form</li>
                <li><i class="fas fa-check"></i> Contact Info</li>
                <li><i class="fas fa-times"></i> No Online Booking</li>
              </ul>
              <button class="btn btn-pricing" onclick="showIndustryOptions('Clinic Basic', 'Medical')">See More</button>
            </div>
          </div>
          
          <!-- Hospital Pro Card -->
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="pricing-card featured h-100 mb-4">
              <div class="ribbon" style="background: #2196F3; color: #fff;">PRO</div>
              <h3>Hospital Pro</h3>
              <div class="price">₹35,000 <span>+GST</span></div>
              <ul class="features">
                <li><i class="fas fa-check"></i> Department Pages</li>
                <li><i class="fas fa-check"></i> Online Appointments</li>
                <li><i class="fas fa-check"></i> Doctor Schedules</li>
                <li><i class="fas fa-check"></i> Emergency Info</li>
                <li><i class="fas fa-check"></i> 3 Months Support</li>
              </ul>
              <button class="btn btn-pricing" onclick="showIndustryOptions('Hospital Pro', 'Medical')">See More</button>
            </div>
          </div>
          
          <!-- Medical Portal Card -->
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="pricing-card h-100">
              <div class="ribbon" style="background: #FF9800; color: #fff;">PREMIUM</div>
              <h3>Medical Portal</h3>
              <div class="price">₹65,000+ <span>+GST</span></div>
              <ul class="features">
                <li><i class="fas fa-check"></i> Patient Portal</li>
                <li><i class="fas fa-check"></i> E-Prescriptions</li>
                <li><i class="fas fa-check"></i> Medical Records</li>
                <li><i class="fas fa-check"></i> Telemedicine</li>
                <li><i class="fas fa-check"></i> 6 Months Support</li>
              </ul>
              <button class="btn btn-pricing" onclick="showIndustryOptions('Medical Portal', 'Medical')">See More</button>
            </div>
          </div>
        </div>
      </div>

      <!-- E-Commerce Tab -->
      <div class="tab-pane fade" id="ecom" role="tabpanel">
        <div class="row g-4 justify-content-center">
          <!-- Basic Store Card -->
          <div class="col-md-6 col-lg-4" data-aos="fade-up">
            <div class="pricing-card h-100 mb-4">
              <div class="ribbon" style="background: #555; color: #fff;">BASIC</div>
              <h3>Basic Store</h3>
              <div class="price">₹25,000 <span>+GST</span></div>
              <ul class="features">
                <li><i class="fas fa-check"></i> Up to 50 Products</li>
                <li><i class="fas fa-check"></i> Basic Checkout</li>
                <li><i class="fas fa-check"></i> Product Categories</li>
                <li><i class="fas fa-check"></i> Contact Form</li>
                <li><i class="fas fa-times"></i> No Payment Gateway</li>
              </ul>
              <button class="btn btn-pricing" onclick="showIndustryOptions('Basic Store', 'E-Commerce')">See More</button>
            </div>
          </div>
          
          <!-- Standard Shop Card -->
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="pricing-card featured h-100 mb-4">
              <div class="ribbon" style="background: #2196F3; color: #fff;">STANDARD</div>
              <h3>Standard Shop</h3>
              <div class="price">₹55,000 <span>+GST</span></div>
              <ul class="features">
                <li><i class="fas fa-check"></i> Up to 200 Products</li>
                <li><i class="fas fa-check"></i> Payment Gateway</li>
                <li><i class="fas fa-check"></i> Order Tracking</li>
                <li><i class="fas fa-check"></i> Customer Accounts</li>
                <li><i class="fas fa-check"></i> 3 Months Support</li>
              </ul>
              <button class="btn btn-pricing" onclick="showIndustryOptions('Standard Shop', 'E-Commerce')">See More</button>
            </div>
          </div>
          
          <!-- Enterprise Commerce Card -->
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="pricing-card h-100">
              <div class="ribbon" style="background: #FF9800; color: #fff;">ENTERPRISE</div>
              <h3>Enterprise Commerce</h3>
              <div class="price">₹95,000+ <span>+GST</span></div>
              <ul class="features">
                <li><i class="fas fa-check"></i> Unlimited Products</li>
                <li><i class="fas fa-check"></i> Multi-Payment Options</li>
                <li><i class="fas fa-check"></i> Advanced Analytics</li>
                <li><i class="fas fa-check"></i> Vendor System</li>
                <li><i class="fas fa-check"></i> 6 Months Support</li>
              </ul>
              <button class="btn btn-pricing" onclick="showIndustryOptions('Enterprise Commerce', 'E-Commerce')">See More</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Hosting Plans Table -->
    <div class="row mt-5">
      <div class="col-12">
        <h3 class="text-center section-title" style="color: #e0e0e0; padding-bottom: 15px; margin-bottom: 30px; position: relative;">
          Hosting & Server Plans
          <span style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 80px; height: 3px; background: linear-gradient(90deg, #4CAF50, #2196F3); border-radius: 3px;"></span>
        </h3>
        
        <div class="row g-4 justify-content-center">
          <!-- Basic Hosting Card -->
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="hosting-plan-card h-100">
              <div class="plan-header" style="background: linear-gradient(135deg, #252525, #333);">
                <h4 style="color: #fff;">Basic Hosting</h4>
                <div class="popular-badge" style="background: #555;">ENTRY LEVEL</div>
              </div>
              <div class="plan-features">
                <div class="feature">
                  <i class="fas fa-database" style="color: #4CAF50;"></i>
                  <span>10GB SSD Storage</span>
                </div>
                <div class="feature">
                  <i class="fas fa-tachometer-alt" style="color: #4CAF50;"></i>
                  <span>Unmetered Bandwidth</span>
                </div>
                <div class="feature">
                  <i class="fas fa-globe" style="color: #4CAF50;"></i>
                  <span>1 Domain</span>
                </div>
              </div>
              <div class="plan-pricing">
                <div class="price-main" style="color: #4CAF50;">
                  ₹5,097.60
                  <span style="color: #aaa; font-size: 14px;">/3 yrs (incl. GST)</span>
                </div>
                <div class="price-renewal" style="color: #f44336;">
                  Renewal: ₹11,020.02
                </div>
              </div>
              <button class="plan-select-btn" onclick="showContactOptions('Basic Hosting')">
                Select Plan <i class="fas fa-arrow-right"></i>
              </button>
            </div>
          </div>
          
          <!-- Business Hosting Card -->
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="hosting-plan-card featured h-100">
              <div class="plan-header" style="background: linear-gradient(135deg, #333, #444);">
                <h4 style="color: #fff;">Business Hosting</h4>
                <div class="popular-badge" style="background: #2196F3;">POPULAR</div>
              </div>
              <div class="plan-features">
                <div class="feature">
                  <i class="fas fa-database" style="color: #4CAF50;"></i>
                  <span>50GB SSD Storage</span>
                </div>
                <div class="feature">
                  <i class="fas fa-tachometer-alt" style="color: #4CAF50;"></i>
                  <span>Unmetered Bandwidth</span>
                </div>
                <div class="feature">
                  <i class="fas fa-globe" style="color: #4CAF50;"></i>
                  <span>Unlimited Domains</span>
                </div>
              </div>
              <div class="plan-pricing">
                <div class="price-main" style="color: #4CAF50;">
                  ₹8,496.00
                  <span style="color: #aaa; font-size: 14px;">/3 yrs (incl. GST)</span>
                </div>
                <div class="price-renewal" style="color: #f44336;">
                  Renewal: ₹16,992.00
                </div>
              </div>
              <button class="plan-select-btn" onclick="showContactOptions('Business Hosting')">
                Select Plan <i class="fas fa-arrow-right"></i>
              </button>
            </div>
          </div>
          
          <!-- Premium Hosting Card -->
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="hosting-plan-card h-100">
              <div class="plan-header" style="background: linear-gradient(135deg, #444, #555);">
                <h4 style="color: #fff;">Premium Hosting</h4>
                <div class="popular-badge" style="background: #FF9800;">PREMIUM</div>
              </div>
              <div class="plan-features">
                <div class="feature">
                  <i class="fas fa-database" style="color: #4CAF50;"></i>
                  <span>100GB SSD Storage</span>
                </div>
                <div class="feature">
                  <i class="fas fa-tachometer-alt" style="color: #4CAF50;"></i>
                  <span>Unmetered Bandwidth</span>
                </div>
                <div class="feature">
                  <i class="fas fa-globe" style="color: #4CAF50;"></i>
                  <span>Unlimited Domains</span>
                </div>
              </div>
              <div class="plan-pricing">
                <div class="price-main" style="color: #4CAF50;">
                  ₹12,744.00
                  <span style="color: #aaa; font-size: 14px;">/3 yrs (incl. GST)</span>
                </div>
                <div class="price-renewal" style="color: #f44336;">
                  Renewal: ₹25,488.00
                </div>
              </div>
              <button class="plan-select-btn" onclick="showContactOptions('Premium Hosting')">
                Select Plan <i class="fas fa-arrow-right"></i>
              </button>
            </div>
          </div>
        </div>
        
        <p class="text-center mt-4" style="color: #a0a0a0;">
          <i class="fas fa-info-circle" style="margin-right: 5px;"></i>
          All hosting plans include a free .in domain for the first year and basic setup support.
        </p>
      </div>
    </div>
  </div>

  <!-- Contact Modal -->
  <div class="modal fade" id="contactModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="background: #1a1a1a; color: #fff; border: 1px solid #333;">
        <div class="modal-header" style="border-bottom: 1px solid #333;">
          <h5 class="modal-title" id="modalTitle">Contact Us</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: invert(1);"></button>
        </div>
        <div class="modal-body">
          <div id="contactOptions">
            <h6 class="text-secondary">Choose your preferred contact method:</h6>
            <div class="contact-methods">
              <a href="https://wa.me/yourwhatsappnumber" class="contact-btn whatsapp" target="_blank">
                <i class="fab fa-whatsapp"></i> WhatsApp
              </a>
              <a href="tel:+yourphonenumber" class="contact-btn phone">
                <i class="fas fa-phone"></i> Call Us
              </a>
              <a href="https://instagram.com/yourinstagram" class="contact-btn instagram" target="_blank">
                <i class="fab fa-instagram"></i> Instagram
              </a>
            </div>
          </div>
          <div id="contactForm" style="display: none;">
            <form>
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" style="background: #222; color: #fff; border: 1px solid #333;">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" style="background: #222; color: #fff; border: 1px solid #333;">
              </div>
              <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" rows="3" style="background: #222; color: #fff; border: 1px solid #333;"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
        <div class="modal-footer" style="border-top: 1px solid #333;">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="toggleContactForm()">Or Send Message</button>
        </div>
      </div>
    </div>
  </div>
</section>





<?php include 'components/footer.php' ?>

<?php include 'components/chat_bot.php' ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
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
  // Initialize slick carousel
  $(document).ready(function(){
    $('.pricing-carousel').slick({
      dots: true,
      infinite: true,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
  });

// Show premium contact options modal with enhanced animations
function showIndustryOptions(plan, industry) {
  const modal = new bootstrap.Modal(document.getElementById('contactModal'));
  
  // Set modal title with premium gradient text effect
  const modalTitle = document.getElementById('modalTitle');
  modalTitle.textContent = Interested in ${plan};
  modalTitle.innerHTML += <span class="industry-label">${industry}</span>;
  modalTitle.style.background = 'linear-gradient(45deg, #2196F3, #4CAF50)';
  modalTitle.style.webkitBackgroundClip = 'text';
  modalTitle.style.webkitTextFillColor = 'transparent';
  modalTitle.style.fontSize = '1.8rem';
  modalTitle.style.fontWeight = 'bold';
  modalTitle.style.letterSpacing = '0.5px';
  modalTitle.style.textShadow = '2px 2px 4px rgba(0,0,0,0.2)';
  // Add premium entrance animation
  const modalDialog = document.querySelector('.modal-dialog');
  modalDialog.style.transform = 'scale(0.7)';
  modalDialog.style.opacity = '0';
  
  // Animate modal entrance
  setTimeout(() => {
    modalDialog.style.transform = 'scale(1)';
    modalDialog.style.opacity = '1';
    modalDialog.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
  }, 100);
  // Show contact options with smooth fade effect
  const contactOptions = document.getElementById('contactOptions');
  const contactForm = document.getElementById('contactForm');
  
  contactOptions.style.display = 'block';
  contactOptions.style.opacity = '0';
  contactForm.style.display = 'none';
  
  setTimeout(() => {
    contactOptions.style.opacity = '1';
    contactOptions.style.transition = 'opacity 0.3s ease';
  }, 200);
  // Toggle between contact options and form with smooth transitions
  window.toggleContactForm = function() {
    const options = document.getElementById('contactOptions');
    const form = document.getElementById('contactForm');
    
    if (options.style.display === 'none') {
      form.style.opacity = '0';
      form.style.display = 'none';
      options.style.display = 'block';
      setTimeout(() => {
        options.style.opacity = '1';
        options.style.transition = 'opacity 0.3s ease';
      }, 50);
    } else {
      options.style.opacity = '0';
      options.style.display = 'none';
      form.style.display = 'block';
      setTimeout(() => {
        form.style.opacity = '1';
        form.style.transition = 'opacity 0.3s ease';
      }, 50);
    }
  }
  
  modal.show();
}

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