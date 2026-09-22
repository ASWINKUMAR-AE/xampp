<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Videograph Template">
    <meta name="keywords" content="Videograph, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sunshiv Elect</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>

        <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">

<!-- Include Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Include FontAwesome for icons -->
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">


</head>
<body>

<div id="preloder">
    <div class="loader">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>
</div>
<center>
    <!-- Header Section Begin -->
    <header class="header container-fluid" style="margin-bottom: 10px !important; border:none;">
        <div class="container header-container" 
             data-aos="fade-down" 
             data-aos-duration="1000" 
             style="background: rgba(23, 23, 23, 0.723); border: none; border-radius: 50px; margin: 10px;">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="./index.php" data-aos="flip-left" data-aos-duration="1200">
                        <img src="img/logo.png" alt="Logo" class="img-fluid logo-sun">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto" data-aos="fade-in" data-aos-duration="800">
                            <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>">
                                <a style="<?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'color: #007bff;' : ''; ?>" class="nav-link" aria-current="page" href="./index.php"><i class="fa fa-home me-2"></i>Home</a>
                            </li>
                            <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'about.php') ? 'active' : ''; ?>">
                                <a style="<?php echo (basename($_SERVER['PHP_SELF']) == 'about.php') ? 'color: #007bff;' : ''; ?>" class="nav-link" href="./about.php"><i class="fa fa-user me-2"></i>About</a>
                            </li>
                            <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'pcb.php') ? 'active' : ''; ?>">
                                <a style="<?php echo (basename($_SERVER['PHP_SELF']) == 'pcb.php') ? 'color: #007bff;' : ''; ?>" class="nav-link" href="./pcb.php"><i class="fa fa-microchip me-2"></i>PCB</a>
                            </li>
                            <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'trainning.php') ? 'active' : ''; ?>">
                                <a style="<?php echo (basename($_SERVER['PHP_SELF']) == 'trainning.php') ? 'color: #007bff;' : ''; ?>" class="nav-link" href="./trainning.php"><i class="fa fa-graduation-cap me-2"></i>Trainning</a>
                            </li>
                             <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'product.php') ? 'active' : ''; ?>">
                                <a style="<?php echo (basename($_SERVER['PHP_SELF']) == 'product.php') ? 'color: #007bff;' : ''; ?>" class="nav-link" href="./product.php"><i class="fa fa-box me-2"></i>Products</a>
                            </li>
                            <!-- <li class="nav-item dropdown" data-aos="fade-up" data-aos-duration="1800">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Pages
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="./about.php">About</a></li>
                                    <li><a class="dropdown-item" href="./portfolio.php">Portfolio</a></li>
                                    <li><a class="dropdown-item" href="./blog.php">Blog</a></li>
                                    <li><a class="dropdown-item" href="./blog-details.php">Blog Details</a></li>
                                </ul>
                            </li> -->
                            <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'contact.php') ? 'active' : ''; ?>">
                                <a style="<?php echo (basename($_SERVER['PHP_SELF']) == 'contact.php') ? 'color: #007bff;' : ''; ?>" class="nav-link" href="./contact.php"><i class="fa fa-phone me-2"></i>Contact</a>
                            </li>
                        </ul>
                        <!-- <div class="d-none d-md-flex align-items-center ms-auto" data-aos="zoom-in" data-aos-duration="1500">
                            <a href="#" class="me-2 text-light"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="me-2 text-light"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="me-2 text-light"><i class="fa fa-dribbble"></i></a>
                            <a href="#" class="me-2 text-light"><i class="fa fa-instagram"></i></a>
                            <a href="http://www.youtube.com/@sunshiv-industrialengineer6307" class="text-light"><i class="fa fa-youtube-play"></i></a>
                        </div> -->
                    </div>
                </div>
            </nav>
        </div>
    </header>
</center>

<style>
/* Optional styles to refine the look */
.navbar-nav .nav-item {
    margin: 0 10px; /* Add spacing between menu items */
}
.me-2{
    margin: 8px;
}
.d-md-flex a {
    font-size: 18px; /* Adjust icon size for consistency */
}

.logo-sun {
    width: 100%; /* Default width */
    max-width: 150px; /* Restrict maximum width */
    height: auto; /* Maintain aspect ratio */
}

/* Adjust logo size for smaller screens */
@media (max-width: 768px) {
    .logo-sun {
        max-width: 120px; /* Smaller logo for tablets */
    }
}

@media (max-width: 576px) {
    .logo-sun {
        max-width: 100px; /* Even smaller logo for mobile devices */
    }
}
</style>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Include AOS JS -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    // Get the current path, removing any trailing slash
    const currentPath = window.location.pathname.replace(/\/$/, "");
    // console.log("Current Path:", currentPath); // Debugging: Log the current path

    // Get all nav-link elements
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');

    navLinks.forEach(link => {
        let linkPath = link.getAttribute('href');

        // Normalize paths starting with './'
        if (linkPath.startsWith('./')) {
            linkPath = linkPath.replace('./', '/');
        }

        // If the link is relative and does not start with the base path, add the base path
        if (!linkPath.startsWith('/sunshiv')) {
            linkPath = '/sunshiv' + linkPath;
        }

        // Normalize the link path by removing any trailing slash
        linkPath = linkPath.replace(/\/$/, "");

        // console.log("Checking Link Path:", linkPath); // Debugging: Log the normalized link path

        // Compare the link path with the current path
        if (linkPath === currentPath) {
            // console.log("Match Found! Adding active class to:", linkPath); // Debugging: Log when a match is found
            link.classList.add('active');
        }
    });
});

</script>
