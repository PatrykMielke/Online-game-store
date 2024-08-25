<?php
session_start(); 
<?php
session_start(); 
if (!isset($_SESSION["rola"]) or $_SESSION["rola"] != "administrator"){
    header("location: index.php");
    exit();
}

require('php/config.php');

$salesData = [];
$salesLabels = [];

$sql = "SELECT product_name, SUM(quantity_sold) as total_sales FROM sales GROUP BY product_name";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $salesLabels[] = $row['product_name'];
        $salesData[] = $row['total_sales'];
    }
}

$userAgeData = [];
$userAgeLabels = ["0-18", "19-25", "26-35", "36-50", "51+"];

$sql = "
    SELECT 
        CASE
            WHEN age BETWEEN 0 AND 18 THEN '0-18'
            WHEN age BETWEEN 19 AND 25 THEN '19-25'
            WHEN age BETWEEN 26 AND 35 THEN '26-35'
            WHEN age BETWEEN 36 AND 50 THEN '36-50'
            ELSE '51+'
        END as age_range,
        COUNT(*) as count
    FROM users
    GROUP BY age_range
";
$result = $conn->query($sql);

$ageDataMap = [
    "0-18" => 0,
    "19-25" => 0,
    "26-35" => 0,
    "36-50" => 0,
    "51+" => 0,
];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $ageDataMap[$row['age_range']] = $row['count'];
    }
}

$userAgeData = array_values($ageDataMap);
$conn->close();
    exit();
}

// Setup database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$salesData = [];
$salesLabels = [];

$sql = "SELECT product_name, SUM(quantity_sold) as total_sales FROM sales GROUP BY product_name";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $salesLabels[] = $row['product_name'];
        $salesData[] = $row['total_sales'];
    }
}

$userAgeData = [];
$userAgeLabels = ["0-18", "19-25", "26-35", "36-50", "51+"];

$sql = "
    SELECT 
        CASE
            WHEN age BETWEEN 0 AND 18 THEN '0-18'
            WHEN age BETWEEN 19 AND 25 THEN '19-25'
            WHEN age BETWEEN 26 AND 35 THEN '26-35'
            WHEN age BETWEEN 36 AND 50 THEN '36-50'
            ELSE '51+'
        END as age_range,
        COUNT(*) as count
    FROM users
    GROUP BY age_range
";
$result = $conn->query($sql);

$ageDataMap = [
    "0-18" => 0,
    "19-25" => 0,
    "26-35" => 0,
    "36-50" => 0,
    "51+" => 0,
];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $ageDataMap[$row['age_range']] = $row['count'];
    }
}

$userAgeData = array_values($ageDataMap);
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/AdminPanel.css" />
</head>
<body>
<?php 
    include 'templates/navbar.php';
    include 'templates/header.php';
?>
?>

<!-- Main Container -->
<div class="container mt-5">
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
        <div class="col-md-6">
            <!-- Widget 1: Sales Data Line Chart -->
            <div class="card">
                <div class="card-header">
                    <h4>Sprzedaż Produktu</h4>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="salesLineChart"></canvas>
        <div class="col-md-6">
            <!-- Widget 1: Sales Data Line Chart -->
            <div class="card">
                <div class="card-header">
                    <h4>Sprzedaż Produktu</h4>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="salesLineChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Widget 2: User Age Data Bar Chart -->
            <div class="card">
                <div class="card-header">
                    <h4>Wiek Użytkowników</h4>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="userActivityBarChart"></canvas>
        <div class="col-md-6">
            <!-- Widget 2: User Age Data Bar Chart -->
            <div class="card">
                <div class="card-header">
                    <h4>Wiek Użytkowników</h4>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="userActivityBarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Hidden JSON data -->
<script id="salesLabels" type="application/json"><?php echo json_encode($salesLabels); ?></script>
<script id="salesData" type="application/json"><?php echo json_encode($salesData); ?></script>
<script id="userAgeLabels" type="application/json"><?php echo json_encode($userAgeLabels); ?></script>
<script id="userAgeData" type="application/json"><?php echo json_encode($userAgeData); ?></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="js/adminPanel.js"></script>
    </div>
</div>

<!-- Hidden JSON data -->
<script id="salesLabels" type="application/json"><?php echo json_encode($salesLabels); ?></script>
<script id="salesData" type="application/json"><?php echo json_encode($salesData); ?></script>
<script id="userAgeLabels" type="application/json"><?php echo json_encode($userAgeLabels); ?></script>
<script id="userAgeData" type="application/json"><?php echo json_encode($userAgeData); ?></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="js/adminPanel.js"></script>
</body>
</html>

 