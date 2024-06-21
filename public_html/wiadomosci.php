<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Odczytywanie Wiadomości</title>
		<link
			href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
			rel="stylesheet"
		/>
		<link rel="stylesheet" href="css/SupPage.css" />
	</head>
	<body>
	<?php 
    include 'templates/navbar.php';
    include 'templates/header.php';
    
  ?>

		<div class="container messages-table">
			<div class="table-wrapper">
				<h3 class="text-center">Wiadomości od Użytkowników</h3>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Imię i Nazwisko</th>
							<th>Email</th>
							<th>Temat</th>
							<th>Wiadomość</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Jan Kowalski</td>
							<td>jan.kowalski@example.com</td>
							<td>Problem z logowaniem</td>
							<td>
								<button class="btn btn-primary" href="#" type="submit">
									Button
								</button>
							</td>
						</tr>
						<tr>
							<td>2</td>
							<td>Anna Nowak</td>
							<td>anna.nowak@example.com</td>
							<td>Zapytanie o produkt</td>
							<td>
								<button class="btn btn-primary" href="#" type="submit">
									Button
								</button>
							</td>
						</tr>
						<!-- Dodaj więcej wierszy według potrzeb -->
					</tbody>
				</table>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</body>
</html>
