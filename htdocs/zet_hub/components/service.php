<section class="py-5 con col-12" style="background:rgba(128, 128, 128, 0.159);  ">
  <div class="container" style="padding-bottom:20px;">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Our Services</h2>
      <p class="text-secondary">Explore how we can bring your ideas to life with cutting-edge web solutions and creative designs.</p>
    </div>
    <div class="row d-flex justify-content-center align-items-stretch g-4">

      <!-- Card 1: Web Development -->
      <div class="col-12 col-sm-6 col-lg-4 d-flex" data-aos="fade-up" data-aos-duration="1000">
        <div class="card border-0 border-bottom shadow-sm h-100 w-100 card-hover">
          <div class="card-body text-center p-4 p-xxl-5">
            <img class="service-icon" src="https://img.icons8.com/carbon-copy/100/FFFFFF/domain.png" alt="domain" />
            <h4 class="mb-4 text-white">Web Development</h4>
            <p class="mb-4 text-secondary">Get customized websites built with the latest technologies, optimized for performance and user experience.</p>
            <a href="#" class="fw-bold text-decoration-none text-white">
              Learn More
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
              </svg>
            </a>
          </div>
        </div>
      </div>

      <!-- Card 2: Post Design -->
      <div class="col-12 col-sm-6 col-lg-4 d-flex" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
        <div class="card border-0 border-bottom shadow-sm h-100 w-100 card-hover">
          <div class="card-body text-center p-4 p-xxl-5">
            <img class="service-icon" src="https://img.icons8.com/ios-glyphs/30/FFFFFF/missed-penalty.png" alt="missed-penalty" />
            <h4 class="mb-4 text-white">Post Design</h4>
            <p class="mb-4 text-secondary">Create eye-catching social media posts and digital content to elevate your brand's online presence.</p>
            <a href="#" class="fw-bold text-decoration-none text-white">
              Learn More
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
              </svg>
            </a>
          </div>
        </div>
      </div>

      <!-- Card 3: Logo & Banner Creation -->
      <div class="col-12 col-sm-6 col-lg-4 d-flex" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
        <div class="card border-0 border-bottom shadow-sm h-100 w-100 card-hover">
          <div class="card-body text-center p-4 p-xxl-5">
            <img class="service-icon" src="https://img.icons8.com/fluency-systems-regular/50/FFFFFF/ad-banner.png" alt="ad-banner" />
            <h4 class="mb-4 text-white">Logo & Banner Creation</h4>
            <p class="mb-4 text-secondary">Design professional logos and banners that visually represent your brand identity and values.</p>
            <a href="#" class="fw-bold text-decoration-none text-white">
              Learn More
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
              </svg>
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<script>
  AOS.init({
    once: true, // Animations will only play once.
    offset: 120, // Adjust offset for triggering animations.
    duration: 1000, // Animation duration in ms.
  });
</script>

<style>
  .card {
    border-radius: 50px !important;
    /* From https://css.glass */
background: rgba(19, 18, 18, 0.5) !important;

box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(13.1px);
-webkit-backdrop-filter: blur(13.1px);
border: 1px solid rgba(19, 18, 18, 0.24);
    transition: transform 0.3s, box-shadow 0.3s;
  }

  .card-hover {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  cursor: pointer;
}

.card-hover:hover {
  transform: translateY(-10px);
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.service-icon {
  height: 60px;
  width: 60px;
  margin-bottom: 1rem;
}


  .service-icon {
    width: 80px;
    height: 80px;
    margin-bottom: 15px;
  }
  .con{
    padding-bottom:120px !important;
  }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanta/0.5.24/vanta.fog.min.js"></script>
<script>
  VANTA.FOG({
    el: ".con",
    mouseControls: true,
    touchControls: true,
    gyroControls: false,
    minHeight: 200.00,
    minWidth: 200.00,
    highlightColor: 0xf7f4ec,
    midtoneColor: 0x544f4f,
    lowlightColor: 0x101010,
    baseColor: 0x403a3a,
    blurFactor: 0.80,
    speed: 1.80,
    zoom: 1.50
  });
</script>
