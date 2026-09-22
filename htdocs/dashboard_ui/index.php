<!DOCTYPE php>
<html lang="en">
<head>
    <title>Modern Dashboard</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome -->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link id="theme-style" rel="stylesheet" href="assets/css/style.css">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>




    <style>
    
        .app-page-title {
            font-size: 2.5rem;
            color: #fff;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.2);
        }

     

        .app-card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
        }

        .app-card-title {
            font-weight: 600;
            color: #555;
        }

        .app-footer {
            background: #333;
            color: #fff;
            text-align: center;
            padding: 1rem;
        }

        .app-footer .app-link {
            color: #fda085;
            text-decoration: none;
        }

        .app-footer .app-link:hover {
            text-decoration: underline;
        }

        .btn-primary {
            background: linear-gradient(45deg, #ff9a9e 0%, #fad0c4 100%);
            border: none;
            color: #fff;
            padding: 0.5rem 1.5rem;
            border-radius: 20px;
            transition: background 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, #fad0c4 0%, #ff9a9e 100%);
        }
		/* Ensure containers are fluid */


/* Responsive cards */
.app-card {
    padding: 20px;
    margin-bottom: 20px;
   background-color: #03163394;
border-radius: 16px;
color:white;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(5px);
-webkit-backdrop-filter: blur(5px);
padding: 10px  !important;
border: 1px solid rgba(216, 211, 211, 0.3);
}

/* Speedometer container responsiveness */
#speedometer {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%; /* Fill available height */
    width: 100%; /* Fill available width */
}

/* Adjust speedometer size dynamically */
#gaugecontainer {
    width: 90%; /* Scale the gauge size */
    max-width: 400px; /* Prevent gauge from becoming too large */
    height: auto;
    aspect-ratio: 1/1; /* Maintain square aspect ratio */
    margin: 0 auto;
}

/* Ensure slider and text stay responsive */
.slidecontainer {
    margin-top: 15px;
    text-align: center;
}

/* Responsive adjustments using media queries */
@media (max-width: 768px) {
    .app-page-title {
        font-size: 2rem;
        text-align: center;
    }

    .row.g-4 {
        flex-wrap: wrap;
    }

    .app-card {
        margin-bottom: 15px;
    }

    #gaugecontainer {
        max-width: 300px;
    }

    footer.app-footer {
        padding: 10px;
    }
}

@media (max-width: 576px) {
    .app-page-title {
        font-size: 1.8rem;
    }

    #gaugecontainer {
        max-width: 250px;
    }

    .btn-primary {
        padding: 0.4rem 1rem;
        font-size: 0.9rem;
    }
}
/* Ensure the parent container scales properly */
.container {
    max-width: 100%;
    padding: 10px;
    margin: 0 auto;
}

/* Adjust the app-card for responsiveness */
.app-card {
    padding: 20px;
    border-radius: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    background-color: #ffffff;
}

/* Ensure speedometer and chart fit side-by-side on larger screens */
@media (min-width: 768px) {
    .row.g-4 {
        display: flex;
        flex-wrap: nowrap;
    }

    .col-md-6 {
        flex: 1;
        margin: 0 10px;
    }
}

/* Adjust for smaller screens (mobile-first approach) */
@media (max-width: 767px) {
    .app-card {
        padding: 15px;
        margin-bottom: 20px;
    }

    .app-card-title {
        text-align: center;
        font-size: 16px;
    }

    .app-card-body canvas {
        width: 100% !important;
        height: auto !important;
    }
}

    </style>
</head>
<body class="app">   

    <?php include "element/header.php"; ?> <!-- Sidebar -->

   
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container">
            <h1 class="app-page-title text-white" data-aos="fade-up">Dashboard</h1>

            <!-- Row for Speedometer and Chart -->
            <div class="row g-4 mb-4 align-items-center">
                <!-- Speedometer Column -->
                <div class="col-12 col-md-6">
                    <div class="app-card bg-dark text-white" style="height:auto;" data-aos="fade-right">
                        <div class="app-card-header">
                            <h4 class="app-card-title">Speedometer</h4>
                            <!-- Toggle button to load speed.php -->
                            <div class="form-check form-switch float-end">
                                <input class="form-check-input" type="checkbox" id="checkboxInput" data-bs-toggle="collapse" data-bs-target="#speedometer" aria-expanded="false" aria-controls="speedometer" style="border:1px solid #031633 !important;">
                                <label class="form-check-label" for="checkboxInput"></label>
                            </div>
                        </div>
                        <div class="app-card-body">
                            <?php include "element/speed.php"; ?>
                        </div>
                    </div>
                </div>

                <!-- Chart Column -->
                <div class="col-12 col-md-6 p-2" id="chartDiv" style="display: none;">
                    <div class="app-card app-card-stats bg-dark text-white p-2" style="border-radius:50px; padding:30px;" data-aos="fade-left">
                        <div class="app-card-header">
                            <h4 class="app-card-title">Average Distance</h4>
                        </div>
                        <div class="app-card-body">
                            <?php include "element/chart.php"; ?>
                        </div>
                    </div>
                </div>

            </div><!--//row-->
            
            <div class="row g-4 mb-4">
                <!-- Pie Chart 1 -->
                <div class="col-12 col-md-4">
                    <div class="app-card bg-dark text-white" data-aos="fade-up" style="height: auto;">
                        <div class="app-card-header">
                            <h4 class="app-card-title">Pie Chart 1</h4>
                        </div>
                        <div class="app-card-body">
                            <canvas id="chart1"></canvas>
                        </div>
                    </div>
                </div>
                
                <!-- Pie Chart 2 -->
                <div class="col-12 col-md-4">
                    <div class="app-card bg-dark text-white" data-aos="fade-up" style="height: auto;">
                        <div class="app-card-header">
                            <h4 class="app-card-title">Pie Chart 2</h4>
                        </div>
                        <div class="app-card-body">
                            <canvas id="chart2"></canvas>
                        </div>
                    </div>
                </div>
                
                <!-- Pie Chart 3 -->
                <div class="col-12 col-md-4">
                    <div class="app-card bg-dark text-white" data-aos="fade-up" style="height: auto;">
                        <div class="app-card-header">
                            <h4 class="app-card-title">Pie Chart 3</h4>
                        </div>
                        <div class="app-card-body">
                            <canvas id="chart3"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



   <!--//app-footer-->
   <?php include "element/footer.php" ?>
    </div>     
    <!-- Scripts -->
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    AOS.init({
        duration: 1200, // Animation duration (in milliseconds)
        easing: 'ease-in-out', // Easing function
        once: true, // Whether animations should happen only once
        mirror: false // Whether animations should trigger when scrolling up
    });

</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    AOS.init({
        duration: 1000, // Duration of the animation in milliseconds
        easing: 'ease-in-out', // Smooth easing
        once: true, // Run animation only once
    });
</script>  <script>
    const ctx1 = document.getElementById('chart1').getContext('2d');
    const ctx2 = document.getElementById('chart2').getContext('2d');
    const ctx3 = document.getElementById('chart3').getContext('2d');

    const chart1 = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: ['Week1', 'Week2', 'Week3', 'Week4', 'Week5', 'Week6', 'Week7'],
            datasets: [{
                label: '# of Votes',
                data: [12, 15, 19, 14, 20, 17, 22],
                backgroundColor: ['#FF6F61', '#6B8E23', '#FFD700', '#32CD32', '#8A2BE2', '#FF6347', '#DDA0DD'],
                borderColor: '#fff',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    grid: {
                        color: '#444'
                    }
                },
                y: {
                    grid: {
                        color: '#444'
                    }
                }
            }
        }
    });

    const chart2 = new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: ['Week1', 'Week2', 'Week3', 'Week4', 'Week5', 'Week6', 'Week7'],
            datasets: [{
                data: [10, 20, 30, 25, 35, 40, 50],
                backgroundColor: ['#FF6F61', '#6B8E23', '#FFD700', '#32CD32', '#8A2BE2', '#FF6347', '#DDA0DD'],
                borderColor: '#333',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true
        }
    });

    const chart3 = new Chart(ctx3, {
        type: 'line',
        data: {
            labels: ['Week1', 'Week2', 'Week3', 'Week4', 'Week5', 'Week6', 'Week7'],
            datasets: [{
                label: 'Sales',
                data: [15, 25, 35, 20, 40, 50, 60],
                borderColor: '#4D8BFC',
                fill: false,
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    grid: {
                        color: '#444'
                    }
                },
                y: {
                    grid: {
                        color: '#444'
                    }
                }
            }
        }
    });
</script>

<script>
document.getElementById('checkboxInput').addEventListener('change', function() {
    const chartDiv = document.getElementById('chartDiv');
    const pieChart1 = document.getElementById('chart1').parentElement.parentElement;
    const pieChart2 = document.getElementById('chart2').parentElement.parentElement;
    const pieChart3 = document.getElementById('chart3').parentElement.parentElement;

    if (this.checked) {
        // Show all the chart divs when the toggle is on
        chartDiv.style.display = 'block';
        pieChart1.style.display = 'block';
        pieChart2.style.display = 'block';
        pieChart3.style.display = 'block';
    } else {
        // Hide all the chart divs when the toggle is off
        chartDiv.style.display = 'none';
        pieChart1.style.display = 'none';
        pieChart2.style.display = 'none';
        pieChart3.style.display = 'none';
    }
});


</script>
</body>
</html>


