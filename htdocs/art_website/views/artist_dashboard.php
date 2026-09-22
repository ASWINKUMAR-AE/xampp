<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'artist') {
    header("Location: ../auth/login.php");
    exit();
}

include_once "../config/db.php";
include_once "../controllers/ArtController.php";

$artController = new ArtController();
$user_id = $_SESSION['user_id'];

// 1. Fetch User Stats & Status
$user_query = $conn->prepare("SELECT * FROM users WHERE id = ?");
$user_query->bind_param("i", $user_id);
$user_query->execute();
$user = $user_query->get_result()->fetch_assoc();

if (!$user) { die("User not found."); }

$artistName = $user["username"];
$email = $user["email"];
$role = $user["role"];
$instagram = $user["instagram"] ?? '';
$facebook = $user["facebook"] ?? '';

// 2. Fetch Detailed Stats
$post_query = $conn->prepare("SELECT COUNT(*) as count FROM artworks WHERE artist_id = ?");
$post_query->bind_param("i", $user_id);
$post_query->execute();
$imageCount = $post_query->get_result()->fetch_assoc()['count'];

$order_query = $conn->prepare("SELECT COUNT(*) as count FROM commissions WHERE artist_id = ?");
$order_query->bind_param("i", $user_id);
$order_query->execute();
$orderCount = $order_query->get_result()->fetch_assoc()['count'];

$likes_query = $conn->prepare("SELECT SUM(likes_count) as total FROM artworks WHERE artist_id = ?");
$likes_query->bind_param("i", $user_id);
$likes_query->execute();
$totalLikes = $likes_query->get_result()->fetch_assoc()['total'];
$totalLikes = $totalLikes ? $totalLikes : 0;

// Fetch Recent Uploads
$uploadedArt = $artController->getArtByArtistId($user_id);

if (isset($_POST['delete'])) {
    $artId = $_POST['art_id'];
    $artController->deleteArt($artId);
    header("Location: artist_dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist Studio • Art Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root { 
            --accent: #6b46c1; 
            --accent-light: #8b5cf6;
            --accent-dark: #553c9a;
            --bg: #0a0a0f; 
            --bg-light: #12121a;
            --glass: rgba(255, 255, 255, 0.03);
            --border: rgba(255, 255, 255, 0.08);
        }
        
        * { font-family: 'Outfit', sans-serif; }
        
        body { 
            background: var(--bg); 
            color: #fff; 
            min-height: 100vh;
            overflow-x: hidden; 
        }

        .profile-header {
            background: linear-gradient(135deg, var(--accent-dark) 0%, var(--bg) 100%);
            padding: 60px 0 40px;
            position: relative;
            overflow: hidden;
        }
        
        .profile-header::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: url('../assets/img/bgnav.jpeg') center/cover;
            opacity: 0.15;
        }
        
        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid var(--accent);
            background: var(--bg);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: var(--accent);
            position: relative;
            z-index: 1;
        }
        
        .profile-info { position: relative; z-index: 1; }
        
        .profile-name {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #fff 0%, var(--accent-light) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .profile-role {
            color: var(--accent-light);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.85rem;
        }
        
        .social-links a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--glass);
            border: 1px solid var(--border);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s ease;
            margin-right: 10px;
        }
        
        .social-links a:hover {
            background: var(--accent);
            border-color: var(--accent);
            transform: translateY(-3px);
        }
        
        .edit-profile-btn {
            background: transparent;
            border: 2px solid var(--accent);
            color: #fff;
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .edit-profile-btn:hover {
            background: var(--accent);
            color: #fff;
        }

        .stats-section {
            margin-top: -30px;
            position: relative;
            z-index: 2;
        }
        
        .stat-card {
            background: var(--bg-light);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 25px;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--accent), var(--accent-light));
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-10px);
            border-color: var(--accent);
            box-shadow: 0 20px 40px rgba(107, 70, 193, 0.2);
        }
        
        .stat-card:hover::before { opacity: 1; }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            background: linear-gradient(135deg, var(--accent) 0%, var(--accent-dark) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin: 0 auto 15px;
        }
        
        .stat-number {
            font-size: 2.2rem;
            font-weight: 800;
            color: #fff;
            margin-bottom: 5px;
        }
        
        .stat-label {
            color: #888;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .gallery-section { padding: 40px 0; }
        
        .section-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .section-title i { color: var(--accent); }
        
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
        }
        
        .art-card {
            background: var(--bg-light);
            border: 1px solid var(--border);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s ease;
            position: relative;
        }
        
        .art-card:hover {
            transform: translateY(-5px);
            border-color: var(--accent);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
        }
        
        .art-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .art-card:hover .art-image { transform: scale(1.05); }
        
        .art-overlay {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, transparent 50%);
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 20px;
        }
        
        .art-card:hover .art-overlay { opacity: 1; }
        
        .art-actions {
            position: absolute;
            top: 15px;
            right: 15px;
            display: flex;
            gap: 10px;
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }
        
        .art-card:hover .art-actions {
            opacity: 1;
            transform: translateY(0);
        }
        
        .action-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: none;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .action-btn:hover {
            background: #dc3545;
            transform: scale(1.1);
        }
        
        .art-info { padding: 20px; }
        
        .art-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 8px;
            color: #fff;
        }
        
        .art-meta {
            display: flex;
            align-items: center;
            gap: 15px;
            color: #888;
            font-size: 0.85rem;
        }
        
        .art-meta i { color: var(--accent); }

        .upload-section {
            background: var(--bg-light);
            border: 1px solid var(--border);
            border-radius: 25px;
            padding: 30px;
            position: sticky;
            top: 100px;
        }
        
        .form-control-custom {
            background: var(--glass);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 15px 20px;
            color: #fff;
            width: 100%;
            transition: all 0.3s ease;
        }
        
        .form-control-custom:focus {
            outline: none;
            border-color: var(--accent);
            background: rgba(107, 70, 193, 0.05);
        }
        
        .form-control-custom::placeholder { color: #666; }
        
        textarea.form-control-custom {
            resize: none;
            min-height: 100px;
        }
        
        .btn-primary-custom {
            background: linear-gradient(135deg, var(--accent) 0%, var(--accent-dark) 100%);
            border: none;
            border-radius: 12px;
            padding: 15px 30px;
            color: #fff;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(107, 70, 193, 0.4);
        }

        .empty-state {
            text-align: center;
            padding: 80px 20px;
            color: #666;
        }
        
        .empty-state i {
            font-size: 4rem;
            color: var(--accent);
            margin-bottom: 20px;
            opacity: 0.5;
        }

        .modal-content {
            background: var(--bg-light);
            border: 1px solid var(--border);
            border-radius: 25px;
        }
        
        .modal-header { border-bottom: 1px solid var(--border); }
        .modal-footer { border-top: 1px solid var(--border); }
        .btn-close-white { filter: invert(1); }

        @media (max-width: 768px) {
            .profile-name { font-size: 1.8rem; }
            .gallery-grid { grid-template-columns: 1fr; }
            .upload-section { position: static; margin-top: 30px; }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        .floating { animation: float 3s ease-in-out infinite; }
    </style>
</head>
<body>
    <!-- Navbar -->
    <?php include_once "../controllers/navbar.php"; ?>

    <!-- Profile Header -->
    <section class="profile-header" data-aos="fade-down">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-auto mb-3 mb-md-0">
                    <div class="profile-avatar">
                        <i class="fa-solid fa-user"></i>
                    </div>
                </div>
                <div class="col-md">
                    <div class="profile-info">
                        <div class="profile-role">Artist Account</div>
                        <h1 class="profile-name"><?php echo htmlspecialchars($artistName); ?></h1>
                        <p class="text-white-50 mb-3">
                            <i class="fa-solid fa-envelope me-2"></i><?php echo htmlspecialchars($email); ?>
                        </p>
                        <div class="social-links">
                            <?php if ($instagram): ?>
                                <a href="https://instagram.com/<?php echo htmlspecialchars($instagram); ?>" target="_blank">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            <?php endif; ?>
                            <?php if ($facebook): ?>
                                <a href="https://facebook.com/<?php echo htmlspecialchars($facebook); ?>" target="_blank">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                            <?php endif; ?>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#uploadDataModal">
                                <i class="fa-solid fa-gear"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-auto mt-3 mt-md-0">
                    <button class="edit-profile-btn" data-bs-toggle="modal" data-bs-target="#uploadDataModal">
                        <i class="fa-solid fa-pen-to-square me-2"></i>Edit Profile
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section" data-aos="fade-up" data-aos-delay="200">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fa-solid fa-image"></i>
                        </div>
                        <div class="stat-number"><?php echo $imageCount; ?></div>
                        <div class="stat-label">Artworks</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                        <div class="stat-number"><?php echo $totalLikes; ?></div>
                        <div class="stat-label">Total Likes</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fa-solid fa-briefcase"></i>
                        </div>
                        <div class="stat-number"><?php echo $orderCount; ?></div>
                        <div class="stat-label">Commissions</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="gallery-section">
        <div class="container">
            <div class="row">
                <!-- Gallery -->
                <div class="col-lg-8">
                    <h2 class="section-title" data-aos="fade-right">
                        <i class="fa-solid fa-palette"></i>
                        My Gallery
                    </h2>
                    
                    <?php if (!empty($uploadedArt)): ?>
                        <div class="gallery-grid" data-aos="fade-up">
                            <?php foreach ($uploadedArt as $art): ?>
                                <div class="art-card">
                                    <div style="position: relative; overflow: hidden;">
                                        <img src="<?php echo htmlspecialchars($art['image_url']); ?>" 
                                             alt="<?php echo htmlspecialchars($art['title']); ?>" 
                                             class="art-image">
                                        <div class="art-overlay">
                                            <h5 class="art-title"><?php echo htmlspecialchars($art['title']); ?></h5>
                                            <p class="text-white-50 small"><?php echo htmlspecialchars(substr($art['description'], 0, 100)) . '...'; ?></p>
                                        </div>
                                        <div class="art-actions">
                                            <form method="POST" action="" onsubmit="return confirm('Delete this artwork?');" style="display: inline;">
                                                <input type="hidden" name="art_id" value="<?php echo $art['id']; ?>">
                                                <button type="submit" name="delete" class="action-btn" title="Delete">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="art-info">
                                        <h5 class="art-title"><?php echo htmlspecialchars($art['title']); ?></h5>
                                        <div class="art-meta">
                                            <span><i class="fa-solid fa-heart me-1"></i> <?php echo $art['likes_count'] ?? 0; ?> likes</span>
                                            <span><i class="fa-solid fa-calendar me-1"></i> <?php echo date('M d', strtotime($art['created_at'])); ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="empty-state" data-aos="fade-up">
                            <i class="fa-solid fa-images floating"></i>
                            <h4>No Artworks Yet</h4>
                            <p>Upload your first masterpiece to get started!</p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Upload Sidebar -->
                <div class="col-lg-4">
                    <div class="upload-section" data-aos="fade-left">
                        <h4 class="mb-4"><i class="fa-solid fa-cloud-arrow-up me-2" style="color: var(--accent);"></i>Upload New Art</h4>
                        
                        <form action="../controllers/ArtController.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="artist_id" value="<?php echo $user_id; ?>">
                            
                            <div class="mb-3">
                                <label class="form-label text-white-50 mb-2">Artwork Title</label>
                                <input type="text" name="title" class="form-control-custom" placeholder="Enter title..." required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label text-white-50 mb-2">Description</label>
                                <textarea name="description" class="form-control-custom" placeholder="Tell the story behind your art..." required></textarea>
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label text-white-50 mb-2">Choose Image</label>
                                <input type="file" name="art_image" class="form-control-custom" accept="image/*" required 
                                       onchange="previewImage(this)" id="imageInput">
                                <div id="imagePreview" class="mt-3" style="display: none;">
                                    <img src="" alt="Preview" style="width: 100%; border-radius: 12px; max-height: 200px; object-fit: cover;">
                                </div>
                            </div>
                            
                            <button type="submit" name="upload" class="btn-primary-custom">
                                <i class="fa-solid fa-upload me-2"></i>Publish Artwork
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Profile Edit Modal -->
    <div class="modal fade" id="uploadDataModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold"><i class="fa-solid fa-user-pen me-2" style="color: var(--accent);"></i>Edit Profile</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form method="POST" action="../controllers/ArtController.php">
                        <input type="hidden" name="artist_id" value="<?php echo $user_id; ?>">
                        
                        <div class="mb-3">
                            <label class="form-label text-white-50">Username</label>
                            <input type="text" class="form-control-custom" name="artistName" 
                                   value="<?php echo htmlspecialchars($artistName); ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label text-white-50">Email Address</label>
                            <input type="email" class="form-control-custom" name="email" 
                                   value="<?php echo htmlspecialchars($email); ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label text-white-50">Instagram</label>
                            <div class="input-group">
                                <span class="input-group-text" style="background: var(--glass); border: 1px solid var(--border); color: #888; border-radius: 12px 0 0 12px;">@</span>
                                <input type="text" class="form-control-custom" name="instagram" 
                                       value="<?php echo htmlspecialchars($user['instagram'] ?? ''); ?>" 
                                       style="border-radius: 0 12px 12px 0;">
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label text-white-50">Facebook</label>
                            <input type="text" class="form-control-custom" name="facebook" 
                                   value="<?php echo htmlspecialchars($user['facebook'] ?? ''); ?>">
                        </div>
                        
                        <button type="submit" name="upload_artist_data" class="btn-primary-custom">
                            <i class="fa-solid fa-save me-2"></i>Save Changes
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({ once: true, duration: 800, offset: 50 });

        function previewImage(input) {
            const preview = document.getElementById('imagePreview');
            const img = preview.querySelector('img');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    img.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>
