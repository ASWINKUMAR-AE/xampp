<?php
session_start();
if ($_SESSION['role'] !== 'artist') {
    header("Location: login.php");
    exit();
}

include "../controllers/ArtController.php";
include '../db/db.php';

$artController = new ArtController();
$uploadedArt = $artController->getArtByArtistId($_SESSION['user_id']);

$sql = "SELECT * FROM users WHERE id = " . $_SESSION['user_id'];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $artistName = $row["username"];
        $role = $row["role"];
        $status = $row["status"];
        $email = $row["email"];
        $phone_number = $row["phone_number"];
        $address = $row["address"];
        $instagram = $row["instagram"];
        $facebook = $row["facebook"];
    }
} else {
    echo "0 results";
}

$sqlImageCount = "SELECT COUNT(*) as image_count FROM art WHERE artist_id = " . $_SESSION['user_id'];
$resultImageCount = $conn->query($sqlImageCount);
$imageCount = $resultImageCount ? $resultImageCount->fetch_assoc()['image_count'] : 0;

if (isset($_POST['delete'])) {
    $artId = $_POST['art_id'];
    $artController->deleteArt($artId);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> <!-- AOS CSS -->
    <style>
        /* Custom Styles */
        body {
            background: #313533;
            color:white;
        }

        .card {
            background: #474b49;
        }

        .recent-photos img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 20px;
        }

        .navbar-dark-custom {
            background-color: #343a40;
        }
    </style>
</head>
<body>
    <div class="container-fluid col-12">
    <nav class="navbar navbar-expand-lg navbar-dark navbar-dark-custom m-3"  style="border-radius:50px;">
        <div class="container">
            <a class="navbar-brand text-light" href="#"><?php echo htmlspecialchars($artistName); ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <p class="m-1 rounded text-light"><?php echo htmlspecialchars($role); ?></p>
                <p class="m-1 rounded text-light">
                    <button type="button" class="btn  btn-sm p-1" data-bs-toggle="modal" data-bs-target="#uploadDataModal" style="">
                        <i class="fas fa-edit" style="color: white;"></i> <!-- Font Awesome upload icon -->
                    </button>
                </p>
                
                <p class="m-1" style="color: <?php echo strtolower($status) == 'approved' ? 'green' : 'red'; ?>">
                    <?php echo htmlspecialchars($status); ?>
                </p>
                <form action="../controllers/UserController.php" method="POST" class="form-inline d-inline">
                    <button type="submit" name="logout" class="btn btn-danger" style="border-radius:50px;">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    </div>



    
    <div class="container">
        <div class="row">
            <!-- Left Column: Order count and Recent Photos -->
            <div class="col-md-8" ">
                <div class="card p-4 mb-4" style="border-radius:20px;">
                <div class="mb-5">
    <p class="lead fw-normal mb-1 text-white">Number of Orders Placed</p>
    <div class="p-4 bg-dark " style="border-radius:50px;">
        <?php
       

        // Query to count orders
        $sql = "SELECT COUNT(*) as order_count FROM orders where artist_id = " . $_SESSION['user_id']; 
        $result = $conn->query($sql);

        if ($result) {
            $row = $result->fetch_assoc();
            echo "<h2 class='text-white'>" . $row['order_count'] . "</h2>";
        } else {
            echo "<h2 class='text-white'>0</h2>"; // In case of an error or no results
        }

        $conn->close();
        ?>
    </div>
</div>
<div class="mb-4">
                       
                       <div class="p-4 " >
                           <p class="text-white bg-dark" style="border-radius:50px; padding:10px; width:100px; text-align:center;">POST :<?php echo $imageCount; ?></p>
                       </div>


                   </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <p class="lead fw-normal mb-0">Recent Photos</p>
                        <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p>
                    </div>
                   

                    <div class="recent-photos row">
    <?php if (!empty($uploadedArt)): ?>
        <?php foreach ($uploadedArt as $art): ?>
            <div class="col-md-6 col-sm-12 mb-4 position-relative">
                <!-- Delete button as an icon positioned over the image -->
                <form method="POST" action="" class="position-absolute" style="top: 10px; right: 10px;">
                    <input type="hidden" name="art_id" value="<?php echo htmlspecialchars($art['id']); ?>">
                    <button type="submit" name="delete" class="btn btn-danger btn-sm p-1" style="border-radius: 50%; width: 30px; height: 30px;">
                        <i class="fas fa-trash-alt" style="color: white;"></i> <!-- Font Awesome trash icon -->
                    </button>
                </form>
                
                <!-- Image and details -->
                <img src="<?php echo htmlspecialchars($art['image_url']); ?>" alt="<?php echo htmlspecialchars($art['title']); ?>" class="img-fluid rounded">
                <p><?php echo htmlspecialchars($art['title']); ?></p>
                <p><?php echo htmlspecialchars($art['description']); ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No recent photos to display.</p>
    <?php endif; ?>
</div>




                </div>
            </div>

            <!-- Right Column: Upload Form -->
            <div class="col-md-4"style="border-radius:20px;">
                <?php if (strtolower($status) == 'approved'): ?>
                    <div class="card p-4" style="border-radius:20px;">
                        <h5 class="mb-3">Upload Art</h5>
                        <form action="../controllers/ArtController.php" method="POST" enctype="multipart/form-data">
                            <input type="text" hidden name="artist_id" value="<?php echo $_SESSION['user_id']; ?>"  style="border-radius:20px;">
                            <div class="form-group">
                                <input type="text" name="title" class="form-control" placeholder="Art Title" required style="border-radius:20px;">
                            </div>
                            <div class="form-group">
                                <textarea name="description" class="form-control" placeholder="Description" required style="border-radius:20px;"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="file" name="art_image" class="form-control-file" required style="border-radius:20px;">
                            </div>
                            <button type="submit" class="btn btn-primary" name="upload" style="border-radius:50px;">Upload Art</button>
                        </form>
                    </div>
                <?php else: ?>
                    <div class="alert alert-danger text-center mt-5" role="alert">
                        <strong>Pending stage!</strong> Your account is not approved yet. Please wait for admin approval to upload art.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

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

<!-- Modal for uploading artist data to DB -->
<div class="modal fade k" id="uploadDataModal" tabindex="-1" aria-labelledby="uploadDataModalLabel" aria-hidden="true" style="background:rgba(0, 0, 0, 0.414);" >
    <div class="modal-dialog ">
        <div class="modal-content bg-dark" style="border-radius:50px;">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadDataModalLabel">Upload Artist Data</h5>
                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"> <i class="fas fa-window-close" style="border-radius:50% !important;"></i></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="../controllers/ArtController.php">
                    <input type="hidden" name="artist_id" value="<?php echo htmlspecialchars($_SESSION['user_id']); ?>">
                    <div class="mb-3">
                        <label for="artistName" class="form-label">Artist Name</label>
                        <input type="text" class="form-control" id="artistName" name="artistName" value="<?php echo htmlspecialchars($artistName); ?>">
                    </div>
                    <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
</div>
<div class="mb-3">
    <label for="phone_number" class="form-label">Phone Number</label>
    <input type="tel" class="form-control" id="phone_number" name="phone_number" value="<?php echo isset($phone_number) ? htmlspecialchars($phone_number) : ''; ?>">
</div>
<div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <textarea class="form-control" id="address" name="address" rows="3"><?php echo isset($address) ? htmlspecialchars($address) : ''; ?></textarea>
</div>
<div class="mb-3">
    <label for="instagram" class="form-label">Instagram</label>
    <input type="text" class="form-control" id="instagram" name="instagram" value="<?php echo isset($instagram) ? htmlspecialchars($instagram) : ''; ?>">
</div>
<div class="mb-3">
    <label for="facebook" class="form-label">Facebook</label>
    <input type="text" class="form-control" id="facebook" name="facebook" value="<?php echo isset($facebook) ? htmlspecialchars($facebook) : ''; ?>">
</div>

                    <button type="submit" name="upload_artist_data" class="btn btn-primary" style="border-radius:20px;">Upload</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius: 20px;">Close</button>
            </div>
        </div>
    </div>
</div>


</body>
</html>

