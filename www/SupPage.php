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
		<link rel="stylesheet" href="../css/SupPage.css" />
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light custom-navbar">
			<!-- Zastąpienie tekstu logo własnym zdjęciem -->
			<a class="navbar-brand custom-navbar-brand" href="../html/index.html"
				><img
					src="../zdj/stadia_controller_FILL0_wght400_GRAD0_opsz24.png"
					alt="Logo"
					style="max-width: 100px"
			/></a>

			<button
				class="navbar-toggler"
				type="button"
				data-toggle="collapse"
				data-target="#navbarSupportedContent1"
				aria-controls="navbarSupportedContent1"
				aria-expanded="false"
				aria-label="Toggle navigation"
			>
				<span class="navbar-toggler-icon"></span>
			</button>

			<div
				class="collapse navbar-collapse custom-navbar-nav"
				id="navbarSupportedContent1"
			>
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link custom-nav-link" href="../html/profilPage.html"
							>Strona 1</a
						>
					</li>
					<li class="nav-item">
						<a class="nav-link custom-nav-link" href="#">Strona 2</a>
					</li>
					<li class="nav-item">
						<a class="nav-link custom-nav-link" href="#">Strona 3</a>
					</li>
					<li>
						<a href="../html/loginRej.html"
							><img
								src="../zdj/login_FILL0_wght400_GRAD0_opsz24.png"
								alt="Logowanie"
						/></a>
					</li>
				</ul>
			</div>
		</nav>

		<!-- Główny obszar -->
		<header
			class="jumbotron jumbotron-fluid text-white text-center custom-jumbotron"
		>
			<div class="container">
				<h1 class="display-4 custom-jumbotron-heading">TRITON</h1>
			</div>
		</header>
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
