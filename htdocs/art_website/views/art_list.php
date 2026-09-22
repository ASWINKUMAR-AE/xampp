<?php
session_start();
// Include Database and Controllers
$baseUrl = '../';
include_once "../config/db.php";
include_once "../controllers/ArtController.php";

$isLoggedIn = isset($_SESSION['user_id']);
$role = $isLoggedIn ? $_SESSION['role'] : null;

// Controller and Data Fetching
$artController = new ArtController();
$approvedArt = $artController::getApprovedArt();

// Set Page Title for Header
$pageTitle = "Art Gallery - Explore Featured Artworks";
include_once '../includes/header.php';
?>

<!-- Gallery Header -->
<section class="py-5 text-center bg-dark" style="background-image: url('../assets/img/bg.jpg'); background-size: cover; border-bottom: 1px solid rgba(255,255,255,0.05);">
    <div class="container py-4">
        <h1 class="display-4 fw-bold">Our <span class="text-purple">Gallery</span></h1>
        <p class="lead text-muted">Explore the finest pieces from our talented artist community</p>
    </div>
</section>

<!-- Artworks Grid -->
<section class="container my-5 pt-4">
    <div class="row">
        <?php if (!empty($approvedArt)): ?>
            <?php foreach ($approvedArt as $art): 
                $isLiked = false;
                if ($isLoggedIn) {
                    $checkLiked = $conn->query("SELECT 1 FROM likes WHERE user_id = {$_SESSION['user_id']} AND artwork_id = {$art['id']}");
                    $isLiked = ($checkLiked && $checkLiked->num_rows > 0);
                }
            ?>
                <div class="col-md-4 mb-5" data-aos="zoom-in">
                    <div class="artwork-card shadow-lg" data-artwork-id="<?php echo $art['id']; ?>">
                        <div class="artwork-img-container">
                            <img 
                                src="../uploads/<?php echo htmlspecialchars(basename($art['image_url'])); ?>" 
                                class="artwork-img" 
                                alt="<?php echo htmlspecialchars($art['title']); ?>"
                            >
                        </div>
                        
                        <div class="card-body bg-dark text-white p-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="card-title mb-0 fw-bold"><?php echo htmlspecialchars($art['title']); ?></h5>
                                <div class="d-flex align-items-center">
                                    <span class="like-count mr-2" style="font-size: 0.9rem; color: #aaa;"><?php echo isset($art['likes_count']) ? $art['likes_count'] : 0; ?></span>
                                    <button class="like-btn p-0">
                                        <i class="<?php echo $isLiked ? 'fa-solid fa-heart text-danger' : 'fa-regular fa-heart'; ?>"></i>
                                    </button>
                                </div>
                            </div>
                            <p class="card-text small text-muted mb-4"><?php echo htmlspecialchars($art['description']); ?></p>
                            
                            <div class="d-flex gap-2">
                                <a href="customer_artist_profile.php?artist_id=<?php echo htmlspecialchars($art['artist_id']); ?>"
                                   class="btn btn-sm btn-outline-light rounded-pill flex-grow-1 py-2">Profile</a>
                                <a href="chat.php?artist_id=<?php echo htmlspecialchars($art['artist_id']); ?>"
                                   class="btn btn-sm btn-purple rounded-circle d-flex align-items-center justify-content-center"
                                   style="width: 40px; height: 40px; background: #6b46c1; color: white;">
                                    <i class="fa-solid fa-paper-plane" style="font-size: 0.8rem;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center py-5">
                <i class="fa-solid fa-image fa-4x mb-3 text-muted opacity-25"></i>
                <h4 class="text-muted">No artworks found</h4>
                <a href="../index.php" class="btn btn-primary mt-3 rounded-pill px-4">Go Home</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php include_once '../includes/footer.php'; ?>
