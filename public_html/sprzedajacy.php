<?php session_start();

if (!isset($_SESSION["rola"]) or $_SESSION["rola"] == "kupujący"){
    header("location: index.php");
}
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Seller Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/SellerPanel.css" />
</head>
<body>
    <?php 
        include 'templates/navbar.php';
        include 'templates/header.php'
    ?>
    <div class="container mt-5">
        <table class="table">

        <h2>Sprzedawane produkty <a href="dodajGre.php"><button type="button" class="btn btn-primary">Wystaw nową grę</button></a></h2>
  <thead>
    <tr>
      
      <th scope="col">Tytuł</th>
      <th scope="col">Cena</th>
      <th scope="col">Czy dostępna</th>
      <th scope="col">Akcje</th>
    </tr>
  </thead>
  <tbody>
  <?php 
        include './php/config.php';
        
        $stmt = $conn->prepare("SELECT * FROM `{$prefix}produkty` where id_wydawcy = ?");
        $stmt -> bind_param("i",$id);
        $id = $_SESSION["id"];
        if($stmt->execute())
        {
            $result = $stmt -> get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $gameId = htmlspecialchars($row['id_produktu']);
                $gameName = htmlspecialchars($row['nazwa']);
                $gamePrice = htmlspecialchars($row['cena']) . " PLN";
                $gameAvailable = htmlspecialchars($row['czy_dostepny']) ? "Tak" : "Nie";
                $buttonLabel = htmlspecialchars($row['czy_dostepny']) ? "Usuń" : "Przywróć";
                $buttonClass = htmlspecialchars($row['czy_dostepny']) ? "btn-danger" : "btn-success";

                echo "<tr>
                        
                        <td>{$gameName}</td>
                        <td>{$gamePrice}</td>
                        <td>{$gameAvailable}</td>
                        <td>
                            <button class='btn btn-sm btn-primary' onclick=\"location.href='stronaGry.php?id={$gameId}'\">Zobacz stronę gry</button>
                            <button class='btn btn-sm btn-primary' onclick=\"location.href='edytujGre.php?id={$gameId}'\">Edytuj</button>
                            <form method='post' action='php/remove_retrieve_game.php' style='display:inline;'>
                                <input type='hidden' name='id_produktu' value='{$gameId}'>
                                <button type='submit' onclick=\"return areYouSure();\" class='btn btn-sm {$buttonClass}'>{$buttonLabel}</button>
                            </form>
                        </td>
                    </tr>";
            }
        }
        } else {
            echo "<tr><td colspan='5'>Brak danych</td></tr>";
        }

        $conn->close();
        ?>
    <tr>
      <?php
        include 'php/sellerPanel.php';
      ?>
    </tr>
  </tbody>
</table>
        
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6">
                <h2>Sales Overview</h2>
                <canvas id="salesChart" width="400" height="400"></canvas>
            </div>
        </div>
    </div>

    <!-- Modal do edycji produktu -->
    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Edytuj Produkt</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Zamknij">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editProductForm">
                        <div class="form-group">
                            <label for="editProductName">Nazwa gry</label>
                            <input type="text" class="form-control" id="editProductName" required />
                        </div>
                        <div class="form-group">
                            <label for="editProductDescription">Opis</label>
                            <textarea class="form-control" id="editProductDescription" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="editProductPrice">Cena</label>
                            <input type="number" class="form-control" id="editProductPrice" step="0.01" required />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                    <button type="button" class="btn btn-primary" id="saveChangesButton">Zapisz zmiany</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal do potwierdzenia usunięcia produktu -->
    <div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteProductModalLabel">Potwierdzenie Usunięcia Produktu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Zamknij">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Czy na pewno chcesz usunąć produkt</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                    <form method="post">
                        <button type="button" class="btn btn-danger" id="deleteProductButton">Usuń</button>
                    </form>
                    

                </div>
            </div>
        </div>
    </div>

    <!-- Skrypty JS (jQuery, Popper.js, Bootstrap, Chart.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

    <!-- Skrypt JavaScript do obsługi modali i innych funkcji -->
    <script src="js/seller.js"></script>

    <script>
       
    </script>
</body>
</html>
