<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Submission Successful</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light text-dark">

<div class="container mt-5">
    <div class="card bg-success text-white">
        <div class="card-header text-center">
            <h4>Order Submitted Successfully!</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">Thank you for your order!</h5>
            <p class="card-text">
                Your order has been successfully submitted. An email confirmation has been sent to you.
            </p>
            <p class="card-text">
                If you have any questions, feel free to contact us.
            </p>
            <a href="index.php" class="btn btn-light">Go Back to Home</a>
            <a href="orders.php" class="btn btn-light">View My Orders</a>
        </div>
    </div>
</div>
 <!-- Footer -->
 <footer class=" navbar-expand-lg navbar-dark bg-dark-custom text-white py-3 fixed-bottom" style="height:50px !important;">
        <div class="container text-center">
            <p style="font-size: 12px;">&copy; <?php echo date("Y"); ?> DRAWING WITH ASWIN. All rights reserved.</p>
        </div>
    </footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
