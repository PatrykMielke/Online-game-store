<?php session_start(); 
if(!isset($_SESSION['zalogowany'])){
	header("Location: logowanie.php");
    exit();
}

require 'php/profile_functions.php'; 
?>
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
								<?php load_avatar(); ?>
							<div class="profile-info">
								<h2> <?php  
									load_name();
								?></h2>
								
								<p></p>
							</div>
						</div>
					</div>
          <div> 
			
		<?php
			if (isset($_SESSION['zalogowany']) and $_SESSION['id'] == $_GET['id'])
			{ echo '<a class="btn btn-primary" href="edytujProfil.php">Edytuj profil</a></div>';
				echo '<a class="btn btn-primary" href="edytujDane.php">Edytuj dane</a></div>'; }

			if (isset($_SESSION['zalogowany']) and $_SESSION['id'] != $_GET['id'])
			{ echo '<a class="btn btn-primary" href="dodajDoZnajomych.php">Dodaj do znajomych</a></div>'; }
		?>

					<div class="profile-details">
						<h3>Opis</h3>
						<p>
							<?php load_description();?>
						</p>

						<h3> Posiadane gry</h3>
						<ul>
							<?php
								load_games();
							?>
						</ul>

						<h3>Znajomi</h3>
						<div class="friends-list">


							<?php 
								load_friends();
							?>

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
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>

	</body>
</html>
