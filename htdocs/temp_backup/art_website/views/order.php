<?php
session_start();
include '../db/db.php'; // Make sure your database connection file path is correct

// Check if artist_id is set in the URL
$artistId = isset($_GET['artist_id']) ? htmlspecialchars($_GET['artist_id']) : '';
$customer = null; // Initialize customer variable
$artistEmail = null; // Initialize artist email variable

if (isset($_SESSION['user_id'])) {
    // Retrieve customer details
    $sql = "SELECT username, email, phone_number FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    
    // Bind the session user_id parameter
    $stmt->bind_param("i", $_SESSION['user_id']); 
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $customer = $result->fetch_assoc();
    }
}

// Retrieve artist email using artist_id
if ($artistId) {
    $sql = "SELECT email FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    
    // Bind the artist_id parameter
    $stmt->bind_param("i", $artistId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $artist = $result->fetch_assoc();
        $artistEmail = $artist['email']; // Store the artist's email
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Drawing</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<div class="container mt-5">
    <div class="card bg-secondary">
        <div class="card-header text-center">
            <h4>Order Your Drawing</h4>
        </div>
        <div class="card-body">
            <form action="submit_order.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="customerName">Your Name</label>
                    <input type="text" class="form-control" id="customerName" name="customer_name" value="<?php echo isset($customer['username']) ? htmlspecialchars($customer['username']) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="customerEmail">Email Address</label>
                    <input type="email" class="form-control" id="customerEmail" name="customer_email" value="<?php echo isset($customer['email']) ? htmlspecialchars($customer['email']) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="customerPhone">Phone Number</label>
                    <input type="tel" class="form-control" id="customerPhone" name="customer_phone" value="<?php echo isset($customer['phone_number']) ? htmlspecialchars($customer['phone_number']) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="artworkTitle">Artwork Title</label>
                    <input type="text" class="form-control" id="artworkTitle" name="artwork_title" required>
                </div>
                <div class="form-group">
                    <label for="artworkDescription">Description</label>
                    <textarea class="form-control" id="artworkDescription" name="artwork_description" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="artworkImage">Upload Artwork Image</label>
                    <input type="file" class="form-control-file" id="artworkImage" name="artwork_image" accept="image/*" required>
                </div>
                
                <!-- Paper Size Selection -->
                <div class="form-group">
                    <label>Paper Size</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="sizeA4" name="paper_size[]" value="A4">
                        <label class="form-check-label" for="sizeA4">A4</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="sizeA3" name="paper_size[]" value="A3">
                        <label class="form-check-label" for="sizeA3">A3</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="sizeA2" name="paper_size[]" value="A2">
                        <label class="form-check-label" for="sizeA2">A2</label>
                    </div>
                </div>

                <!-- Submission Date -->
                <div class="form-group">
                    <label for="submissionDate">Submission Date</label>
                    <input type="date" class="form-control" id="submissionDate" name="submission_date" required>
                </div>

                <!-- Sketch Range -->
                <div class="form-group">
                    <label>Sketch Range</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="rangeLight" name="sketch_range" value="Light" required>
                        <label class="form-check-label" for="rangeLight">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="rangeDark" name="sketch_range" value="Dark">
                        <label class="form-check-label" for="rangeDark">Dark</label>
                    </div>
                </div>

                <!-- Face Count Selection -->
                <div class="form-group">
                    <label for="faceCount">Face Count in the Picture</label>
                    <select class="form-control" id="faceCount" name="face_count" required>
                        <option value="" disabled selected>Select Number of Faces</option>
                        <option value="1">1 Face</option>
                        <option value="2">2 Faces</option>
                        <option value="3">3 Faces</option>
                        <option value="4">4 Faces</option>
                        <option value="5">5 Faces</option>
                        <option value="more">More than 5 Faces</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="additionalNotes">Additional Notes</label>
                    <textarea class="form-control" id="additionalNotes" name="additional_notes" rows="3"></textarea>
                </div>
                
                <input type="hidden" name="artist_id" value="<?php echo $artistId; ?>"> <!-- Hidden artist ID -->
                <input type="hidden" name="artist_email" value="<?php echo isset($artistEmail) ? htmlspecialchars($artistEmail) : ''; ?>"> <!-- Hidden artist email -->

                <input type="hidden" name="customer_id" value="<?php echo $_SESSION['user_id']; ?>"> <!-- Hidden customer ID -->
                <button type="submit" class="btn btn-primary btn-block">Submit Order</button>
            </form>
        </div>
    </div>
</div> <!-- Footer -->
    <footer class=" navbar-expand-lg navbar-dark bg-dark-custom text-white py-3 fixed-bottom" style="height:50px !important;">
        <div class="container text-center">
            <p style="font-size: 12px;">&copy; <?php echo date("Y"); ?> DRAWING WITH ASWIN. All rights reserved.</p>
        </div>
    </footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
