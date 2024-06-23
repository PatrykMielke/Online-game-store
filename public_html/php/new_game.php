<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle other form inputs
    $productName = $_POST['productName'];
    $productTags = isset($_POST['productTags']) ? $_POST['productTags'] : array(); // Array of selected tags or empty array
    $productDescription = $_POST['productDescription'];
    $productPrice = $_POST['productPrice'];

    // Check if tags were selected
    if (empty($productTags)) {
        echo "Please select at least one tag.";
        exit;
    }

        include 'config.php';

        // Prepare product insertion query
        $insertProductSql = "INSERT INTO `{$prefix}produkty` (nazwa, id_wydawcy, cena, opis) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insertProductSql);
        if (!$stmt) {
            echo "Error preparing statement: " . $conn->error;
            exit;
        }

        // Bind parameters and execute product insertion
        $stmt->bind_param("sids", $productName,$_SESSION['id'], $productPrice, $productDescription);
        if (!$stmt->execute()) {
            echo "Error inserting product: " . $stmt->error;
            exit;
        }

        // Get the inserted product ID
        $productId = $stmt->insert_id;

        // Close the statement
        $stmt->close();

        // Prepare tag insertion query
        $insertTagSql = "INSERT INTO `{$prefix}tagi` (nazwa, id_produktu) VALUES (?, ?)";
        $stmt = $conn->prepare($insertTagSql);
        if (!$stmt) {
            echo "Error preparing statement: " . $conn->error;
            exit;
        }

        // Insert each selected tag for the product
        foreach ($productTags as $tag) {
            $stmt->bind_param("si", $tag, $productId);
            if (!$stmt->execute()) {
                echo "Error inserting tag: " . $stmt->error;
                exit;
            }
        }

        // Close the statement
        $stmt->close();

        // Close the database connection
        $conn->close();

        // Display success message or redirect to another page
        echo "Product and tags inserted successfully.<br>";

        // Printing inserted data
        echo "Opis wystawionego produktu:<br>";
        echo "Nazwa: {$productName}<br>";
        echo "Tagi: " . implode(', ', $productTags) . "<br>";
        echo "Opis: {$productDescription}<br>";
        echo "Cena: {$productPrice} PLN<br>";
        header("Location: ../sprzedajacy.php");
}
?>
