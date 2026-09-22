<div class="dynamic-island mt-2 mb-2">
  <div class="nav-container">
    <a href="#">
      <img src="assets/img/logo1.png" class="logo-icon" style="width:30px;height:30px;margin-right:10px;" alt="WebSphere Logo">
    </a>
    <span class="zethub-text" style="margin-left:10px;">ZETHUB</span>
    <div class="nav-icon bg-white p-2" hidden style="border-radius:50%;">
      <!-- Optional icon here -->
    </div>
    <div class="nav-items p-2">
      <a href="index.php">Home</a>
      <a href="about.php">About</a>
      <a href="blog.php">Blog</a>
      <a href="contact.php">Contact</a>
    </div>
  </div>
</div>
<script
  src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs"
  type="module"
></script>

<style>
  .dynamic-island {
  position: relative;
  width: 150px;
  height: 50px;
  background-color: #252323;
  border-radius: 25px;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  transition: all 0.3s ease;
  overflow: hidden;
}

.dynamic-island:hover {
  width: 300px;
}

.dynamic-island:hover .logo-icon {
  transform: rotate(180deg); /* Rotate the logo */
}

.dynamic-island:hover .zethub-text {
  display: none; /* Completely remove the text and its space */
}

.zethub-text {
  color: white;
  font-size: 0.9rem;
  margin-right: 10px;
  transition: all 0.3s ease;
}

.nav-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 90%;
}

.logo-icon {
  display: block;
  transition: transform 0.3s ease; /* Smooth rotation */
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
  transition: all 0.3s ease;
}

.dynamic-island:hover .nav-items {
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
  color: rgb(148, 148, 145);
}

/* Mobile screens: Hide Zethub text and ensure nav items are always visible */
@media (max-width: 768px) {
  .nav-items {
    display: flex;
    opacity: 1;
    pointer-events: auto;
  }

  .logo-icon {
    width: 20px !important;
    height: 20px !important;
  }

  .dynamic-island {
    width: 100%;
  }

  .dynamic-island.expanded .nav-items {
    display: flex;
  }

  .zethub-text {
    display: none;
  }
}

</style>
