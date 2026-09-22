<?php 
include 'db.php'; 
include 'header.php'; 

$message = "";

if (isset($_POST['record_payment'])) {
    try {
        $insertResult = $payments->insertOne([
            "student_name" => $_POST['student_name'],
            "month"        => $_POST['month'],
            "amount"       => (int)$_POST['amount'],
            "status"       => "Paid",
            "date"         => date('Y-m-d')
        ]);

        if ($insertResult->getInsertedCount() > 0) {
            $message = "<div class='alert alert-success rounded-pill px-4 shadow-sm border-0 mb-4'>Payment recorded!</div>";
        }
    } catch (Exception $e) {
        $message = "<div class='alert alert-danger rounded-pill px-4 shadow-sm border-0 mb-4'>Error: " . $e->getMessage() . "</div>";
    }
}

$paymentHistory = $payments->find([]);
$studentsList = $students->find([]);
?>

<div class="container-fluid">
    <div class="row align-items-center mb-5">
        <div class="col">
            <h2 class="fw-bold">Payment Logs</h2>
            <p class="text-muted">Track rent collections and payment history.</p>
        </div>
    </div>

    <div class="row g-4">
        <!-- Record Payment Form -->
        <div class="col-lg-4">
            <div class="glass-card shadow-sm border-0">
                <h5 class="fw-bold mb-4">Record New Payment</h5>
                <?php echo $message; ?>
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Select Student</label>
                        <select name="student_name" class="form-select rounded-pill" required>
                            <option value="">Choose a student</option>
                            <?php foreach ($studentsList as $s): ?>
                                <option value="<?php echo htmlspecialchars($s['name']); ?>"><?php echo htmlspecialchars($s['name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Month</label>
                        <select name="month" class="form-select rounded-pill" required>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Amount Paid</label>
                        <input type="number" name="amount" class="form-control" placeholder="INR Amount" required>
                    </div>
                    <button type="submit" name="record_payment" class="btn btn-premium w-100 py-2">
                        <i class="fas fa-receipt me-2"></i>Record Transaction
                    </button>
                </form>
            </div>
        </div>

        <!-- Payment History -->
        <div class="col-lg-8">
            <div class="glass-card shadow-sm border-0">
                <h5 class="fw-bold mb-4">Payment History</h5>
                <div class="table-responsive">
                    <table class="table premium-table">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Month</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($paymentHistory as $pay): ?>
                            <tr>
                                <td class="fw-bold"><?php echo htmlspecialchars(isset($pay['student_name']) ? $pay['student_name'] : 'N/A'); ?></td>
                                <td><?php echo htmlspecialchars(isset($pay['month']) ? $pay['month'] : 'N/A'); ?></td>
                                <td class="text-success fw-bold">₹<?php echo htmlspecialchars(isset($pay['amount']) ? $pay['amount'] : 'N/A'); ?></td>
                                <td><span class="badge bg-light text-success rounded-pill px-3"><?php echo htmlspecialchars(isset($pay['status']) ? $pay['status'] : 'N/A'); ?></span></td>
                                <td><?php echo htmlspecialchars(isset($pay['date']) ? $pay['date'] : 'N/A'); ?></td>
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
