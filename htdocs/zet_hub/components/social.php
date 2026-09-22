<div class="floating-island mt-2 mb-2 position-fixed top-50 end-0 translate-middle-y">
  <div class="icon-container text-center">
    <!-- Menu Icon shown before hover -->
    <a href="#" class="social-icon menu-icon d-block">
      <img src="assets/img/logo1.png" class="icon" alt="Menu Icon">
    </a>

    <!-- Social icons are hidden initially, revealed on hover -->
    <div class="social-media-links">
      <a href="#" class="social-icon d-block">
        <br>
        <img src="https://img.icons8.com/ios-filled/50/FFFFFF/facebook-new.png" class="icon1" alt="Facebook Logo">
      </a>
      <a href="#" class="social-icon d-block">
        <img src="https://img.icons8.com/ios/50/FFFFFF/twitterx--v2.png" class="icon1" alt="Twitter Logo">
      </a>
      <a href="#" class="social-icon d-block">
        <img src="https://img.icons8.com/ios-filled/50/FFFFFF/linkedin.png" class="icon1" alt="LinkedIn Logo">
      </a>
      <a href="#" class="social-icon d-block">
        <img src="https://img.icons8.com/ios-filled/50/FFFFFF/instagram-new--v1.png" class="icon1" alt="Instagram Logo">
      </a>
    </div>
  </div>
</div>

<style>
  .floating-island {
    width: 50px;
    height: 50px; /* Initially smaller height */
    background-color: #252323;
    border-radius: 25px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    transition: height 0.3s ease; /* Smooth transition for height */
    overflow: hidden;
    margin-right: 10px;
  }

  /* Hover to reveal the social icons */
  .floating-island:hover {
    height: 250px; /* Increase height on hover */
  }

  /* Show the social icons when the island is hovered */
  .floating-island:hover .social-media-links {
    display: block; /* Ensure the social icons are visible */
    opacity: 1;
    transition: opacity 0.3s ease;
  }

  /* Menu icon will be hidden after hover */
  .menu-icon {
    display: block;
  }

  .floating-island:hover .menu-icon {
    display: none; /* Hide menu icon after hover */
  }

  /* Initially, social media links are hidden */
  .social-media-links {
    display: none; /* Social icons are hidden initially */
  }

  .icon {
    width: 30px;
    height: 30px;
    transition: transform 0.3s ease;
  }

  /* Style for social media icons */
  .icon1 {
    width: 20px;
    height: 20px;
    margin-bottom: 10px; /* Add space between each icon */
  }

  /* Hover effect on the social media icons */
  .floating-island:hover .icon {
    transform: scale(1.2); /* Slightly increase size on hover */
  }

  /* Mobile screens: Display icons in a vertical arrangement and show them by default */
  @media (max-width: 768px) {
    .floating-island {
      width: 60px;
      height: 60px; 
      display:none;/* Smaller height on mobile before hover */
    }

    .icon {
      width: 25px;
      height: 25px;
    }

    /* Add margin-bottom for mobile view */
    .icon1 {
      margin-bottom: 5px;
    }

    /* Ensure social media icons are visible by default on mobile */
    .floating-island .social-media-links {
      display: block;
      opacity: 1;
      transition: opacity 0.3s ease;
    }

    /* Disable hover effect on mobile */
    .floating-island:hover {
      height: 60px; /* Keep the height the same on hover for mobile */
    }

    .floating-island:hover .social-media-links {
      display: block; /* Keep social icons visible on hover for mobile */
    }

    .floating-island:hover .menu-icon {
      display: block; /* Keep the menu icon visible on hover for mobile */
    }
  }
</style>
