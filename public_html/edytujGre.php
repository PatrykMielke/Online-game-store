<?php session_start(); 
if (!isset($_SESSION["rola"]) or $_SESSION["rola"] == "kupujący"){
    header("location: index.php");
}

// Function to fetch data from the database
function getProductData($productId) {
    include 'php/config.php';
    $stmt = $conn->prepare(`SELECT produkty.id_produktu,produkty.nazwa pn,GROUP_CONCAT(tagi.nazwa SEPARATOR ', ') AS tn,opis, cena from {$prefix}produkty p inner join {$prefix}tagi t on t.id_produktu = p.id_produktu where p.id_produktu = ? GROUP BY p.id_produktu`);
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

// Function to update data in the database
function updateProductData($productId, $name, $description, $price, $tags, $image) {
    include 'php/config.php';
    $sql = `UPDATE {$prefix}products SET name = ?, description = ?, price = ?, tags = ?, image = ? WHERE id = ?`;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdsbi", $name, $description, $price, $tags, $image, $productId);
    return $stmt->execute();
}

// Handling form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productId = $_POST['product_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $tags = implode(",", $_POST['tags']); // Assuming tags are sent as an array
    $image = $_FILES['image']['name'];
    
    // Handling file upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    
    if (updateProductData($productId, $name, $description, $price, $tags, $image)) {
        echo "Product updated successfully.";
    } else {
        echo "Error updating product.";
    }
}

// Fetching data for the form
$productId = $_GET['id'];; // Replace with dynamic value as needed
$productData = getProductData($productId);
var_dump($productData);
?>

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
            <h1 class="text-center mb-4">Edytuj produkt</h1>
            <form action="php/new_game.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="productName" class="form-label">Nazwa Produktu</label>
                    <input type="text" class="form-control" id="productName" name="productName" placeholder="Wpisz nazwę produktu" required value="<?php echo $productData['pn']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tagi</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="tagAkcja" name="productTags[]" value="Akcja" <?php if(in_array("Akcja", explode(",", $productData['tn']))) echo "checked"; ?>>
                        <label class="form-check-label" for="tagAkcja">Akcja</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="tagMMO" name="productTags[]" value="MMO" <?php if(in_array("MMO", explode(",", $productData['tn']))) echo "checked"; ?>>
                        <label class="form-check-label" for="tagMMO">MMO</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="tagPrzygoda" name="productTags[]" value="Przygoda" <?php if(in_array("Przygoda", explode(",", $productData['tn']))) echo "checked"; ?>>
                        <label class="form-check-label" for="tagPrzygoda">Przygoda</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="tagRPG" name="productTags[]" value="RPG" <?php if(in_array("RPG", explode(",", $productData['tn']))) echo "checked"; ?>>
                        <label class="form-check-label" for="tagRPG">RPG</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="tagSport" name="productTags[]" value="Sport" <?php if(in_array("Sport", explode(",", $productData['tn']))) echo "checked"; ?>>
                        <label class="form-check-label" for="tagSport">Sport</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="tagSymulator" name="productTags[]" value="Symulator" <?php if(in_array("Symulator", explode(",", $productData['tn']))) echo "checked"; ?>>
                        <label class="form-check-label" for="tagSymulator">Symulator</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="productDescription" class="form-label">Opis Produktu</label>
                    <textarea class="form-control" id="productDescription" name="productDescription" rows="4" placeholder="Wpisz opis produktu" required ><?php echo $productData['opis']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="productPrice" class="form-label">Cena (PLN)</label>
                    <input type="number" class="form-control" id="productPrice" name="productPrice" placeholder="Wpisz cenę" required value="<?php echo $productData['cena']; ?>">
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
