<!-- Bootstrap JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/aos.js"></script>
<script>// Initialize AOS
AOS.init({
  duration: 1000, // Animation duration in ms
  once: true,     // Animation happens only once
});
</script>
<script >
    // Toggle dark mode
const toggleDarkMode = () => {
  document.body.classList.toggle('dark-mode');
};

// Example dark mode toggle button
document.getElementById('darkModeToggle').addEventListener('click', toggleDarkMode);

</script>
</body>
</html>
