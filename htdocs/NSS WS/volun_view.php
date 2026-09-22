<?php
session_start(); // Start the session at the very beginning

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
include 'db.php';

// Check if the user is logged in and has the role to view the data
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'super admin') {
    // If not, redirect to the login page or an error page
    header('Location: login_in.php');
    exit;
}

// Fetch all volunteers from the database
$query = "SELECT * FROM volunteers_profile";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'header.php' ?>
    <title>View Registered Volunteers</title>
    <style>
    
    body {
    font-family: 'Arial', sans-serif;
    background-color: #003135;
    margin: 0;
    padding: 0;
    overflow-x: hidden; /* Prevent horizontal overflow */
    }

    .container {
        background-color: #ffffff;
        border-radius: 8px;
        border: 1px solid white;
        box-shadow: 0px 0px 5px 3px rgba(125, 148, 189, 1);
        padding: 20px;
        margin: 20px auto; /* Center the container */
        position: relative;
        z-index: 1;
        width: 90%; /* Adjust width for responsiveness */
        max-width: 1500px; /* Set a max-width to prevent it from getting too wide */
}

.wrapper {
    margin-top: -88px;
    position: relative;
    z-index: 1000;
}

/* .table {
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
}

.table th,
.table td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}

.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
}

.table tbody+tbody {
    border-top: 2px solid #dee2e6;
} */

/* .table .table {
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
} */

@media (max-width: 570px) {
    .container {
        margin-left: 10px !important;
        margin-right: 10px !important;
    }
    #sidebar{margin-top:-120px !important;}
    .text-success{margin-left:80px !important;}

}
.text-success{margin-left:80px !important;}
.menu-btn{margin-top:-90px;}
#sidebar{margin-top:-90px;}
</style>
</head>

<body style="background:rgb(48, 47, 47);">
<?php include 'header2.php'; ?>

    <?php include 'slide.php'; ?>

    <div class="" style="margin-top: 100px !important;">
        <h3 class="text-center" style="color:orange;"> Volunteers </h3>
        <table class="table table-striped table-bordered  container">
            <thead>
                <tr>
                    <th> S.No </th>
                    <th> Register Number </th> 
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Year</th>
                    <th>Branch of Study</th>
                    <th>Mobile No</th>
                    <th>Address</th>
                    <th>Email ID</th>
                    <th>Aadhaar No</th>
                    <th>Community</th>
                    <th>Blood Group</th>
                    <th> Registered On </th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php $i=0; ?>
            <tbody>
                <?php
                $query = "SELECT * FROM volunteers_profile";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $i++;
                        echo "<tr>"; ?>
                        <td data-label='S.No'><?php echo $i.")"; ?></td>
                        <td data-label='Name'><?php echo htmlspecialchars($row['name']); ?></td>
                        <td data-label='Register Number'><?php echo htmlspecialchars($row['user_id']); ?></td>
                        <td data-label='Gender'><?php echo htmlspecialchars($row['gender']); ?></td>
                        <td data-label='DOB'><?php echo htmlspecialchars($row['dob']); ?></td>
                        <td data-label='Year'><?php echo htmlspecialchars($row['year']); ?></td>
                        <td data-label='Branch of Study'><?php echo htmlspecialchars($row['subject']); ?></td>
                        <td data-label='Mobile No.'><?php echo htmlspecialchars($row['mno']); ?></td>
                        <td data-label='Address'><?php echo htmlspecialchars($row['address']); ?></td>
                        <td data-label='Email'><?php echo htmlspecialchars($row['email']); ?></td>
                        <td data-label='Aadhaar No.'><?php echo htmlspecialchars($row['aadhaar']); ?></td>
                        <td data-label='Community'><?php echo htmlspecialchars($row['community']); ?></td>
                        <td data-label='Blood Group'><?php echo htmlspecialchars($row['blood']); ?></td>
                        <td data-label='Registered On'><?php echo htmlspecialchars($row['registration_date']); ?></td>
                        <?php echo 
                        "<td data-label='Action'>
                            <form method='post' action=''>
                                <input type='hidden' name='volun_id' value='" . $row['id'] . "' />
                                <button type='submit' name='edit' class='btn btn-primary'>Edit</button>
                                <button type='submit' name='del' class='btn btn-danger'>Delete</button>
                            </form>
                        </td>";
                        ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else { ?>
            <p style="color: white; text-align: center;">No volunteers registered yet.</p>
        <?php } ?>

    </div>
    </div>

    <div class="footer"></div>
</body>

</html>

<?php
if (isset($_POST['del'])) {
    include 'register.php';
    volun_del($_POST['volun_id'], $conn); // Pass the ID and connection to the function
}
if (isset($_POST['edit'])) {
    $_SESSION['volun_edit_id']=$_POST['volun_id'];
    echo '<script> window.location.href = "admin_edit.php";</script>';
    }
// Close the database connection
$conn->close();
?>
<style>
    table{box-shadow:none !important; border:none !important;}
.container th h1{
  font-size: 1em;
  text-align: left;
  color: #185875;
  border:none !important;

}
.container td{
  font-weight: normal;
  font-size: 1em;
  border:none !important;
  -webkit-box-shadow:0 2px 2px-2px #0E1119;
  -moz-box-shadow:0 2px 2px -2px #0E1119;
  

}
.container{
  text-align: left;
  overflow: hidden;
  width: 80%;
  margin: 0 auto;
  display: table;
  padding: 0 0 8em 0;

}
.container td, .container th{
  padding-bottom: 2%;
  padding-top: 2%; border:none !important;
color:white
}
/*Background-color of the odd rows */
.container tr:nth-child(odd){
  background-color: #323C50;

}
/*Background-color of the even rows*/
.container tr:nth-child(even){
  background-color: #2C3446;
}
.container th{
  background-color: #1F2739;

}
.container td:first-child{color: #FB667A;}

.container tr:hover{
  background-color: #464A52;
  -webkit-box-shadow:0 6px 6px -6px #0E1119;
  -moz-box-shadow:0 6px 6px -6px #0E1119;
  box-shadow: 0 6px 6px -6px #0E1119;
}

.container td:hover{
  background-color: #FFF842;
  color: #403E10;
  font-weight: bold;
  box-shadow: #7F7C21 -1px  1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
  transform: translate3d(6px, -6px, 0);
  transition-delay: 0s;
  transition-duration: 0.4s;
  transition-property: all;
  transition-timing-function: line;
}
@media(max-width: 800px){
  .container td:nth-child(4),
  .container th:nth-child(4){display: none;}

  }

  @media (max-width: 768px) {
 .table-responsive {
    overflow-x: auto;
  }
 .table {
    width: 100%;
  }
 .table th,.table td {
    white-space: nowrap;
  }
}

@media (max-width: 480px) {
 .container {
    width: 95%;
    overflow-x: auto!important;
  }
 .table {
    font-size: 3px;
    margin-left:8px !important;
  }
  .table th{height:20px !important;}
 .table th,.table td {
padding:1px !important;
  }
}
</style>