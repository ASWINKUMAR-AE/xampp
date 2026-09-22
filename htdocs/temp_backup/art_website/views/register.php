<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
<!-- AOS Animation Library CSS --><!-- AOS Animation Library JS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script>
        // Show/hide artist-specific fields based on role selection
        function toggleArtistFields() {
            const role = document.getElementById('role').value;
            const artistFields = document.getElementById('artist-fields');
            
            if (role === 'artist') {
                artistFields.style.display = 'block';
                document.getElementById('artist-phone').required = true;
                document.getElementById('artist-address').required = true;
                document.getElementById('artist-pin').required = true;
            } else {
                artistFields.style.display = 'none';
                document.getElementById('artist-phone').required = false;
                document.getElementById('artist-address').required = false;
                document.getElementById('artist-pin').required = false;
            }
        }

        // Validation function
        function validateForm(event) {
            // Clear any previous alert messages
            const alertBox = document.getElementById('alert-box');
            alertBox.innerHTML = '';

            // Regular expressions
            const usernameRegex = /^[a-zA-Z0-9]{5,}$/; // Alphanumeric, min length 5
            const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/; // At least 1 uppercase, 1 lowercase, 1 number, min length 6
            const emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
            const phoneRegex = /^\d{10}$/; // 10 digits
            const pinRegex = /^\d{5,6}$/; // 5 or 6 digits

            // Get form values
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const pin = document.getElementById('pin').value;

            // Validate fields
            if (!usernameRegex.test(username)) {
                alertBox.innerHTML += '<div class="alert alert-danger" role="alert">Username must be alphanumeric and at least 5 characters long.</div>';
                event.preventDefault();
            }
            if (!passwordRegex.test(password)) {
                alertBox.innerHTML += '<div class="alert alert-danger" role="alert">Password must contain at least 6 characters, including 1 uppercase letter, 1 lowercase letter, and 1 number.</div>';
                event.preventDefault();
            }
            if (!emailRegex.test(email)) {
                alertBox.innerHTML += '<div class="alert alert-danger" role="alert">Please enter a valid email address.</div>';
                event.preventDefault();
            }
            if (!phoneRegex.test(phone)) {
                alertBox.innerHTML += '<div class="alert alert-danger" role="alert">Phone number must be exactly 10 digits.</div>';
                event.preventDefault();
            }
            if (!pinRegex.test(pin)) {
                alertBox.innerHTML += '<div class="alert alert-danger" role="alert">Pin code must be 5 or 6 digits long.</div>';
                event.preventDefault();
            }
        }
    </script>
</head><body style="background:#3f3f3f;">
    <div class="container mt-5 mb-5" style="background-color: #282828; border-radius: 20px; max-height: 80vh; overflow-y: auto;">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6 col-lg-5">
                <h1 class="text-center text-white mb-4">Register</h1>
                <div id="alert-box"></div>
                <form action="../controllers/UserController.php" method="POST" onsubmit="validateForm(event)">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" name="phone_number" class="form-control" id="phone" placeholder="Phone Number" required>
                    </div>
                    <div class="form-group">
                        <label for="pin">Pin Code</label>
                        <input type="text" name="pin_code" class="form-control" id="pin" placeholder="Pin Code" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" class="form-control" id="role" required onchange="toggleArtistFields()">
                            <option value="customer">Customer</option>    
                            <option value="artist">Artist</option>
                        </select>
                    </div>

                    <!-- Artist-Specific Fields -->
                    <div id="artist-fields" style="display: none;">
                        <div class="form-group">
                            <label for="instagram">Instagram ID (Optional)</label>
                            <input type="text" name="instagram" class="form-control" id="instagram" placeholder="Instagram ID (Optional)">
                        </div>
                        <div class="form-group">
                            <label for="facebook">Facebook ID (Optional)</label>
                            <input type="text" name="facebook" class="form-control" id="facebook" placeholder="Facebook ID (Optional)">
                        </div>
                    </div>

                    <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="navbar-expand-lg navbar-dark bg-dark-custom text-white py-3 fixed-bottom" style="height:50px;">
        <div class="container text-center">
            <p style="font-size: 12px;">&copy; <?php echo date("Y"); ?> DRAWING WITH ASWIN. All rights reserved.</p>
        </div>
    </footer>
        <!-- Initialize AOS -->
        <script>
        AOS.init();
    </script>
</body>

</html>
