<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tech Stack - Professional Grayscale</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- AOS CSS -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <!-- Google Fonts - Formal Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Source+Serif+Pro:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    :root {
      --dark-bg: #121212;
      --card-bg:rgba(30, 30, 30, 0.7);
      --text-primary: #e0e0e0;
      --text-secondary: #aaaaaa;
      --accent-color: #808080;
      --border-color: #333333;
    }

    body {
      background-color: var(--dark-bg);
      color: var(--text-primary);
      font-family: 'Inter', sans-serif;
      min-height: 100vh;
      overflow-x: hidden;
      line-height: 1.6;
    }

    /* Updated Background Animation - Grayscale Dark Mode */
    .background-animation {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      overflow: hidden;
    }

    .particle-layer {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      opacity: 0.03;
    }

    /* Particle Animation */
    .particle {
      position: absolute;
      background: var(--accent-color);
      border-radius: 50%;
      filter: blur(1px);
      animation: float linear infinite;
    }

    @keyframes float {
      0% {
        transform: translateY(0) translateX(0);
        opacity: 0;
      }
      10% {
        opacity: 0.3;
      }
      100% {
        transform: translateY(-1000px) translateX(200px);
        opacity: 0;
      }
    }

    /* Grid Lines Animation - Grayscale */
    .grid-lines {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -2;
      opacity: 0.03;
      background-image: 
        linear-gradient(to right, var(--accent-color) 1px, transparent 1px),
        linear-gradient(to bottom, var(--accent-color) 1px, transparent 1px);
      background-size: 40px 40px;
      animation: gridMove 60s linear infinite;
    }

    @keyframes gridMove {
      0% {
        background-position: 0 0;
      }
      100% {
        background-position: 1000px 1000px;
      }
    }

    /* Subtle Noise Texture */
    .noise-texture {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      opacity: 0.02;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)' /%3E%3C/svg%3E");
    }

    /* Rest of your existing styles... */
    .container {
      margin-top: 50px;
      padding-bottom: 100px;
    }

    h1, h2, h3, h4, h5, h6 {
      font-family: 'Source Serif Pro', serif;
      font-weight: 600;
    }

    h2 {
      font-size: 2.5rem;
      margin-bottom: 60px;
      color: var(--text-primary);
      position: relative;
      display: inline-block;
      letter-spacing: normal;
    }

    h2::after {
      content: '';
      position: absolute;
      bottom: -15px;
      left: 0;
      width: 100%;
      height: 2px;
      background: linear-gradient(90deg, var(--accent-color), transparent);
    }

    .tech-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 30px;
      padding: 20px;
    }

    .tech-card {
      position: relative;
      padding: 30px;
      border-radius: 50px;
      background: var(--card-bg);
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
      transition: all 0.3s ease;
      overflow: hidden;
      border: 1px solid var(--border-color);
      height: 380px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    .tech-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
      border-color: var(--accent-color);
    }

    .tech-card img {
      width: 80px;
      height: 80px;
      object-fit: contain;
      margin-bottom: 25px;
      filter: grayscale(100%) brightness(0.9);
      transition: all 0.3s ease;
    }

    .tech-card:hover img {
      filter: grayscale(100%) brightness(1.1);
    }

    .tech-card h5 {
      font-size: 1.4rem;
      margin-bottom: 15px;
      font-weight: 600;
      color: var(--text-primary);
      position: relative;
    }

    .tech-card h5::after {
      content: '';
      position: absolute;
      bottom: -8px;
      left: 50%;
      transform: translateX(-50%);
      width: 40px;
      height: 2px;
      background: var(--accent-color);
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .tech-card:hover h5::after {
      opacity: 1;
    }

    .tech-card p {
      font-size: 0.95rem;
      color: var(--text-secondary);
      text-align: center;
      line-height: 1.6;
      margin-bottom: 20px;
    }

    .tech-detail {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(30, 30, 30, 0.95);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 25px;
      opacity: 0;
      transition: opacity 0.4s ease;
      border: 1px solid var(--border-color);
      border-radius: 8px;
    }

    .tech-card:hover .tech-detail {
      opacity: 1;
    }

    .tech-detail h6 {
      font-size: 1.2rem;
      color: var(--text-primary);
      margin-bottom: 15px;
      font-weight: 600;
      border-bottom: 1px solid var(--accent-color);
      padding-bottom: 8px;
    }

    .tech-detail p {
      color: var(--text-secondary);
      font-size: 0.9rem;
      text-align: left;
    }

    .tech-badge {
      position: absolute;
      top: 20px;
      right: 20px;
      background: rgba(128, 128, 128, 0.2);
      color: var(--text-primary);
      padding: 5px 12px;
      border-radius: 4px;
      font-size: 0.75rem;
      font-weight: 500;
      letter-spacing: 0.5px;
      border: 1px solid var(--border-color);
    }

    @media (max-width: 768px) {
      .tech-grid {
        grid-template-columns: 1fr;
      }
      
      h2 {
        font-size: 2rem;
      }
    }
  </style>
</head>
<body>
  <!-- New Background Animation Elements -->
  <div class="grid-lines"></div>
  <div class="noise-texture"></div>
  <div class="background-animation" id="particles"></div>

  <!-- Container for the technology stack -->
  <div class="container" style="margin-top:-0px;">
    <div class="text-center mb-5" data-aos="fade-down">
      <h2 class="text-white">Technology Expertise</h2>
      <p class="text-muted">Professional tools and platforms I work with</p>
    </div>

    <div class="tech-grid">
      <!-- React -->
      <div class="tech-card" data-aos="fade-up" data-aos-delay="100">
        <span class="tech-badge">FRONTEND</span>
        <img src="https://upload.wikimedia.org/wikipedia/commons/a/a7/React-icon.svg" alt="React">
        <h5>React</h5>
        <p>A JavaScript library for building user interfaces with component-based architecture</p>
        <div class="tech-detail">
          <h6>React Development</h6>
          <p>Extensive experience building complex applications with React hooks, context API, and performance optimization techniques. Proficient with Next.js for server-side rendering and static site generation.</p>
          <p>Implemented state management solutions using Redux and Zustand for large-scale applications.</p>
        </div>
      </div>

      <!-- Node.js -->
      <div class="tech-card" data-aos="fade-up" data-aos-delay="150">
        <span class="tech-badge">BACKEND</span>
        <img src="https://nodejs.org/static/images/logo.svg" alt="Node.js">
        <h5>Node.js</h5>
        <p>JavaScript runtime environment for building scalable network applications</p>
        <div class="tech-detail">
          <h6>Backend Development</h6>
          <p>Developed RESTful APIs and microservices architectures using Express.js framework. Implemented secure authentication systems with JWT and OAuth protocols.</p>
          <p>Experience with real-time communication using WebSockets and Socket.IO for collaborative features.</p>
        </div>
      </div>

      <!-- MongoDB -->
      <div class="tech-card" data-aos="fade-up" data-aos-delay="200">
        <span class="tech-badge">DATABASE</span>
        <img src="https://www.mongodb.com/assets/images/global/leaf.png" alt="MongoDB">
        <h5>MongoDB</h5>
        <p>Document-oriented NoSQL database for modern applications</p>
        <div class="tech-detail">
          <h6>Database Management</h6>
          <p>Designed efficient database schemas and implemented complex aggregation pipelines for data analysis. Experience with Mongoose ORM for schema validation and middleware.</p>
          <p>Deployed and managed cloud database solutions using MongoDB Atlas with proper security configurations.</p>
        </div>
      </div>

      <!-- TypeScript -->
      <div class="tech-card" data-aos="fade-up" data-aos-delay="250">
        <span class="tech-badge">LANGUAGE</span>
        <img src="https://upload.wikimedia.org/wikipedia/commons/4/4c/Typescript_logo_2020.svg" alt="TypeScript">
        <h5>TypeScript</h5>
        <p>Strongly typed programming language that builds on JavaScript</p>
        <div class="tech-detail">
          <h6>Type Development</h6>
          <p>Implemented type-safe applications with strict typing configurations. Experience with generics, interfaces, and advanced type patterns for robust codebases.</p>
          <p>Migrated existing JavaScript projects to TypeScript with proper type definitions and gradual adoption strategies.</p>
        </div>
      </div>

      <!-- Docker -->
      <div class="tech-card" data-aos="fade-up" data-aos-delay="300">
        <span class="tech-badge">DEVOPS</span>
        <img src="https://www.docker.com/wp-content/uploads/2022/03/vertical-logo-monochromatic.png" alt="Docker">
        <h5>Docker</h5>
        <p>Platform for developing, shipping, and running applications in containers</p>
        <div class="tech-detail">
          <h6>Containerization</h6>
          <p>Containerized applications for consistent development and production environments. Created optimized multi-stage builds to reduce image sizes.</p>
          <p>Configured Docker Compose for local development with multiple services and dependencies.</p>
        </div>
      </div>

      <!-- GraphQL -->
      <div class="tech-card" data-aos="fade-up" data-aos-delay="350">
        <span class="tech-badge">API</span>
        <img src="https://upload.wikimedia.org/wikipedia/commons/1/17/GraphQL_Logo.svg" alt="GraphQL">
        <h5>GraphQL</h5>
        <p>Query language for APIs and runtime for executing those queries</p>
        <div class="tech-detail">
          <h6>API Development</h6>
          <p>Implemented GraphQL servers with Apollo Server and built client applications with React Apollo. Designed efficient schemas with proper typing and documentation.</p>
          <p>Integrated schema stitching for combining multiple GraphQL services into a unified API.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

  <!-- AOS JS -->
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 800,
      easing: 'ease-out-quart',
      once: true,
    });

    // Particle animation for background
    document.addEventListener('DOMContentLoaded', function() {
      const particlesContainer = document.getElementById('particles');
      const particleCount = 50;
      
      for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.classList.add('particle');
        
        // Random size between 1px and 3px
        const size = Math.random() * 2 + 1;
        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;
        
        // Random position
        particle.style.left = `${Math.random() * 100}%`;
        particle.style.top = `${Math.random() * 100}%`;
        
        // Random animation duration between 10s and 30s
        const duration = Math.random() * 20 + 10;
        particle.style.animationDuration = `${duration}s`;
        
        // Random delay
        particle.style.animationDelay = `${Math.random() * 5}s`;
        
        particlesContainer.appendChild(particle);
      }
    });
  </script>
</body>
</html>