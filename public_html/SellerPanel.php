<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Seller Panel</title>
		<link
			rel="stylesheet"
			href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
		/>
		<link rel="stylesheet" href="css/SellerPanel.css" />
	</head>
	<body>
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

		<!-- Główny obszar -->
		<header
			class="jumbotron jumbotron-fluid text-white text-center custom-jumbotron"
		>
			<div class="container">
				<h1 class="display-4 custom-jumbotron-heading">TRITON</h1>
			</div>
		</header>

		<!-- Drugi navbar -->
		<div class="navbar second-navbar">
			<a class="nav-link" href="#najnowsze-oferty">Najnowsze oferty</a>
			<a class="nav-link" href="#nowosci-i-aktualnosci">O zespole</a>
			<a class="nav-link" href="#przyszlosciowe-plany">Przyszłościowe plany</a>
		</div>

		<!-- Główna zawartość -->
		<div class="container mt-5">
			<div class="row">
				<div class="col-lg-12">
					<div class="container mt-5">
						<div class="row">
							<div class="col-lg-12">
								<h2>Produkt</h2>
								<table class="table">
									<thead>
										<tr>
											<th>ID</th>
											<th>Nazwa</th>
											<th>Cena</th>
											<th>Ocena</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Product 1</td>
											<td>$10</td>
											<td>5/5</td>
										</tr>
										<!-- Możesz dodać więcej wierszy dla innych produktów -->
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container mt-5">
			<div class="row">
				<div class="col-lg-12">
					<h2>Szczegóły Produktu</h2>
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Product Name</h5>
							<p class="card-text">
								Description: Lorem ipsum dolor sit amet, consectetur adipiscing
								elit. Ut aliquam, odio a suscipit blandit.
							</p>
							<p class="card-text">Price: $10</p>
							<a href="#" class="btn btn-primary">Edit</a>
							<a href="#" class="btn btn-danger">Delete</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container mt-5">
			<div class="row">
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Total Sales</h5>
							<p class="card-text">$1000</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Total Orders</h5>
							<p class="card-text">50</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Average Order Value</h5>
							<p class="card-text">$20</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container mt-5">
			<div class="row">
				<div class="col-lg-6">
					<h2>Sales Overview</h2>
					<canvas id="salesChart" width="400" height="400"></canvas>
				</div>
			</div>
		</div>

		<!-- Skrypty JS (jQuery, Popper.js, Bootstrap) -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

		<script src="../js/seller.js"></script>
	</body>
</html>
