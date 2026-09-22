<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Dark Mode Design</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <!-- Custom Styles -->
    <style>
        body {
            background-color: #141414;
            color: #f4f4f4;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }
        h2, h5 {
            font-weight: bold;
            color: #ff5722;
        }
        .card {
            background-color: #1f1f1f;
            border: none !important;
            border-radius: 50px !important;
            overflow: hidden;

            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .caard-body{
            background:gray !important;
        }
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.5);
        }
        .btn-primary {
            background-color: #ff5722;
            border-color: #ff5722;
            color: #fff;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #e64a19;
        }
        .list-unstyled li {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
        }
        .list-unstyled li i {
            margin-right: 10px;
            color: #ff5722;
        }
        .rounded-img {
            border-radius: 50%;
            max-width: 100%;
            height: auto;
            border: 4px solid #ff5722;
        }
        footer {
            background-color: #101010;
            padding: 20px 0;
            text-align: center;
        }
        footer p {
            margin: 0;
            color: #757575;
        }
        .progress-circle {
            position: relative;
            width: 100px;
            height: 100px;
        }
        .progress-circle svg {
            transform: rotate(-90deg);
        }
        .progress-circle circle {
            fill: none;
            stroke-width: 8;
        }
        .progress-circle .background {
            stroke: #2b2b2b;
        }
        .progress-circle .progress {
            stroke: #ff5722;
            stroke-dasharray: 314;
            stroke-dashoffset: calc(314 - (314 * var(--value)) / 100);
            transition: stroke-dashoffset 0.5s;
        }
        .progress-circle span {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 16px;
            color: #fff;
        }
    </style>
</head>
<body>

<!-- Unique Section -->
<section class="py-5" id="cases">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6 col-lg-4" data-aos="fade-up">
                <div class="card">
                    <img src="assets/img/boy.png" class="card-img-top" alt="Case Image">
                    <div class="card-body" style="background-color: #1d1c1c; color:wheat; padding: 20px;">
                        <h5 class="card-title">Innovative Technology</h5>
                        <p class="card-text">We harness cutting-edge technologies to deliver innovative solutions that drive success.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card">
                <img src="assets/img/boy.png" class="card-img-top" alt="Case Image">                    <div class="card-body" style="background-color: #1d1c1c; color:wheat;">
                        <h5 class="card-title">Strategic Expertise</h5>
                        <p class="card-text">We create strategic frameworks tailored to your business goals.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card">
                <img src="assets/img/boy.png" class="card-img-top" alt="Case Image">                    <div class="card-body" style="background-color: #1d1c1c; color:wheat;">
                        <h5 class="card-title">Scalable Growth</h5>
                        <p class="card-text">Our solutions ensure consistent and scalable growth for your organization.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Progress Section -->
<section class="py-5 m-5 container " id="skills" style="background-color: #1d1c1c;  border-radius:50px; margin-left: -10px !important;">
    <div class="container">
        <h2 class="text-center mb-5 text-white" data-aos="fade-up" >Our Skills</h2>
        <div class="d-flex justify-content-center gap-4" data-aos="zoom-in">
            <div class="progress-circle" style="--value: 85;">
                <svg width="100" height="100">
                    <circle class="background" cx="50" cy="50" r="50"></circle>
                    <circle class="progress" cx="50" cy="50" r="50"></circle>
                </svg>
                <span>85%</span>
            </div>
            <div class="progress-circle" style="--value: 70;">
                <svg width="100" height="100">
                    <circle class="background" cx="50" cy="50" r="50"></circle>
                    <circle class="progress" cx="50" cy="50" r="50"></circle>
                </svg>
                <span>70%</span>
            </div>
            <div class="progress-circle" style="--value: 90;">
                <svg width="100" height="100">
                    <circle class="background" cx="50" cy="50" r="50"></circle>
                    <circle class="progress" cx="50" cy="50" r="50"></circle>
                </svg>
                <span>90%</span>
            </div>
        </div>
    </div>
</section>

<!-- Recent Projects -->
<section class="py-5" id="projects">
    <div class="container">
        <h2 class="text-center text-white mb-5" data-aos="fade-up">Recent Projects</h2>
        <div class="row g-4">
            <div class="col-md-4" data-aos="zoom-in">
                <img src="assets/img/gc.png" class="img-fluid rounded" alt="Project 1">
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                <img src="assets/img/gc.png" class="img-fluid rounded" alt="Project 2">
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                <img src="assets/img/gc.png" class="img-fluid rounded" alt="Project 3">
            </div>
        </div>
    </div>
</section>



<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init({
        duration: 1200,
    });
</script>
</body>
</html>
