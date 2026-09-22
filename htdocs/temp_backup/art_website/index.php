<?php
session_start();
include_once "db/db.php";
include_once "controllers/ArtController.php";

$isLoggedIn = isset($_SESSION['user_id']);
$role = $isLoggedIn ? $_SESSION['role'] : null;

$artController = new ArtController();
$approvedArt = $artController::getApprovedArt();

// Shuffle the artworks array
shuffle($approvedArt);

$artistCount = $conn->query("SELECT COUNT(*) AS count FROM users WHERE role = 'artist'")->fetch_assoc()['count'];
$customerCount = $conn->query("SELECT COUNT(*) AS count FROM users WHERE role = 'customer'")->fetch_assoc()['count'];
$orderCount = $conn->query("SELECT COUNT(*) AS count FROM orders")->fetch_assoc()['count'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitInquiry'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $issue = $_POST['issue'];

    $name = htmlspecialchars(strip_tags($name));
    $email = htmlspecialchars(strip_tags($email));
    $issue = htmlspecialchars(strip_tags($issue));

    $sql = "INSERT INTO inquiries (name, email, issue) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $issue);

    if ($stmt->execute()) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Thank you! Your inquiry has been submitted.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist's Here!!!</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> <!-- AOS CSS -->

    <!-- Inline Styles -->
    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
        }
        
        .glassmorphism-popup {
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 20px;
    width: 300px;
    animation: ani 1s ease-out;
    border-radius: 50px;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    color: white;
    box-shadow: 10 14px 18px rgba(0, 0, 0, 0.3) !important;
    z-index: 1000;
    display: none; /* Initially hidden */
}
@keyframes ani{
    0% {
        border-radius: 50px;
margin-right:-200px;
        
      
    }
    100% {
        border-radius: 50px;
        margin-right:0px;

        
    }
}
h1[data-count]:hover {
        transform: scale(1.1); /* Slightly enlarge on hover */
    }
    h3 {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }
    .icon svg {
    display: block;
    margin: 0 auto;
}

.glassmorphism-popup .cta {
    color: #00ffdd;
    font-weight: bold;
}

.glassmorphism-popup .close-btn {
    position: absolute;
    top: 5px;
    right: 10px;
    cursor: pointer;
    color: white;
}
nav{
    background-color: rgb(46, 46, 46);
    background-image: url('assets/img/bgnav.jpeg');

height: 60px;
    color: white;
}



        h3 {
            font-weight: bold;
            color: transparent;
            background-image: url('assets/img/bg.jpg'); /* Replace with the actual path */
            background-size: cover;
            background-clip: text;
            -webkit-background-clip: text; /* For Safari */
            text-fill-color: transparent;
            -webkit-text-fill-color: transparent; /* For Safari */
            display: inline-block;
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
   <?php include_once "controllers/navbar.php";?>



<br>
<section 
    class="position-relative d-flex align-items-center justify-content-center" 
    style="height: 80vh; background: linear-gradient(to right, #6b46c1, #000); margin-top: -25px; margin-bottom: 10px;" 
    data-aos="fade-in" 
    data-aos-duration="1500"
>
    <!-- Background Image -->
    <div 
        class="position-absolute w-100 h-100" 
        style="top: 0; left: 0;" 
    
    >
        <img 
            src="assets/img/bg1.png" 
            alt="Art Background" 
            class="w-100 h-100 object-fit-cover" 
            style="opacity: 0.2;"
        >
    </div>

    <!-- Content -->
    <div 
        class="position-relative text-center text-white px-4" 
        data-aos="fade-up" 
        data-aos-duration="1200" 
        data-aos-delay="1000" 
        data-aos-easing="ease-in-out"
    >
        <h1 
            class="display-4 fw-bold mb-4" 
            style="    color:white !important;"
            data-aos="slide-right" 
            data-aos-duration="1500" 
            data-aos-delay="1200"
        >
            Discover <span style="    color:#6b46c1 !important; background:white; text-align:center; padding:5px;">&</span> Commission Amazing <span style="    color:#6b46c1 !important;">Artists</span>
        </h1>
        <p 
            class="fs-5 mb-4" 
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
            <a 
                href="views/register.php" 
                class="btn btn-light text-purple px-4 py-2 fw-semibold rounded-pill shadow-sm"
                style="background-color: #ffffff; color: #6b46c1; transition: background-color 0.3s ease;"
                onmouseover="this.style.backgroundColor='#f3e8ff';"
                onmouseout="this.style.backgroundColor='#ffffff';"
                data-aos="zoom-in" 
                data-aos-duration="1200" 
                data-aos-delay="2500"
            >
                Get Started
            </a>
            <a 
                href="views/login.php" 
                class="btn btn-outline-light px-4 py-2 fw-semibold rounded-pill shadow-sm"
                style="transition: background-color 0.3s ease, color 0.3s ease;"
                onmouseover="this.style.backgroundColor='#ffffff'; this.style.color='#6b46c1';"
                onmouseout="this.style.backgroundColor='transparent'; this.style.color='#ffffff';"
                data-aos="zoom-in" 
                data-aos-duration="1200" 
                data-aos-delay="2700"
            >
                Login
            </a>
        </div>
    </div>
</section>
<div class="container text-center mt-5">
    <div class="row justify-content-center">
        <!-- Artists Count -->
        <div class="col-md-4 mb-4">
            <div class="p-4 shadow-lg rounded" style="background: #2c2f33; border-radius: 20px; color: #6b46c1;">
                <div class="icon mb-3">
                    <!-- Add a stylish icon for Artists -->
                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="50" height="50" style="fill: #6b46c1;">
                        <path d="M16.043,14H7.957A4.963,4.963,0,0,0,3,18.957V24H21V18.957A4.963,4.963,0,0,0,16.043,14Z"/>
                        <circle cx="12" cy="6" r="6"/>
                    </svg>
                </div>
                <h3 class="text-muted" style="color: #b9bbbe;">Artists</h3>
                <h1 id="artistCount" class="" data-count="<?php echo $artistCount; ?>" style="font-weight: bold; color:#6b46c1;">0</h1>
            </div>
        </div>

        <!-- Customers Count -->
        <div class="col-md-4 mb-4">
            <div class="p-4 shadow-lg rounded" style="background: #23272a; border-radius: 20px; color: #6b46c1;">
                <div class="icon mb-3">
                    <!-- Add a stylish icon for Customers -->
                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="50" height="50" style="fill: #6b46c1;">
                        <path d="M12,17a4,4,0,1,1,4-4A4,4,0,0,1,12,17Zm6,4a3,3,0,0,0-3-3H9a3,3,0,0,0-3,3v3H18ZM18,8a4,4,0,1,1,4-4A4,4,0,0,1,18,8ZM6,8a4,4,0,1,1,4-4A4,4,0,0,1,6,8Zm0,5A5.968,5.968,0,0,1,7.537,9H3a3,3,0,0,0-3,3v3H6.349A5.971,5.971,0,0,1,6,13Zm11.651,2H24V12a3,3,0,0,0-3-3H16.463a5.952,5.952,0,0,1,1.188,6Z"/>
                    </svg>
                </div>
                <h3 class="text-muted" style="color: #b9bbbe;">Customers</h3>
                <h1 id="customerCount" class="" data-count="<?php echo $customerCount; ?>" style="font-weight: bold; color: #6b46c1;">0</h1>
            </div>
        </div>
    </div>
</div>


<br>

    <!-- Additional Sections with AOS Animation -->
    <!-- Example: Contact Form Section -->
    <div class="container p-2 text-light shadow" style="background-image:url(assets/img/bg.jpg); border-radius:20px;" data-aos="fade-up">
        <!-- Form Content Here -->
    </div>


<!-- Artworks Section with Fade-in Animation -->
<section class="container mt-5" data-aos="fade-in">
    <h2 class="text-center mb-4" style="color:#6b46c1;">Artist<span style="color:white;">'</span>s Featured <span style="background:white; padding:5px;border-radius:5px;">Artworks</span></h2>
    <div class="row">
        <!-- Artwork Items Here with Individual Animations -->
        <?php foreach ($approvedArt as $art): ?>
            <div class="col-md-4 mb-4" data-aos="zoom-in">
                <div class="card shadow-sm" style="border-radius:20px;">
                    <img 
                        src="uploads/<?php echo htmlspecialchars($art['image_url']); ?>" 
                        class="card-img-top fixed-image" 
                        style="border-radius:20px; width:100%; height:250px; object-fit:cover;" 
                        alt="<?php echo htmlspecialchars($art['title']); ?>"
                    >
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($art['title']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($art['description']); ?></p>
                        <center>
                            <?php if (isset($_SESSION['user_id'])): ?>
                                <!-- Add the form for submitting commands -->
                                <form id="commandForm_<?php echo $art['id']; ?>" action="process_command.php" method="POST" onsubmit="clearTextarea()">
                                    <input type="hidden" name="art_id" value="<?php echo htmlspecialchars($art['id']); ?>">
                                    <input type="hidden" name="artist_id" value="<?php echo htmlspecialchars($art['artist_id']); ?>">

                                    <div class="row align-items-center" data-aos="fade-up" data-aos-delay="100">
                                        <div class="col-6">
                                            <a href="views/customer_artist_profile.php?artist_id=<?php echo htmlspecialchars($art['artist_id']); ?>"
                                               class="btn w-100"
                                               style="color:white; background:#6b46c1; border-radius:50px;">
                                               View Profile
                                            </a>
                                        </div>

                                        <div class="col-6 d-flex justify-content-end">
                                            <button type="button"
                                                    id="toggleCommand_<?php echo $art['id']; ?>"
                                                    class="btn d-flex align-items-center justify-content-center p-2"
                                                    style="color: white; background: #6b46c1; border-radius: 50%; width: 40px; height: 40px;"
                                                    data-aos="fade-down" data-aos-delay="200">
                                                <svg xmlns="http://www.w3.org/2000/svg" id="Filled" viewBox="0 0 24 24" width="512" height="512"><path d="M19.675,2.758A11.936,11.936,0,0,0,10.474.1,12,12,0,0,0,12.018,24H19a5.006,5.006,0,0,0,5-5V11.309l0-.063A12.044,12.044,0,0,0,19.675,2.758ZM8,7h4a1,1,0,0,1,0,2H8A1,1,0,0,1,8,7Zm8,10H8a1,1,0,0,1,0-2h8a1,1,0,0,1,0,2Zm0-4H8a1,1,0,0,1,0-2h8a1,1,0,0,1,0,2Z"/></svg>
                                            </button>
                                        </div>
                                    </div>

                                    <div id="commandSection_<?php echo $art['id']; ?>" class="row align-items-center mt-3" style="display: none; background:rgb(26, 26, 26); border-radius: 50px;" data-aos="fade-up" data-aos-delay="300">
                                        <div class="col-9">
                                            <textarea name="command_text"
                                                      placeholder="Enter your command here..."
                                                      class="form-control"
                                                      style="border-radius: 20px; height: 40px; background: rgb(26, 26, 26); color: white; border:none;"
                                                      required></textarea>
                                        </div>
                                        <div class="col-3">
                                            <button type="submit"
                                                    class="btn d-flex align-items-center justify-content-center p-2"
                                                    style="color: white; background: #6b46c1; border-radius: 50%; width: 40px; height: 40px;"
                                                    data-aos="zoom-in" data-aos-delay="400">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="white">
                                                    <path d="M5.521,19.9h5.322l3.519,3.515a2.035,2.035,0,0,0,1.443.6,2.1,2.1,0,0,0,.523-.067,2.026,2.026,0,0,0,1.454-1.414L23.989,1.425Z"/>
                                                    <path d="M4.087,18.5,22.572.012,1.478,6.233a2.048,2.048,0,0,0-.886,3.42l3.495,3.492Z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <script>
                                    document.getElementById('toggleCommand_<?php echo $art['id']; ?>').addEventListener('click', function () {
                                        const commandSection = document.getElementById('commandSection_<?php echo $art['id']; ?>');
                                        commandSection.style.display = commandSection.style.display === 'none' || commandSection.style.display === '' ? 'flex' : 'none';
                                    });
                                </script>
                            <?php else: ?>
                                <p class="text-danger">Please log in to view more options.</p>
                            <?php endif; ?>
                        </center>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<div class="container p-2 text-light shadow bg-container" style="background-image:url(assets/img/bg.jpg); border-radius:20px;">
    <div class="row align-items-center">
        <!-- Image Section -->
        <div class="col-md-6 d-none d-md-block img-container">
            <img src="assets/img/issue.png" alt="Contact Us" class="img-fluid rounded">
        </div>

        <!-- Form Section -->
        <div class="col-md-6 form-container">
            <h4 class="text-info mb-4 p-5">Have Any Questions or Issues?</h4>
            <p>If you have any queries or need assistance, please let us know, and we’ll get back to you as soon as possible.</p>
            <form action="" method="POST" class="form-content">
                <center>
                    <div class="mb-3 input-container">
                        <label for="name" class="form-label text-light">Your Name</label>
                        <input type="text" class="form-control bg-dark text-light border-secondary" id="name" name="name" required>
                    </div>
                    <div class="mb-3 input-container">
                        <label for="email" class="form-label text-light">Email Address</label>
                        <input type="email" class="form-control bg-dark text-light border-secondary" id="email" name="email" required>
                    </div>
                    <div class="mb-3 input-container">
                        <label for="issue" class="form-label text-light">Your Question or Issue</label>
                        <textarea class="form-control bg-dark text-light border-secondary" id="issue" name="issue" rows="4" required></textarea>
                    </div>
                    <button type="submit" name="submitInquiry" class="btn btn-info submit-button" style="border-radius:20px; width:80%;">Submit</button>
                </center>
            </form>
        </div>
    </div>
</div>


    <!-- Footer with Animation -->
    <footer class="navbar-expand-lg navbar-dark bg-dark-custom text-white py-3 fixed-bottom" style="height:50px !important;" data-aos="fade-in">
        <div class="container text-center">
            <p style="font-size: 12px;">&copy; <?php echo date("Y"); ?> DRAWING WITH ASWIN. All rights reserved.</p>
        </div>
    </footer>
<!-- AOS and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<script>
    AOS.init(); // Initialize AOS

    function showPopup() {
        document.getElementById("jobApplyPopup").style.display = "block";
    }

    function hidePopup() {
        document.getElementById("jobApplyPopup").style.display = "none";
    }

    // Show popup after 3 seconds
    setTimeout(showPopup, 1000);



    function clearTextarea() {
    const textarea = document.getElementById("commandText");
    textarea.value = ""; // Clear the value of the textarea
}

</script>

<script>
    // Function to animate the counting (faster version)
    function animateCount(element, targetNumber) {
        let start = 0;
        const duration = 1000; // Faster duration (1 second)
        const stepTime = Math.max(1, Math.floor(duration / targetNumber)); // Ensure a minimum of 1ms per step
        const timer = setInterval(() => {
            start += 1;
            element.textContent = start;
            if (start >= targetNumber) {
                clearInterval(timer);
            }
        }, stepTime);
    }

    // Observe when the numbers come into view
    document.addEventListener("DOMContentLoaded", () => {
        const counters = document.querySelectorAll("h1[data-count]");
        const observer = new IntersectionObserver(
            (entries, observer) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        const target = entry.target;
                        const targetNumber = parseInt(target.getAttribute("data-count"), 10);
                        animateCount(target, targetNumber);
                        observer.unobserve(target); // Stop observing once animation is done
                    }
                });
            },
            { threshold: 0.5 }
        );

        counters.forEach((counter) => observer.observe(counter));
    });
</script>


    <script>
        AOS.init(); // Initialize AOS
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
</body>
</html>
