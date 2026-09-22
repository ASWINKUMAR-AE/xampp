<?php 
include 'db.php'; 
include 'header.php'; 

$message = "";

if (isset($_POST['add_student'])) {
    $name = $_POST['name'];
    $room_no = $_POST['room_no'];
    $phone = $_POST['phone'];
    $rent = $_POST['rent'];
    $joining_date = $_POST['joining_date'];

    try {
        $insertResult = $students->insertOne([
            "name"         => $name,
            "room_no"      => $room_no,
            "phone"        => $phone,
            "rent"         => (int)$rent,
            "joining_date" => $joining_date
        ]);

        if ($insertResult->getInsertedCount() > 0) {
            $message = "<div class='alert alert-success alert-dismissible fade show rounded-pill shadow-sm border-0 px-4 py-3 mb-4'>
                            <i class='fas fa-check-circle me-2'></i><strong>Success!</strong> Student registered successfully.
                        </div>";
        }
    } catch (Exception $e) {
        $message = "<div class='alert alert-danger rounded-pill shadow-sm border-0 px-4 py-3 mb-4'>
                        <i class='fas fa-exclamation-circle me-2'></i><strong>Error:</strong> " . $e->getMessage() . "
                    </div>";
    }
}
?>

<div class="container-fluid">
    <div class="row align-items-center mb-5">
        <div class="col">
            <h2 class="fw-bold">New Student Registration</h2>
            <p class="text-muted">Register a new boarder to the PG system.</p>
        </div>
        <div class="col-auto">
            <a href="view_students.php" class="btn btn-outline-secondary rounded-pill px-4">
                <i class="fas fa-list me-2"></i>View All
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="glass-card p-5">
                <?php echo $message; ?>
                <form method="POST" action="">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter student name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Phone Number</label>
                            <input type="tel" name="phone" class="form-control" placeholder="Enter phone number" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Room No.</label>
                            <input type="text" name="room_no" class="form-control" placeholder="e.g. 101" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Monthly Rent</label>
                            <input type="number" name="rent" class="form-control" placeholder="Price in INR" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Joining Date</label>
                            <input type="date" name="joining_date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                        <div class="col-12 mt-5">
                            <button type="submit" name="add_student" class="btn btn-premium w-100 py-3">
                                <i class="fas fa-user-plus me-2"></i>Register Student
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
