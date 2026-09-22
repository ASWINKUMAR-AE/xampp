<?php
session_start();
include_once "../db/db.php";
include_once "../controllers/ArtController.php";

// Check if user is logged in
$isLoggedIn = isset($_SESSION['user_id']);
$role = $isLoggedIn ? $_SESSION['role'] : null;


// Fetch all approved artworks
$artController = new ArtController();
$approvedArt = $artController::getApprovedArt();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Ordering & Artist Platform</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> <!-- AOS CSS -->
    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
        }

        .bg-dark-custom {
            background-color: #1e1e1e;
        }

        .navbar-dark .navbar-nav .nav-link {
            color: #e0e0e0;
        }

        .jumbotron {
            background-color: #2e2e2e;
            color: #ffffff;
        }

        .card {
            background-color: #2a2a2a;
            border: 1px solid #444444;
        }

        .card-title, .card-text {
            color: #e0e0e0;
        }

        .footer {
            background-color: #1e1e1e;
        }

        .card:hover {
            background-color: #333333;
        }

        .slide_main {
            background: rgba(57, 56, 56, 0.4);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(7.2px);
            -webkit-backdrop-filter: blur(7.2px);
            border: 1px solid rgba(57, 56, 56, 0.3);
        }

        .carousel-item, h3 {
            color: white !important;
        }

        button {
            margin: 10px;
        }

        .hero-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 500px;
        }

        .art-logo {
            width: 100%;
            max-width: 400px;
        }
        .carousel-indicators > button{
            border-radius: 50%;
            width: 10px !important;
            height: 10px !important;
        }
       
        body {
    color: #000;
    overflow-x: hidden;
    height: 100%;
    background-color: #000;
    background-repeat: no-repeat;
}

.line {
    height: 1px;
    background-color: #EEEEEE;
    width: 100%;
    margin: 35px 0px;
}

.card {
    width: 650px;
    margin: auto;
}

.user-img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    cursor: pointer;
}

.fa-star.active {
    color: #E91E63;
}

.btn-pink {
    background-color: #E91E63;
    color: #fff;
    height: 70px;
    padding: 20px 30px;
    margin-top: 15px;
}

.btn-pink:hover {
    background-color: #D81B60;
}

.image-bg {
    width: 100px;
}

.fit-image {
    object-fit: cover;
    width: 100%;
}

.prod-pic {
    width: 80px;
    height: 100px;
    cursor: pointer;
}

.prod-bg {
    width: 19.5%;
    height: 110px;
    background-color: #E0E0E0;
    margin-bottom: 10px;
}

.fat-img {
    width: 94px;
    height: 100px;
}

.more {
    width: 19.5%;
    height: 110px;
    color: #fff;
    background-color: #000;
    cursor: pointer;
}

@media screen and (max-width: 677px) {
    .card {
        width: 100%;
        margin: auto;
    }

    .btn-pink {
        width: 100%;
        height: 40px;
        padding: 6px 30px;
    }

    .prod-bg {
        width: 33%;
        height: 110px;
        background-color: #E0E0E0;
    }

    .more {
        width: 66%;
    } 
}
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark-custom m-3" style="border-radius:50px;">
        <div class="container">
            <a class="navbar-brand text-primary" href="#">Art Here</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <?php if (!$isLoggedIn): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="views/login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="views/register.php">Register</a>
                        </li>
                    <?php else: ?>
                        <?php if ($role == 'artist'): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="views/artist_dashboard.php">Artist Dashboard</a>
                            </li>
                        <?php elseif ($role == 'admin'): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="views/admin_dashboard.php">Admin Dashboard</a>
                            </li>
                        <?php elseif ($role == 'customer'): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="views/customer_dashboard.php">Customer Dashboard</a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <form action="controllers/UserController.php" method="POST" class="form-inline d-inline">
                                <button type="submit" name="logout" class="btn btn-danger">Logout</button>
                            </form>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Artworks Section -->
    <section class="container mt-5">
        <h2 class="text-secondary text-center mb-4">Our Featured Artworks</h2>
        <div class="row">
            <?php if (!empty($approvedArt)): ?>
                <?php foreach ($approvedArt as $art): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="<?php echo htmlspecialchars($art['image_url']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($art['title']); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($art['title']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($art['description']); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <p class="text-center">No artworks available at the moment.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <div class="container-fluid py-5 mx-auto">
    <div class="card py-4 px-4">
        <div class="row justify-content-start px-3">
            <div class="image-bg mr-3">
                <img class="user-img fit-image" src="https://i.imgur.com/RCwPA3O.jpg">
            </div>
            <div class="text-left">
                <h2>Kiera Hill</h2>
                <h6>10 ITEMS - 21 SALE - 8 COMMENTS</h6>
                <span class="fa fa-star active"></span>
                <span class="fa fa-star active"></span>
                <span class="fa fa-star active"></span>
                <span class="fa fa-star active"></span>
                <span class="fa fa-star"></span>
            </div>
            <div class="btn btn-pink ml-auto">FOLLOW</div>
        </div>
        <div class="line"></div>
        <div class="row d-flex justify-content-between px-3">
            <div class="prod-bg text-center py-1"><img class="prod-pic" src="https://i.imgur.com/6bdzZKE.png"></div>
            <div class="prod-bg text-center py-1"><img class="prod-pic" src="https://i.imgur.com/CGaJoDY.png"></div>
            <div class="prod-bg text-center py-1"><img class="prod-pic fat-img" src="https://i.imgur.com/8JVdjVT.png"></div>
            <div class="prod-bg text-center py-1"><img class="prod-pic" src="https://i.imgur.com/uJGwaIy.png"></div>
            <div class="more text-center pt-3">
                <h1 class="mb-0 dk-none dk-sm-block"><strong>+6</strong></h1>
                <h5>ITEMS</h5>
            </div>
        </div>
    </div>
</div>
    <!-- Footer -->
    <footer class="bg-dark text-white py-4 fixed-bottom">
        <div class="container text-center">
            <p>&copy; <?php echo date("Y"); ?> Art Platform. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init(); // Initialize AOS
    </script>
     <!-- Footer -->
     <footer class=" navbar-expand-lg navbar-dark bg-dark-custom text-white py-3 fixed-bottom" style="height:50px !important;">
        <div class="container text-center">
            <p style="font-size: 12px;">&copy; <?php echo date("Y"); ?> DRAWING WITH ASWIN. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
