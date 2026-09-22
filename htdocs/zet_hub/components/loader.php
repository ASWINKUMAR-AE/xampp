<div id="hex-loader" class="hex-loader-container">
  <div class="hex-loader">
    <div class="hexagon-main"></div>
    <div class="hexagon-particles">
      <div class="particle p1"></div>
      <div class="particle p2"></div>
      <div class="particle p3"></div>
      <div class="particle p4"></div>
    </div>
  </div>
</div>

<style>
.hex-loader-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100vh;
  background-color: #000;
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999;
  perspective: 1000px;
}

.hex-loader {
  position: relative;
  width: 100px;
  height: 115px;
}

/* Main Hexagon with 3D Flip */
.hexagon-main {
  width: 100px;
  height: 115px;
  background: linear-gradient(145deg, #ffffff, #e6e6e6);
  clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
  transform-style: preserve-3d;
  animation: hexFlip 2.5s cubic-bezier(0.68, -0.55, 0.27, 1.55) infinite;
  box-shadow: 0 0 15px rgba(255,255,255,0.2);
}

/* Particle Trail */
.hexagon-particles {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

.particle {
  position: absolute;
  background: white;
  clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
  opacity: 0;
}

.p1 {
  width: 20px;
  height: 23px;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  animation: particleFlow 2.5s infinite;
}

.p2 {
  width: 15px;
  height: 17px;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  animation: particleFlow 2.5s infinite 0.3s;
}

.p3 {
  width: 10px;
  height: 11px;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  animation: particleFlow 2.5s infinite 0.6s;
}

.p4 {
  width: 8px;
  height: 9px;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  animation: particleFlow 2.5s infinite 0.9s;
}

/* Unique 3D Flip Animation */
@keyframes hexFlip {
  0%, 100% {
    transform: rotateX(0) rotateY(0) rotateZ(0) scale(1);
    filter: brightness(1) drop-shadow(0 0 5px rgba(255,255,255,0.3));
  }
  25% {
    transform: rotateX(180deg) rotateY(0) rotateZ(0) scale(0.9);
    filter: brightness(0.8) drop-shadow(0 0 10px rgba(255,255,255,0.5));
  }
  50% {
    transform: rotateX(180deg) rotateY(180deg) rotateZ(0) scale(0.8);
    filter: brightness(0.6) drop-shadow(0 0 15px rgba(255,255,255,0.7));
  }
  75% {
    transform: rotateX(0) rotateY(180deg) rotateZ(0) scale(0.9);
    filter: brightness(0.8) drop-shadow(0 0 10px rgba(255,255,255,0.5));
  }
}

/* Particle Flow Animation */
@keyframes particleFlow {
  0% {
    opacity: 0;
    transform: translate(-50%, -50%) scale(0.5);
  }
  10% {
    opacity: 0.8;
  }
  50% {
    transform: translate(-150%, -150%) scale(1.2);
    opacity: 0;
  }
  100% {
    transform: translate(-200%, -200%) scale(0);
    opacity: 0;
  }
}

/* Responsive Design */
@media (max-width: 768px) {
  .hex-loader {
    width: 70px;
    height: 80px;
  }
  
  .hexagon-main {
    width: 70px;
    height: 80px;
  }
  
  .p1 { width: 14px; height: 16px; }
  .p2 { width: 10px; height: 12px; }
  .p3 { width: 7px; height: 8px; }
  .p4 { width: 5px; height: 6px; }
}

@media (max-width: 480px) {
  .hex-loader {
    width: 50px;
    height: 58px;
  }
  
  .hexagon-main {
    width: 50px;
    height: 58px;
  }
  
  .p1 { width: 10px; height: 12px; }
  .p2 { width: 7px; height: 8px; }
  .p3 { width: 5px; height: 6px; }
  .p4 { width: 4px; height: 5px; }
}
</style>

<script>
window.addEventListener('load', function() {
  setTimeout(function() {
    const loader = document.getElementById('hex-loader');
    loader.style.transition = 'opacity 0.8s ease-out';
    loader.style.opacity = '0';
    setTimeout(() => loader.style.display = 'none', 800);
  }, 2000);
});
</script>