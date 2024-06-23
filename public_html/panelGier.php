<?php session_start(); if (!isset($_SESSION["rola"]) or $_SESSION["rola"] != "administrator"){
    header("location: index.php");
}?>
<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Panel gier</title>
		<link
			href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
			rel="stylesheet"
		/>
		<link rel="stylesheet" href="css/uzytkownicyPanel.css" />
	</head>
	<body>
	<?php 
    include 'templates/navbar.php';
    include 'templates/header.php';
  ?>
		<div class="container">
			<h1 class="mt-5">Lista gier</h1>


			<!-- Tabelka -->
			<div class="table-container">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID Gry</th>
							<th>Nazwa</th>
							<th>Cena</th>
							<th>Czy dosępna</th>
						</tr>
					</thead>
					<tbody id="tableBody">
					<?php 
                    include './php/config.php';
                    
                    $query = "SELECT * FROM `{$prefix}produkty` ORDER BY id_produktu";
                    $result = $conn->query($query);
                    
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $gameId = htmlspecialchars($row['id_produktu']);
                            $gameName = htmlspecialchars($row['nazwa']);
                            $gamePrice = htmlspecialchars($row['cena']) . " PLN";
                            $gameAvailable = htmlspecialchars($row['czy_dostepny']) ? "Tak" : "Nie";
                            $buttonLabel = htmlspecialchars($row['czy_dostepny']) ? "Usuń" : "Przywróć";
                            $buttonClass = htmlspecialchars($row['czy_dostepny']) ? "btn-danger" : "btn-success";

                            echo "<tr>
                                    <td>{$gameId}</td>
                                    <td>{$gameName}</td>
                                    <td>{$gamePrice}</td>
                                    <td>{$gameAvailable}</td>
                                    <td>
                                        <button class='btn btn-sm btn-primary' onclick=\"location.href='stronaGry.php?id={$gameId}'\">Zobacz stronę gry</button>
                                        <button class='btn btn-sm btn-primary'>Edytuj</button>
                                        <form method='post' action='php/remove_retrieve_game.php' style='display:inline;'>
                                            <input type='hidden' name='id_produktu' value='{$gameId}'>
                                            <button type='submit' class='btn btn-sm {$buttonClass}'>{$buttonLabel}</button>
                                        </form>
                                    </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Brak danych</td></tr>";
                    }

                    $conn->close();
                    ?>
					</tbody>
				</table>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="js/wyszukiwarka.js">
			// Funkcja filtrowania tabeli
		</script>
	</body>
</html>
