<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $gameId = $_POST['id_produktu'];

    // Retrieve the current value of 'czy_dostepny'
    $query = "SELECT czy_dostepny FROM produkty WHERE id_produktu = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $gameId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    if ($row) {
        $currentStatus = $row['czy_dostepny'];
        $newStatus = $currentStatus == 1 ? 0 : 1;

        // Update the 'czy_dostepny' field
        $updateQuery = "UPDATE produkty SET czy_dostepny = ? WHERE id_produktu = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param('ii', $newStatus, $gameId);
        $updateStmt->execute();

        if ($updateStmt->affected_rows > 0) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            echo "Error: Could not update the game status.";
        }
    } else {
        echo "Error: Game not found.";
    }
}
// $conn->close();
?>
