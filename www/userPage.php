<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nowoczesna Strona Główna</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/UserPage.css"> <!-- Dodajemy link do pliku CSS -->
 
</head>

<body class="body-main">

  <!-- Pierwszy navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light custom-navbar">
    <!-- Zastąpienie tekstu logo własnym zdjęciem -->
    <a class="navbar-brand custom-navbar-brand" href="../html/"><img src="../zdj/stadia_controller_FILL0_wght400_GRAD0_opsz24.png" alt="Logo" style="max-width: 100px;"></a>
    
   

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
      
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse custom-navbar-nav" id="navbarSupportedContent1">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link custom-nav-link" href="../html/profilPage.html">Strona 1</a>
        </li>
        <li class="nav-item">
          <a class="nav-link custom-nav-link" href="#">Strona 2</a>
        </li>
        <li class="nav-item">
          <a class="nav-link custom-nav-link" href="#">Strona 3</a>

        </li>
        <li>  <a href="../html/login.html"><img src="../zdj/login_FILL0_wght400_GRAD0_opsz24.png" alt="Logowanie"></a></li>
      </ul>
    </div>
    </nav>
    <header class="jumbotron jumbotron-fluid text-white text-center custom-jumbotron">
        <div class="container">
          <h1 class="display-4 custom-jumbotron-heading">TRITON</h1>
        </div>
      </header>
      <section class="user-info">
        <div class="user-avatar">
            <img src="avatar.jpg" alt="Avatar">
        </div>
        <div class="user-details">
            <h2>Imię i nazwisko użytkownika</h2>
            <p>Email: example@example.com</p>
            <p>Data urodzenia: 01-01-1990</p>
            <p>Kraj: Polska</p>
            <p>Opis: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
    </section>
    
    <!-- Sekcja z ulubionymi grami użytkownika -->
    <div class="wallpaper">
    <section class="favorite-games">
        <h2>Ulubione gry</h2>
        <ul>
            <li>Nazwa gry 1</li>
            <li>Nazwa gry 2</li>
            <li>Nazwa gry 3</li>
            <!-- Dodaj więcej ulubionych gier -->
        </ul>
    </section>
  </div>
    
    <!-- Sekcja z osiągnięciami użytkownika -->
    <section class="user-achievements">
        <h2>Osiągnięcia</h2>
        <ul>
            <li>Nazwa osiągnięcia 1</li>
            <li>Nazwa osiągnięcia 2</li>
            <li>Nazwa osiągnięcia 3</li>
            <!-- Dodaj więcej osiągnięć -->
        </ul>
    </section>
    
    <!-- Stopka -->
    <footer>
        <p>&copy; 2024 Nazwa Twojej Firmy. Wszelkie prawa zastrzeżone.</p>
    </footer>

    <!--KONIEC-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    </body>
    </html>
    