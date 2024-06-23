<?php session_start(); if (!isset($_SESSION["rola"]) or $_SESSION["rola"] != "administrator"){
    header("location: index.php");
}?>
<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Lista gier</title>
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
						<!-- Przykładowe dane w tabeli -->
						<tr>
							<td>1</td>
							<td>Arcanoid</td>
							<td>120pln</td>
							<td>Tak</td>
							<td>
								<button class="btn btn-sm btn-primary">Edytuj</button>
								<button class="btn btn-sm btn-danger">Usuń</button>
							</td>
						</tr>
						<tr>
                            <td>2</td>
							<td>Arcanoid</td>
							<td>120pln</td>
							<td>Tak</td>
							<td>
                                <button class="btn btn-sm btn-primary">Edytuj</button>
                                <button class="btn btn-sm btn-danger">Usuń</button>
							</td>
						</tr>
						<tr>
                            <td>3</td>
							<td>Arcanoid</td>
							<td>150pln</td>
							<td>Nie</td>
							<td>
                                <button class="btn btn-sm btn-primary">Edytuj</button>
                                <button class="btn btn-sm btn-danger">Usuń</button>
							</td>
						</tr>
						<!-- Dodaj więcej danych w razie potrzeby -->
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
