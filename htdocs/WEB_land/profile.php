<?php
  session_start();

  // Retrieve session variables
  $student_name = isset($_POST['student_name']) ? $_POST['student_name'] : 'Unknown';
  $reg_number = isset($_POST['reg_number']) ? $_POST['reg_number'] : 'Unknown';
  $project_name = isset($_POST['project_name']) ? $_POST['project_name'] : 'Unknown';
  $live_link = isset($_POST['live_link']) ? $_POST['live_link'] : '#';
  $description = isset($_POST['description']) ? $_POST['description'] : 'No description available';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <style>
        body {
            background:rgb(0, 128, 255);      overflow: hidden;

        }

        .product-container {
            background: rgba(255, 255, 255, 0.53);
            border-radius: 56px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .product-image {
            transition: transform 0.3s ease;
        }

        .product-image:hover {
            transform: scale(1.05);
        }

        .small-image {
            transition: transform 0.3s ease;
        }

        .small-image:hover {
            transform: scale(1.1);
        }

        .buy-button {
            transition: background-color 0.3s ease;
        }

        .buy-button:hover {
            background-color: #4e41c7;
        }
    </style>
    
</head>
<body>
    <div class="container-fluid py-5 mt-5 product-container" data-aos="fade-down" data-aos-duration="1500">
        <div class="row g-5 container-fluid">
            <!-- Main Product Image (Iframe) -->
            <div class="col-12 col-md-6 text-center" data-aos="flip-left" data-aos-duration="2000">
                <!-- Responsive Iframe Container -->
                <div class="ratio ratio-16x9 w-100">
                    <iframe 
                        src="<?php echo $live_link; ?>" 
                        title="Live Link" 
                        class="w-100"
                        style="border: none; border-radius: 28px; box-shadow: 10px 10px 90px rgba(0, 0, 0, 0.77); height: 100%;">
                    </iframe>
                </div>
            </div>

            <!-- Product Details -->
            <div class="col-12 col-md-6" data-aos="flip-right" data-aos-duration="2200">
                <div class="product-details">
                    <h1 class="mb-3 fw-bold text-dark"><?php echo $student_name; ?>(DWD)</h1>
                    <p class="text-secondary"><strong>Reg Number:</strong> <?php echo $reg_number; ?></p>
                    <p class="card-text"><strong>Project:</strong> <?php echo $project_name; ?></p>
                    <p class="card-text"><strong>Live Link:</strong> <a href="<?php echo $live_link; ?>" target="_blank"><?php echo $live_link; ?></a></p>
                    <p class="card-text"><strong>Description:</strong> <?php echo $description; ?></p>

                    <!-- Small Images Section -->
                    <div class="d-flex align-items-center mt-4" data-aos="slide-up" data-aos-duration="1500">
                        <img src="https://via.placeholder.com/80" alt="Mouse angle 1" class="small-image rounded-3 me-3">
                        <img src="https://via.placeholder.com/80" alt="Mouse angle 2" class="small-image rounded-3 me-3">
                        <img src="https://via.placeholder.com/80" alt="Mouse angle 3" class="small-image rounded-3">
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Details -->
        <div class="row mt-5" data-aos="zoom-out" data-aos-duration="2000">
            <div class="col">
                <h4 class="text-dark">Product Features</h4>
                <ul class="list-unstyled text-secondary">
                    <li class="mb-2">Ergonomic design for comfortable grip</li>
                    <li class="mb-2">Plug-and-play functionality</li>
                    <li class="mb-2">High-precision tracking sensor</li>
                    <li>Durable build with smooth buttons</li>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
