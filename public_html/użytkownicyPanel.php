<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Wyszukiwanie w Tabeli</title>
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
			<h1 class="mt-5">Wyszukiwanie w Tabeli</h1>
			<!-- Wyszukiwarka -->
			<div class="row mt-4">
				<div class="col-md-4">
					<select class="form-control" id="searchCategory">
						<option value="all">Wszystkie</option>
						<option value="1">ID</option>
						<!-- Zmieniono na indeks kolumny -->
						<option value="2">Imię</option>
						<!-- Zmieniono na indeks kolumny -->
						<option value="3">Nazwisko</option>
						<!-- Zmieniono na indeks kolumny -->
						<option value="4">Login</option>
						<!-- Zmieniono na indeks kolumny -->
						<option value="5">Email</option>
						<!-- Zmieniono na indeks kolumny -->
					</select>
				</div>
				<div class="col-md-8">
					<input
						type="text"
						class="form-control"
						id="searchInput"
						placeholder="Wyszukaj..."
					/>
				</div>
			</div>

			<!-- Tabelka -->
			<div class="table-container">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Imię</th>
							<th>Nazwisko</th>
							<th>Login</th>
							<th>Email</th>
							<th>Akcje</th>
						</tr>
					</thead>
					<tbody id="tableBody">
						<!-- Przykładowe dane w tabeli -->
						<tr>
							<td>1</td>
							<td>Jan</td>
							<td>Kowalski</td>
							<td>jan.k</td>
							<td>jan.kowalski@example.com</td>
							<td>
								<button class="btn btn-sm btn-primary">Save</button>
								<button class="btn btn-sm btn-danger">Delete</button>
							</td>
						</tr>
						<tr>
							<td>2</td>
							<td>Anna</td>
							<td>Nowak</td>
							<td>anna.n</td>
							<td>anna.nowak@example.com</td>
							<td>
								<button class="btn btn-sm btn-primary">Save</button>
								<button class="btn btn-sm btn-danger">Delete</button>
							</td>
						</tr>
						<tr>
							<td>3</td>
							<td>Marek</td>
							<td>Wójcik</td>
							<td>marek.w</td>
							<td>marek.wojcik@example.com</td>
							<td>
								<button class="btn btn-sm btn-primary">Save</button>
								<button class="btn btn-sm btn-danger">Delete</button>
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
