<?php session_start(); 
if (!isset($_SESSION["rola"]) or $_SESSION["rola"] == "kupujący"){
    header("location: index.php");
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nowoczesna Strona Główna</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/NewProductPage.css">
    <!-- Dodajemy link do pliku CSS -->
</head>

<body class="body-NewGame">
    <!-- Pierwszy navbar -->
    <?php 
        include 'templates/navbar.php';
        include 'templates/header.php';
    ?>

    <div class="container">
        <div class="form-container">
            <h1 class="text-center mb-4">Wystaw Produkt</h1>
            <form action="php/new_game.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="productName" class="form-label">Nazwa Produktu</label>
                    <input type="text" class="form-control" id="productName" name="productName" placeholder="Wpisz nazwę produktu" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tagi</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="tagAkcja" name="productTags[]" value="Akcja">
                        <label class="form-check-label" for="tagAkcja">Akcja</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="tagMMO" name="productTags[]" value="MMO">
                        <label class="form-check-label" for="tagMMO">MMO</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="tagPrzygoda" name="productTags[]" value="Przygoda">
                        <label class="form-check-label" for="tagPrzygoda">Przygoda</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="tagRPG" name="productTags[]" value="RPG">
                        <label class="form-check-label" for="tagRPG">RPG</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="tagSport" name="productTags[]" value="Sport">
                        <label class="form-check-label" for="tagSport">Sport</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="tagSymulator" name="productTags[]" value="Symulator">
                        <label class="form-check-label" for="tagSymulator">Symulator</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="productDescription" class="form-label">Opis Produktu</label>
                    <textarea class="form-control" id="productDescription" name="productDescription" rows="4" placeholder="Wpisz opis produktu" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="productPrice" class="form-label">Cena (PLN)</label>
                    <input type="number" class="form-control" id="productPrice" name="productPrice" placeholder="Wpisz cenę" required>
                </div>
                <div class="mb-3">
                    <label for="productImages" class="form-label">Zdjęcie Produktu</label>
                    <input type="file" class="form-control" id="productImages" name="productImages[]" multiple>
                </div>
                <button type="submit" class="btn btn-primary w-100">Wystaw Produkt</button>
            </form>
        </div>
    </div>
    <footer class="bg-dark text-light text-center py-3 custom-footer">
        <p>© 2024 Your Company. All rights reserved.</p>
    </footer>

    <!-- Skrypty JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
