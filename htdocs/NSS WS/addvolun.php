<?php
session_start(); // Start the session at the very beginning

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
include 'db.php';

// Check if the user is logged in and has the role to view the data
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    // If not, redirect to the login page or an error page
    header('Location: login_in.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Multiple Records</title>
    <style> 
    body {
    font-family: Arial, sans-serif;
}

.container {
    width: 100%;
    margin: auto;
    overflow: hidden;
}

h2 {
    text-align: center;
}

table {
    width: 100%;
    max-width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
}

table, th, td {
    border: 1px solid #dddddd;
}

th, td {
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

button {
    padding: 5px 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}
</style>
</head>
<body>
    <div class="container">
        <h2>Insert Multiple Records</h2>
        <form action="" method="POST">
            <table id="recordsTable">
                <tr>
                    <th>Reg.No</th>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Department</th>
                    <th><button type="button" onclick="addRow()">Add Row</button></th>
                </tr>
                <tr>
                    <td><input type="text" name="regno[]" required></td>
                    <td><input type="text" name="name[]" required></td>
                    <td><input type="text" name="year[]" required></td>
                    <td><input type="text" name="department[]" required></td>
                    <td><button type="button" onclick="removeRow(this)">Remove</button></td>
                </tr>
            </table>
            <br>
            <input type="submit" value="Submit" name="insert">
        </form>
    </div>

    <script>
        function addRow() {
            let table = document.getElementById('recordsTable');
            let row = table.insertRow(-1);
            row.innerHTML = `<td><input type="text" name="regno[]" required></td>
                             <td><input type="text" name="name[]" required></td>
                             <td><input type="text" name="year[]" required></td>
                             <td><input type="text" name="department[]" required></td>
                             <td><button type="button" onclick="removeRow(this)">Remove</button></td>`;
        }

        function removeRow(button) {
            button.parentElement.parentElement.remove();
        }
    </script>
</body>
</html>

<?php 
if(isset($_POST['insert'])){
    include 'register.php';
    add_volun();
}
?>
