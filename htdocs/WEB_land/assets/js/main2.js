
// JavaScript to make the bee display a welcome message
document.addEventListener('DOMContentLoaded', function () {
    const beeModel = document.getElementById('bee-model');
    const speechBubble = document.getElementById('speech-bubble');

    // Show the speech bubble after a delay
    setTimeout(() => {
      speechBubble.style.display = 'block'; // Make the bubble visible
      speechBubble.classList.remove('hide'); // Remove hide class
      speechBubble.classList.add('show'); // Add show class
    }, 2000);

    // Optional: Hide the speech bubble after a few seconds
    setTimeout(() => {
      speechBubble.classList.remove('show'); // Remove show class
      speechBubble.classList.add('hide'); // Add hide class
    }, 7000);
  });

  VANTA.WAVES({
    el: "#student-banner",
    mouseControls: true,
  touchControls: true,
  gyroControls: false,
  minHeight: 200.00,
  minWidth: 200.00,
  scale: 1.00,
  scaleMobile: 1.00,
  color: 0x202629,
  shininess: 150.00,
  waveSpeed: 2.00,
  zoom: 0.75
  });


  document.addEventListener('DOMContentLoaded', function () {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Popover(tooltipTriggerEl);
    });
  });
