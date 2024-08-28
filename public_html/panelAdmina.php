<?php
session_start();

// Check if the user is an administrator
if (!isset($_SESSION["rola"]) || $_SESSION["rola"] != "administrator") {
    header("location: index.php");
    exit();
}

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onlinegamestore";  // Update this to your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize arrays to store data for sales and average ratings
$salesData = [];
$salesLabels = [];
$tableData = [];
$ratingData = [];

// SQL query to count how many users purchased each product (game) and calculate the total revenue
$sql = "
    SELECT 
        p.nazwa AS product_name, 
        COUNT(pp.id_uzytkownika) AS user_count,
        SUM(p.cena) AS total_revenue
    FROM posiadane_programy pp
    JOIN produkty p ON pp.id_produktu = p.id_produktu
    GROUP BY p.nazwa
";
$result = $conn->query($sql);

// Check if the query was successful
if ($result === false) {
    die("Error in SQL query: " . $conn->error);
}

// Fetch data and populate arrays
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $salesLabels[] = $row['product_name'];
        $salesData[] = $row['user_count'];
        $tableData[] = [
            'product_name' => $row['product_name'],
            'user_count' => $row['user_count'],
            'total_revenue' => $row['total_revenue']
        ];
    }
} else {
    echo "No data found.";
}

// SQL query to calculate the average rating for each product (game)
$sql = "
    SELECT 
        p.nazwa AS product_name, 
        AVG(pp.ocena) AS avg_rating
    FROM posiadane_programy pp
    JOIN produkty p ON pp.id_produktu = p.id_produktu
    GROUP BY p.nazwa
";
$result = $conn->query($sql);

// Check if the query was successful
if ($result === false) {
    die("Error in SQL query: " . $conn->error);
}

// Fetch rating data and populate arrays
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $ratingData[] = $row['avg_rating'];
    }
} else {
    echo "No rating data found.";
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/AdminPanel.css">
    <style>
        .container {
            margin-top: 50px;
        }
        .chart-container {
            position: relative;
            height: 40vh;
            width: 80vw;
            overflow-x: auto; /* Enable horizontal scroll if necessary */
        }
        .chart-wrapper {
            min-width: 600px; /* Minimum width for the chart */
            width: auto; /* Width will automatically adjust */
        }
        .table-container {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <!-- Navbar (optional) -->
    <?php 
        include 'templates/navbar.php';
        include 'templates/header.php';
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-4">Panel Admina</h2>
                <div class="card-body">
                    <button class="btn btn-secondary mr-2" onclick="location.href='panelUzytkownikow.php'">Zarządzaj użytkownikami</button>
                    <button class="btn btn-secondary mr-2" onclick="location.href='panelGier.php'">Zarządzaj grami</button>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <!-- User Purchase Data Bar Chart -->
                <div class="card">
                    <div class="card-header">
                        <h4>Ilość użytkowników, którzy zakupili grę</h4>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <div class="chart-wrapper">
                                <canvas id="userPurchaseBarChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="row mt-4">
            <div class="col-md-12 table-container">
                <div class="card">
                    <div class="card-header">
                        <h4>Podsumowanie sprzedaży gier</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nazwa Gry</th>
                                    <th>Ilość Użytkowników</th>
                                    <th>Łączna Suma Zakupu (PLN)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tableData as $row): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                                        <td><?php echo htmlspecialchars($row['user_count']); ?></td>
                                        <td><?php echo number_format($row['total_revenue'], 2, ',', ' '); ?> PLN</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Average Rating Bar Chart -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Średnia ocena gier</h4>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <div class="chart-wrapper">
                                <canvas id="averageRatingBarChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden JSON data -->
    <script id="salesLabels" type="application/json"><?php echo json_encode($salesLabels); ?></script>
    <script id="salesData" type="application/json"><?php echo json_encode($salesData); ?></script>
    <script id="ratingData" type="application/json"><?php echo json_encode($ratingData); ?></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
    // Fetch the data from hidden elements
    const salesLabels = JSON.parse(document.getElementById('salesLabels').textContent);
    const salesData = JSON.parse(document.getElementById('salesData').textContent);
    const ratingData = JSON.parse(document.getElementById('ratingData').textContent);

    // Adjust the width of the chart dynamically based on the number of labels
    const chartWrapper = document.querySelector('.chart-wrapper');
    const minWidth = 600; // Minimum width
    const additionalWidth = 50; // Additional width per label
    const calculatedWidth = Math.max(minWidth, salesLabels.length * additionalWidth);
    chartWrapper.style.width = calculatedWidth + 'px';

    // Create the user purchase bar chart
    const ctx1 = document.getElementById('userPurchaseBarChart').getContext('2d');
    new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: salesLabels,
            datasets: [{
                label: 'Liczba użytkownika w danej grze',
                data: salesData,
                backgroundColor: 'rgba(169, 49, 238, 0.856)',
                borderColor: 'rgba(31, 68, 189, 0.815)',
                borderWidth: 1,
                barThickness: 20 // Adjust this to decrease the width of the bars
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1 
                    },
                    grid: {
                        drawBorder: true, // Draws border at the end of the y-axis
                    }
                },
                x: {
                    ticks: {
                        autoSkip: false
                    },
                    grid: {
                        drawBorder: true, // Draws border at the end of the x-axis
                        drawOnChartArea: false, // Ensures grid lines are drawn only on tick marks
                    }
                }
            }
        }
    });

    // Create the average rating bar chart
    const ctx2 = document.getElementById('averageRatingBarChart').getContext('2d');
    new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: salesLabels,
            datasets: [{
                label: 'Średnia ocen danej gry',
                data: ratingData,
                backgroundColor: 'rgba(0, 153, 255, 0.7)',
                borderColor: 'rgba(0, 102, 204, 0.7)',
                borderWidth: 1,
                barThickness: 20 // Adjust this to decrease the width of the bars
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 0.5 
                    },
                    grid: {
                        drawBorder: true, // Draws border at the end of the y-axis
                    }
                },
                x: {
                    ticks: {
                        autoSkip: false
                    },
                    grid: {
                        drawBorder: true, // Draws border at the end of the x-axis
                        drawOnChartArea: false, // Ensures grid lines are drawn only on tick marks
                    }
                }
            }
        }
    });
});

    </script>
</body>
</html>
