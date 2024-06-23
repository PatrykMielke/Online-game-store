<?php
session_start();
if (!isset($_SESSION["rola"]) or $_SESSION["rola"] != "administrator"){
    header("location: index.php");
}
include 'php/config.php';

// Handle role update if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update role
    if (isset($_POST['action']) && $_POST['action'] === 'update_role') {
        $userId = $_POST['id_uzytkownik'];
        $newRole = $_POST['new_rola'];

        $updateSql = "UPDATE `{$prefix}uzytkownicy` SET rola = ? WHERE id_uzytkownika = ?";
        $stmt = $conn->prepare($updateSql);
        $stmt->bind_param('si', $newRole, $userId);
        if ($stmt->execute()) {
            // Redirect back to the current page after updating
            header("Location: {$_SERVER['PHP_SELF']}");exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }

    // Delete or Restore user
    if (isset($_POST['action']) && $_POST['action'] === 'change_active') {
        $userId = $_POST['id_uzytkownik'];
        $isActive = $_POST['czy_aktywny'];

        // Toggle czy_aktywny field
        $newActive = $isActive == 1 ? 0 : 1;

        $updateSql = "UPDATE `{$prefix}uzytkownicy` SET czy_aktywny = ? WHERE id_uzytkownika = ?";
        $stmt = $conn->prepare($updateSql);
        $stmt->bind_param('ii', $newActive, $userId);
        if ($stmt->execute()) {
            // Redirect back to the current page after updating
            header("Location: {$_SERVER['PHP_SELF']}");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

// Select all users
$sql = "SELECT * FROM `{$prefix}uzytkownicy`";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wyszukiwanie w Tabeli</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/uzytkownicyPanel.css">
    <style>
        .btn-delete {
            background-color: #dc3545; /* Bootstrap's danger color */
            color: white;
            border: none;
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            cursor: pointer;
        }

        .btn-restore {
            background-color: #28a745; /* Bootstrap's success color */
            color: white;
            border: none;
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            cursor: pointer;
        }
    </style>
</head>
<body>
<?php 
include 'templates/navbar.php';
include 'templates/header.php';
?>

<div class="container">
    <h1 class="mt-5">Panel użytkowników</h1>

    <!-- Tabelka -->
    <div class="table-container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Imię</th>
                    <th>Email</th>
                    <th>Rola</th>
                    <th>Saldo</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <?php
                if ($result) {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $userId = $row["id_uzytkownik"];
                            $name = $row["nazwa"];
                            $email = $row["email"];
                            $role = $row["rola"];
                            $balance = $row["saldo"] . ' PLN';
                            $isActive = $row["czy_aktywny"];

                            // Determine button label and action based on czy_aktywny field
                            if ($isActive == 1) {
                                $buttonLabel = 'Usuń';
                                $buttonClass = 'btn-delete';
                                $action = 'delete';
                            } else {
                                $buttonLabel = 'Przywróć';
                                $buttonClass = 'btn-restore';
                                $action = 'restore';
                            }

                            echo "<tr>
                                    <td>{$userId}</td>
                                    <td>{$name}</td>
                                    <td>{$email}</td>
                                    <td>
                                        <form method='post' action='{$_SERVER['PHP_SELF']}' class='form-inline'>
                                            <input type='hidden' name='action' value='update_role'>
                                            <input type='hidden' name='id_uzytkownik' value='{$userId}'>
                                            <select name='new_rola' class='form-control role-select' data-user-id='{$userId}'>
                                                <option value='sprzedajacy'" . ($role == 'sprzedajacy' ? ' selected' : '') . ">Sprzedający</option>
                                                <option value='kupujacy'" . ($role == 'kupujacy' ? ' selected' : '') . ">Kupujący</option>
                                                <option value='administrator'" . ($role == 'administrator' ? ' selected' : '') . ">Administrator</option>
                                            </select>
                                            <button type='submit' class='btn btn-sm btn-success save-role-btn m-2' id='save-role-{$userId}' style='display: none;'>Zapisz rolę</button>
                                        </form>
                                    </td>
                                    <td>{$balance}</td>
                                    <td>
                                        <form method='post' action='{$_SERVER['PHP_SELF']}' class='form-inline'>
                                            <input type='hidden' name='action' value='change_active'>
                                            <input type='hidden' name='id_uzytkownik' value='{$userId}'>
                                            <input type='hidden' name='czy_aktywny' value='{$isActive}'>
                                            <button type='submit' class='btn btn-sm {$buttonClass} change-active-btn m-2'>{$buttonLabel}</button>
                                        </form>
                                        <a href='edit_user.php?id={$userId}' class='btn btn-sm btn-primary'>Edytuj</a>
                                       
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Brak danych</td></tr>";
                    }
                } else {
                    echo "Error: " . $conn->error;
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function() {
    // Show save button when role is changed
    $('.role-select').change(function() {
        var userId = $(this).data('user-id');
        $('#save-role-' + userId).show();
    });

    // Confirm action for deletion
    $('.change-active-btn').click(function() {
        return confirm("Czy na pewno chcesz zmienić status użytkownika?");
    });
});
</script>
		<script src="js/wyszukiwarka.js">
			// Funkcja filtrowania tabeli
		</script>
		<script>	
			function confirmAction() {
				return confirm("Czy na pewno chcesz usunąć użytkownika?");
			}
		</script>
	</body>
</html>
