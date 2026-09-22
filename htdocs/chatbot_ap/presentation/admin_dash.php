<?php
session_start();

if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: index.php");
    exit();
}
include '../lib/Database.php';

$last_updated_time = getActivityLogTime();
$parent_questions_count = getParentQuestionsCount();
$total_stu_count = getTotalStudentCount();

function getActivityLogTime()
{
    try {
        $connection = Database::getConnection();
        $query = $connection->prepare("SELECT timestamp FROM activity_logs ORDER BY timestamp DESC LIMIT 1");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['timestamp'];
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return "";
    }
}

function getParentQuestionsCount()
{
    try {
        $connection = Database::getConnection();
        $query = $connection->prepare("SELECT COUNT(*) FROM questions WHERE parent_question_id IS NULL");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['COUNT(*)'];
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return "";
    }
}

function getTotalStudentCount()
{
    try {
        $connection = Database::getConnection();
        $query = $connection->prepare("SELECT COUNT(*) FROM stu_details");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['COUNT(*)'];
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return "";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
        .card {
            margin-bottom: 20px;
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
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
                    <h2>Welcome Back, <?php echo $_SESSION['username']; ?> | TNPT </h2>
                    <p>In this dashboard, you can manage your chatbot Admin dashboard. Here you can manage all the aspects of your chatbot.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3 animate__animated animate__fadeInUp">
                        <div class="card-body">
                            <i class="fas fa-list fa-3x mb-3 float-end"></i>
                            <h5 class="card-title">Total Parent Questions</h5>
                            <p class="card-text">No.Of Parent Node Ques : <?php echo $parent_questions_count; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3 animate__animated animate__fadeInUp">
                        <div class="card-body">
                            <i class="fas fa-list-ul fa-3x mb-3 float-end"></i>
                            <h5 class="card-title">Total No Of Users Viewed</h5>
                            <p class="card-text">No. Of Users Filled the Form : <?php echo $total_stu_count; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-info mb-3 animate__animated animate__fadeInUp">
                        <div class="card-body">
                            <i class="fas fa-cogs fa-3x mb-3 float-end"></i>
                            <h5 class="card-title">Settings</h5>
                            <p class="card-text">Last Updated Time : <?php echo $last_updated_time; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>

