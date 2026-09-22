<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike Distance Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div style="width: 80%; margin: auto; padding-top: 50px;">
    <canvas id="myChart2"></canvas> <!-- This is where the chart will render -->
</div>

<script>
    // Define the chart data
    const data = {
        labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', 'Week 6', 'Week 7', 'Week 8', 'Week 9', 'Week 10', 'Week 11', 'Week 12'], // Weeks
        datasets: [
            {
                label: 'Bike 1 - Distance (km)',
                data: [45, 55, 60, 70, 80, 90, 100, 110, 95, 80, 65, 50], // Data for Bike 1
                borderColor: 'rgb(255, 99, 132)', // Border color
                backgroundColor: 'rgba(255, 99, 132, 0.5)', // Background color
                borderWidth: 2,
                borderRadius: 5,
                borderSkipped: false,
            },
            {
                label: 'Bike 2 - Distance (km)',
                data: [40, 50, 55, 65, 75, 85, 95, 100, 90, 75, 60, 45], // Data for Bike 2
                borderColor: 'rgb(54, 162, 235)', // Border color
                backgroundColor: 'rgba(54, 162, 235, 0.5)', // Background color
                borderWidth: 2,
                borderRadius: 5,
                borderSkipped: false,
            }
        ]
    };

    // Define the chart configuration
    const config = {
        type: 'bar', // Bar chart type
        data: data, // Data object
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top', // Position of the legend
                },
                title: {
                    display: true,
                    text: 'Bike Distance Covered Weekly (in km)' // Chart title
                }
            },
            scales: {
                y: {
                    beginAtZero: true, // Start y-axis at zero
                    title: {
                        display: true,
                        text: 'Distance (km)' // Y-axis label
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Weeks' // X-axis label
                    }
                }
            }
        }
    };

    // Create the chart
    window.onload = function () {
        const ctx = document.getElementById('myChart2').getContext('2d');
        new Chart(ctx, config);
    };
</script>
</body>
</html>
