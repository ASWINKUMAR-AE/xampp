<?php
session_start(); // Start the session at the very beginning

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
include 'db.php';

// Check if the user is logged in and has the role to view the data
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin' ){
    // If not, redirect to the login page or an error page
    header('Location: login_in.php');
    exit;
}

$curr_date = date('d-m-Y');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take Attendance</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .add-row {
            margin-top: 10px;
            margin-bottom: 20px;
        }
        .submit-button {
            margin-top: 20px;
        }
        .search-container {
            margin-bottom: 20px;
        }
        #searchRegNo {
            padding: 8px;
            width: 300px;
        }
        #searchResults {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            max-height: 150px;
            overflow-y: auto;
        }
        .search-item {
            padding: 10px;
            cursor: pointer;
        }
        .search-item:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h2>Take Attendance</h2>
    <div class="search-container">
        <input type="text" id="searchRegNo" placeholder="Enter Reg No">
        <div id="searchResults"></div>
    </div>
    <form action="" method="post">
    <input type="text" id="date" name="date" value="<?php echo $curr_date; ?>" required placeholder="DD-MM-YYYY">
        <table id="attendance-table">
            <thead>
                <tr>
                    <th>Reg.No</th>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Department</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Hours</th>
                </tr>
            </thead>
            <tbody>
                <!-- Rows will be added here dynamically -->
            </tbody>
        </table>
        <button type="button" class="add-row">Add Row</button>
        <input type="submit" value="Submit" name="att" class="submit-button">
    </form>

    <script>
        document.querySelector('.add-row').addEventListener('click', function () {
            addRow('', '', '', '', '', '', 0);
        });

        document.getElementById('searchRegNo').addEventListener('input', function () {
            const regNo = this.value;
            const searchResults = document.getElementById('searchResults');
            if (regNo.length >= 4) {
                fetch(`search.php?reg_no=${regNo}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data) {
                            searchResults.innerHTML = '';
                            for (const student of data) {
                                const item = document.createElement('div');
                                item.classList.add('search-item');
                                item.textContent = `${student.reg_no} - ${student.name}`;
                                item.addEventListener('click', function () {
                                    addRow(student.reg_no, student.name, student.year, student.department, '', '', 0);
                                    searchResults.style.display = 'none';
                                });
                                searchResults.appendChild(item);
                            }
                            searchResults.style.display = 'block';
                        } else {
                            searchResults.innerHTML = '<div class="search-item">No results found</div>';
                            searchResults.style.display = 'block';
                        }
                    });
            } else {
                searchResults.style.display = 'none';
            }
        });

        function addRow(reg_no, name, year, department, from_time, to_time, hours) {
            const table = document.getElementById('attendance-table').getElementsByTagName('tbody')[0];
            const newRow = table.insertRow();
            newRow.innerHTML = `
                <td><input type="text" name="reg_no[]" value="${reg_no}" readonly></td>
                <td><input type="text" name="name[]" value="${name}" readonly></td>
                <td><input type="number" name="year[]" value="${year}" readonly></td>
                <td><input type="text" name="department[]" value="${department}" readonly></td>
                <td><input type="time" name="from_time[]" value="${from_time}"></td>
                <td><input type="time" name="to_time[]" value="${to_time}"></td>
                <td>
                    <button type="button" onclick="changeHours(this, -1)">-</button>
                    <input type="number" name="hours[]" value="${hours}" readonly>
                    <button type="button" onclick="changeHours(this, 1)">+</button>
                </td>
            `;
        }

        function changeHours(button, delta) {
            const input = button.parentElement.querySelector('input[type="number"]');
            let value = parseInt(input.value) + delta;
            if (value < 0) value = 0;
            input.value = value;
        }
               // Function to format the date input field
               function formatDateInput() {
            const dateInput = document.getElementById('date');
            dateInput.addEventListener('input', function () {
                const dateValue = this.value;
                if (dateValue.length === 2 || dateValue.length === 5) {
                    this.value += '-';
                }
            });
        }

        // Call the function to format the date input field
        formatDateInput();
    </script>
    </script>
</body>
</html>
<?php
if(isset($_POST['att'])){
    include 'register.php';
    attendance();
}
?>