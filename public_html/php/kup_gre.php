<?php
session_start();
include 'config.php';

if (!isset($_SESSION['id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

if (isset($_POST['game_id']) && isset($_POST['game_price'])) {
    $userId = $_SESSION['id'];
    $gameId = intval($_POST['game_id']);
    $gamePrice = floatval($_POST['game_price']);

    // Check if user already owns the game
    $checkOwnershipSql = "SELECT * FROM `{$prefix}posiadane_programy` WHERE id_uzytkownika = ? AND id_produktu = ?";
    $checkStmt = $conn->prepare($checkOwnershipSql);
    $checkStmt->bind_param("ii", $userId, $gameId);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        // User already owns the game, handle accordingly
        echo "Masz już tę grę.</br>";
        echo "Możesz ją zobaczyć na swoim profilu.";
        exit();
    }

    // Fetch user balance
    $fetchBalanceSql = "SELECT `{$prefix}saldo` FROM uzytkownicy WHERE id_uzytkownika = ?";
    $stmt = $conn->prepare($fetchBalanceSql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $userBalance = floatval($user['saldo']);
        
        if ($userBalance >= $gamePrice) {
            // Deduct the game price from user balance
            $newBalance = $userBalance - $gamePrice;
            $updateBalanceSql = "UPDATE `{$prefix}uzytkownicy` SET saldo = ? WHERE id_uzytkownika = ?";
            $updateStmt = $conn->prepare($updateBalanceSql);
            $updateStmt->bind_param("di", $newBalance, $userId);
            $updateStmt->execute();

            // Add the game to user's purchases
            $purchaseSql = "INSERT INTO `{$prefix}posiadane_programy` (id_uzytkownika, id_produktu, data_zakupu, cena) VALUES (?, ?, NOW(), ?)";
            $purchaseStmt = $conn->prepare($purchaseSql);
            $purchaseStmt->bind_param("iii", $userId, $gameId, $gamePrice);
            $purchaseStmt->execute();

            // Redirect to the user panel
            header("Location: ../profil.php?id=$userId");
            exit();
        } else {
            // Insufficient balance
            echo "Niewystarczające środki na koncie.";
            exit();
        }
    } else {
        // User not found
        echo "Użytkownik nie został znaleziony.";
        exit();
    }
} else {
    // Missing game ID or price
    echo "Nieprawidłowe dane zakupu.";
    exit();
}

$conn->close();
?>
