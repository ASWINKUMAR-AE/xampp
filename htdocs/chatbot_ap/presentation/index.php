
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <form class="login" id="loginForm">
        <div style="text-align:center;">
            <img src="../data_fetch/img/logo.png" alt="TNGPTC Logo" style="width:100px;height:auto;max-width:100%;">
        </div>
        <h2>TNGPTC Admin Panel</h2>
        <p>Chatbot Management</p>
        <input type="text" id="username" name="username" placeholder="User Name" required />
        <input type="password" id="password" name="password" placeholder="Password" required />
        <input type="submit" value="Log In" />
    </form>

   <script>
$(document).ready(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });

    $('#loginForm').on('submit', function (e) {
        e.preventDefault();

        const formData = {
            username: $('#username').val().trim(),
            password: $('#password').val().trim(),
        };

        $.ajax({
            url: '../data_proccessing/login.php',
            method: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    Toast.fire({
                        icon: 'success',
                        title: response.message
                    }).then(() => {
                        window.location.href = 'admin_dash.php'; // Redirect after successful login
                    });
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: response.message
                    });
                }
            },
            error: function () {
                Toast.fire({
                    icon: 'error',
                    title: 'An unexpected error occurred. Please try again.'
                });
            }
        });
    });
});
</script>

</body>
</html>