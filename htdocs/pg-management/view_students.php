<?php 
include 'db.php'; 
include 'header.php'; 

$studentList = $students->find([]);
?>

<div class="container-fluid">
    <div class="row align-items-center mb-5">
        <div class="col">
            <h2 class="fw-bold">Student Directory</h2>
            <p class="text-muted">Manage all active and past boarders.</p>
        </div>
        <div class="col-auto">
            <a href="add_student.php" class="btn btn-premium px-4">
                <i class="fas fa-plus-circle me-2"></i>Add Student
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="glass-card shadow-sm border-0 rounded-4 overflow-hidden">
                <div class="table-responsive">
                    <table class="table premium-table mb-0">
                        <thead>
                            <tr>
                                <th class="ps-4">#</th>
                                <th>Name</th>
                                <th>Room No.</th>
                                <th>Phone</th>
                                <th>Rent</th>
                                <th>Joining Date</th>
                                <th class="text-end pe-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $count = 1;
                            foreach ($studentList as $student): ?>
                            <tr>
                                <td class="ps-4 text-muted"><?php echo $count++; ?></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar bg-light text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <span class="fw-bold"><?php echo htmlspecialchars($student['name']); ?></span>
                                    </div>
                                </td>
                                <td><span class="badge bg-light text-dark px-3 py-2 rounded-pill"><?php echo htmlspecialchars($student['room_no']); ?></span></td>
                                <td><?php echo htmlspecialchars($student['phone']); ?></td>
                                <td class="fw-bold text-success">₹<?php echo htmlspecialchars($student['rent']); ?></td>
                                <td><?php echo htmlspecialchars($student['joining_date']); ?></td>
                                <td class="text-end pe-4">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary rounded-pill dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu border-0 shadow-sm rounded-3">
                                            <li><a class="dropdown-item py-2" href="#"><i class="fas fa-edit me-2"></i>Edit</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item py-2 text-danger" href="delete_student.php?id=<?php echo $student['_id']; ?>" onclick="return confirm('Are you sure you want to delete this student?')"><i class="fas fa-trash-alt me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php if ($count == 1): ?>
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted">No students found.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
