<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nowoczesna Strona Główna</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/UserPage.css"> <!-- Dodajemy link do pliku CSS -->
 
</head>

<body class="body-main">

  <!-- Pierwszy navbar -->
  <?php 
    include '../templates/navbar.php';
  ?>
    
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
    