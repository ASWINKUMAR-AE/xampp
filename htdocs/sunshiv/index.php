
<?php include 'component/header.php' ?>
 <style>
    /* Hide scrollbar for all browsers */
body {
    overflow: -moz-scrollbars-none;
    -ms-overflow-style: none;
    scrollbar-width: none; /* Firefox */
}

body::-webkit-scrollbar {
    display: none; /* Chrome, Safari, Opera */
}
            @media only screen and (max-width: 600px) {
                h1.display-1 {
                    font-size: 40px !important;
                }
            }
        </style>
       
<!-- 
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__item set-bg" data-setbg="img/hero/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <span>PCB Desiging</span>
                                <h2>Sunshic Electronics Portfolio</h2>
                                <a href="#" class="primary-btn">See more about us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__item set-bg" data-setbg="img/hero/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                            <span>PCB Desiging</span>
                            <h2>Sunshic Electronics Portfolio</h2>
                                <a href="#" class="primary-btn">See more about us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__item set-bg" data-setbg="img/hero/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <span>PCB Desiging</span>
                                <h2>Sunshic Electronics Portfolio</h2>
                                <a href="#" class="primary-btn">See more about us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Hero Section End -->
    <section 
    class="position-relative d-flex align-items-center justify-content-center" 
    style="height: 90vh; background: linear-gradient(to right,rgba(105, 3, 128, 0.88), #000);" 
    data-aos="fade-in" 
    data-aos-duration="1500"
>
    <!-- Background Image -->
    <div 
        class="position-absolute w-100 h-100" 
        style="top: 0; left: 0;" 
    
    >
        <img 
            src="img/hero/hero-1.jpg" 
            alt="Art Background" 
            class="w-100 h-100 object-fit-cover" 
            style="opacity: 0.2;"
        >
    </div>

    <!-- Content -->
    <div 
        class="position-relative text-center text-white px-4" style="width:90% !important; overflow:hidden;"
        data-aos="fade-up" 
        data-aos-duration="1200" 
        data-aos-delay="1000" 
        data-aos-easing="ease-in-out"
    >
        <h1 
            class="display-1 fw-bold mb-4 text-center" 
            style="color:white !important;"
            data-aos="slide-right" 
            data-aos-duration="1500" 
            data-aos-delay="1200"
        >
            <span class="d-block d-md-inline-block">Sunshiv</span> 
            <span style="color:#6b46c1 !important; background:white; text-align:center; padding:5px;" class="d-block d-md-inline-block">Electronics</span> 
            <span style="color:#6b46c1 !important;" class="d-block d-md-inline-block">Solutions</span> 
        </h1>

       
        <p 
            class="lead fs-5 mb-4" 
            data-aos="flip-left" 
            data-aos-duration="1400" 
            data-aos-delay="1500"
        >
            Connect with talented artists and bring your vision to life
        </p>
        
        <!-- Buttons -->
        <div 
            class="d-flex justify-content-center gap-3" 
            data-aos="fade-up" 
            data-aos-duration="1500" 
            data-aos-delay="2000"
        >
           
            <button type="button" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-primary " style="border-radius:50px;">Explore More <br> &#x2193;
</button>
                    </div>
    </div>
</section>
    <!-- Services Section Begin -->
    <section class="services spad py-5">
    <div class="container">
        <div class="row">
            <!-- Welcome Section -->
            <div class="col-lg-4" data-aos="fade-right" data-aos-duration="1000">
                <div class="services__title">
                    <div class="section-title">
                        <span>Welcome to</span>
                        <h2>SUNSHIV ELECTRONIC SOLUTIONS</h2>
                    </div>
                    <p style="text-align: justify;">
                       <span class="text-info"> SUNSHIV ELECTRONIC SOLUTIONS</span> was established in the year of 1994, to cater industrial needs in 
                        Electronics automation and PCB Designing and Manufacturing. Our commitment to quality leads us 
                        to set a remarkable market share in the field. We strive the drive of the commitment continuously 
                        to ensure compact design and defect-free products in service.
                    </p>
                    <a href="#" class="btn btn-primary btn-lg rounded-pill shadow-sm mt-3">Read More</a>
                </div>
            </div>

            <!-- Popular Services Section -->
            <div class="col-lg-8">
                <div class="section-title text-center mb-4">
                    <span>Popular Services</span>
                </div>
                <div class="row">
                    <!-- One Day Hands-on Training -->
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1000">
                        <div class="services__item text-center p-4 shadow-sm border-0">
                            <div class="services__item__icon mb-3">
                                <img src="img/icons/cb2.png" alt="Training Icon" class="img-fluid" style="height: 50px;">
                            </div>
                            <h5 class="fw-bold text-primary">One Day Hands-on Training</h5>
                            <p>
                                Electrical & Electronics, PCB Designing & Manufacturing workshop One Day 'Hands-on-Training'.
                            </p>
                        </div>
                    </div>

                    <!-- PCB Designing -->
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1200">
                        <div class="services__item text-center p-4 shadow-sm border-0">
                            <div class="services__item__icon mb-3">
                                <img src="img/icons/cb3.png" alt="PCB Icon" class="img-fluid" style="height: 50px;">
                            </div>
                            <h5 class="fw-bold text-success">PCB Designing</h5>
                            <p>
                                We have our own integrated setup for PCB Designing, Manufacturing, assembling, and Troubleshooting.
                            </p>
                        </div>
                    </div>

                    <!-- Electronic Instruments -->
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1400">
                        <div class="services__item text-center p-4 shadow-sm border-0">
                            <div class="services__item__icon mb-3">
                                <img src="img/icons/cb4.png" alt="Instruments Icon" class="img-fluid" style="height: 50px;">
                            </div>
                            <h5 class="fw-bold text-info">Electronic Instruments</h5>
                            <p>
                                Understanding, handling, and interpreting the instruments is a vital function to ensure quality.
                            </p>
                        </div>
                    </div>

                    <!-- Jewellery Designing -->
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1600">
                        <div class="services__item text-center p-4 shadow-sm border-0">
                            <div class="services__item__icon mb-3">
                                <img src="img/icons/j.png" alt="Jewellery Icon" class="img-fluid" style="height: 50px;">
                            </div>
                            <h5 class="fw-bold text-warning">Jewellery Designing</h5>
                            <p>
                                There will be more chances of starting a Jewellery Design Consulting Firm after the completion of the course.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




    <!-- Services Section End -->

    <!-- Work Section Begin -->
    <!-- <section class="work">
        <div class="work__gallery">
            <div class="grid-sizer"></div>
            <div class="work__item wide__item set-bg" data-setbg="img/work/work-1.jpg">
                <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="play-btn video-popup"><i
                        class="fa fa-play"></i></a>
                <div class="work__item__hover">
                    <h4>VIP Auto Tires & Service</h4>
                    <ul>
                        <li>eCommerce</li>
                        <li>Magento</li>
                    </ul>
                </div>
            </div>
            <div class="work__item small__item set-bg" data-setbg="img/work/work-2.jpg">
                <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="play-btn video-popup"><i
                        class="fa fa-play"></i></a>
            </div>
            <div class="work__item small__item set-bg" data-setbg="img/work/work-3.jpg">
                <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="play-btn video-popup"><i
                        class="fa fa-play"></i></a>
            </div>
            <div class="work__item large__item set-bg" data-setbg="img/work/work-4.jpg">
                <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="play-btn video-popup"><i
                        class="fa fa-play"></i></a>
                <div class="work__item__hover">
                    <h4>VIP Auto Tires & Service</h4>
                    <ul>
                        <li>eCommerce</li>
                        <li>Magento</li>
                    </ul>
                </div>
            </div>
            <div class="work__item small__item set-bg" data-setbg="img/work/work-5.jpg">
                <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="play-btn video-popup"><i
                        class="fa fa-play"></i></a>
            </div>
            <div class="work__item small__item set-bg" data-setbg="img/work/work-6.jpg">
                <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="play-btn video-popup"><i
                        class="fa fa-play"></i></a>
            </div>
            <div class="work__item wide__item set-bg" data-setbg="img/work/work-7.jpg">
                <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="play-btn video-popup"><i
                        class="fa fa-play"></i></a>
                <div class="work__item__hover">
                    <h4>VIP Auto Tires & Service</h4>
                    <ul>
                        <li>eCommerce</li>
                        <li>Magento</li>
                    </ul>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Work Section End -->

    <!-- Counter Section Begin -->
     <?php include 'component/counter.php' ?>
<!-- Counter Section -->

    <!-- Counter Section End -->

    <!-- Team Section Begin -->
    <section class="team spad set-bg" data-setbg="img/team-bg4.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title team__title">
                    <span>Nice to meet</span>
                    <h2>OUR Team</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Team Member 1 -->
            <div class="col-lg-3 col-md-6 col-sm-6 p-0" data-aos="fade-up" data-aos-delay="100">
                <div class="team__item set-bg" data-setbg="img/team/mem1.jpg" style="border-radius:50px; margin:3px;">
                    <div class="team__item__text">
                        <h4>Rathish Kumar M</h4>
                        <p>Developer</p>
                        <div class="team__item__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Team Member 2 -->
            <div class="col-lg-3 col-md-6 col-sm-6 p-0" data-aos="fade-up" data-aos-delay="200">
                <div class="team__item team__item--second set-bg" data-setbg="img/team/mem2.gif" style="border-radius:50px; margin:3px;">
                    <div class="team__item__text">
                        <h4>Prithi @ Bharathi</h4>
                        <p>Hacker</p>
                        <div class="team__item__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Team Member 3 -->
            <div class="col-lg-3 col-md-6 col-sm-6 p-0" data-aos="fade-up" data-aos-delay="300">
                <div class="team__item team__item--third set-bg" data-setbg="img/team/mem3.gif"style="border-radius:50px; margin:3px;">
                    <div class="team__item__text">
                        <h4>Kunji Aswin Kunjii</h4>
                        <p>Developer</p>
                        <div class="team__item__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Team Member 4 -->
            <div class="col-lg-3 col-md-6 col-sm-6 p-0" data-aos="fade-up" data-aos-delay="400">
                <div class="team__item team__item--four set-bg" data-setbg="img/team/mem4.jpg" style="border-radius:50px; margin:3px;">
                    <div class="team__item__text">
                        <h4>Gajuu Gayathrii</h4>
                        <p>Electrical</p>
                        <div class="team__item__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 p-0 mt-5">
                <div class="team__btn" data-aos="fade-up" data-aos-delay="500">
                    <a href="#" class="primary-btn">Meet Our Team</a>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Team Section End -->

 <!-- Latest Blog Section Begin -->
<section class="latest spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title center-title">
                    <span>Our Services</span>
                    <h2>What We Offer</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="latest__slider owl-carousel">
                <div class="col-lg-4">
                    <div class="blog__item latest__item">
                        <h4>PCB Designing</h4>
                        <p>Learn the art and science of designing PCBs, catering to industrial standards with hands-on projects and practical insights.</p>
                        <a href="#">Read more <span class="arrow_right"></span></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog__item latest__item">
                        <h4>Practical Training on Electronic Instruments</h4>
                        <p>Get real-time experience with cutting-edge electronic instruments to prepare for industrial applications.</p>
                        <a href="#">Read more <span class="arrow_right"></span></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog__item latest__item">
                        <h4>Simulation of Electronic Circuits</h4>
                        <p>Master circuit simulation with advanced tools, bridging the gap between theory and real-world implementation.</p>
                        <a href="#">Read more <span class="arrow_right"></span></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog__item latest__item">
                        <h4>Embedded System Training (with Industrial Projects)</h4>
                        <p>Delve into embedded systems with hands-on training and industrial project exposure to advance your career.</p>
                        <a href="#">Read more <span class="arrow_right"></span></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog__item latest__item">
                        <h4>Drawing Power Tools for Mechanical, Civil, and Production Engineers</h4>
                        <p>Learn to design power tools with precision, enhancing productivity in Mechanical, Civil, and Production domains.</p>
                        <a href="#">Read more <span class="arrow_right"></span></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog__item latest__item">
                        <h4>Tool & Die Designing</h4>
                        <p>Specialized training in tool and die designing to meet industrial demands with innovative solutions.</p>
                        <a href="#">Read more <span class="arrow_right"></span></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog__item latest__item">
                        <h4>Pre-Pilot Campus Interview</h4>
                        <p>Prepare for campus interviews with mock sessions, ensuring you stand out in your career journey.</p>
                        <a href="#">Read more <span class="arrow_right"></span></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog__item latest__item">
                        <h4>Advanced Computer-Aided Jewellery Designing</h4>
                        <p>Explore the fascinating world of jewellery designing with advanced CAD tools and practical training.</p>
                        <a href="#">Read more <span class="arrow_right"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Latest Blog Section End -->

    <!-- Call To Action Section Begin -->
    <section class="callto spad set-bg" data-setbg="img/bg-ae2.jpg">
    <div class="overlay"></div> <!-- Add an overlay div here -->
    <div class="container2 container">
        <div class="row">
            <div class="col-lg-8">
                <div class="callto__text">
                    <h2>"Empowering Innovation, Engineering Excellence Since 1994."</h2>
                    <p>INC5000, Best places to work 2019</p>
                    <a href="#">Start your stories</a>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
.set-bg {
    position: relative;
    background-size: cover;
    background-position: center;
}

.set-bg .overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* Dark gradient */
    z-index: 1;
}

.container2 {
    position: relative;
    z-index: 2; /* Ensure content appears above the overlay */
}


</style>
    <!-- Call To Action Section End -->

<?php include 'component/footer.php' ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->

</body>

</html>