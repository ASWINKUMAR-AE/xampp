<?php
session_start();

if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Logs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: #fff;
            position: fixed;    
            width: 250px;
            top: 0;
            left: 0;
            padding: 15px;
            transition: all 0.3s;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            margin: 10px 0;
        }
        .sidebar a:hover {
            background-color: #495057;
            padding-left: 10px;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body>
<?php
include "sidebar.php";
?>  

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Activity Logs</h2>
                <p>Here you can view the activity logs of your site.</p>
                <div class="table-responsive ">
                    <table id="activityLogsTable" class="table table-striped table-bordered table-dark">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <!-- <th>ID</th> -->
                                <th>Action</th>
                                <th>Logged In User ID</th>
                                <th>IP Address</th>
                                <th>Timestamp</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Logs will be populated here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetchActivityLogs();
    });

    function fetchActivityLogs() {
        $.ajax({
            url: '../data_fetch/fetch_activity_logs.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                const table = $('#activityLogsTable').DataTable({
                    destroy: true, // Allow reinitialization
                    data: data,
                    columns: [
                        { data: null, render: function (data, type, row, meta) {
                                return meta.row + 1;
                            }
                        },
                       
                        { data: 'action' },
                        { data: 'user_id' },
                        { data: 'user_ip' },
                        { data: 'timestamp' }
                    ],
                    order: [[4, 'desc']], // Sort by Timestamp descending
                    columnDefs: [
                        { type: 'date', targets: 4 } // Enable date sorting for Timestamp column
                    ]
                });
            },
            error: function() {
                Swal.fire('Error', 'Failed to fetch activity logs.', 'error');
            }
        });
    }
</script>
</body>
</html>