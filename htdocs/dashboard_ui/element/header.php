<header class="app-header fixed-top" data-aos="fade-down">
    <div class="app-header-inner sidebar__">
        <div class="container-fluid py-2">
            <div class="app-header-content p-1">
                <div class="row justify-content-between align-items-center col-12" style="border-radius:50px;">
                    <div class="col-auto">
                        <!-- Toggle Button for Small Screens -->
                        <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#" data-aos="fade-right">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img">
                                <title>Toggle Menu</title>
                                <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
                            </svg>
                        </a>
                    </div>

                    <div class="app-search-box col" style="border-radius:50px; background:none; color:white;" data-aos="fade-left">
                        BIKE SPEED METER..
                    </div>

                    <div class="app-utilities">
                        <div class="app-utilities col-auto">
                            <div class="app-utility-item app-notifications-dropdown dropdown"></div>
                            <div class="app-utility-item">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Side Panel -->
<div id="app-sidepanel" class="app-sidepanel bg-dark" data-aos="slide-left">
    <div id="sidepanel-drop" class="sidepanel-drop bg-dark"></div>
    <div class="sidepanel-inner d-flex flex-column">
        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none" data-aos="fade-up">&times;</a>
        <div class="app-branding" style="background:#031633 !important; color:white;" data-aos="zoom-in">
            <a class="app-logo" href="index.php">
                <img class="logo-icon me-2" src="assets/images/logo.png" alt="logo">
                <span class="logo-text text-white">AE</span>
            </a>
        </div>

        <!-- Side panel Menu -->
        <nav id="app-nav-main bg-dark" class="app-nav app-nav-main flex-grow-1" style="background:#031633c1 !important; color:white;" data-aos="fade-up">
            <ul class="app-menu list-unstyled accordion bg-dark" id="menu-accordion" style="background:#031633c1 !important; color:white;">
                <li class="nav-item" style="background:#031633c1 !important; color:white;">
                    <a class="nav-link active" href="index.php" style="background:#031633c1 !important; color:white;">
                        <span class="nav-icon" style="background:#031633c1 !important; color:white;">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"/>
                            </svg>
                        </span>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<script>
    AOS.init({
        duration: 1200,  // Animation duration
        once: true,      // Ensure the animation only runs once
        easing: 'ease-in-out', // Animation easing
    });

    // Toggle sidepanel visibility on click
    document.getElementById('sidepanel-toggler').addEventListener('click', function(e) {
        e.preventDefault(); // Prevent default anchor behavior
        document.getElementById('app-sidepanel').classList.toggle('active');
        document.getElementById('sidepanel-drop').classList.toggle('active');
    });

    // Optional: Close the side panel when clicking outside of it
    document.getElementById('sidepanel-drop').addEventListener('click', function() {
        document.getElementById('app-sidepanel').classList.remove('active');
        document.getElementById('sidepanel-drop').classList.remove('active');
    });

    // Close the side panel when clicking the close button
    document.getElementById('sidepanel-close').addEventListener('click', function() {
        document.getElementById('app-sidepanel').classList.remove('active');
        document.getElementById('sidepanel-drop').classList.remove('active');
    });

    // Show dynamic island after some scroll
window.addEventListener('scroll', function () {
  const dynamicIsland = document.querySelector('.dynamic-island');
  if (window.scrollY > 100) {
    dynamicIsland.classList.add('show-island');
  } else {
    dynamicIsland.classList.remove('show-island');
  }
});

</script>
<style>
.dynamic-island {
  position: fixed;
  top: 10px;
  left: 50%;
  transform: translateX(-50%);
  background: #031633;
  padding: 10px 20px;
  border-radius: 50px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
  z-index: 1000;
  color: white;
  display: none;
  animation: slide-in 0.5s ease-in-out forwards;
}

@keyframes slide-in {
  from {
    top: -50px;
  }
  to {
    top: 10px;
  }
}

.show-island {
  display: block;
}


</style>