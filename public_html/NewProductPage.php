<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Nowoczesna Strona Główna</title>
		<link
			rel="stylesheet"
			href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
		/>
		<link rel="stylesheet" href="../css/NewProductPage.css" />
		<!-- Dodajemy link do pliku CSS -->
	</head>

	<body class="body-NewGame">
		<!-- Pierwszy navbar -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light custom-navbar">
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
					<li class="nav-item">
						<a class="nav-link custom-nav-link" href="../html/login.html"
							><img
								src="../zdj/login_FILL0_wght400_GRAD0_opsz24.png"
								alt="Logowanie"
						/></a>
					</li>
				</ul>
			</div>
		</nav>
		<header
			class="jumbotron jumbotron-fluid text-white text-center custom-jumbotron"
		>
			<div class="container">
				<h1 class="display-4 custom-jumbotron-heading">TRITON</h1>
			</div>
		</header>

		<div class="container">
			<div class="form-container">
				<h1 class="text-center mb-4">Wystaw Produkt</h1>
				<form>
					<div class="mb-3">
						<label for="productName" class="form-label">Nazwa Produktu</label>
						<input
							type="text"
							class="form-control"
							id="productName"
							placeholder="Wpisz nazwę produktu"
							required
						/>
					</div>
					<div class="mb-3">
						<label for="productName" class="form-label">Kategoria</label>
						<input
							type="text"
							class="form-control"
							id="productName"
							placeholder="Wpisz kategorie produktu"
							required
						/>
					</div>
					<div class="mb-3">
						<label for="productDescription" class="form-label"
							>Opis Produktu</label
						>
						<textarea
							class="form-control"
							id="productDescription"
							rows="4"
							placeholder="Wpisz opis produktu"
							required
						></textarea>
					</div>
					<div class="mb-3">
						<label for="productPrice" class="form-label">Cena</label>
						<input
							type="number"
							class="form-control"
							id="productPrice"
							placeholder="Wpisz cenę"
							required
						/>
					</div>
					<div class="mb-3">
						<label for="productImages" class="form-label"
							>Zdjęcia Produktu</label
						>
						<input
							type="file"
							class="form-control"
							id="productImages"
							multiple
						/>
					</div>
					<button type="submit" class="btn btn-primary w-100">
						Wystaw Produkt
					</button>
				</form>
			</div>
		</div>
		<footer class="bg-dark text-light text-center py-3 custom-footer">
			<p>© 2024 Your Company. All rights reserved.</p>
		</footer>

		<!-- Skrypty JavaScript -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</body>
</html>
