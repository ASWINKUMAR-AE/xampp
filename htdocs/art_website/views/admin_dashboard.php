<?php
session_start();
include '../db/db.php'; 
include "../controllers/AdminController.php";
$pendingArtists = AdminController::getPendingArtists();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: admin_login.php");
    exit();
}

// Handle cancel approval action
if (isset($_POST['cancel_approval'])) {
    $artistId = $_POST['artist_id'];

    // Update artist status to pending (simple query)
    $query = "UPDATE users SET status = 'pending' WHERE id = $artistId";
    mysqli_query($conn, $query); // Ensure $conn is the mysqli connection

    // Redirect back to the same page to refresh the data
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Fetch pending artists
$query = "SELECT * FROM users WHERE role = 'artist' AND status = 'pending'";
$result = mysqli_query($conn, $query);
$pendingArtists = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Fetch approved artists
$query = "SELECT * FROM users WHERE role = 'artist' AND status = 'approved'";
$result = mysqli_query($conn, $query);
$approvedArtists = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Fetch customer count
$query = "SELECT COUNT(*) AS customer_count FROM users WHERE role = 'customer'";
$result = mysqli_query($conn, $query);
$customerCountData = mysqli_fetch_assoc($result);
$customerCount = $customerCountData['customer_count'];

// Fetch artist count
$query = "SELECT COUNT(*) AS artist_count FROM users WHERE role = 'artist'";
$result = mysqli_query($conn, $query);
$artistCountData = mysqli_fetch_assoc($result);
$artistCount = $artistCountData['artist_count'];

// Fetch order count (assuming you have an 'orders' table)
$query = "SELECT COUNT(*) AS order_count FROM orders";
$result = mysqli_query($conn, $query);
$orderCountData = mysqli_fetch_assoc($result);
$orderCount = $orderCountData['order_count'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <meta charset="UTF-8">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-icons.css">

    <link rel="stylesheet" href="../assets/css/style.css">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> <!-- AOS CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            overflow-x:hidden !important;
        }
        .dashboard-container {
            margin-top: 20px;
        }
        th, td {
            color: white;
        }
        .table-responsive {
            max-height: 300px; /* Set your desired height */
            overflow-y: auto; /* Enable vertical scrolling */

        }
        .d{
            border-radius:50px !important;
        }
    </style>
</head>
<body style="background: #282828;">

<div class="container dashboard-container">

    <div class="container-fluid col-12">
    <nav class="navbar navbar-expand-lg navbar-dark     bg-dark m-3"  style="border-radius:50px;">
        <div class="container">
            <a class="navbar-brand text-light" href="#"><?php echo   htmlspecialchars($_SESSION['username']); ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
           
              
                <form action="../controllers/UserController.php" method="POST" class="form-inline d-inline">
                    <button type="submit" name="logout" class="btn btn-danger" style="border-radius:50px;">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    </div>
    
    <div class="row mt-4">
        <div class="col-md-4 d">
            <div class="card text-white bg-primary mb-3">

                <div class="card-header">Customer Count</div>
                <div class="card-body">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <h5 class="card-title"><?php echo htmlspecialchars($customerCount); ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-4 d">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Artist Count</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($artistCount); ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-4 d">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Order Count</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($orderCount); ?></h5>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4" style="background: #3f3f3f; color: white;">
        <div class="card-header">Pending Artist Profiles</div>
        <div class="card-body">
            <div class="table-responsive">
                <?php if (!empty($pendingArtists)): ?>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Artist Name</th>
                                <th>Email</th>
                                <th>Location</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pendingArtists as $artist): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($artist['id']); ?></td>
                                    <td><?php echo htmlspecialchars($artist['username']); ?></td>
                                    <td><?php echo htmlspecialchars($artist['email']); ?></td>
                                    <td><?php echo htmlspecialchars($artist['address']); ?></td>
                                    <td>
                                        <form method="POST" action="" class="d-inline">
                                            <input type="hidden" name="artist_id" value="<?php echo htmlspecialchars($artist['id']); ?>">
                                            <button type="submit" name="approve" class="btn btn-success btn-sm">Approve</button>
                                            <button type="submit" name="block" class="btn btn-danger btn-sm">Block</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="alert alert-info">No pending artists to approve.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="card mt-4" style="background: #3f3f3f; color: white;">
        <div class="card-header">Approved Artist Profiles</div>
        <div class="card-body">
            <div class="table-responsive">
                <?php if (!empty($approvedArtists)): ?>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Artist Name</th>
                                <th>Email</th>
                                <th>Location</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($approvedArtists as $artist): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($artist['id']); ?></td>
                                    <td><?php echo htmlspecialchars($artist['username']); ?></td>
                                    <td><?php echo htmlspecialchars($artist['email']); ?></td>
                                    <td><?php echo htmlspecialchars($artist['address']); ?></td>
                                    <td>
                                        <form method="POST" action="" class="d-inline">
                                            <input type="hidden" name="artist_id" value="<?php echo htmlspecialchars($artist['id']); ?>">
                                            <button type="submit" name="cancel_approval" class="btn btn-danger btn-sm">Cancel Approval</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="alert alert-info">No approved artists found.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
 <!-- Footer -->
 <footer class=" navbar-expand-lg navbar-dark bg-dark-custom text-white py-3 fixed-bottom" style="height:50px !important;">
        <div class="container text-center">
            <p style="font-size: 12px;">&copy; <?php echo date("Y"); ?> DRAWING WITH ASWIN. All rights reserved.</p>
        </div>
    </footer>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init(); // Initialize AOS
    </script>





</body>
</html>
