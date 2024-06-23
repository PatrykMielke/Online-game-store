<?php
session_start(); // Start the session if not already started
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate session for user authentication
    if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
        echo "Nieprawidłowa sesja użytkownika.";
        exit();
    }
    
    // Validate and sanitize input
    $id_produktu = $_POST['id_produktu'];
    $ocena = $_POST['rating'];

    // Validate input values (example validation)
    if (!is_numeric($id_produktu) || !is_numeric($ocena)) {
        echo "Nieprawidłowe dane oceny.";
        exit();
    }

    // Prepare and execute SQL update statement
    $stmt = $conn->prepare("UPDATE `{$prefix}posiadane_programy` 
                            SET ocena = ? 
                            WHERE id_produktu = ? 
                            AND id_uzytkownika = ?");
    $stmt->bind_param("iii", $ocena, $id_produktu, $_SESSION['id']);

    if ($stmt->execute()) {
        // Successful update
        $stmt->close();
        $conn->close();

        // Redirect to the current page to reload after updating
        header("location: ../profil.php?id=" . $_SESSION['id']);
        exit();
    } else {
        echo "Błąd podczas aktualizacji oceny: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>