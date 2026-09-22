<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Art Marketplace</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #007bff;
            --bg-dark: #2c2f33;
            --accent: #6b46c1;
            --error-bg: #f8d7da;
            --error-text: #721c24;
            --error-border: #f5c6cb;
            --pink-alert: #fddde1;
        }

        body {
            background-color: #2c2f33;
            color: #fff;
            font-family: 'Outfit', sans-serif;
            margin: 0;
            overflow-x: hidden;
        }

        /* Top Bar Alert - Screenshot Match */
        .top-alert {
            width: 100%;
            background-color: var(--pink-alert);
            color: #721c24;
            padding: 10px 20px;
            font-size: 14px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 2000;
            display: <?php echo isset($_SESSION['login_error']) ? 'block' : 'none'; ?>;
        }

        .main-wrapper {
            display: flex;
            min-height: 100vh;
            align-items: center;
        }

        /* Split Layout */
        .login-side {
            flex: 0 0 500px;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
            background-color: #2c2f33;
        }

        .illustration-side {
            flex: 1;
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
        }

        .illustration-container {
            width: 80%;
            max-width: 600px;
        }

        /* Login Card - Screenshot Style */
        .login-card {
            background: linear-gradient(135deg, #3a3f47, #2c313a);
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
            border: 1px solid rgba(255,255,255,0.05);
        }

        .login-card h1 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 25px;
            color: #fff;
        }

        /* Custom Error Box inside Form - Screenshot Match */
        .validation-alert {
            background-color: var(--pink-alert);
            color: #ad2d3b;
            padding: 15px;
            border-radius: 5px;
            font-size: 13px;
            margin-bottom: 20px;
            border-left: 5px solid #ad2d3b;
            display: none; /* Controlled by JS */
        }

        .form-control {
            background: #fff;
            border: none;
            border-radius: 50px;
            padding: 12px 25px;
            height: 50px;
            margin-bottom: 15px;
            font-size: 15px;
            color: #333;
        }

        .password-wrapper {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 20px;
            top: 15px;
            color: #666;
            cursor: pointer;
        }

        .btn-login {
            background: var(--primary);
            color: #fff;
            border: none;
            border-radius: 50px;
            padding: 12px;
            font-weight: 600;
            width: 100%;
            margin-top: 10px;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

        .signup-link {
            display: block;
            text-align: center;
            margin-top: 25px;
            color: #0d6efd;
            text-decoration: none;
            font-weight: 600;
        }

        @media (max-width: 991px) {
            .illustration-side { display: none; }
            .login-side { flex: 1; height: 100vh; }
            .login-card { max-width: 100%; }
        }
    </style>
</head>
<body>

    <!-- Top Bar Alert -->
    <?php if (isset($_SESSION['login_error'])): ?>
    <div class="top-alert">
        <?php echo $_SESSION['login_error']; unset($_SESSION['login_error']); ?>
    </div>
    <?php endif; ?>

    <div class="main-wrapper">
        <!-- Form Side -->
        <div class="login-side">
            <div class="login-card">
                <h1>Login</h1>
                
                <!-- Alert for server-side errors -->
                <?php if (isset($_SESSION['login_error'])): ?>
                <div class="validation-alert" style="display: block;">
                    <?php echo $_SESSION['login_error']; unset($_SESSION['login_error']); ?>
                </div>
                <?php endif; ?>

                <form id="loginForm" action="../controllers/UserController.php" method="POST">
                    <input type="text" 
                           class="form-control" 
                           name="username" 
                           id="username" 
                           placeholder="Username or Email" 
                           required>
                    
                    <div class="password-wrapper">
                        <input type="password" 
                               class="form-control" 
                               name="password" 
                               id="password" 
                               placeholder="Password" 
                               required>
                        <i class="fa fa-eye password-toggle" id="togglePassword"></i>
                    </div>

                    <button type="submit" name="login" class="btn btn-login shadow-lg">Login</button>
                    
                    <a href="register.php" class="signup-link">Create a new Account?</a>
                </form>
            </div>
        </div>

        <!-- Image Side -->
        <div class="illustration-side" style="background-image: url('../assets/img/login.jpg'); background-size: cover; background-position: center;">
            <div class="w-100 h-100 d-flex flex-column justify-content-center align-items-center text-center p-5" 
                 style="background: linear-gradient(to bottom, transparent, rgba(0,0,0,0.8));">
                <h3 class="fw-bold text-white mb-3">Masterpieces await</h3>
                <p class="text-white-50">Join thousands of artists sharing their souls through color and form.</p>
            </div>
        </div>
    </div>

    <script>
        // Password Toggle
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function (e) {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });

        // No additional JS login regex validation required
    </script>
</body>
</html>
