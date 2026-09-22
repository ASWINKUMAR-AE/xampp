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
    <title>Register - Art Marketplace</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #6b46c1;
            --bg-dark: #2c2f33;
            --accent: #007bff;
            --white: #ffffff;
            --grey: #3a3f47;
        }

        body {
            background-color: var(--bg-dark);
            color: var(--white);
            font-family: 'Outfit', sans-serif;
            margin: 0;
            overflow-x: hidden;
        }

        .main-wrapper {
            display: flex;
            min-height: 100vh;
            align-items: center;
        }

        /* Split Layout */
        .register-side {
            flex: 0 0 600px;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
            background-color: var(--bg-dark);
        }

        .illustration-side {
            flex: 1;
            background-color: var(--white);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .illustration-container {
            width: 80%;
            max-width: 600px;
        }

        /* Register Card */
        .register-card {
            background: linear-gradient(135deg, var(--grey), var(--bg-dark));
            border-radius: 40px;
            padding: 40px;
            width: 100%;
            max-width: 550px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.5);
            border: 1px solid rgba(255,255,255,0.05);
        }

        .register-card h1 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 25px;
            text-align: center;
        }

        .form-control, .form-select {
            background: var(--white);
            border: none;
            border-radius: 50px;
            padding: 12px 25px;
            height: 50px;
            margin-bottom: 15px;
            font-size: 14px;
            color: #333;
        }

        .btn-register {
            background: var(--primary);
            color: var(--white);
            border: none;
            border-radius: 50px;
            padding: 14px;
            font-weight: 700;
            width: 100%;
            margin-top: 15px;
            transition: all 0.3s ease;
        }

        .btn-register:hover {
            background: #553c9a;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(107, 70, 193, 0.4);
        }

        .section-title {
            color: var(--primary);
            font-weight: 700;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 20px 0 15px 15px;
        }

        .login-link {
            display: block;
            text-align: center;
            margin-top: 25px;
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        #artist-fields {
            display: none;
        }

        @media (max-width: 1100px) {
            .illustration-side { display: none; }
            .register-side { flex: 1; height: auto; }
            .register-card { max-width: 100%; }
        }
    </style>
</head>
<body>

    <div class="main-wrapper">
        <!-- Form Side -->
        <div class="register-side">
            <div class="register-card">
                <h1>Sign Up</h1>
                
                <form id="registerForm" action="../controllers/UserController.php" method="POST">
                    <div class="section-title">Identity</div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <div class="col-md-6">
                            <select class="form-select" name="role" id="role" required onchange="toggleArtistFields(this.value)">
                                <option value="customer">I am a Customer</option>
                                <option value="artist">I am an Artist</option>
                            </select>
                        </div>
                    </div>

                    <div class="section-title">Contact & Location</div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="phone_number" placeholder="Phone Number" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="pin_code" placeholder="Pin Code" required>
                        </div>
                    </div>
                    <input type="text" class="form-control" name="address" placeholder="Full Address" required>

                    <!-- Artist Specific Fields -->
                    <div id="artist-fields">
                        <div class="section-title">Social Portfolios</div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="instagram" placeholder="Instagram ID">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="facebook" placeholder="Facebook ID">
                            </div>
                        </div>
                    </div>

                    <button type="submit" name="register" class="btn btn-register shadow-lg">Join Marketplace</button>
                    
                    <a href="login.php" class="login-link">Already have an account? Login</a>
                </form>
            </div>
        </div>

        <!-- Image Side -->
        <div class="illustration-side" style="background-image: url('../assets/img/login.jpg'); background-size: cover; background-position: center;">
            <div class="w-100 h-100 d-flex flex-column justify-content-end align-items-center text-center p-5 pb-5" 
                 style="background: linear-gradient(to bottom, transparent, #000);">
                <div class="pb-4">
                    <h3 class="fw-bold text-white mb-2">Be part of the legend</h3>
                    <p class="text-white-50">Join a global community of thinkers, creators, and visionaries.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleArtistFields(role) {
            const fields = document.getElementById('artist-fields');
            fields.style.display = (role === 'artist') ? 'block' : 'none';
        }
    </script>
</body>
</html>
