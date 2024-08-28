<?php
session_start();
  // sprawdź czy instnieje plik konfiguracyjny
  if (file_exists("php/config.php")) {
      include 'php/config.php';
  }
  else{
    header('location:install.php');
  }
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nowoczesna Strona Główna</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/MainPage.css">
  <style>
    .card .content {
        width: 100%;
        height: 100%;
        transition: transform 0.5s ease;
    }

    .card:hover .content {
        transform: rotateY(180deg);
    }

    .card .front,
    .card .back {
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .card .back {
        transform: rotateY(180deg);
    }

    .card .back-content {
        padding: 20px;
    }
  </style>
</head>

<body class="body-main">

  <?php 
    include 'templates/navbar.php';
    include 'templates/header.php';
    include 'templates/navbar2.php';
  ?>
<h2 class="text-center pt-5">Najnowsze gry</h2><br>
<section id="najnowsze-gry" class="container">
    <div class="row justify-content-center">
        <?php 
        // Include the database connection
        include './php/config.php';
        
        // Fetch the 4 most recent games
        $query = "SELECT * FROM `{$prefix}produkty` WHERE czy_dostepny = 1 ORDER BY id_produktu DESC LIMIT 5";
        $result = $conn->query($query);
        $recentGames = array();
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $recentGames[] = $row;
            }
        }
        
        foreach ($recentGames as $game) : ?>
          <div class="col-9 col-md-2 mx-5 mb-4">
              <div class="card" style="height: 20vh; min-width: 10vw;">
                <a href="stronaGry.php?id=<?php echo htmlspecialchars($game['id_produktu']); ?>" class="content text-decoration-none bg-gray-700 text-center"> 
                <img src="./img/products/<?php echo htmlspecialchars($game['ikona']); ?>" alt="<?php echo htmlspecialchars($game['nazwa']); ?>" class="img-thumbnail" style="height: 80%; width: 100%;">
                  <h4><?php echo htmlspecialchars($game['nazwa']); ?></h4>
                      <div class="back">
                          <div class="back-content">
                          
                          <p><?php echo htmlspecialchars($game['opis']); ?></p>
                          </div>
                      </div>
                  </div>
                  </a>
          </div>
      <?php endforeach; ?>
    </div>
</section>

  <div class="wallpaper">
  <section id="nowosci-i-aktualnosci" class="my-5">
    <h2 class="text-center mb-4 p-2">O zespole</h2><br
    <div class="row">
      <div class="text-center mb-5 p-2">
        <h4>Patryk Mielke</h4>
      </div>

      <div class="text-center mb-5 p-2">
        <h4>Michał Borowski</h4>
      </div>

      <div class="text-center mb-5 p-2">
        <h4>Marcel Łuczak</h4>
      </div>
    </div>
  </section>

  <section id="przyszlosciowe-plany" class="container my-5 p-3">
    <h2 class="text-center mb-3">Przyszłościowe plany platformy</h2>
    <div class="row">
      <div class="col-md-12 m-5">
        <p>Nasza platforma ma ambitne cele na przyszłość. Planujemy wprowadzić... Tutaj opisz przyszłościowe plany i cele platformy.</p>
        <p>Jednym z naszych głównych celów jest... Opisz tutaj główny cel lub cele przyszłościowe platformy.</p>
        <p>Wierzymy, że nasze działania przyniosą korzyści dla użytkowników, zapewniając im... Opisz tutaj korzyści, jakie przyniesie realizacja przyszłościowych planów.</p>
      </div>
    </div>
  </section>
  <!-- Tutaj możesz umieścić treść dotyczącą nowości i aktualności -->
</section>
<footer class="bg-dark text-light text-center py-3 custom-footer">
  <p>2024 TRITON. Wszelkie prawa zastrzeżone.</p>
</footer>

<!-- Skrypty JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
 