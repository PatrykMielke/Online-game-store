<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Doładowanie Środków</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/AddMoney.css" />
</head>
<body class="body-main">
   ---
   <?php 
    include 'templates/navbar.php';
    include 'templates/header.php';
  ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="infoCard">
                    <div class="card text-black">
                        <div class="card-body">
                            <h3 class="card-title">DODAJ ŚRODKI DO PORTFELA UŻYTKOWNIKA NAZWA KONTA</h3>
                            <p class="card-text">
                                Środki w twoim Portfelu Steam mogą posłużyć do zakupu dowolnej gry na Steam lub do płatności w grach, które obsługują transakcje Steam. Możesz sprawdzić zamówienie przed jego realizacją.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="recharge-options mt-4">
                    <div class="option card mb-3">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <span>Dodaj 20,00zł</span>
                            <button role="button" class="golden-button">
                                <span class="golden-text">Dodaj środki</span>
                            </button>
                        </div>
                    </div>
                    <div class="option card mb-3">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <span>Dodaj 40,00zł</span>
                            <button role="button" class="golden-button">
                                <span class="golden-text">Dodaj środki</span>
                            </button>
                        </div>
                    </div>
                    <div class="option card mb-3">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <span>Dodaj 100,00zł</span>
                            <button role="button" class="golden-button">
                                <span class="golden-text">Dodaj środki</span>
                            </button>
                        </div>
                    </div>
                    <div class="option card mb-3">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <span>Dodaj 200,00zł</span>
                            <button role="button" class="golden-button">
                                <span class="golden-text">Dodaj środki</span>
                            </button>
                        </div>
                    </div>
                    <div class="option card mb-3">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <span>Dodaj 400,00zł</span>
                            <button role="button" class="golden-button">
                                <span class="golden-text">Dodaj środki</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="account-info card text-black">
                    <div class="card-body">
                        <h4 class="card-title">TWOJE KONTO STEAM</h4>
                        <p class="card-text">
                            Obecne saldo portfela <strong>0,00zł</strong>
                        </p>
                        <button class="btn btn-secondary btn-block">Zobacz szczegóły konta</button>
                        <button class="btn btn-secondary btn-block">Aktywuj kartę podarunkową lub kod portfela</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
