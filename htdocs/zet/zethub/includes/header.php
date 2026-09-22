<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zethub</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/aos.css">
    <link rel="stylesheet" href="/assets/css/dark-mode.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/index.php">Zethub</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <?php if (isset($_SESSION['user_id'])): ?>
                <li class="nav-item"><a href="/users/logout.php" class="nav-link">Logout</a></li>
            <?php else: ?>
                <li class="nav-item"><a href="/users/login.php" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="/users/register.php" class="nav-link">Register</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
