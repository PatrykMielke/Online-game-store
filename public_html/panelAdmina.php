<?php session_start(); 
if (!isset($_SESSION["rola"]) or $_SESSION["rola"] != "administrator"){
    header("location: index.php");
}
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
                <!-- New Widget: Financial Summary -->
                <div class="card">
                    <div class="card-header">
                        <h4>Podsumowanie Finansowe</h4>
                    </div>
                    <div class="card-body">
                        <p>Kluczowe wskaźniki finansowe:</p>
                        <ul>
                            <li>Całkowite przychody: 1 000 000 zł</li>
                            <li>Wydatki operacyjne: 400 000 zł</li>
                            <li>Zysk netto: 600 000 zł</li>
                            <li>Średnia marża zysku: 60%</li>
                            <li>Najlepiej sprzedający się produkt: Produkt A</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- New Widget: User Feedback -->
                <div class="card">
                    <div class="card-header">
                        <h4>Opinie Użytkowników</h4>
                    </div>
                    <div class="card-body">
                        <p>Ostatnie opinie użytkowników:</p>
                        <ul>
                            <li>John Doe: "Świetna platforma!"</li>
                            <li>Jane Smith: "Miałem problemy z płatnością."</li>
                            <li>Adam Kowalski: "Szybka dostawa, polecam!"</li>
                            <li>Ewa Nowak: "Brakuje niektórych funkcji."</li>
                            <li>Anna Wiśniewska: "Support jest bardzo pomocny."</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <!-- Widget 1: User Activity Line Chart -->
                <div class="card">
                    <div class="card-header">
                        <h4>Aktywność Użytkowników</h4>
                    </div>
                    <div class="card-body">
                        <p>Aktywność użytkowników w ostatnich 7 dniach:</p>
                        <div class="chart-container">
                            <canvas id="userActivityLineChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Widget 2: Sales Data Line Chart -->
                <div class="card">
                    <div class="card-header">
                        <h4>Dane Sprzedaży</h4>
                    </div>
                    <div class="card-body">
                        <p>Sprzedaż produktów w ostatnim miesiącu:</p>
                        <div class="chart-container">
                            <canvas id="salesLineChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/adminPanel.js"></script>
</body>
</html>
