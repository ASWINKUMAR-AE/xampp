<?php 
include 'db.php'; 
include 'header.php'; 

// Fetch stats
$totalStudents = $students->countDocuments();
$totalRooms = $rooms->countDocuments();
$totalPayments = $payments->countDocuments();
?>

<div class="container-fluid">
    <div class="row align-items-center mb-5">
        <div class="col">
            <h2 class="fw-bold">Welcome, PG Admin!</h2>
            <p class="text-muted">Here's what's happening at your PG today.</p>
        </div>
        <div class="col-auto">
            <a href="add_student.php" class="btn btn-premium">
                <i class="fas fa-plus me-2"></i>New Registration
            </a>
        </div>
    </div>

    <div class="row g-4 dashboard-stats">
        <div class="col-md-4">
            <div class="glass-card">
                <div class="d-flex justify-content-between">
                    <div>
                        <span class="text-muted small fw-bold text-uppercase">Total Students</span>
                        <h1 class="fw-bold mt-2"><?php echo $totalStudents; ?></h1>
                    </div>
                    <div class="text-primary">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <span class="text-success small"><i class="fas fa-arrow-up"></i> 12%</span>
                    <span class="text-muted small ms-2">Since last month</span>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="glass-card">
                <div class="d-flex justify-content-between">
                    <div>
                        <span class="text-muted small fw-bold text-uppercase">Total Rooms</span>
                        <h1 class="fw-bold mt-2"><?php echo $totalRooms; ?></h1>
                    </div>
                    <div class="text-purple" style="color: #8b5cf6;">
                        <i class="fas fa-bed"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <span class="text-muted small">8 Available Rooms</span>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="glass-card">
                <div class="d-flex justify-content-between">
                    <div>
                        <span class="text-muted small fw-bold text-uppercase">Payments Received</span>
                        <h1 class="fw-bold mt-2"><?php echo $totalPayments; ?></h1>
                    </div>
                    <div class="text-danger" style="color: #f43f5e;">
                        <i class="fas fa-coins"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <span class="text-success small"><i class="fas fa-check"></i> 85% Collected</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity Placeholder -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="glass-card">
                <h5 class="fw-bold mb-4">Quick Overview</h5>
                <div class="table-responsive">
                    <table class="table premium-table">
                        <thead>
                            <tr>
                                <th>Metric</th>
                                <th>Details</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-bold">Active Students</td>
                                <td>Occupancy at 92%</td>
                                <td><span class="badge bg-light text-success rounded-pill">Good</span></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Pending Complaints</td>
                                <td>3 issues reported</td>
                                <td><span class="badge bg-light text-warning rounded-pill">Take Action</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
