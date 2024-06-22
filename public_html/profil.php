<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nowoczesna Strona Główna</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/UserPage.css"> <!-- Dodajemy link do pliku CSS -->
 
</head>

<body class="body-main">

  <!-- Pierwszy navbar -->
  <?php 
    include 'templates/navbar.php';
    include 'templates/header.php';
  ?>
    
    <!-- Sekcja z osiągnięciami użytkownika -->
    <div class="container">
			<div class="row">
				<div class="col-md-8 offset-md-2">
					<div class="profile-header">
						<div class="wallpaper">
							<img
								src="https://picsum.photos/200?image=1027"
								alt="Zdjęcie profilowe"
								class="profile-image"
								id="profileImage"
							/>
							<div class="profile-info">
								<h2>GamerX</h2>
								<p>Gamer od 2010</p>
							</div>
						</div>
					</div>
          <div> <a class="btn btn-primary" href="../html/EditPage.html">Edytuj profil</a></div>
         



					<div class="profile-details">
						<h3>Biografia</h3>
						<p>
							Uwielbiam gry RPG i strategie. Gram od dzieciństwa i nadal czerpię
							ogromną frajdę z eksplorowania wirtualnych światów i wymyślania
							taktyk. W wolnym czasie streamuję rozgrywki i dzielę się
							doświadczeniem z innymi graczami.
						</p>

						<h3> Posiadane gry</h3>
						<ul>
							<li>The Witcher 3: Wild Hunt</li>
							<li>StarCraft II</li>
							<li>Cities: Skylines</li>
						</ul>
						<h3>Statystyki gier</h3>
						<div class="game-stats">
							<div class="stat">
								<p><strong>Łączny czas gry:</strong> 1500 godzin</p>
							</div>
							<div class="stat">
								<p><strong>Ostatnia aktywność:</strong> 2024-06-21</p>
							</div>
							<div class="stat">
								<p>
									<strong>Najczęściej grana gra:</strong> Wiedźmin 3: Wild Hunt
								</p>
							</div>
						</div>

						<h3>Znajomi</h3>
						<div class="friends-list">
							<div class="friend">
								<img src="https://picsum.photos/200?image=1005" alt="Znajomy" />
								<p>PlayerOne</p>
							</div>
							<div class="friend">
								<img src="https://picsum.photos/200?image=1021" alt="Znajomy" />
								<p>PixelPusher</p>
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
			crossorigin="anonymous"
		></script>

	</body>
</html>
