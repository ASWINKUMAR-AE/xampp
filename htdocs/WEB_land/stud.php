<?php
  session_start(); // Start the session at the top of the script
  include('connection/conn.php');

  $batch = isset($_GET['batch']) ? $_GET['batch'] : 'Unknown Batch';
  $project = isset($_GET['project']) ? $_GET['project'] : 'Unknown Project';

  $sql = "SELECT * FROM student_data WHERE batch = '$batch'";
  $result = $conn->query($sql);

  if (!$result) {
      die("Error executing query: " . $conn->error);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>File Manager</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .table {
      background-color: #ffffff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    thead {
      background-color: #007bff;
      color: #ffffff;
    }

    .table-row:hover {
      background-color: #f1f1f1;
    }

    .table-row {
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .table td, .table th {
      vertical-align: middle;
      text-align: center;
    }

    .table td a {
      color: #007bff;
      text-decoration: none;
    }

    .table td a:hover {
      text-decoration: underline;
    }

    @media (max-width: 576px) {
      .table td, .table th {
        font-size: 14px;
        padding: 0.5rem;
      }
    }
  </style>
  <script>
    function goToProfile(rowData) {
      const form = document.createElement('form');
      form.method = 'POST';
      form.action = 'profile.php';

      for (const key in rowData) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = key;
        input.value = rowData[key];
        form.appendChild(input);
      }

      document.body.appendChild(form);
      form.submit();
    }
  </script>
</head>
<body>
<div class="container mt-5">
  <h2 class="text-center mb-4">File Manager - Batch: <?php echo $batch; ?> | Project: <?php echo $project; ?></h2>
  <div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
      <thead>
        <tr>
          <th>Name</th>
          <th>Reg Number</th>
          <th>Project</th>
          <th>Live Link</th>
          <th>Description</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr class='table-row' onclick='goToProfile(" . json_encode($row) . ")'>";
              echo "<td>" . htmlspecialchars($row['student_name']) . "</td>";
              echo "<td>" . htmlspecialchars($row['reg_number']) . "</td>";
              echo "<td>" . htmlspecialchars($row['project_name']) . "</td>";
              echo "<td><a href='" . htmlspecialchars($row['live_link']) . "' target='_blank' title='View Live Project'>" . htmlspecialchars($row['live_link']) . "</a></td>";
              echo "<td>" . htmlspecialchars($row['description']) . "</td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='5' class='text-center'>No records found</td></tr>";
          }
        ?>
      </tbody>
    </table>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
