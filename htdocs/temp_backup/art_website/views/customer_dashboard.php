<?php
session_start();
include "../controllers/ArtController.php";
$arts = ArtController::getApprovedArt();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Dark Mode Styling */
        body {
            background-color: #121212;
            color: #ffffff;
        }

        h1 {
            color: #ff9800;
        }

        .card {
            background-color: #1e1e1e;
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            color: #b0bec5;
        }

        .card-title {
            color: #ff9800;
        }

        /* Fixed Image Size */
        .card-img-top {
            width: 300px;
            height: 200px;
            object-fit: cover;
            border-radius: 20px;
        }
    </style>
</head>
<body>
    <div class="container text-center py-4">
        <h1>Find Artists Near You </h1>
        <strong>Customer ID:</strong> <?php echo $_SESSION['user_id']; ?> <br>
        <div class="row">
              <!-- Display Customer ID and Role -->
        
            <?php foreach ($arts as $art): ?>
                <div class="col-md-6 col-lg-4 my-3">
                    <div class="card text-left">
                        <img src="<?php echo htmlspecialchars($art['image_url']); ?>" class="card-img-top mx-auto d-block m-3" alt="Art Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($art['title']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($art['description']); ?></p>
                            <center>
                                <?php if (isset($_SESSION['user_id'])): ?>
                                    <!-- Display buttons if user is logged in -->
                                    <a href="customer_artist_profile.php?artist_id=<?php echo htmlspecialchars($art['artist_id']); ?>" class="btn " style="color:white; background:#6b46c1 !important; border-radius:50px !important;">View Profile</a>
                            
                                <?php else: ?>
                                    <!-- Display login prompt if user is not logged in -->
                                    <p class="text-danger">Please log in to view more options.</p>
                                <?php endif; ?>
                            </center>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
 <!-- Footer -->
 <footer class=" navbar-expand-lg navbar-dark bg-dark-custom text-white py-3 fixed-bottom" style="height:50px !important;">
        <div class="container text-center">
            <p style="font-size: 12px;">&copy; <?php echo date("Y"); ?> DRAWING WITH ASWIN. All rights reserved.</p>
        </div>
    </footer>
    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
