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
    <nav class="navbar navbar-expand-lg navbar-light bg-light custom-navbar">
        <a class="navbar-brand custom-navbar-brand" href="#"
            ><img
                src="../zdj/stadia_controller_FILL0_wght400_GRAD0_opsz24.png"
                alt="Logo"
                style="max-width: 100px"
        /></a>
        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent1"
            aria-controls="navbarSupportedContent1"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div
            class="collapse navbar-collapse custom-navbar-nav"
            id="navbarSupportedContent1"
        >
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link custom-nav-link" href="../html/profilPage.html"
                        >Strona 1</a
                    >
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-nav-link" href="#">Strona 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-nav-link" href="#">Strona 3</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-nav-link" href="../html/login.html"
                        ><img
                            src="../zdj/login_FILL0_wght400_GRAD0_opsz24.png"
                            alt="Logowanie"
                    /></a>
                </li>
            </ul>
        </div>
    </nav>
    <header
    class="jumbotron jumbotron-fluid text-white text-center custom-jumbotron"
>
    <div class="container">
        <h1 class="display-4 custom-jumbotron-heading">TRITON</h1>
    </div>
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
                            <button class="cssbuttons-io">
                                <span
                                  ><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                      d="M24 12l-5.657 5.657-1.414-1.414L21.172 12l-4.243-4.243 1.414-1.414L24 12zM2.828 12l4.243 4.243-1.414 1.414L0 12l5.657-5.657L7.07 7.757 2.828 12zm6.96 9H7.66l6.552-18h2.128L9.788 21z"
                                      fill="currentColor"
                                    ></path>
                                  </svg>
                                  Kup</span
                                >
                              </button>
                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
            <p>&copy; 2024 Nazwa Gry. Wszelkie prawa zastrzeżone.</p>
        </div>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>