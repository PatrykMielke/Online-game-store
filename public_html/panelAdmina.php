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
            <!-- Example Widget -->
            <div class="card">
                <div class="card-header">
                    <h4>Widget 1</h4>
                </div>
                <div class="card-body">
                    <p>This could be a chart or summary of data.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Example Widget -->
            <div class="card">
                <div class="card-header">
                    <h4>Widget 2</h4>
                </div>
                <div class="card-body">
                    <p>This could be a chart or summary of data.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- JavaScript to Handle Role Change and Save/Delete -->
<script src="../js/adminPanel.js"></script>

</body>
</html>
