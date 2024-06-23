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

    // File upload handling
    $uploadDir = '../img/products/'; // Directory where images will be stored

    // Check if the directory exists, create it if not
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Create directory if it does not exist
    }

    $uploadedFiles = array();
    $errors = array();

    // Loop through each file
    foreach ($_FILES['productImages']['name'] as $key => $name) {
        $tmp_name = $_FILES['productImages']['tmp_name'][$key];
        $target_file = $uploadDir . basename($name);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($tmp_name);
        if ($check === false) {
            $errors[] = "File {$name} is not an image.";
            continue;
        }

        // Check file size (5MB limit)
        if ($_FILES['productImages']['size'][$key] > 5000000) {
            $errors[] = "Sorry, file {$name} is too large.";
            continue;
        }

        // Allow certain file formats
        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
        if (!in_array($imageFileType, $allowedTypes)) {
            $errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed for {$name}.";
            continue;
        }

        // Move uploaded file to specified directory
        $newFileName = "product-img_" . uniqid() . ".$imageFileType"; // Generate a unique filename
        $target_file = $uploadDir . $newFileName;
        if (move_uploaded_file($tmp_name, $target_file)) {
            $uploadedFiles[] = $target_file;
        } else {
            $errors[] = "Sorry, there was an error uploading file {$name}.";
        }
    }

    // Process uploaded files or display errors
    if (!empty($uploadedFiles)) {
        include 'config.php';

        // Prepare product insertion query
        $insertProductSql = "INSERT INTO `{$prefix}produkty` (nazwa, id_wydawcy, cena, opis, ikona) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertProductSql);
        if (!$stmt) {
            echo "Error preparing statement: " . $conn->error;
            exit;
        }

        // Bind parameters and execute product insertion
        $stmt->bind_param("sidss", $productName,$_SESSION['id'], $productPrice, $productDescription, $newFileName);
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
        echo "Obraz:<br>";
        foreach ($uploadedFiles as $file) {
            echo "<img src='{$file}' width='200'><br>";
        }
        header("Location: ../sprzedajacy.php");
    } else {
        // Display errors if any
        foreach ($errors as $error) {
            echo "{$error}<br>";
        }
    }
}
?>
