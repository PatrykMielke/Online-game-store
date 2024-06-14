<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Sklep</title>
		<link
			href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
			rel="stylesheet"
		/>
		<link rel="stylesheet" href="css/Biblioteca.css" />
		<style></style>
	</head>
	<body class="body-biblo">
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
		<div class="container-fluid">
			<div class="row">
				<nav class="col-md-2 d-none d-md-block sidebar">
					<div class="sidebar-sticky">
						<h5>Twoje Tagi</h5>
						<div class="form-check">
							<input
								class="form-check-input"
								type="checkbox"
								value=""
								id="tag1"
							/>
							<label class="form-check-label" for="tag1"> Battle royale </label>
						</div>
						<div class="form-check">
							<input
								class="form-check-input"
								type="checkbox"
								value=""
								id="tag2"
							/>
							<label class="form-check-label" for="tag2">
								Strzelanka z perspektywy trzeciej osoby
							</label>
						</div>
						<div class="form-check">
							<input
								class="form-check-input"
								type="checkbox"
								value=""
								id="tag3"
							/>
							<label class="form-check-label" for="tag3"> Strzelanka </label>
						</div>
						<div class="form-check">
							<input
								class="form-check-input"
								type="checkbox"
								value=""
								id="tag4"
							/>
							<label class="form-check-label" for="tag4"> PvP </label>
						</div>
						<div class="form-check">
							<input
								class="form-check-input"
								type="checkbox"
								value=""
								id="tag5"
							/>
							<label class="form-check-label" for="tag6"> FPS </label>
						</div>
						<h5>Polecane</h5>
						<div class="form-check">
							<input
								class="form-check-input"
								type="checkbox"
								value=""
								id="tag7"
							/>
							<label class="form-check-label" for="tag8">
								Przez znajomych</label
							>
						</div>
						<div class="form-check">
							<input
								class="form-check-input"
								type="checkbox"
								value=""
								id="tag9"
							/>
							<label class="form-check-label" for="tag10">Przez kuratorów</label>
						</div>
						<div class="form-check">
							<input
								class="form-check-input"
								type="checkbox"
								value=""
								id="tag11"
							/>
							<label class="form-check-label" for="tag5
                            12"> Tagi</label>
						</div>
						<h5>Przeglądaj Kategorie</h5>
						<div class="form-check">
							<input
								class="form-check-input"
								type="checkbox"
								value=""
								id="tag13"
							/>
							<label class="form-check-label" for="tag14"> Bestsellery</label>
						</div>
						<div class="form-check">
							<input
								class="form-check-input"
								type="checkbox"
								value=""
								id="tag15"
							/>
							<label class="form-check-label" for="tag16"> Nowości </label>
						</div>
						<div class="form-check">
							<input
								class="form-check-input"
								type="checkbox"
								value=""
								id="tag17"
							/>
							<label class="form-check-label" for="tag18"> Nadchodzące </label>
						</div>
						<h5>Sprzęt</h5>
						<p>Steam Deck<br />Stacja dokująca Steam Decka<br />Sprzęt VR</p>
					</div>
				</nav>

				<main class="col-md-10 ml-sm-auto col-lg-10 px-md-4">
					<div class="promo-banner">
						<div>
							<h2>Letni Pokaz Letnich Pokazów</h2>
							<p>
								Nazwa, która łatwo przechodzi przez usta z mnóstwem wydarzeń i
								zapowiedzi o grach
							</p>
						</div>
					</div>

					<h2 class="mt-4">Oferty Specjalne</h2>
					<div class="row">
						<div class="col-md-4">
							<div class="card mb-4 shadow-sm">
								<img
									src="path_to_image_wobbly_life.jpg"
									alt="Wobbly Life"
									class="bd-placeholder-img card-img-top"
								/>
								<div class="card-body">
									<h5 class="card-title">Wobbly Life</h5>
                                    <button class="glitch" onclick="window.location.href='../html/Game.html'">Zobacz teraz</button>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card mb-4 shadow-sm">
								<img
									src="path_to_image_little_nightmares.jpg"
									alt="Little Nightmares"
									class="bd-placeholder-img card-img-top"
								/>
								<div class="card-body">
									<h5 class="card-title">Little Nightmares</h5>
                                    <button class="glitch" onclick="window.location.href='../html/Game.html'">Zobacz teraz</button>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card mb-4 shadow-sm">
								<img
									src="path_to_image_urbek_city_builder.jpg"
									alt="Urbek City Builder"
									class="bd-placeholder-img card-img-top"
								/>
								<div class="card-body">
									<h5 class="card-title">Urbek City Builder</h5>
									<button class="glitch" onclick="window.location.href='../html/Game.html'">Zobacz teraz</button>

								</div>
							</div>
						</div>
					</div>
                  
					<h2 class="mt-4">Przeglądaj Więcej</h2>
					<div class="row">
                        <div class="col-md-4">
							<div class="card mb-4 shadow-sm">
								<img
									src="path_to_image_wobbly_life.jpg"
									alt="Wobbly Life"
									class="bd-placeholder-img card-img-top"
								/>
								<div class="card-body">
									<h5 class="card-title">Wobbly Life</h5>
                                    <button class="glitch" onclick="window.location.href='../html/Game.html'">Zobacz teraz</button>
								</div>
							</div>
						</div>
                        <div class="col-md-4">
							<div class="card mb-4 shadow-sm">
								<img
									src="path_to_image_wobbly_life.jpg"
									alt="Wobbly Life"
									class="bd-placeholder-img card-img-top"
								/>
								<div class="card-body">
									<h5 class="card-title">Wobbly Life</h5>
                                    <button class="glitch" onclick="window.location.href='../html/Game.html'">Zobacz teraz</button>
								</div>
							</div>
						</div>
                        <div class="col-md-4">
							<div class="card mb-4 shadow-sm">
								<img
									src="path_to_image_wobbly_life.jpg"
									alt="Wobbly Life"
									class="bd-placeholder-img card-img-top"
								/>
								<div class="card-body">
									<h5 class="card-title">Wobbly Life</h5>
                                    <button class="glitch" onclick="window.location.href='../html/Game.html'">Zobacz teraz</button>
								</div>
							</div>
						</div>
					</div>
                    <div class="row">
                        <div class="col-md-4">
							<div class="card mb-4 shadow-sm">
								<img
									src="path_to_image_wobbly_life.jpg"
									alt="Wobbly Life"
									class="bd-placeholder-img card-img-top"
								/>
								<div class="card-body">
									<h5 class="card-title">Wobbly Life</h5>
                                    <button class="glitch" onclick="window.location.href='../html/Game.html'">Zobacz teraz</button>
								</div>
							</div>
						</div>
                        <div class="col-md-4">
							<div class="card mb-4 shadow-sm">
								<img
									src="path_to_image_wobbly_life.jpg"
									alt="Wobbly Life"
									class="bd-placeholder-img card-img-top"
								/>
								<div class="card-body">
									<h5 class="card-title">Wobbly Life</h5>
                                    <button class="glitch" onclick="window.location.href='../html/Game.html'">Zobacz teraz</button>
								</div>
							</div>
						</div>
                        <div class="col-md-4">
							<div class="card mb-4 shadow-sm">
								<img
									src="path_to_image_wobbly_life.jpg"
									alt="Wobbly Life"
									class="bd-placeholder-img card-img-top"
								/>
								<div class="card-body">
									<h5 class="card-title">Wobbly Life</h5>
                                    <button class="glitch" onclick="window.location.href='../html/Game.html'">Zobacz teraz</button>
								</div>
							</div>
						</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
							<div class="card mb-4 shadow-sm">
								<img
									src="path_to_image_wobbly_life.jpg"
									alt="Wobbly Life"
									class="bd-placeholder-img card-img-top"
								/>
								<div class="card-body">
									<h5 class="card-title">Wobbly Life</h5>
                                    <button class="glitch" onclick="window.location.href='../html/Game.html'">Zobacz teraz</button>
								</div>
							</div>
						</div>
                        <div class="col-md-4">
							<div class="card mb-4 shadow-sm">
								<img
									src="path_to_image_wobbly_life.jpg"
									alt="Wobbly Life"
									class="bd-placeholder-img card-img-top"
								/>
								<div class="card-body">
									<h5 class="card-title">Wobbly Life</h5>
                                    <button class="glitch" onclick="window.location.href='../html/Game.html'">Zobacz teraz</button>
								</div>
							</div>
						</div>
                        <div class="col-md-4">
							<div class="card mb-4 shadow-sm">
								<img
									src="path_to_image_wobbly_life.jpg"
									alt="Wobbly Life"
									class="bd-placeholder-img card-img-top"
								/>
								<div class="card-body">
									<h5 class="card-title">Wobbly Life</h5>
                                    <button class="glitch" onclick="window.location.href='../html/Game.html'">Zobacz teraz</button>
								</div>
							</div>
						</div>
                    </div>
				</main>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</body>
</html>
