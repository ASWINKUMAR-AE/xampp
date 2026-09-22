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
    <title>Manage Questions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body { background-color: #f8f9fa; }
        .arrow { display: flex; align-items: center; }
        .arrow:before {
            content: '→';
            margin-right: 8px;
            color: #6c757d;
        }
        .list-group-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
            <style>
       
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
        .card-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
}
.card-body {
    background-color: #ffffff;
}
.list-group-item {
    border: none;
    padding: 10px 15px;
    background-color: #f7f7f7;
}

    </style>
</head>
<body>
    <?php
include "sidebar.php";
?>  
<div class="page-content">
    <div class="container col-md-12">
        <h2 class="m-4"><i class="fas fa-question-circle mr-2"></i>Manage Questions</h2>

        <div class="card border-0 shadow-lg">
            <div class="card-body">
                <!-- Add Question Form -->
                <form id="addQuestionForm" class="mb-4">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="questionText" class="form-label">Question</label>
                            <input type="text" class="form-control" id="questionText" required>
                        </div>
                        <div class="col-md-6">
                            <label for="answerText" class="form-label">Answer</label>
                            <textarea class="form-control" id="answerText" required></textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="parentQuestion" class="form-label">Choose Parent Question or Leave</label>
                            <select id="parentQuestion" class="form-select">
                                <option value="">Choose This For Parent Ques</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info mt-3"><i class="fas fa-plus-circle mr-2"></i>Add Question</button>
                </form>

                <!-- Questions Container -->
                <div id="questionsContainer" class="mt-4">
                    <h4 class="text-center">Q/A Flow in Web Site</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/question_manage.js"></script>
</body>
</html>
