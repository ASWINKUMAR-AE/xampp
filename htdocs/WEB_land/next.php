<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Coming Soon</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
  >
  <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vanta/dist/vanta.waves.min.js"></script>
  <style>
    body, html {
      margin: 0;
      padding: 0;
      overflow-x: hidden;
      height: 100%;
    }

    #hero {
      position: relative;
      height: 100vh;
      color: white;
      background: url('assets/img/bg2.png') no-repeat center center/cover; /* Replace with your image */
    }

    .vanta-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0.85; /* Set transparency to 85% */
    z-index: 1; /* Place below content */
  }
    .content {
      position: relative;
      z-index: 2; /* Place above Vanta.js */
      text-align: center;
    }

    .custom-div-height {
      height: 250px; /* Reduced height for smaller model */
      max-width: 250px; /* Optional: Width constraint */
      margin: 0 auto;
    }

    model-viewer {
      width: 100%;
      height: 100%;
      border-radius: 8px;
    }

    h1, p {
      margin: 0.5rem 0;
    }

    h1 {
      font-size: 2.5rem;
    }

    p {
      font-size: 1.2rem;
    }

    .btn {
      margin-top: 1rem;
    }
  </style>
</head>
<body>
  <section id="hero" class="hero d-flex col-12 align-items-center justify-content-center">
    <div class="vanta-bg col-12"></div> <!-- Vanta.js background -->
    <div class="content">
      <h1>Coming Soon</h1>
      <p>We're working hard to bring you something amazing!</p>
      <div class="custom-div-height">
        <model-viewer
          id="bee-model"
          src="./assets/3d/bee_gltf.glb"
          alt="3D Bee Model"
          auto-rotate
          camera-controls
          shadow-intensity="1"
          autoplay
        ></model-viewer>
      </div>

    </div>
  </section>

  <!-- Vanta.js Background -->
  <script>
  VANTA.WAVES({
    el: ".vanta-bg",
    color: 0x0a1b33, // Background wave color
    shininess: 50,
    waveHeight: 20,
    waveSpeed: 1.2,
    zoom: 0.85
  });
  </script>

  <!-- Bootstrap Script -->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
  ></script>
</body>
</html>
