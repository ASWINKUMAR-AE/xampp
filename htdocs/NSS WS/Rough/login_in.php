<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NSS Login</title>
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="blueBg">
            <div class="box signin">
                <h2>Already have an account?</h2>
                <button class="signinBtn">Sign In</button>
            </div>
            <div class="box signup">
                <h2>Not Registered Yet?</h2>
                <button class="signupBtn">Sign Up</button>
            </div>
        </div>
        <div class="formBx">
            <div class="form signinForm">
                <form method="post" action="login.php" id="loginForm">
                    <h3>Sign In</h3>
                    <select name="role" id="role" required>
                        <option value="volunteer">Select Role</option>
                        <option value="super admin">Super Admin</option>
                        <option value="admin">Admin</option>
                        <option value="volunteer">Volunteer</option>
                    </select>
                    <span class="error"></span>
                    <input type="text" placeholder="Reg No" name="reg_no" id="reg_no" required>
                    <span class="error"></span>
                    <input type="password" placeholder="Password" name="pwd" id="pwd" required>
                    <span class="error"></span>
                    <input type="submit" value="Login">
                    <button type="reset" style="color: #fff; background-color: #f4035b; height: 35px; max-width: 35%; border: none; margin-left: 60%; margin-top: -55px; font-size: 18px; cursor: pointer;">Clear</button>
                    <a href="forgot.html" class="forgot">Forgot Password</a>
                </form>
            </div>
            <div class="form signupForm">
                <form method="post" action="" id="registerForm">
                    <h3>Sign Up</h3>
                    <select name="role" id="role" required>
                        <option value="volunteer">Volunteer</option>
                    </select>
                    <span class="error"></span>
                    <input type="text" placeholder="Enter Your Name" id="name" name="name" required>
                    <span class="error"></span>
                    <input type="email" placeholder="Enter Your Email" id="email" name="email" required>
                    <span class="error"></span>
                    <input type="text" placeholder="Enter Your Reg No" id="reg_no" name="reg_no" required>
                    <span class="error"></span>
                    <input type="password" placeholder="Enter Your Password" id="pwd" name="pwd" required>
                    <span class="error"></span>
                    <input type="hidden" name="role" value="volunteer">
                    <input type="submit" value="Register" name="reg">
                    <button type="reset" style="color: #fff; background-color: #03a9f4; height: 35px; max-width: 35%; border: none; margin-left: 60%; margin-top: -55px; font-size: 18px; cursor: pointer;">Clear</button>
                </form>
            </div>
        </div>
    </div>
    <?php if (isset($_POST['reg'])) {
        include 'register.php';
        volunteer_reg();
    } ?>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function () {
            $.validator.addMethod("customRegNo", function (value, element) {
                // Define the regex patterns
                var regexPatterns = [
                    /^20[2-9]{2}4[12][0-9]{2}$/, // CE Both Regular and Lateral Entry
                    /^20[2-9]{2}4[42][0-9]{2}$/, // WD Both Regular and Lateral Entry
                    /^20[2-9]{2}2[62][0-9]{2}$/  // EEE Regular
                ];

                // Check if value matches any of the regex patterns
                for (var i = 0; i < regexPatterns.length; i++) {
                    if (regexPatterns[i].test(value)) {
                        return true;
                    }
                }
                return false;
            }, "Please enter a valid registration number.");

            $("#loginForm").validate({
                errorPlacement: function (error, element) {
                    error.insertAfter(element.next('span.error'));
                },
                rules: {
                    reg_no: {
                        required: true,
                        digits: true,
                        minlength: 8,
                        maxlength: 8,
                        customRegNo: true
                    },
                    pwd: {
                        required: true
                    }
                },
                messages: {
                    reg_no: {
                        required: "Please enter your registration number",
                        digits: "Please enter only numbers",
                        minlength: "Registration number must be exactly 8 digits",
                        maxlength: "Registration number must be exactly 8 digits",
                        customRegNo: "Please enter a valid registration number."
                    },
                    pwd: {
                        required: "Please provide a password"
                    }
                }
            });

            $("#registerForm").validate({
                errorPlacement: function (error, element) {
                    error.insertAfter(element.next('span.error'));
                },
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    reg_no: {
                        required: true,
                        digits: true,
                        minlength: 8,
                        maxlength: 8,
                        customRegNo: true
                    },
                    pwd: {
                        required: true,
                        minlength: 5,
                        regex: "^(?=.*[A-Za-z])(?=.*\\d)(?=.*[@$!%*?&])[A-Za-z\\d@$!%*?&]{5,}$"
                    }
                },
                messages: {
                    name: {
                        required: "Please enter your name"
                    },
                    email: {
                        required: "Please enter your email address",
                        email: "Please enter a valid email address"
                    },
                    reg_no: {
                        required: "Please enter your registration number",
                        digits: "Please enter only numbers",
                        minlength: "Registration number must be exactly 8 digits",
                        maxlength: "Registration number must be exactly 8 digits",
                        customRegNo: "Please enter a valid registration number."
                    },
                    pwd: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long",
                        regex: "Password must contain at least one letter, one number, and one special character"
                    }
                }
            });
        });
    </script>
    <script>
        const signingBtn = document.querySelector(".signinBtn");
        const signupBtn = document.querySelector(".signupBtn");
        const formBx = document.querySelector(".formBx");
        const body = document.querySelector("body");

        signupBtn.onclick = function () {
            formBx.classList.add("active");
            body.classList.add("active");
        }

        signingBtn.onclick = function () {
            formBx.classList.remove("active");
            body.classList.remove("active");
        }
    </script>
</body>
</html>
