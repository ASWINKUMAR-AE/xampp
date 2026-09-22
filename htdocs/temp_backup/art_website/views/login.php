<?php
session_start(); // Start the session to access the error message

if (isset($_SESSION['login_error'])) {
    echo '<div class="alert alert-danger animated fadeIn" role="alert" id="loginAlert">' . $_SESSION['login_error'] . '</div>';
    unset($_SESSION['login_error']); // Clear the error message after displaying it
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
     <!-- Font Awesome link for icons -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Viewport for mobile scaling -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
<!-- AOS Animation Library CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">

<!-- AOS Animation Library JS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom styles for the form */
        .login-container {
            background: rgba(27, 26, 26, 0.4);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(7.2px);
            -webkit-backdrop-filter: blur(7.2px);
            border: 1px solid rgba(57, 56, 56, 0.3);
            padding: 20px;
            background-image: url(../assets/img/bg.jpg) !important;
        }

        .login-container input {
            margin-bottom: 15px;
            border-radius: 50px !important;
        }

        .login-container button {
            width: 100%;
            border-radius: 50px;
        }

        .full-height {
            height: 100vh;
        }

        .login-column {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .image-column {
            background-image: url('your-image-url.jpg'); /* Replace 'your-image-url.jpg' with your actual image path */
            background-size: cover;
            background-position: center;
        }

        h1 {
            color: white;
        }

        /* Position the eye icon within the input field */
        .input-group-text {
            cursor: pointer;
        }

        @media (max-width: 767px) {
            .login-container {
                width: 100%; /* Make sure the login form takes full width on mobile */
            }

            .image-column {
                display: none; /* Hide the image column on mobile */
            }
        }
    </style>
</head>

<body class="bg-dark">
<div class="container-fluid full-height" data-aos="fade-in">
    <div class="row h-100">
        <!-- Login Column -->
        <div class="col-md-6 login-column" data-aos="fade-right" data-aos-duration="1000">
            <div class="login-container col-8" data-aos="zoom-in" data-aos-duration="1500">
                <h1 data-aos="fade-down" data-aos-delay="200">Login</h1>
                <div id="validationAlert" class="alert alert-danger d-none" role="alert" data-aos="fade-up" data-aos-delay="300"></div>
                <form id="loginForm" action="../controllers/UserController.php" method="POST" onsubmit="return validateForm()">
                    <div class="form-group" data-aos="fade-up" data-aos-delay="400">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                    </div>
                    <div class="form-group input-group" data-aos="fade-up" data-aos-delay="500">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        <div class="input-group-append" style="background:none;">
                            <span class="input-group-text" onclick="togglePassword()" style="background:none; border:none;">
                                <i id="toggleIcon" class="fas fa-eye" style="background:none; color:white;"></i>
                            </span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="login" data-aos="fade-up" data-aos-delay="600">Login</button>
                </form>
                <center><p><a href="register.php" data-aos="fade-up" data-aos-delay="700">Create a new Account?</a></p></center>
            </div>
        </div>

        <!-- Image Column -->
        <div class="col-md-6 image-column d-none d-md-block" data-aos="fade-left" data-aos-duration="1000">
            <img src="../assets/img/login.jpg" alt="Login" class="img-fluid" data-aos="zoom-in" data-aos-delay="300">
        </div>
    </div>
</div>

<!-- Initialize AOS -->
<script>
    AOS.init();
</script>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> <!-- Font Awesome -->
    
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById("password");
            const toggleIcon = document.getElementById("toggleIcon");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }

        function validateForm() {
            const username = document.getElementById("username").value;
            const password = document.getElementById("password").value;
            const validationAlert = document.getElementById("validationAlert");

            const usernameRegex = /^[a-zA-Z0-9]{5,}$/;
            const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

            if (!usernameRegex.test(username)) {
                validationAlert.textContent = "Username must be at least 5 characters long and contain only letters and numbers.";
                validationAlert.classList.remove("d-none");
                return false;
            }

            if (!passwordRegex.test(password)) {
                validationAlert.textContent = "Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, and one number.";
                validationAlert.classList.remove("d-none");
                return false;
            }

            validationAlert.classList.add("d-none");
            return true;
        }
    </script>
    
    <!-- Footer -->
    <footer class="navbar-expand-lg navbar-dark bg-dark-custom text-white py-3 fixed-bottom" style="height:50px !important;">
        <div class="container text-center">
            <p style="font-size: 12px;">&copy; <?php echo date("Y"); ?> DRAWING WITH ASWIN. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
