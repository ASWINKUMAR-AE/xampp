<?php
session_start();
include_once "../db/db.php";
include_once "../controllers/ArtController.php";

$artist_id = $_GET['artist_id'];
$sql = "SELECT * FROM users WHERE id = $artist_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $artistName = $row["username"];
        $email = $row["email"];
        $phone_number = $row["phone_number"];
        $address = $row["address"];
        $instagram = $row["instagram"];
        $facebook = $row["facebook"];
    }
}

// Fetch artworks associated with the artist
$artworks = [];
$art_sql = "SELECT * FROM art WHERE artist_id = $artist_id";
$art_result = $conn->query($art_sql);
$artworkCount = $art_result->num_rows; // Count the artworks

if ($art_result->num_rows > 0) {
    while ($art_row = $art_result->fetch_assoc()) {
        $artworks[] = $art_row;
    }
}


$current_user_id = $_SESSION['user_id']; // Assume the user is logged in
$liked_artworks = [];

$liked_sql = "SELECT artwork_id FROM liked WHERE user_id = $current_user_id";
$liked_result = $conn->query($liked_sql);

if ($liked_result->num_rows > 0) {
    while ($liked_row = $liked_result->fetch_assoc()) {
        $liked_artworks[] = $liked_row['artwork_id'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist Profile - <?php echo $artistName; ?></title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body {
            background-color: #121212 !important;
            color: #e0e0e0;
        }
        .like-button {
    color: #fff;
    background: #ffc107;
    border: none;
    font-size: 3em; /* Increase this value to make the heart icon bigger */
    display: flex;
    justify-content: center;
    align-items: center;
    transition: color 0.3s ease;
    width: 50px; /* Keep button size */
    height: 50px; /* Keep button size */
    border-radius: 50%; /* Circular button */
}

.like-button[data-liked="1"] {
    color: #6b46c1;
}
.like-button img {
    width: 20px;
    height: 20px;
    pointer-events: none; /* Prevent interference with button clicks */
}



        
    </style>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="text-white">
<div class="container mt-5" style="border-radius:20px !important;">
    <div class="card text-light" style="border-radius:20px; background-color: #2f2d2dd4;" data-aos="fade-up">
        <div class="card-header d-flex align-items-center" style="background:#6b46c1; border-radius:20px; margin:10px;" data-aos="zoom-in">
            <div>
                <h2 class="h1 mb-1" style="color:orange;" data-aos="fade-right"><?php echo $artistName; ?></h2>
                <p class="mb-1" data-aos="fade-left"><strong>Email: </strong><?php echo $email; ?></p>
                <p class="mb-1" data-aos="fade-left"><strong>Phone: </strong><?php echo $phone_number; ?></p>
                <p class="mb-1" data-aos="fade-left"><strong>Address: </strong><?php echo $address; ?></p>
            </div>
        </div>

        <p class="mb-1 ml-3 col-2 text-center" style="background:#6b46c1; border-radius:20px;" data-aos="flip-up">
            <strong>Total Posts: </strong><?php echo $artworkCount; ?>
        </p>

        <form action="order_sketch.php" method="post" class="text-right" data-aos="fade-up">
            <input type="hidden" name="artwork_id" value="<?php echo !empty($artworks) ? $artworks[0]['id'] : ''; ?>">
            <a href="order.php?artist_id=<?php echo $artist_id ?>" class="btn btn-secondary btn-lg w-auto" style="border-radius:20px; margin:10px; background:#6b46c1;" data-aos="fade-up">Order Drawing</a>
        </form>

        <div class="card-body" data-aos="fade-in">
            <div class="mb-3">
                <a href="https://instagram.com/<?php echo $instagram; ?>" target="_blank" class="text-light" data-aos="fade-right">
                    <i class="fab fa-instagram"></i> Instagram
                </a>
                <a href="https://facebook.com/<?php echo $facebook; ?>" target="_blank" class="text-light ml-3" data-aos="fade-left">
                    <i class="fab fa-facebook"></i> Facebook
                </a>
            </div>
            <hr style="background:#6b46c1;">

            <!-- Gallery for displaying artworks -->
            <div class="row">
                <?php foreach ($artworks as $artwork): ?>
                    <div class="col-6 col-md-4 col-lg-3 mb-4">
                        <!-- Artwork Container -->
                        <div class="position-relative">
                            <!-- Artwork Image -->
                            <img style="border-radius:20px; width:100%; height:auto;" 
                                 src="<?php echo $artwork['image_url']; ?>" 
                                 alt="<?php echo htmlspecialchars($artwork['title']); ?>" 
                                 class="card-img-top">
                            
                            <!-- Like Button -->
                            <button type="button" 
        class="btn like-button btn-sm position-absolute" 
        style="top: 10px; left: 10px; border-radius: 50%; width: 50px; height: 50px; background:rgb(47, 46, 46); color:white;" 
        data-id="<?php echo $artwork['id']; ?>" 
        data-liked="<?php echo in_array($artwork['id'], $liked_artworks) ? '1' : '0'; ?>">
    <img src="<?php echo in_array($artwork['id'], $liked_artworks) ? '../assets/img/liked.png' : '../assets/img/like.png'; ?>" 
         width="20" height="20" alt="Like Icon">
</button>

            
                            <!-- Command Button -->
                            <button type="button"
                                    id="toggleCommand_<?php echo $artwork['id']; ?>"
                                    class="btn position-absolute d-flex align-items-center justify-content-center"
                                    style="bottom: 10px; right: 10px; color: white; background: #6b46c1; border-radius: 50%; width: 40px; height: 40px;"
                                    data-aos="fade-down" data-aos-delay="200">
                                <!-- SVG Command Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" id="Filled" viewBox="0 0 24 24" width="24" height="24"><path d="M19.675,2.758A11.936,11.936,0,0,0,10.474.1,12,12,0,0,0,12.018,24H19a5.006,5.006,0,0,0,5-5V11.309l0-.063A12.044,12.044,0,0,0,19.675,2.758ZM8,7h4a1,1,0,0,1,0,2H8A1,1,0,0,1,8,7Zm8,10H8a1,1,0,0,1,0-2h8a1,1,0,0,1,0,2Zm0-4H8a1,1,0,0,1,0-2h8a1,1,0,0,1,0,2Z"/></svg>
                            </button>
                        </div>
            
                        <!-- Command Text Area (Hidden Initially) -->
                        <form id="commandForm_<?php echo $artwork['id']; ?>" action="../process_command.php" method="POST" onsubmit="clearTextarea()">
                            <input type="hidden" name="art_id" value="<?php echo htmlspecialchars($artwork['id']); ?>">
                            <input type="hidden" name="artist_id" value="<?php echo htmlspecialchars($artwork['artist_id']); ?>">
            
                            <div id="commandSection_<?php echo $artwork['id']; ?>" 
                                 class="mt-3 align-items-center" 
                                 style="display: none; background:rgb(26, 26, 26); border-radius: 20px; padding: 10px;" 
                                 data-aos="fade-up" data-aos-delay="300">
                                <textarea name="command_text"
                                          placeholder="Enter your command here..."
                                          class="form-control"
                                          style="border-radius: 20px; height: 40px; background: rgb(26, 26, 26); color: white; border:none;"
                                          required></textarea>
                                <button type="submit"
                                        class="btn d-flex align-items-center justify-content-center mt-2 p-2"
                                        style="color: white; background: #6b46c1; border-radius: 50%; width: 40px; height: 40px;"
                                        data-aos="zoom-in" data-aos-delay="400">
                                    <!-- SVG Send Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="white">
                                        <path d="M5.521,19.9h5.322l3.519,3.515a2.035,2.035,0,0,0,1.443.6,2.1,2.1,0,0,0,.523-.067,2.026,2.026,0,0,0,1.454-1.414L23.989,1.425Z"/>
                                        <path d="M4.087,18.5,22.572.012,1.478,6.233a2.048,2.048,0,0,0-.886,3.42l3.495,3.492Z"/>
                                    </svg>
                                </button>
                            </div>
                        </form>
            
                        <!-- JavaScript for Toggle Command Section -->
                        <script>
                            document.getElementById('toggleCommand_<?php echo $artwork['id']; ?>').addEventListener('click', function () {
                                const commandSection = document.getElementById('commandSection_<?php echo $artwork['id']; ?>');
                                commandSection.style.display = commandSection.style.display === 'none' || commandSection.style.display === '' ? 'block' : 'none';
                            });
                        </script>
                    </div>
                <?php endforeach; ?>
            </div>
            
            
        </div>
    </div>
</div>



<!-- Footer -->
<footer class="navbar-expand-lg navbar-dark bg-dark-custom text-white py-3 fixed-bottom" style="height:50px !important;">
    <div class="container text-center">
        <p style="font-size: 12px;">&copy; <?php echo date("Y"); ?> DRAWING WITH ASWIN. All rights reserved.</p>
    </div>
</footer>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const likeButtons = document.querySelectorAll(".like-button");

    likeButtons.forEach(button => {
        button.addEventListener("click", function () {
            const artworkId = this.getAttribute("data-id");
            const isLiked = this.getAttribute("data-liked") === "1";

            fetch("like_handler.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    artwork_id: artworkId,
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Toggle the like state
                    this.setAttribute("data-liked", isLiked ? "0" : "1");

                    // Update the image icon dynamically
                    const icon = this.querySelector("img");
                    if (icon) {
                        icon.src = isLiked 
                            ? "../assets/img/like.png" // White heart icon
                            : "../assets/img/liked.png"; // Red heart icon
                        icon.alt = isLiked ? "Like Icon" : "Liked Icon";
                    }
                } else {
                    alert("Failed to update like status.");
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("An error occurred. Please try again.");
            });
        });
    });
});

</script>


<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
