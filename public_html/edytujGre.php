<?php 
session_start(); 
if (!isset($_SESSION["rola"]) || $_SESSION["rola"] == "kupujący") {
    header("location: index.php");
    exit();
}

// Function to fetch data from the database
function getProductData($productId) {
    include 'php/config.php';
    $stmt = $conn->prepare("SELECT produkty.id_produktu, produkty.nazwa AS pn, GROUP_CONCAT(tagi.nazwa SEPARATOR ', ') AS tn, opis, cena FROM produkty INNER JOIN tagi ON tagi.id_produktu = produkty.id_produktu WHERE produkty.id_produktu = ? GROUP BY produkty.id_produktu");
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function updateProductData($productId, $name, $description, $price, $tags) {
    include 'php/config.php';
    
        $sql = "UPDATE produkty SET nazwa = ?, opis = ?, cena = ? WHERE id_produktu = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdi", $name, $description, $price, $productId);
    $result = $stmt->execute();

    // Update product tags
    $stmt = $conn->prepare("DELETE FROM tagi WHERE id_produktu = ?");
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    
    $stmt = $conn->prepare("INSERT INTO tagi (id_produktu, nazwa) VALUES (?, ?)");
    foreach ($tags as $tag) {
        $stmt->bind_param("is", $productId, $tag);
        $stmt->execute();
    }

    return $result;
}

// Handling form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productId = $_POST['product_id'];
    $name = $_POST['productName'];
    $description = $_POST['productDescription'];
    $price = $_POST['productPrice'];
    $tags = $_POST['productTags']; // Assuming tags are sent as an array

    // Update product data in the database
    if (updateProductData($productId, $name, $description, $price, $tags)) {
        echo "Product updated successfully.";
        header("refresh: 1");
    } else {
        echo "Error updating product.";
    }
}

// Fetching data for the form if ID is provided
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $productId = $_GET['id'];
    $productData = getProductData($productId);

    // Check if productData is empty, meaning no product found for the given ID
    if (!$productData) {
        echo "Brak produktu o podanym ID.";
        exit; // Exit further execution
    }
} else {
    echo "<h1>Brak id w linku.</h1>";
    exit; // Exit further execution
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj produkt</title>
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
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                <div class="mb-3">
                    <label for="productName" class="form-label">Nazwa Produktu</label>
                    <input type="text" class="form-control" id="productName" name="productName" placeholder="Wpisz nazwę produktu" required value="<?php echo htmlspecialchars($productData['pn']); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tagi</label><br>
                    <?php 
                    $allTags = ["Akcja", "MMO", "Przygoda", "RPG", "Sport", "Symulator"];
                    $productTags = explode(", ", $productData['tn']);
                    foreach ($allTags as $tag): ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="tag<?php echo $tag; ?>" name="productTags[]" value="<?php echo $tag; ?>" <?php if (in_array($tag, $productTags)) echo "checked"; ?>>
                            <label class="form-check-label" for="tag<?php echo $tag; ?>"><?php echo $tag; ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="mb-3">
                    <label for="productDescription" class="form-label">Opis Produktu</label>
                    <textarea class="form-control" id="productDescription" name="productDescription" rows="4" placeholder="Wpisz opis produktu" required><?php echo htmlspecialchars($productData['opis']); ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="productPrice" class="form-label">Cena (PLN)</label>
                    <input type="number" step=0.01 class="form-control" id="productPrice" name="productPrice" placeholder="Wpisz cenę" required value="<?php echo htmlspecialchars($productData['cena']); ?>">
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
    <script>
    function areYouSure() {
        return confirm("Czy na pewno chcesz usunąć ten produkt ze sprzedaży?")
    }
</script>
</body>
</html>
