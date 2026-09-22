<?php 
include 'db.php'; 
include 'header.php'; 

$message = "";

if (isset($_POST['add_room'])) {
    $room_no = $_POST['room_no'];
    $capacity = $_POST['capacity'];
    $available = $_POST['available'];

    try {
        $insertResult = $rooms->insertOne([
            "room_no"  => $room_no,
            "capacity" => (int)$capacity,
            "available" => (int)$available
        ]);

        if ($insertResult->getInsertedCount() > 0) {
            $message = "<div class='alert alert-success rounded-pill px-4'>Room added successfully!</div>";
        }
    } catch (Exception $e) {
        $message = "<div class='alert alert-danger px-4'>Error: " . $e->getMessage() . "</div>";
    }
}

$roomList = $rooms->find([]);
?>

<div class="container-fluid">
    <div class="row align-items-center mb-5">
        <div class="col">
            <h2 class="fw-bold">Room Management</h2>
            <p class="text-muted">Manage your PG rooms and check availability.</p>
        </div>
    </div>

    <div class="row g-4">
        <!-- Add Room Form -->
        <div class="col-lg-4">
            <div class="glass-card shadow-sm border-0">
                <h5 class="fw-bold mb-4">Add New Room</h5>
                <?php echo $message; ?>
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Room Number</label>
                        <input type="text" name="room_no" class="form-control" placeholder="Room 101" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Capacity</label>
                        <select name="capacity" class="form-select rounded-pill">
                            <option value="1">1 Person</option>
                            <option value="2">2 Persons</option>
                            <option value="3">3 Persons</option>
                            <option value="4">4 Persons</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Available Beds</label>
                        <input type="number" name="available" class="form-control" placeholder="No. of beds" required>
                    </div>
                    <button type="submit" name="add_room" class="btn btn-premium w-100 py-2">
                        <i class="fas fa-plus me-2"></i>Add Room
                    </button>
                </form>
            </div>
        </div>

        <!-- Room List -->
        <div class="col-lg-8">
            <div class="glass-card shadow-sm border-0">
                <h5 class="fw-bold mb-4">Room List</h5>
                <div class="table-responsive">
                    <table class="table premium-table">
                        <thead>
                            <tr>
                                <th>Room No.</th>
                                <th>Capacity</th>
                                <th>Available</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($roomList as $room): ?>
                            <tr>
                                <td class="fw-bold"><?php echo htmlspecialchars(isset($room['room_no']) ? $room['room_no'] : 'N/A'); ?></td>
                                <td><?php echo htmlspecialchars(isset($room['capacity']) ? $room['capacity'] : 'N/A'); ?> Persons</td>
                                <td><?php echo htmlspecialchars(isset($room['available']) ? $room['available'] : 'N/A'); ?> Beds</td>
                                <td>
                                    <?php if ((isset($room['available']) ? $room['available'] : 0) > 0): ?>
                                        <span class="badge bg-light text-success rounded-pill px-3">Available</span>
                                    <?php else: ?>
                                        <span class="badge bg-light text-danger rounded-pill px-3">Full</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
