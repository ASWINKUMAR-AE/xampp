<?php
session_start();

include '../db/db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $password = $_POST["password"];

    // Prepare and execute SQL query
    $sql = "SELECT * FROM admins WHERE username = ? AND password = ? ";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ss", $name, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Login successful
            $row = $result->fetch_assoc();
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['email'];

            header("Location: admin_dashboard.php");
            exit();
        } else {
            // Login failed
            echo "<div class='alert alert-danger' role='alert'>Invalid username or password !!</div>";
        }
        $stmt->close();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Viewport for mobile scaling -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    
    <style>
        /* Custom styles for the form */
        .login-container {
            background: rgba(27, 26, 26, 0.7);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(7.2px);
            -webkit-backdrop-filter: blur(7.2px);
            border: 1px solid rgba(57, 56, 56, 0.3);
            padding: 20px;
            background-image:url(../assets/img/bg.jpg) !important;
            color: white;
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
            background-image: url('../assets/img/login.jpg'); /* Update to your image path */
            background-size: cover;
            background-position: center;
        }

        h1 {
            color: white;
        }

        @media (max-width: 767px) {
            .login-container {
                width: 90%; /* Make sure the login form takes full width on mobile */
            }

            .image-column {
                display: none; /* Hide the image column on mobile */
            }
        }
    </style>
</head>

<body class="bg-dark">
    <div class="container-fluid full-height">
        <div class="row h-100">
            <!-- Login Column -->
            <div class="col-md-6 login-column">
                <div class="login-container col-10 col-md-8">
                    <h1>Login</h1>
                    <div id="validationAlert" class="alert alert-danger d-none" role="alert"></div>
                    <form action="#" class="login col-12" method="post" onsubmit="return validateForm();">
                        <div class="field">
                            <input type="text" id="username" placeholder="Username" name="name" required>
                        </div>
                        <div class="field">
                            <input type="password" id="password" placeholder="Password" name="password" required>
                        </div>
                        <div class="field btn">
                            <input type="submit" value="Login">
                        </div>
                    </form>
                    <center><p><a href="register.php" class="text-light">Create a new Account?</a></p></center>
                </div>
            </div>

            <!-- Image Column -->
            <div class="col-md-6 image-column d-none d-md-block">
                <img src="../assets/img/login.jpg" alt="Login" class="img-fluid">
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
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
     <footer class=" navbar-expand-lg navbar-dark bg-dark-custom text-white py-3 fixed-bottom" style="height:50px !important;">
        <div class="container text-center">
            <p style="font-size: 12px;">&copy; <?php echo date("Y"); ?> DRAWING WITH ASWIN. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
