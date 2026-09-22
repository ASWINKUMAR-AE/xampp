<?php
$isLoggedIn = isset($_SESSION['user_id']);
$role = $isLoggedIn ? $_SESSION['role'] : null;
?>
<br class="add">
<center>
<nav class="navbar navbar-expand-lg shadow-lg col-12 " 
    data-aos="fade-down" 
    data-aos-duration="1000" 
    data-aos-delay="300"
    style="
        border-radius:50px 50px 0px 0px;
        z-index: 1050; /* Ensures it stays above other elements */
        position: sticky; /* Makes it visible on scroll */
    "
>
    <div 
        class="container d-flex justify-content-between navbar-dark align-items-center h-16 col-12 col-md-9 nav"
        style="
            border-radius:50px; 
            padding:15px; 
            padding-left:30px; 
            padding-right:30px; 
            background-image:url(assets/img/bg.jpg);
        "
    >
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="/">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16" style="color:#6b46c1 !important;">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2L14 4.793 13.5 5.5 10.707 2.707 11.207 2zM2 13.5l1.5-.5L3.207 12l-1.5.5a.5.5 0 0 0-.11.168l-1.287 3.218 3.218-1.287a.5.5 0 0 0 .168-.11l.5-1.5L2 13.5z" />
            </svg>
            <span class="ms-2 fw-bold text-white">Art <span style="color:#08080888 !important;">Here</span></span>
        </a>

        <!-- Toggle button for mobile -->
        <button 
            class="navbar-toggler" 
            type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#navbarNav" 
            aria-controls="navbarNav" 
            aria-expanded="false" 
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="/">Home</a>
                </li>

                <?php if ($isLoggedIn): ?>
                    <?php if ($role === 'artist'): ?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="views/artist_dashboard.php">Artist Dashboard</a>
                        </li>
                    <?php elseif ($role === 'customer'): ?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="views/customer_dashboard.php">Customer Dashboard</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <span class="nav-link text-white">Welcome, <strong><?= htmlspecialchars($_SESSION['username']) ?></strong></span>
                    </li>
                    <li class="nav-item">
                        <form action="views/logout.php" method="POST" class="d-inline">
                            <button type="submit" class="btn btn-danger btn-sm" style="border-radius:50px !important;">Logout</button>
                        </form>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="views/login.php">Login</a>
                    </li>
                    <li class="nav-item" style="background:#6b46c1 !important; border-radius:50px !important;">
                        <a class="nav-link btn text-white px-4" href="views/register.php">Get Started</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Add top margin to prevent overlap -->
<style>
    body {
      
    }

    @media (max-width: 992px) {
        .nav {
            width: 100%; /* Adjusted to fit screen */
            border-radius: 50px !important;
        }
        nav {
            margin-bottom: 25px !important;
            background: none;
        }
        .add {
            display: none;
        }
    }
</style>


<!-- Include Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
