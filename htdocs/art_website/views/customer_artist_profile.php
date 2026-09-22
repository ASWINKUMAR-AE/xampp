<?php
session_start();
// Centralized DB connection (Backend Same)
include_once "../config/db.php";
include_once "../controllers/ArtController.php";

$isLoggedIn = isset($_SESSION['user_id']);
$role = $isLoggedIn ? $_SESSION['role'] : null;
$current_user_id = $isLoggedIn ? $_SESSION['user_id'] : null;

// Validate Artist ID
if (!isset($_GET['artist_id'])) {
    header("Location: ../index.php");
    exit;
}

$artist_id = (int)$_GET['artist_id'];

// 1. Fetch Artist Data (Fixing "non-object" by checking results)
$artist_query = $conn->prepare("SELECT * FROM users WHERE id = ? AND role = 'artist'");
$artist_query->bind_param("i", $artist_id);
$artist_query->execute();
$artist_result = $artist_query->get_result();

if ($artist_result->num_rows === 0) {
    die("Artist not found.");
}

$artist = $artist_result->fetch_assoc();
$artistName = $artist["username"];
$email = $artist["email"];
$instagram = $artist["instagram"];
$facebook = $artist["facebook"];

// 2. Fetch Artworks (Fixing table name 'art' -> 'artworks')
$art_query = $conn->prepare("SELECT * FROM artworks WHERE artist_id = ? AND status = 'approved' ORDER BY id DESC");
$art_query->bind_param("i", $artist_id);
$art_query->execute();
$art_result = $art_query->get_result();
$artworks = [];
while ($row = $art_result->fetch_assoc()) {
    $artworks[] = $row;
}
$artworkCount = count($artworks);

// 3. Fetch Likes for Current User (Fixing 'liked' -> 'likes' and Undefined Index)
$liked_ids = [];
if ($isLoggedIn) {
    $liked_query = $conn->prepare("SELECT artwork_id FROM likes WHERE user_id = ?");
    $liked_query->bind_param("i", $current_user_id);
    $liked_query->execute();
    $liked_result = $liked_query->get_result();
    while ($row = $liked_result->fetch_assoc()) {
        $liked_ids[] = $row['artwork_id'];
    }
}

// 4. Calculate total likes gained by artist
$total_likes_query = $conn->prepare("SELECT SUM(likes_count) as total FROM artworks WHERE artist_id = ?");
$total_likes_query->bind_param("i", $artist_id);
$total_likes_query->execute();
$total_likes = $total_likes_query->get_result()->fetch_assoc()['total'];
$total_likes = $total_likes ? $total_likes : 0;

// 5. Fetch Artwork Commands (Comments) and commenter names
$commands_by_art = [];
$cmd_query = $conn->prepare("
    SELECT ac.*, u.username as commenter_name 
    FROM artwork_commands ac 
    JOIN users u ON ac.user_id = u.id 
    WHERE ac.artist_id = ? 
    ORDER BY ac.created_at ASC
");
$cmd_query->bind_param("i", $artist_id);
$cmd_query->execute();
$cmd_result = $cmd_query->get_result();
while ($row = $cmd_result->fetch_assoc()) {
    $commands_by_art[$row['art_id']][] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($artistName); ?> (@<?php echo htmlspecialchars($artistName); ?>) • Art Marketplace</title>
    <!-- Bootstrap 5 & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    
    <style>
        :root { --accent: #6b46c1; --bg: #000; --card: #121212; }
        body { background-color: var(--bg); color: #fff; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; }
        
        /* Instagram Header Style */
        .profile-header { padding: 40px 0; border-bottom: 1px solid #262626; margin-bottom: 40px; }
        .profile-avatar { width: 150px; height: 150px; border-radius: 50%; overflow: hidden; border: 3px solid #262626; padding: 5px; }
        .profile-avatar img { width: 100%; height: 100%; object-fit: cover; border-radius: 50%; }
        
        .stat-item { text-align: center; margin-right: 40px; }
        .stat-count { font-weight: 700; font-size: 1.2rem; display: block; }
        .stat-label { color: #8e8e8e; font-size: 0.9rem; }
        
        .btn-action { border-radius: 50px !important; font-weight: 600; padding: 8px 25px; transition: 0.2s; }
        .btn-message { background: #262626; color: #fff; border: none; }
        .btn-message:hover { background: #363636; }
        .btn-follow { background: var(--accent); color: #fff; border: none; }
        .btn-follow:hover { background: #7c4dff; }
        
        /* IG Grid Layout */
        .art-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 28px; }
        .art-item { position: relative; aspect-ratio: 1 / 1; border-radius: 15px; overflow: hidden; cursor: pointer; }
        .art-item img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s; }
        .art-item:hover img { transform: scale(1.1); }
        
        .art-overlay {
            position: absolute; top:0; left:0; width:100%; height:100%;
            background: rgba(0,0,0,0.4); display: flex; align-items: center; justify-content: center;
            opacity: 0; transition: opacity 0.3s;
        }
        .art-item:hover .art-overlay { opacity: 1; }
        .overlay-stats { font-size: 1.2rem; font-weight: 700; }

        /* Heart Animation */
        .heart-pop {
            position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%) scale(0);
            font-size: 5rem; color: #fff; text-shadow: 0 0 20px rgba(0,0,0,0.5); pointer-events: none; z-index: 10;
        }
        .heart-pop.animate { animation: heartPop 0.8s ease-out; }
        @keyframes heartPop { 
            0% { transform: translate(-50%, -50%) scale(0); opacity: 0; }
            50% { transform: translate(-50%, -50%) scale(1.5); opacity: 1; }
            100% { transform: translate(-50%, -50%) scale(1); opacity: 0; }
        }

        .like-icon { cursor: pointer; transition: color 0.2s; }
        .like-icon.liked { color: #ff3b5c !important; }
        
        @media (max-width: 768px) {
            .art-grid { gap: 3px; grid-template-columns: repeat(3, 1fr); }
            .art-item { border-radius: 0; }
            .profile-avatar { width: 80px; height: 80px; }
            .stat-item { margin-right: 20px; }
        }

        /* BEST UI: Commands Section Overhaul */
        .comments-section {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 25px;
            padding: 20px;
            margin-top: 10px;
            display: none;
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }
        .comment-item { 
            margin-bottom: 12px; 
            padding-bottom: 8px; 
            border-bottom: 1px solid rgba(255,255,255,0.05); 
            font-size: 14px;
        }
        .commenter-name { color: var(--accent); font-weight: 700; margin-right: 10px; }
        
        .btn-toggle-comments { 
            cursor: pointer; 
            color: #aaa; 
            font-size: 12px; 
            margin-top: 12px; 
            display: inline-block; 
            border-radius: 50px !important; 
            padding: 8px 18px; 
            background: rgba(255,255,255,0.08); 
            text-decoration: none; 
            border: 1px solid rgba(255,255,255,0.1); 
            transition: 0.3s;
            width: 100%;
            text-align: left;
        }
        .btn-toggle-comments:hover { color: #fff; background: rgba(255,255,255,0.15); border-color: var(--accent); }

        .command-form { margin-top: 15px; display: flex; gap: 10px; align-items: center; }
        .command-input { 
            border-radius: 50px !important; 
            background: rgba(255,255,255,0.05) !important; 
            border: 1px solid rgba(255,255,255,0.2) !important; 
            color: #fff !important; 
            flex: 1; 
            padding: 10px 20px; 
            font-size: 14px; 
            outline: none !important; 
            box-shadow: none !important; 
        }
        .command-input::placeholder { color: rgba(255,255,255,0.4); }
        .command-input:focus { border-color: var(--accent) !important; background: rgba(255,255,255,0.1) !important; }
        
        .btn-send-cmd { 
            background: var(--accent); 
            color: #fff; 
            border: none; 
            border-radius: 50% !important; 
            width: 40px; 
            height: 40px; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            outline: none !important; 
            box-shadow: none !important; 
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); 
            padding: 0;
            margin: 0 !important;
        }
        .btn-send-cmd:hover { transform: scale(1.1); background: #7c4dff; }
        .btn-send-cmd:active { transform: scale(0.9); }
    </style>
</head>
<body>

    <!-- Include Navbar -->
    <?php include_once "../controllers/navbar.php";?>

    <div class="container py-4">
        <!-- Instagram Style Profile Header -->
        <header class="profile-header px-3">
            <div class="row align-items-center">
                <div class="col-md-4 d-flex justify-content-center mb-4 mb-md-0" data-aos="zoom-in">
                    <div class="profile-avatar">
                        <!-- Using a default artist placeholder -->
                        <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($artistName); ?>&background=6b46c1&color=fff&size=512" alt="Avatar">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="d-flex align-items-center flex-wrap mb-4" data-aos="fade-right">
                        <h2 class="fw-light display-6 me-4 mb-2 mb-md-0"><?php echo htmlspecialchars($artistName); ?></h2>
                        <div class="d-flex gap-2">
                            <a href="chat.php?artist_id=<?php echo $artist_id; ?>" class="btn btn-action btn-message">Message</a>
                            <a href="order.php?artist_id=<?php echo $artist_id; ?>" class="btn btn-action btn-follow">Commission</a>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="stat-item">
                            <span class="stat-count"><?php echo $artworkCount; ?></span>
                            <span class="stat-label">posts</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-count"><?php echo $total_likes; ?></span>
                            <span class="stat-label">hearts</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-count">0</span>
                            <span class="stat-label">followers</span>
                        </div>
                    </div>
                    
                    <div data-aos="fade-up" data-aos-delay="400">
                        <p class="fw-bold mb-1"><?php echo htmlspecialchars($artistName); ?></p>
                        <p class="mb-2 text-muted">Artist & Visionary</p>
                        <div class="d-flex gap-3 small">
                            <?php if ($instagram): ?>
                                <a href="https://instagram.com/<?php echo $instagram; ?>" class="text-white text-decoration-none"><i class="fa-brands fa-instagram"></i> <?php echo htmlspecialchars($instagram); ?></a>
                            <?php endif; ?>
                            <?php if ($facebook): ?>
                                <a href="https://facebook.com/<?php echo $facebook; ?>" class="text-white text-decoration-none"><i class="fa-brands fa-facebook"></i> <?php echo htmlspecialchars($facebook); ?></a>
                            <?php endif; ?>
                            <span class="text-muted"><i class="fa-solid fa-envelope"></i> <?php echo htmlspecialchars($email); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Gallery Tabs -->
        <div class="d-flex justify-content-center border-top border-secondary mb-4">
            <div class="pt-3 border-top border-white" style="margin-top: -1px;">
                <span class="text-uppercase small fw-bold" style="letter-spacing: 1px;"><i class="fa-solid fa-table-cells me-2"></i> POSTS</span>
            </div>
        </div>

        <!-- Instagram Grid -->
        <div class="art-grid mb-5">
            <?php foreach ($artworks as $artwork): 
                $isLiked = in_array($artwork['id'], $liked_ids);
            ?>
                <div class="art-card-container mb-5" data-aos="fade-up">
                    <div class="art-item shadow" data-artwork-id="<?php echo $artwork['id']; ?>">
                        <div class="heart-pop"><i class="fa-solid fa-heart"></i></div>
                        <img src="../uploads/<?php echo htmlspecialchars(basename($artwork['image_url'])); ?>" alt="Artwork">
                        <div class="art-overlay">
                            <div class="overlay-stats text-white">
                                <span class="me-4"><i class="fa-solid fa-heart me-2"></i> <span class="like-count"><?php echo $artwork['likes_count']; ?></span></span>
                                <?php $cmdCount = isset($commands_by_art[$artwork['id']]) ? count($commands_by_art[$artwork['id']]) : 0; ?>
                                <span><i class="fa-solid fa-comment me-2"></i> <?php echo $cmdCount; ?></span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- BEST UI: Commands Toggle Pill -->
                    <div class="px-2">
                        <button class="btn-toggle-comments" onclick="$(this).parent().next('.comments-section').slideToggle();">
                            <i class="fa-solid fa-comments me-2 opacity-75"></i> 
                            <?php echo $cmdCount > 0 ? "View all $cmdCount commands" : "Leave a command"; ?>
                        </button>
                    </div>
                    
                    <div class="comments-section mx-2">
                        <div class="max-comments-list" style="max-height: 200px; overflow-y: auto;">
                            <?php if ($cmdCount > 0): ?>
                                <?php foreach ($commands_by_art[$artwork['id']] as $cmd): ?>
                                    <div class="comment-item">
                                        <span class="commenter-name"><?php echo htmlspecialchars($cmd['commenter_name']); ?></span>
                                        <span class="opacity-75"><?php echo htmlspecialchars($cmd['command_text']); ?></span>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p class="text-muted small mb-0 px-2 py-1">No commands yet. Be the first to start the conversation!</p>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Mini Command Form -->
                        <div class="pt-3 mt-2 border-top border-secondary">
                            <?php if ($isLoggedIn): ?>
                                <form action="../process_command.php" method="POST" class="command-form">
                                    <input type="hidden" name="art_id" value="<?php echo $artwork['id']; ?>">
                                    <input type="hidden" name="artist_id" value="<?php echo $artist_id; ?>">
                                    <input type="text" name="command_text" class="command-input" placeholder="Type your command..." required autocomplete="off">
                                    <button type="submit" class="btn-send-cmd"><i class="fa-solid fa-paper-plane small"></i></button>
                                </form>
                            <?php else: ?>
                                <div class="text-center py-2">
                                    <a href="../auth/login.php" class="text-accent small text-decoration-none fw-bold">Log in to leave a command</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-5 bg-dark text-center text-muted small">
        <p>&copy; <?php echo date("Y"); ?> ART HERE. ALL RIGHTS RESERVED.</p>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({ once: true });

        $(document).ready(function() {
            // Instagram double-click to like
            $(".art-item").dblclick(function() {
                const item = $(this);
                const heart = item.find(".heart-pop");
                heart.addClass("animate");
                setTimeout(() => heart.removeClass("animate"), 800);
                triggerLike(item.data("artwork-id"), item);
            });

            function triggerLike(id, item) {
                // Point to current root-relative API
                $.post("../api/like.php", { artwork_id: id }, function(res) {
                    if(res.status === "success") {
                        item.find(".like-count").text(res.likes_count);
                        // No toggle color needed in IG grid style unless we add a small icon
                    } else if(res.unauthorized) {
                        window.location.href = "../auth/login.php";
                    } else {
                        alert(res.message || "An error occurred.");
                    }
                }, "json");
            }
        });
    </script>
</body>
</html>
