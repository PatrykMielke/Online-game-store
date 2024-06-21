<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oferta Gry</title>
    <link
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    rel="stylesheet"
/>
    <link rel="stylesheet" href="css/Game.css">
</head>
<body>
<?php 
    include 'templates/navbar.php';
    include 'templates/header.php';
  
  ?>

  
</header>

<section id="features" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2>Funkcje Gry</h2>
                    <ul>
                        <li>Ekscytująca fabuła</li>
                        <li>Wielu bohaterów do wyboru</li>
                        <li>Rozbudowany system walki</li>
                        <li>Piękne lokacje</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <img src="images/game-screenshot1.jpg" class="img-fluid" alt="Screenshot gry">
                </div>
            </div>
        </div>
    </section>

    <section id="screenshots" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Zrzuty Ekranu</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <img src="images/game-screenshot1.jpg" class="img-fluid" alt="Screenshot gry">
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <img src="images/game-screenshot2.jpg" class="img-fluid" alt="Screenshot gry">
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <img src="images/game-screenshot1.jpg" class="img-fluid" alt="Screenshot gry">
                </div>
            </div>
        </div>
    </section>

    <section id="pricing" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Cena</h2>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="card text-center">
                        <div class="card-header">
                            Standard Edition
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">49.99 PLN</h5>
                            <p class="card-text">Podstawowa wersja gry.</p>
                            <button class="cssbuttons-io" data-toggle="modal" data-target="#purchaseModal"
                            data-title="Standard Edition" data-price="49.99">
                                <span>
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M24 12l-5.657 5.657-1.414-1.414L21.172 12l-4.243-4.243 1.414-1.414L24 12zM2.828 12l4.243 4.243-1.414 1.414L0 12l5.657-5.657L7.07 7.757 2.828 12zm6.96 9H7.66l6.552-18h2.128L9.788 21z" fill="currentColor"></path>
                                    </svg>
                                    Kup
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal do potwierdzenia zakupu -->
    <div class="modal fade" id="purchaseModal" tabindex="-1" aria-labelledby="purchaseModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="purchaseModalLabel">Potwierdzenie Zakupu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Zamknij">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Tytuł gry:</strong> <span id="gameTitle"></span></p>
                    <p><strong>Cena gry:</strong> <span id="gamePrice"></span> PLN</p>
                    <p><strong>Stan konta po zakupie:</strong> <span id="balanceAfterPurchase"></span> PLN</p>
                    <p>Czy na pewno chcesz kupić tę grę?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zrezygnuj</button>
                    <button type="button" class="btn btn-primary" id="confirmPurchaseButton">Kup</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
            <p>&copy; 2024 Nazwa Gry. Wszelkie prawa zastrzeżone.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script src="js/gra.js">
        // Przykładowy stan konta użytkownika (do testowania)
        
    </script>
</body>
</html>
