<?php 
    session_start();
    
    if (!isset($_SESSION['zalogowany'])){
        header('location:zalogowany.php');
    }


    require 'php/saldo.php';
?>
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
                            <h3 class="card-title">DODAJ ŚRODKI DO PORTFELA</h3>
                            <p class="card-text">
                                Środki w twoim portfelu mogą posłużyć do zakupu dowolnej gry lub płatności w grach.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="recharge-options mt-4">
                    <div class="option card mb-3">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <span>Dodaj 20,00zł</span>
                            <button role="button" class="golden-button" data-toggle="modal" data-target="#confirmModal" data-amount="20.00">
                                <span class="golden-text">Dodaj środki</span>
                            </button>
                        </div>
                    </div>
                    <div class="option card mb-3">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <span>Dodaj 40,00zł</span>
                            <button role="button" class="golden-button" data-toggle="modal" data-target="#confirmModal" data-amount="40.00">
                                <span class="golden-text">Dodaj środki</span>
                            </button>
                        </div>
                    </div>
                    <div class="option card mb-3">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <span>Dodaj 100,00zł</span>
                            <button role="button" class="golden-button" data-toggle="modal" data-target="#confirmModal" data-amount="100.00">
                                <span class="golden-text">Dodaj środki</span>
                            </button>
                        </div>
                    </div>
                    <div class="option card mb-3">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <span>Dodaj 200,00zł</span>
                            <button role="button" class="golden-button" data-toggle="modal" data-target="#confirmModal" data-amount="200.00">
                                <span class="golden-text">Dodaj środki</span>
                            </button>
                        </div>
                    </div>
                    <div class="option card mb-3">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <span>Dodaj 400,00zł</span>
                            <button role="button" class="golden-button" data-toggle="modal" data-target="#confirmModal" data-amount="400.00">
                                <span class="golden-text">Dodaj środki</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="account-info card text-black">
                    <div class="card-body">
                        <h4 class="card-title">TWÓJ PORTFEL</h4>
                        <p class="card-text">
                            Obecne saldo portfela <strong id="currentBalance"> 
                                <?php 
                                    include_once 'php/saldo.php'; 
                                    pokazSaldo(); 
                                ?> 
                            </strong>zł
                        </p>
                        <button class="btn btn-secondary btn-block">Zobacz szczegóły konta</button>
                        <button class="btn btn-secondary btn-block">Aktywuj kartę podarunkową lub kod portfela</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal do potwierdzenia doładowania -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Potwierdzenie Doładowania</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Zamknij">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Kwota doładowania:</strong> <span id="modalAmount"></span>zł</p>
                    <p>Czy na pewno chcesz doładować tę kwotę?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zrezygnuj</button>
                    <form method="post">
                        <input type="text" id="wartosc" name="wartosc" value="">
                        <button type="submit" class="btn btn-primary" id="confirmAddFundsButton" name="submit">Dodaj środki</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
            <p>&copy; 2024 Nazwa Gry. Wszelkie prawa zastrzeżone.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script src= "js/saldo.js">
    
    </script>
</body>
</html>