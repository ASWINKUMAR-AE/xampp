<?php
// Smart Base Path Detection
// This logic calculates the relative path back to the project root
// to ensure links and assets work from any subdirectory (e.g. /auth or /views)
$current_dir = dirname($_SERVER['PHP_SELF']);
$dir_parts = explode('/', trim($current_dir, '/'));
$depth = 0;

// Filter out the project root folder name if needed
// For local XAMPP art_website, it should look for 'art_website'
$project_root = 'art_website';
$found_root = false;
$up_count = 0;

for ($i = count($dir_parts) - 1; $i >= 0; $i--) {
    if ($dir_parts[$i] == $project_root) {
        $found_root = true;
        break;
    }
    $up_count++;
}

$base = "";
if ($found_root) {
    for ($i = 0; $i < $up_count; $i++) {
        $base .= "../";
    }
}

$isLoggedIn = isset($_SESSION['user_id']);
$role = $isLoggedIn ? $_SESSION['role'] : null;
?>
<center>
<nav class="navbar navbar-expand-lg shadow-lg col-12 floating-nav" 
    data-aos="fade-down" 
    data-aos-duration="1000" 
    style="z-index: 1050; position: sticky; top: 20px; margin-top: 20px;"
>
    <div 
        class="container d-flex justify-content-between navbar-dark align-items-center h-16 col-12 col-md-9 nav-pilled"
        style="
            border-radius: 50px; 
            padding: 12px 30px; 
            background-image: url(<?php echo $base; ?>assets/img/bg.jpg);
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        "
    >
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="<?php echo $base; ?>index.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16" style="color:#6b46c1 !important;">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2L14 4.793 13.5 5.5 10.707 2.707 11.207 2zM2 13.5l1.5-.5L3.207 12l-1.5.5a.5.5 0 0 0-.11.168l-1.287 3.218 3.218-1.287a.5.5 0 0 0 .168-.11l.5-1.5L2 13.5z" />
            </svg>
            <span class="ms-2 fw-bold text-white">Art <span style="color:#000; opacity: 0.6;">Market</span></span>
        </a>

        <!-- Toggle button for mobile -->
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold px-3" href="<?php echo $base; ?>index.php">Home</a>
                </li>

                <?php if ($isLoggedIn): ?>
                    <?php if ($role === 'artist'): ?>
                        <li class="nav-item">
                            <a class="nav-link text-white fw-semibold px-3" href="<?php echo $base; ?>views/artist_dashboard.php">Dashboard</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link text-white fw-semibold px-3" href="<?php echo $base; ?>views/customer_dashboard.php">Dashboard</a>
                        </li>
                    <?php endif; ?>
                    
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold px-3" href="<?php echo $base; ?>views/chat.php"><i class="fa-solid fa-message small opacity-75"></i> Messages</a>
                    </li>

                    <li class="nav-item ms-lg-3">
                        <form action="<?php echo $base; ?>controllers/UserController.php" method="POST" class="m-0">
                            <button type="submit" name="logout" class="btn btn-outline-light btn-sm rounded-pill px-4 py-2 border-opacity-25" style="font-size: 11px; letter-spacing: 1px; font-weight: 700;">LOGOUT</button>
                        </form>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold px-3" href="<?php echo $base; ?>auth/login.php">Login</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-primary rounded-pill px-5 py-2 fw-bold" href="<?php echo $base; ?>auth/register.php" style="background: #6b46c1; border: none; font-size: 14px;">Sign Up</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
</center>

<style>
    .floating-nav { transition: all 0.3s ease; }
    .nav-link { position: relative; }
    .nav-link::after {
        content: ''; position: absolute; bottom: 0; left: 15%; width: 0; height: 2px;
        background: #6b46c1; transition: width 0.3s;
    }
    .nav-link:hover::after { width: 70%; }
    
    @media (max-width: 991px) {
        .nav-pilled { border-radius: 30px !important; margin: 0 15px; }
        .navbar-collapse { background: rgba(0,0,0,0.8); border-radius: 20px; padding: 20px; margin-top: 15px; backdrop-filter: blur(10px); }
    }
</style>
<!-- Premium Scroll to Top Icon -->
<button id='backToTop' class='back-to-top'><i class='fa-solid fa-arrow-up'></i></button>
<script>if(typeof bttInit==='undefined'){window.addEventListener('scroll',function(){const b=document.getElementById('backToTop');if(b){if(window.pageYOffset>300)b.classList.add('visible');else b.classList.remove('visible');}});document.addEventListener('click',function(e){if(e.target&&e.target.id==='backToTop'||e.target.closest('#backToTop'))window.scrollTo({top:0,behavior:'smooth'});});var bttInit=true;}</script>
