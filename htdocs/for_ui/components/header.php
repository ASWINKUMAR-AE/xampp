

  <div class="header bg-dark text-light ">
    <h4>Welcome, Admin</h4>
    <div>
      <button id="theme-toggle" class="btn btn-light"> <input type="checkbox" id="theme-toggle" class="l" /></button>

    </div>
  </div>

  <!-- Your sidebar and main content goes here -->

  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    // Initialize AOS
    AOS.init();

    // Theme mode toggle functionality
    const themeToggleButton = document.getElementById('theme-toggle');
    themeToggleButton.addEventListener('change', () => {
      document.body.classList.toggle('dark-mode');
    });

  </script>
</body>
</html>
