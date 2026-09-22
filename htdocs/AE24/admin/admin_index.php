
<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="icon" type="image/svg+xml" href="/vite.svg" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DRAWING WITH ASWIN</title>



  <link rel="stylesheet" href="css/main.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">


</head>

<body class="  mx-auto">

<?php if(isset($_SESSION['admin_name'])): ?>
<?php include'admin_header.php';?>
 <style>
        body {
           
            color: white;
        }

        .sidebar {
            background-color: #202020;
            min-height: 100vh;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
        }

        .sidebar a:hover {
            background-color: #343434;
        }

        .card {
            background-color: #2c2c2c;
            border: none;
        }

        .card-header {
            background-color: #2c2c2c;
            border-bottom: 1px solid #3e3e3e;
        }

        .card-body {
            color: white;
        }

        .task-list a {
            color: white;
            text-decoration: none;
        }

        .task-list a:hover {
            background-color: #343434;
        }

        .highlight {
            background-color: orange;
            color: black;
        }
        
.notification-container {
    display: flex;
    flex-direction: column; 
    align-items: flex-end;
    position: fixed;
    top: 20px;
    right: 20px;
    width: 350px;
    border-radius: 25px;
}


.notification {
    width: 100%;

    border-radius: 8px;
    box-shadow: 0 2px 15px rgba(0,0,0,0.1);

    margin-bottom: 15px; /* Space between notifications */
    transform: translateX(100%);
    transition: transform 0.5s ease-out, opacity 0.5s ease-out;
    display: flex;
    align-items: center;
    opacity: 0;
    
}

.notification.hidden {
    opacity: 0;
    transform: translateX(100%);
}

.notification:not(.hidden) {
    opacity: 1;
    transform: translateX(0);
}

.innernoti {
    padding: 10px;
    background-color: rgb(44, 42, 42) !important;
    display: flex;
    align-items: center;
    border-radius: 25px;
    width: 100%;

}

.notification-icon {
    width: 40px;
    height: 40px;
    margin-right: 15px;
}

.text-content {
    flex-grow: 1;
}

.notification-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
}

.notification-title {
    font-weight: bold;
}

.close-btn {
    cursor: pointer;
    border: none;
    background-color: transparent;
    font-size: 1.2rem;
}
    </style>
</head>

<body>
<div class="notification-container">
    </div>
    <div class="container-fluid">

<?php include 'slide.php'; ?>
            <div class="col-md-10 p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h1><span class="text-secondary">Earnings </span> Manage </h1>
                </div>
                <p>Here you can track projects, tasks progress and team activity.</p>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between">
                                <h5>Product<span class="text-secondary" > Earnings</span></h5>
                                <div>
                <button id="weekBtn" class="btn btn-outline-dark btn-sm">Week</button>
                <button id="monthBtn" class="btn btn-outline-dark btn-sm">Month</button>
                <button id="yearBtn" class="btn btn-outline-dark btn-sm">Year</button>
            </div>  </div>
                            <div class="card-body">
                                <canvas id="earningsChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>Task List</h5>
                            </div>
                            <div class="card-body task-list ">
                                <a href="#" class="d-block p-2">Packing</a>
                                <a href="#" class="d-block p-2 ">save </a>
                                <a href="#" class="d-block p-2">fast</a>
                                <a href="#" class="d-block p-2">low price</a>
                                <a href="#" class="d-block p-2">review</a>
                             </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-8">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>Product status</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="performanceChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>Day Activity</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="activityChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
 </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Sample chart data
        var ctxEarnings = document.getElementById('earningsChart').getContext('2d');

    var weeklyData = [1200, 1900, 3000, 500, 2000, 3465, 1500];
    var monthlyData = [5000, 7000, 6000, 8000, 9500, 10500, 12000, 14000, 16000, 17500, 18000, 19500];
    var yearlyData = [15000, 17000, 18000, 20000, 22000, 24000, 26000, 28000, 30000, 32000, 34000, 36000];

    var earningsChart = new Chart(ctxEarnings, {
        type: 'bar',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Earnings',
                data: weeklyData,
                backgroundColor: 'orange',
                borderColor: 'orange',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    document.getElementById('weekBtn').addEventListener('click', function() {
        updateChart(weeklyData, ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']);
    });

    document.getElementById('monthBtn').addEventListener('click', function() {
        updateChart(monthlyData, ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', 'Week 6', 'Week 7', 'Week 8', 'Week 9', 'Week 10', 'Week 11', 'Week 12']);
    });

    document.getElementById('yearBtn').addEventListener('click', function() {
        updateChart(yearlyData, ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
    });

    function updateChart(data, labels) {
        earningsChart.data.labels = labels;
        earningsChart.data.datasets[0].data = data;
        earningsChart.update();
    }
        var ctxPerformance = document.getElementById('performanceChart').getContext('2d');
        var performanceChart = new Chart(ctxPerformance, {
            type: 'line',
            data: {
                labels: ['Q1', 'Q2', 'Q3', 'Q4'],
                datasets: [{
                    label: '2024',
                    data: [6000, 5000, 8000, 9000],
                    backgroundColor: 'transparent',
                    borderColor: 'orange',
                    borderWidth: 1
                }
                , {
                    label: '2025',
                    data: [2000, 9000, 5000, 9000],
                    backgroundColor: 'transparent',
                    borderColor: 'orange',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctxActivity = document.getElementById('activityChart').getContext('2d');
        var activityChart = new Chart(ctxActivity, {
            type: 'doughnut',
            data: {
                labels: ['Project review', 'Planning', 'Business meeting'],
                datasets: [{
                    label: 'Day Activity',
                    data: [5, 75, 40],
                    backgroundColor: ['#a4c639', 'orange', '#3498db'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>



              <script>
                   const adminName = '<?php echo $_SESSION["admin_name"]; ?>';
                document.addEventListener('DOMContentLoaded', function() {
    const notificationData = [
        { 
            title:  `Welcome,Hi ${adminName}.`, 
            body:"",
            imgUrl: "images/logo.png" 
        }
    ];

    notificationData.forEach((data, index) => {
        setTimeout(() => {
            createNotification(data.title, data.body, data.imgUrl);
        }, 1000 + 5000 * index); // Increase delay for each notification
    });
});

function createNotification(title, body, imgUrl) {
    const container = document.querySelector('.notification-container');

    // Create notification element
    const notification = document.createElement('div');
    notification.className = 'notification hidden'; // Start hidden to manage transition
    notification.innerHTML = `
        <div class="innernoti">
            <img src="${imgUrl}" alt="Icon" class="notification-icon">
            <div class="text-content">
                <div class="notification-header">
                    <span class="notification-title">${title}</span>
                    <button class="close-btn text-white">&times;</button>
                </div>
                <div class="notification-body">${body}</div>
            </div>
        </div>
    `;

    // Insert the new notification at the top of the container
    container.prepend(notification); // Ensures new notifications are added at the top

    // Show notification with a delay to allow CSS transition
    setTimeout(() => {
        notification.classList.remove('hidden');
    }, 100);

    // Set auto-hide with cleanup
    setTimeout(() => {
        notification.classList.add('hidden');
        setTimeout(() => {
            if (notification.parentNode) {
                notification.parentNode.removeChild(notification);
            }
        }, 500); // Ensure smooth fading before removal
    }, 30000);

    // Close button functionality
    notification.querySelector('.close-btn').addEventListener('click', () => {
        notification.classList.add('hidden');
        setTimeout(() => {
            if (notification.parentNode) {
                notification.parentNode.removeChild(notification);
            }
        }, 500); // Remove from DOM after transition
    });
}
              </script>





 <?php include 'footer.php'; ?>   
 <?php else: ?>
<script>window.location.href="admin_login.php";</script>
                <?php endif; ?>

</body>

</html>