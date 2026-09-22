<?php include "DataAccess/Components/header.php"; ?>
   
   <!-- Contact Section -->
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div><!-- End Section Title -->
  
        <div class="container" data-aos="fade-up" data-aos-delay="100">
  
          <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3930.3032873972184!2d78.10959979999997!3d9.908678700000007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b00c57e090553ed%3A0xe3613e7505015ddd!2sTamilnadu%20Government%20Polytechnic%20College%2C%20Madurai.!5e0!3m2!1sen!2sin!4v1733644197137!5m2!1sen!2sin" width="100%" height="270px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div><!-- End Google Maps -->
  
          <div class="row gy-4">
  
            <div class="col-lg-4">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Address</h3>
                  <p>Fab Lab,</p>
                  <p>Tamil Nadu Polytechnic College,</p>
                  <p>Madurai, TN 625011</p>
                </div>
              </div><!-- End Info Item -->
  
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Call Us</h3>
                  <p>+1 5589 55488 55</p>
                </div>
              </div><!-- End Info Item -->
  
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email Us</h3>
                  <p>info@example.com</p>
                </div>
              </div><!-- End Info Item -->
  
            </div>
  
            <div class="col-lg-8">
              <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                <div class="row gy-4">
  
                  <div class="col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                  </div>
  
                  <div class="col-md-6 ">
                    <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                  </div>
  
                  <div class="col-md-12">
                    <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                  </div>
  
                  <div class="col-md-12">
                    <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                  </div>
  
                  <div class="col-md-12 text-center">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
  
                    <button type="submit">Send Message</button>
                  </div>
  
                </div>
              </form>
            </div><!-- End Contact Form -->
  
          </div>
  
        </div>
  
      </section><!-- /Contact Section -->

      <?php include "DataAccess/Components/footer.php"; ?>