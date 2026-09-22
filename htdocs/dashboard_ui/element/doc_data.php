<!DOCTYPE html>
<html lang="en"> 
<head>
  <title>Animated Documentation Page</title>
  <!-- Meta -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- FontAwesome JS -->
  <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- AOS CSS for animations -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  
  <style>
    /* Hero section styling */
    .hero {
      background-color: #212529; /* Dark background for dark mode */
      color: white;
      text-align: center;
      border-radius: 10px;
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(10px); /* Blur effect */
      -webkit-backdrop-filter: blur(10px); /* For Safari */
      padding: 20px !important;
      border: 1px solid rgba(216, 211, 211, 0.3);
    }

    /* Smooth fade animation */
    .tab-content .tab-pane {
      display: none;
      animation: fadeIn 0.5s ease-in-out;
    }

    .tab-content .tab-pane.active {
      display: block;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Custom dark theme for the page */
    body {
      background-color: #121212; /* Dark background for the body */
      color: #e0e0e0;
    }

    .nav-tabs .nav-link {
      color: white; /* Text color for nav items */
    }

    .nav-tabs .nav-link.active {
      background-color: #343a40; /* Dark background for active tab */
    }
  </style>
</head> 

<body class="app" data-bs-theme="dark">
  <div class="container-xl">
    <!-- Header -->
    <div class="hero my-4" data-aos="fade-up" data-aos-duration="1000">
      <h1 class="display-4">Bike Speed Meter Documentation</h1>
      <p class="lead">A complete guide to building and deploying a bike speed meter with IoT and Bootstrap.</p>
    </div>

    <!-- Navigation -->
    <ul class="nav nav-tabs" id="docNav" role="tablist">
      <li class="nav-item">
        <button class="nav-link active" id="intro-tab" data-bs-toggle="tab" data-bs-target="#introduction" type="button" role="tab">
          Introduction
        </button>
      </li>
      <li class="nav-item">
        <button class="nav-link" id="req-tab" data-bs-toggle="tab" data-bs-target="#requirements" type="button" role="tab">
          Requirements
        </button>
      </li>
      <li class="nav-item">
        <button class="nav-link" id="setup-tab" data-bs-toggle="tab" data-bs-target="#setup" type="button" role="tab">
          Setup
        </button>
      </li>
      <li class="nav-item">
        <button class="nav-link" id="api-tab" data-bs-toggle="tab" data-bs-target="#api" type="button" role="tab">
          API
        </button>
      </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content mt-4">
      <!-- Introduction -->
      <div class="tab-pane fade show active" id="introduction" role="tabpanel" data-aos="fade-left" data-aos-duration="1000">
        <h2>Introduction</h2>
        <p>The Bike Speed Meter project displays real-time bike speed collected from IoT sensors on a web-based dashboard. This document outlines the hardware, backend, and frontend requirements to build the project.</p>
      </div>
      <!-- Requirements -->
      <div class="tab-pane fade" id="requirements" role="tabpanel" data-aos="fade-left" data-aos-duration="1000">
        <h2>Requirements</h2>
        <ul>
          <li>Hardware: ESP32, Hall Effect Sensor, Power Supply</li>
          <li>Backend: Flask, Node.js, or any IoT cloud service</li>
          <li>Frontend: HTML, CSS, Bootstrap</li>
        </ul>
      </div>
      <!-- Setup -->
      <div class="tab-pane fade" id="setup" role="tabpanel" data-aos="fade-left" data-aos-duration="1000">
        <h2>Setup</h2>
        <p>Set up a server to receive and serve the speed data. Here is an example using Flask:</p>
        <pre>
# Flask Example
from flask import Flask, jsonify

app = Flask(__name__)

@app.route('/api/speed', methods=['GET'])
def get_speed():
    return jsonify({"speed": 25.4})

if __name__ == "__main__":
    app.run(debug=True)
        </pre>
      </div>
      <!-- API -->
      <div class="tab-pane fade" id="api" role="tabpanel" data-aos="fade-left" data-aos-duration="1000">
        <h2>API Specification</h2>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Endpoint</th>
              <th>Method</th>
              <th>Description</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>/api/speed</td>
              <td>GET</td>
              <td>Returns the current bike speed</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- AOS JS for animations -->
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

  <!-- Initialize AOS -->
  <script>
    AOS.init();
  </script>
</body>
</html>
