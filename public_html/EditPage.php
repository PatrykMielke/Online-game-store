<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Edycja Profilu</title>
		<link
			rel="stylesheet"
			href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
		/>
		<link rel="stylesheet" href="css/EditPage.css" />
		<!-- Dodatkowy CSS -->
	</head>

	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light custom-navbar">
			<!-- Zastąpienie tekstu logo własnym zdjęciem -->
			<a class="navbar-brand custom-navbar-brand" href="#"
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
						<a href="../html/login.html"
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
		<!-- Drugi navbar -->

		<div class="container mt-5">
			<div class="row">
				<div class="col-md-6 offset-md-3 form-container">
					<!-- Dodanie klasy form-container -->
					<form>
						<div class="form-group">
							<label for="firstName">Imię</label>
							<input
								type="text"
								class="form-control"
								id="firstName"
								placeholder="Wpisz imię"
							/>
						</div>
						<div class="form-group">
							<label for="lastName">Nazwisko</label>
							<input
								type="text"
								class="form-control"
								id="lastName"
								placeholder="Wpisz nazwisko"
							/>
						</div>
						<div class="form-group">
							<label for="email">Adres email</label>
							<input
								type="email"
								class="form-control"
								id="email"
								placeholder="Wpisz adres email"
							/>
						</div>
						<div class="form-group">
							<label for="country">Kraj</label>
							<input
								type="text"
								class="form-control"
								id="country"
								placeholder="Wpisz kraj"
							/>
						</div>
						<div class="form-group">
							<label for="dob">Data urodzenia</label>
							<input type="date" class="form-control" id="dob" />
						</div>
						<div class="form-group">
							<label for="description">Opis</label>
							<textarea
								class="form-control"
								id="description"
								rows="3"
								placeholder="Wpisz krótki opis o sobie"
							></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Zapisz zmiany</button>
					</form>
				</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</body>
</html>
