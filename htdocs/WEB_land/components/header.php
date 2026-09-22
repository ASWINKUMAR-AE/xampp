<header
  id="header"
  class="header d-flex align-items-center fixed-top text-white shadow-sm"
  style="visibility: hidden;"
  data-aos="fade-down"
  data-aos-duration="800"
>
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
    <!-- Logo -->
    <a href="index.php" class="logo d-flex align-items-center text-decoration-none">
      <h1 class="sitename m-0 text-primary">WEB</h1>
    </a>

    <!-- Navigation Menu -->
    <div class="dynamic-island" onclick="toggleDynamicIsland()">
      <div class="nav-container">
        <div class="nav-icon p-2" style="border-radius:50%;">
          <i class="bi bi-list fs-4"></i> <!-- Example menu icon -->
        </div>
        <div class="nav-items p-2">
          <a href="#hero">Home</a>
          <a href="#about">About</a>
          <a href="#batch">Batch</a>
          <a href="#contact">Contact</a>
        </div>
      </div>
    </div>

    <!-- Mobile Navigation Toggle -->
    <button
      id="mobile-nav-toggle"
      class="mobile-nav-toggle d-xl-none border-0 bg-transparent text-white"
      onclick="toggleNav()"
   hidden >
      <i id="menu-icon" class="bi bi-list fs-3"></i>
      <i id="close-icon" class="bi bi-x fs-3 d-none"></i>
    </button>
  </div>
</header>

<style>
  /* Header Styles */
  #header {
    background: rgba(33, 32, 32, 0.51);
    border-radius: 16px;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(7.3px);
    -webkit-backdrop-filter: blur(7.3px);
    border: 1px solid rgba(33, 32, 32, 0.3);
  }

  .dynamic-island {
    position: relative;
    width: 50px;
    height: 50px;
    background-color:rgba(37, 35, 35, 0.67);
    border-radius: 25px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
    overflow: hidden;
  }

  .dynamic-island.expanded {
    width: 300px;
  }

  .nav-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 90%;
  }

  .nav-icon {
    color: #fcd34d;
    font-size: 1.5rem;
  }

  .nav-items {
    display: flex;
    gap: 1rem;
    opacity: 0;
    pointer-events: none;
    transition: all 0.3s ease-in-out;
  }

  .dynamic-island.expanded .nav-items {
    opacity: 1;
    pointer-events: auto;
  }

  .nav-items a {
    color: white;
    text-decoration: none;
    font-size: 0.9rem;
    transition: color 0.2s ease;
  }

  .nav-items a:hover {
    color: #fcd34d;
  }

  /* Responsive for Mobile Screens */
@media (max-width: 768px) {
  .nav-items a {
    display: none; /* Hide all items by default */
  }

  .nav-items a[href="#batch"] {
    display: inline; /* Only display the Batch item */
  }

  .dynamic-island {
    width: 100px;
    height: 40px;
    border-radius: 20px;
    display: flex !important;
  }

  .dynamic-island.expanded {
    width: 90%;
    height: auto;
    flex-direction: column;
    align-items: center;
  }

  .nav-items {
    flex-direction: column;
    gap: 0.5rem;
  }
}

</style>

<script>
  function toggleNav() {
    const mobileNav = document.getElementById("mobile-nav");
    const menuIcon = document.getElementById("menu-icon");
    const closeIcon = document.getElementById("close-icon");

    mobileNav.classList.toggle("d-none");
    menuIcon.classList.toggle("d-none");
    closeIcon.classList.toggle("d-none");
  }

  function toggleDynamicIsland() {
    const dynamicIsland = document.querySelector(".dynamic-island");
    dynamicIsland.classList.toggle("expanded");
  }
</script>
