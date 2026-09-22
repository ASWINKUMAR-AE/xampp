<?php
// Start the session
session_start();

// Example session data (Testing purpose if not already set)
if (!isset($_SESSION['booking'])) {
    $_SESSION['booking'] = [
        'booking_id' => '00001',
        'customer_name' => 'John Doe',
        'room_type' => 'Deluxe Room',
        'check_in' => '2025-04-10',
        'check_out' => '2025-04-12',
        'price' => 5000,
        'phone' => '9047848140',
        'email' => 'vk206571@gmail.com'
    ];
}

// Get booking details from session
$booking = $_SESSION['booking'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Bill</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-5">
    <h1 class="text-center mb-5">Booking Bill</h1>

    <div class="card">
        <div class="card-body">

            <h5 class="card-title mb-4">Booking Confirmation</h5>

            <table class="table table-bordered">
                <tr>
                    <th>Booking ID</th>
                    <td>#<?php echo htmlspecialchars($booking['booking_id']); ?></td>
                </tr>
                <tr>
                    <th>Customer Name</th>
                    <td><?php echo htmlspecialchars($booking['customer_name']); ?></td>
                </tr>
                <tr>
                    <th>Room Type</th>
                    <td><?php echo htmlspecialchars($booking['room_type']); ?></td>
                </tr>
                <tr>
                    <th>Check-In Date</th>
                    <td><?php echo htmlspecialchars($booking['check_in']); ?></td>
                </tr>
                <tr>
                    <th>Check-Out Date</th>
                    <td><?php echo htmlspecialchars($booking['check_out']); ?></td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td><?php echo htmlspecialchars($booking['phone']); ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo htmlspecialchars($booking['email']); ?></td>
                </tr>
                <tr>
                    <th>Total Price</th>
                    <td>₹<?php echo number_format($booking['price'], 2); ?></td>
                </tr>
            </table>

            <h6 class="mt-4">Refund Policy</h6>
            <ul>
                <li>Full refund if cancelled 72 hours before check-in</li>
                <li>50% refund if cancelled 48 hours before check-in</li>
                <li>No refund for last minute cancellations</li>
            </ul>

            <h6 class="mt-4">Modifications</h6>
            <p>To modify your booking, please contact our customer support:</p>
            <p>Phone: <?php echo htmlspecialchars($booking['phone']); ?><br>Email: <?php echo htmlspecialchars($booking['email']); ?></p>

        </div>
    </div>

    <div class="text-center mt-5">
        <button onclick="window.print()" class="btn btn-primary">Print Bill</button>
    </div>
</div>

</body>
</html>
