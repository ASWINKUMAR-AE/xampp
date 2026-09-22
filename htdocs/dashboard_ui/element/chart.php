<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart.js Example</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="myChart" width="400" height="200"></canvas>
<style>

    
</style>
    <script>
        // Generate weeks for the labels (e.g., Week 1, Week 2, etc.)
        function generateWeeks(count) {
            const weeks = [];
            for (let i = 1; i <= count; i++) {
                weeks.push(`Week ${i}`);
            }
            return weeks;
        }

        // Generate custom data
        function generateCustomData(count) {
            return [50, 25, 30, 15, 45, 60, 70, 50, 40, 30, 20, 10];
        }

        // Define chart data
        const labels = generateWeeks(12); // Weeks for 12 data points
        const dataset1 = generateCustomData(12); // Custom values for dataset 1

        // Chart configuration
        const chartData = {
            labels: labels,
            datasets: [{
                label: 'Dataset 1',
                data: dataset1,
                borderColor: '#031633',
                backgroundColor: 'red',
                tension: 0.4,
            }]
        };

        const config = {
            type: 'line',
            data: chartData,
            options: {
                animations: {
                    radius: {
                        duration: 400,
                        easing: 'linear',
                        loop: (context) => context.active
                    }
                },
                hoverRadius: 12,
                hoverBackgroundColor: 'yellow',
                interaction: {
                    mode: 'nearest',
                    intersect: false,
                    axis: 'x'
                },
                plugins: {
                    tooltip: {
                        enabled: false
                    }
                }
            }
        };

        // Create the chart
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, config);
    </script>
</body>
</html>
