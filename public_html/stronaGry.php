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

    include './php/config.php';

// Check if game ID is provided
if (isset($_GET['id'])) {
    $gameId = intval($_GET['id']);

    // Fetch game details along with tags
    
    $sql = "SELECT p.id_produktu, p.nazwa AS nazwa_produktu, p.id_wydawcy, p.ikona, p.cena, p.czy_dostepny, p.opis, GROUP_CONCAT(t.nazwa SEPARATOR ', ') AS tagi
        FROM `{$prefix}produkty` p
        LEFT JOIN `{$prefix}tagi` t ON p.id_produktu = t.id_produktu";
            
   

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $gameId, $gameId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $game = $result->fetch_assoc();
    } else {
        echo "<p class='text-center mt-5'>Gra o podanym ID nie istnieje.</p>";
        exit;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<p class='text-center mt-5'>Nie podano ID gry.</p>";
    exit;
}
?>

  
</header>

<section class="text-center">
    <div class="display-3 font-weight-bold shadow"><?php echo $game ? htmlspecialchars($game['nazwa']) : 'Tutuł gry'; ?></div>
</section>

<?php if ($game): ?>
    <section id="screenshots" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Zdjęcie</h2>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 mb-4">
                    <img src="./img/products/<?php echo htmlspecialchars($game['ikona']); ?>" class="img-fluid" alt="Screenshot gry">
                </div>
            </div>
        </div>
    </section>

    <section id="screenshots" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Opis</h2>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 mb-4">
                    <div>
                        <?php echo htmlspecialchars($game['opis']); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-2">
                    <h2>Tagi Gry</h2>
                    <ul>
                        <!-- Assuming the tags are stored in a comma-separated string -->
                        <?php foreach (explode(',', $game['tagi']) as $tag): ?>
                            <li><?php echo htmlspecialchars(trim($tag)); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="pricing" class="py-5">
    <div class="container">
        <h2 class="text-center">Kup teraz</h2>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="card text-center">
                    <div class="card-header">
                        Standard Edition
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($game['cena']); ?> PLN</h5>
                        <p class="card-text">Podstawowa wersja gry.</p>
                        <!-- Form should enclose the button and hidden inputs -->
                        <form id="purchaseForm" method="POST" action="php/kup_gre.php">
                            <input type="hidden" name="game_id" value="<?php echo htmlspecialchars($game['id_produktu']); ?>">
                            <input type="hidden" name="game_price" value="<?php echo htmlspecialchars($game['cena']); ?>">
                            <button class="cssbuttons-io" data-toggle="modal" data-target="#purchaseModal" type="submit"
                                    data-title="Standard Edition" data-price="<?php echo htmlspecialchars($game['cena']); ?>">
                                <span>
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M24 12l-5.657 5.657-1.414-1.414L21.172 12l-4.243-4.243 1.414-1.414L24 12zM2.828 12l4.243 4.243-1.414 1.414L0 12l5.657-5.657L7.07 7.757 2.828 12zm6.96 9H7.66l6.552-18h2.128L9.788 21z" fill="currentColor"></path>
                                    </svg>
                                    Kup
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php else: ?>
    <section class="py-5">
        <div class="container">
            <h2 class="text-center">Nie znaleziono gry</h2>
            <p class="text-center">ID gry nie zostało podane lub gra nie istnieje.</p>
        </div>
    </section>
<?php endif; ?>

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
