<?php
$channelID = "2816103"; // Replace with your channel ID
$readAPIKey = "WDQ84H8LW2IOAO25"; // Replace with your Read API Key (if private)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThingSpeak Data Visualization</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { background-color: #121212; color: #e0e0e0; }
        .card { background-color: #1e1e1e; border-color: #333; }
        .card-title, .text-center { color: #fff; }
        .btn { background-color: #333; color: #fff; }
        .btn:hover { background-color: #555; }
        table { color: #e0e0e0; }
        th, td { text-align: center; padding: 10px; }
        th { background-color: #333; }
        tr:nth-child(even) { background-color: #222; }
        .high-value-row { background-color: red !important; }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">TEAM SIXER LANDSLIDE DETECTION</h1>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-center">Soil Moisture</h5>
                        <canvas id="chartField1"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-center">Vibration</h5>
                        <canvas id="chartField2"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-center">Humidity</h5>
                        <canvas id="chartField3"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-center">Temperature</h5>
                        <canvas id="chartField4"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="text-center mt-4 mb-4">ThingSpeak Data Table</h2>
        <div id="alertContainer" class="text-center mb-3"></div>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Timestamp</th>
                    <th scope="col">Soil Moisture</th>
                    <th scope="col">Temperature</th>
                    <th scope="col">Humidity</th>
                    <th scope="col">Vibration</th>
                </tr>
            </thead>
            <tbody id="dataTableBody">
                <!-- Dynamic rows will be added here -->
            </tbody>
        </table>
    </div>
    <script>
        const channelID = "<?php echo $channelID; ?>";
        const readAPIKey = "<?php echo $readAPIKey; ?>";
        const results = 50;

        let charts = {};

        // Function to create a chart
        function createChart(canvasId, label, color) {
            const ctx = document.getElementById(canvasId).getContext('2d');
            return new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [
                        {
                            label: label,
                            data: [],
                            borderColor: color,
                            borderWidth: 2,
                            fill: false,
                        },
                    ],
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: true, position: 'top' },
                    },
                    scales: {
                        x: {
                            title: { display: true, text: 'Timestamp' },
                            ticks: { autoSkip: true, maxTicksLimit: 5 },
                        },
                        y: { title: { display: true, text: label } },
                    },
                },
            });
        }

        // Initialize charts
        charts.field1 = createChart("chartField1", "Soil Moisture", "rgba(75, 192, 192, 1)");
        charts.field2 = createChart("chartField2", "Vibration", "rgba(255, 99, 132, 1)");
        charts.field3 = createChart("chartField3", "Humidity", "rgba(54, 162, 235, 1)");
        charts.field4 = createChart("chartField4", "Temperature", "rgba(255, 206, 86, 1)");

        // Update charts with data
        function updateCharts(data) {
            const timestamps = data.map((feed) => new Date(feed.created_at).toLocaleString());
            charts.field1.data.labels = timestamps;
            charts.field1.data.datasets[0].data = data.map((feed) => feed.field1);
            charts.field1.update();

            charts.field2.data.labels = timestamps;
            charts.field2.data.datasets[0].data = data.map((feed) => feed.field2);
            charts.field2.update();

            charts.field3.data.labels = timestamps;
            charts.field3.data.datasets[0].data = data.map((feed) => feed.field3);
            charts.field3.update();

            charts.field4.data.labels = timestamps;
            charts.field4.data.datasets[0].data = data.map((feed) => feed.field4);
            charts.field4.update();
        }

        // Update table and alert
        function updateTable(data) {
    const tableBody = document.getElementById("dataTableBody");
    const alertContainer = document.getElementById("alertContainer");
    tableBody.innerHTML = "";

    if (data.length > 0) {
        const firstRow = data[0];
        const isHighValue = firstRow.field1 >= 80 || firstRow.field4 == 1;

        if (isHighValue) {
            alertContainer.innerHTML = `
                <div class="alert alert-danger">
                    High value detected at ${new Date(firstRow.created_at).toLocaleString()}: 
                    Soil Moisture = ${firstRow.field1}, Vibration = ${firstRow.field4}
                </div>
            `;

            // Trigger the PHP mail function via AJAX
            fetch('send_alert.php', {
                method: 'POST',
                body: JSON.stringify({
                    subject: 'High Value Alert - Landslide Detection',
                    message: `High value detected at ${new Date(firstRow.created_at).toLocaleString()}:<br>Soil Moisture = ${firstRow.field1}<br>Vibration = ${firstRow.field4}`
                }),
                headers: {
                    'Content-Type': 'application/json'
                }
            });
        } else {
            alertContainer.innerHTML = "";
        }
    }

    data.forEach((feed) => {
        const rowClass = feed.field1 >= 70 || feed.field4 == 1 ? "high-value-row" : "";
        tableBody.innerHTML += `
            <tr class="${rowClass}">
                <td>${new Date(feed.created_at).toLocaleString()}</td>
                <td>${feed.field1}</td>
                <td>${feed.field2}</td>
                <td>${feed.field3}</td>
                <td>${feed.field4}</td>
            </tr>
        `;
    });
}

        // Fetch data from ThingSpeak
        function fetchData() {
            const url = `https://api.thingspeak.com/channels/${channelID}/feeds.json?api_key=${readAPIKey}&results=${results}`;
            fetch(url)
                .then((response) => response.json())
                .then((data) => {
                    const feeds = data.feeds.reverse().filter(feed =>
                        !isNaN(feed.field1) && !isNaN(feed.field2) &&
                        !isNaN(feed.field3) && !isNaN(feed.field4)
                    );
                    updateCharts(feeds);
                    updateTable(feeds);
                })
                .catch((error) => {
                    console.error("Error fetching data:", error);
                    document.getElementById("alertContainer").innerHTML = `
                        <div class="alert alert-warning">Unable to fetch data. Please check your connection or channel settings.</div>
                    `;
                });
        }

        // Fetch data every 5 seconds
        setInterval(fetchData, 5000);
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
