<?php
session_start();

// Check if the user is logged in and has the role of super admin
if ($_SESSION['role'] !== 'super admin') {
    // If not, redirect to the login page or an error page
    header('Location: login_in.php');
    exit;
}

include_once 'db.php';
include_once 'register.php';
// Moved this include after db connection

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #003135;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            border: 1px solid white;
            box-shadow: 0px 0px 5px 3px rgba(125, 148, 189, 1);
            padding: 20px;
            margin: 20px;
            position: relative;
            z-index: 1;
        }
        .wrapper {
            margin-top: -88px;
            position: relative;
            Z-index: 1000;
        }
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }
        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
            background:lightgray !important;
        }
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }
        .table tbody+tbody {
            border-top: 2px solid #dee2e6;
        }
        .table .table {
            background-color: #fff;
        }
        .table-sm th,
        .table-sm td {
            padding: 0.3rem;
        }
        .table-bordered {
            border: 1px solid #dee2e6;
        }
        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }
        .table-bordered thead th,
        .table-bordered thead td {
            border-bottom-width: 2px;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }
        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.075);
        }
        @media (max-width: 991px) {
            .table thead {
                display: none;
            }
            .table, .table tbody, .table tr, .table td {
                display: block;
                width: 100%;
            }
            .table tr {
                margin-bottom: 15px;
            }
            .table td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }
            .table td::before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 50%;
                padding-left: 15px;
                font-weight: bold;
                text-align: left;
            }
        }
         
     @media (max-width: 570px) {
            .tit{font-size:25px !important;}
            .menu-btn{margin-top:-90px !important;}
            .container{
             
             overflow-x:hidden !important;
            }
            
            #sidebar{margin-top:0px !important;}
    .text-success{margin-left:80px !important;}
        }
        #sidebar{margin-top:-95px !important;}
        .text-success{margin-left:80px !important;}
        .menu-btn{margin-top:-90px !important;}

    </style>
    <?php include 'header.php'; ?>
</head>

<body style=" background:rgb(48, 47, 47);">
<?php include 'header2.php'; ?>
    <?php include 'slide.php'; ?>

    <div class="container mt-5" style=" margin-top: 100px !important;background-color:black;  ">
        <h3 class="text-center" style="color:orange !important;">Admin List</h3>
        <table class="table table-striped table-bordered" style="background:rgb(48, 47, 47) !important;">
            <thead  style="background:rgb(48, 47, 47) !important;">
                <tr  >
                    <th>Name</th>
                    <th>Reg No</th>
                    <th>DOB</th>
                    <th>Type</th>
                    <th>Mobile No</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody style="background-color:lightgray !important;">
                <?php
                $query = "SELECT * FROM admin WHERE role = 'admin'";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr  style='border-radius:20px !important; background:gray;'>";
                        // Decrypt the password
                        $decryptedPassword = decrypt_aes($row['password'], ENCRYPTION_KEY);
                        echo "<td data-label='Name'>" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td data-label='Reg No'>" . htmlspecialchars($row['reg_no'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td data-label='DOB'>" . htmlspecialchars($row['DOB'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td data-label='Type'>" . htmlspecialchars($row['role'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td data-label='Mobile No'>" . htmlspecialchars($row['Mobile_Number'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td data-label='Email'>" . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td data-label='Username'>" . htmlspecialchars($row['username'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td data-label='Password'>" . htmlspecialchars($decryptedPassword, ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td data-label='Action'>
                            <form method='post' action''>
                            <div>
                                <input type='hidden' name='admin_id' value='" . $row['id'] . "' />
                                <button type='submit' name='edit' class='btn btn-primary'>Edit</button>
                                <button type='submit' name='del' class='btn btn-danger'>Delete</button>
                            </form>
                            </div>
                        </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9' class='text-center'>No admin found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php 
if (isset($_POST['del'])) {
    admin_del($_POST['admin_id'], $conn); // Pass the ID and connection to the function
}
if (isset($_POST['edit'])) {
    $_SESSION['edit_id']=$_POST['admin_id'];
    echo '<script> window.location.href = "admin_edit.php";</script>';
    } ?>
</html>
