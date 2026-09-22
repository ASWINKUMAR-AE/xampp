<?php
session_start();
// Include Database and Controllers (Backend Same)
include_once "config/db.php";
include_once "controllers/ArtController.php";

$isLoggedIn = isset($_SESSION['user_id']);
$role = $isLoggedIn ? $_SESSION['role'] : null;

$artController = new ArtController();
$approvedArt = $artController::getApprovedArt();

// Shuffle the artworks array
shuffle($approvedArt);

$artistCount = $conn->query("SELECT COUNT(*) AS count FROM users WHERE role = 'artist'")->fetch_assoc()['count'];
$customerCount = $conn->query("SELECT COUNT(*) AS count FROM users WHERE role = 'customer'")->fetch_assoc()['count'];
// Updated to use 'commissions' instead of 'orders' to match new DB status
$orderCount = $conn->query("SELECT COUNT(*) AS count FROM commissions")->fetch_assoc()['count'];

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
        header("Location: index.php?inquiry=success");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist's Here!!!</title>
    <!-- Social Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> <!-- AOS CSS -->

    <!-- Inline Styles (User's Exact UI) -->
    <style>
        body {
            background-color: #000000ff;
            color: #e0e0e0;
        }

        .artwork-card {
            position: relative;
            transition: transform 0.3s;
        }

        .artwork-card:hover {
            transform: scale(1.02);
        }

        h1[data-count]:hover {
            transform: scale(1.1);
        }

        h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .icon svg {
            display: block;
            margin: 0 auto;
        }

        nav {
            background-color: rgb(46, 46, 46);
            background-image: url('assets/img/bgnav.jpeg');
            height: 65px;

            color: white;
        }

        h3 {
            font-weight: bold;
            color: transparent;
            background-image: url('assets/img/bg.jpg');
            background-size: cover;
            background-clip: text;
            -webkit-background-clip: text;
            text-fill-color: transparent;
            -webkit-text-fill-color: transparent;
            display: inline-block;
        }

        /* Like Button Style (Backend Same) */
        .like-btn {
            border: none;
            background: none;
            color: #888;
            transition: color 0.3s;
        }

        .like-btn.liked {
            color: #f44336;
        }

        .heart-pop {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            font-size: 5rem;
            color: #fff;
            text-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            pointer-events: none;
            z-index: 10;
        }

        .heart-pop.animate {
            animation: heartPop 0.8s ease-out;
        }

        @keyframes heartPop {
            0% {
                transform: translate(-50%, -50%) scale(0);
                opacity: 0;
            }

            50% {
                transform: translate(-50%, -50%) scale(1.5);
                opacity: 1;
            }

            100% {
                transform: translate(-50%, -50%) scale(1);
                opacity: 0;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <?php include_once "controllers/navbar.php"; ?>

    <br>
    <section class="position-relative d-flex align-items-center justify-content-center"
        style="height: 80vh; background: linear-gradient(to right, #6b46c1, #000); margin-top: -25px; margin-bottom: 10px;"
        data-aos="fade-in" data-aos-duration="1500">
        <div class="position-absolute w-100 h-100" style="top: 0; left: 0;">
            <img src="assets/img/bg1.png" alt="Art Background" class="w-100 h-100 object-fit-cover"
                style="opacity: 0.2;">
        </div>

        <!-- Content -->
        <div class="position-relative text-center text-white px-4" data-aos="fade-up" data-aos-duration="1200"
            data-aos-delay="1000" data-aos-easing="ease-in-out">
            <h1 class="display-4 fw-bold mb-4" style="color:white !important;" data-aos="slide-right"
                data-aos-duration="1500" data-aos-delay="1200">
                Discover <span
                    style="color:#6b46c1 !important; background:white; text-align:center; padding:5px 15px; border-radius:10px;">&</span>
                Commission Amazing <span style="color:#6b46c1 !important;">Artists</span>
            </h1>
            <p class="fs-5 mb-4" data-aos="flip-left" data-aos-duration="1400" data-aos-delay="1500">
                Connect with talented artists and bring your vision to life
            </p>

            <!-- Buttons -->
            <div class="d-flex justify-content-center gap-3" data-aos="fade-up" data-aos-duration="1500"
                data-aos-delay="2000">
                <a href="auth/register.php"
                    class="btn btn-light text-purple px-4 py-2 fw-semibold rounded-pill shadow-sm"
                    style="background-color: #ffffff; color: #6b46c1; transition: background-color 0.3s ease;"
                    onmouseover="this.style.backgroundColor='#f3e8ff';"
                    onmouseout="this.style.backgroundColor='#ffffff';">
                    Get Started
                </a>
                <a href="auth/login.php" class="btn btn-outline-light px-4 py-2 fw-semibold rounded-pill shadow-sm"
                    style="transition: background-color 0.3s ease, color 0.3s ease;"
                    onmouseover="this.style.backgroundColor='#ffffff'; this.style.color='#6b46c1';"
                    onmouseout="this.style.backgroundColor='transparent'; this.style.color='#ffffff';">
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
                        <i class="fa-solid fa-palette fa-3x"></i>
                    </div>
                    <h3 class="text-muted" style="color: #b9bbbe;">Artists</h3>
                    <h1 id="artistCount" class="" data-count="<?php echo $artistCount; ?>"
                        style="font-weight: bold; color:#6b46c1;">0</h1>
                </div>
            </div>

            <!-- Customers Count -->
            <div class="col-md-4 mb-4">
                <div class="p-4 shadow-lg rounded" style="background: #23272a; border-radius: 20px; color: #6b46c1;">
                    <div class="icon mb-3">
                        <i class="fa-solid fa-users fa-3x"></i>
                    </div>
                    <h3 class="text-muted" style="color: #b9bbbe;">Customers</h3>
                    <h1 id="customerCount" class="" data-count="<?php echo $customerCount; ?>"
                        style="font-weight: bold; color: #6b46c1;">0</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Artworks Section with Integration -->
    <section id="artworks" class="container mt-5" data-aos="fade-in">
        <h2 class="text-center mb-4" style="color:#6b46c1;">Artist<span style="color:white;">'</span>s Featured <span
                style="background:white; padding:5px 15px; border-radius:50px;">Artworks</span></h2>
        <div class="row">
            <?php foreach ($approvedArt as $art):
                $isLiked = false;
                if ($isLoggedIn) {
                    // Check liked status (Backend Same)
                    $l_check = $conn->query("SELECT 1 FROM likes WHERE user_id = {$_SESSION['user_id']} AND artwork_id = {$art['id']}");
                    $isLiked = ($l_check && $l_check->num_rows > 0);
                }
                ?>
                <div class="col-md-4 mb-4" data-aos="zoom-in">
                    <div class="card shadow-sm artwork-card" style="border-radius:20px; background:#1a1a1a;"
                        data-artwork-id="<?php echo $art['id']; ?>">
                        <div class="heart-pop"><i class="fa-solid fa-heart"></i></div>
                        <img src="uploads/<?php echo htmlspecialchars(basename($art['image_url'])); ?>"
                            class="card-img-top fixed-image"
                            style="border-radius:20px 20px 0 0; width:100%; height:250px; object-fit:cover;"
                            alt="<?php echo htmlspecialchars($art['title']); ?>">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="card-title mb-0 text-white"><?php echo htmlspecialchars($art['title']); ?></h5>
                                <div class="d-flex align-items-center">
                                    <span class="like-count mr-2"
                                        style="font-size: 0.9rem; color: #aaa;"><?php echo isset($art['likes_count']) ? $art['likes_count'] : 0; ?></span>
                                    <button class="like-btn p-0">
                                        <i
                                            class="<?php echo $isLiked ? 'fa-solid fa-heart liked' : 'fa-regular fa-heart'; ?>"></i>
                                    </button>
                                </div>
                            </div>
                            <p class="card-text text-muted small"><?php echo htmlspecialchars($art['description']); ?></p>

                            <div class="row align-items-center mt-3">
                                <div class="col-6">
                                    <a href="views/customer_artist_profile.php?artist_id=<?php echo htmlspecialchars($art['artist_id']); ?>"
                                        class="btn w-100 btn-sm"
                                        style="color:white; background:#6b46c1; border-radius:50px;">
                                        View Profile
                                    </a>
                                </div>
                                <div class="col-6 d-flex justify-content-end gap-2">
                                    <!-- Chat link (Backend Same) -->
                                    <a href="views/chat.php?artist_id=<?php echo htmlspecialchars($art['artist_id']); ?>"
                                        class="btn d-flex align-items-center justify-content-center p-2"
                                        style="color: white; background: rgba(107, 70, 193, 0.2); border:1px solid #6b46c1; border-radius: 50%; width: 40px; height: 40px;">
                                        <i class="fa-solid fa-message"></i>
                                    </a>
                                    <button type="button" id="toggleCommand_<?php echo $art['id']; ?>"
                                        class="btn d-flex align-items-center justify-content-center p-2"
                                        style="color: white; background: #6b46c1; border-radius: 50%; width: 40px; height: 40px;">
                                        <i class="fa-solid fa-scroll"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Command Section (Original UI) -->
                            <div id="commandSection_<?php echo $art['id']; ?>" class="row align-items-center mt-3"
                                style="display: none; background:rgb(26, 26, 26); border-radius: 50px;">
                                <form action="process_command.php" method="POST" class="d-flex w-100 p-1">
                                    <div class="col-9">
                                        <input type="hidden" name="art_id"
                                            value="<?php echo htmlspecialchars($art['id']); ?>">
                                        <input type="hidden" name="artist_id"
                                            value="<?php echo htmlspecialchars($art['artist_id']); ?>">
                                        <textarea name="command_text" placeholder="Enter command..." class="form-control"
                                            style="border-radius: 20px; height: 40px; background: transparent; color: white; border:none;"
                                            required></textarea>
                                    </div>
                                    <div class="col-3">
                                        <button type="submit"
                                            class="btn d-flex align-items-center justify-content-center p-2"
                                            style="color: white; background: #6b46c1; border-radius: 50%; width: 40px; height: 40px;">
                                            <i class="fa-solid fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    document.getElementById('toggleCommand_<?php echo $art['id']; ?>').addEventListener('click', function () {
                        const cs = document.getElementById('commandSection_<?php echo $art['id']; ?>');
                        cs.style.display = cs.style.display === 'none' ? 'flex' : 'none';
                    });
                </script>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Contact Form Section (Original UI) -->
    <div class="container p-2 text-light shadow bg-container mb-5"
        style="background-image:url(assets/img/bg.jpg); border-radius:30px; background-size:cover;">
        <div class="row align-items-center p-4"
            style="background:rgba(0,0,0,0.6); backdrop-filter:blur(5px); border-radius:30px;">
            <div class="col-md-6 d-none d-md-block img-container">
                <img src="assets/img/issue.png" alt="Contact Us" class="img-fluid rounded" style="max-height:300px;">
            </div>
            <div class="col-md-6 form-container">
                <h4 class="text-white mb-4">Have Questions or Issues?</h4>
                <form action="" method="POST" class="form-content">
                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-light border-secondary rounded-pill px-3"
                            name="name" placeholder="Your Name" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control bg-dark text-light border-secondary rounded-pill px-3"
                            name="email" placeholder="Your Email" required>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control bg-dark text-light border-secondary" style="border-radius:20px;"
                            name="issue" rows="3" placeholder="Message..." required></textarea>
                    </div>
                    <button type="submit" name="submitInquiry" class="btn btn-info w-100 rounded-pill"
                        style="background:#6b46c1; border:none;">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php"; ?>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();

        // AJAX Like Logic (Backend Same)
        $(document).ready(function () {
            $(".artwork-card img").dblclick(function () {
                const card = $(this).closest(".artwork-card");
                const heart = card.find(".heart-pop");
                heart.addClass("animate");
                setTimeout(() => heart.removeClass("animate"), 800);
                triggerLike(card.data("artwork-id"), card);
            });

            $(".like-btn").click(function () {
                const card = $(this).closest(".artwork-card");
                triggerLike(card.data("artwork-id"), card);
            });

            function triggerLike(id, card) {
                $.post("api/like.php", { artwork_id: id }, function (res) {
                    if (res.status === "success") {
                        card.find(".like-count").text(res.likes_count);
                        const icon = card.find(".like-btn i");
                        if (res.action === "liked") { icon.removeClass("fa-regular").addClass("fa-solid liked"); }
                        else { icon.removeClass("fa-solid liked").addClass("fa-regular"); }
                    } else if (res.unauthorized) {
                        window.location.href = "auth/login.php";
                    } else {
                        alert(res.message || "An error occurred.");
                    }
                }, "json");
            }

            // Stats Animation
            const counters = document.querySelectorAll("h1[data-count]");
            counters.forEach(c => {
                const target = +c.getAttribute("data-count");
                let count = 0;
                const inc = target / 50;
                const updateCount = () => {
                    count += inc;
                    if (count < target) { c.innerText = Math.ceil(count); setTimeout(updateCount, 20); }
                    else { c.innerText = target; }
                };
                const obs = new IntersectionObserver(e => { if (e[0].isIntersecting) { updateCount(); obs.unobserve(c); } }, { threshold: 0.5 });
                obs.observe(c);
            });
        });
    </script>
</body>

</html>