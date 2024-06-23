<?php session_start(); if(!isset($_SESSION['zalogowany'])){
    header('location:logowanie.php');
} ?>
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
	<?php 
    include 'templates/navbar.php';
    include 'templates/header.php';
    include 'php/edit_profile.php';
  ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3 form-container">
                <!-- Dodanie klasy form-container -->
                <form method="POST">
                    <!-- Pozostałe pola formularza -->
                    <div class="form-group">
                        <label for="opis">Opis</label>
                        <input  required type="text" class="form-control" id="opis" name="opis" placeholder="Opis" value="<?php
                            load_description();
                        ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="nazwa">Nazwa</label>
                        <input  required type="text" class="form-control" id="nazwa" name="nazwa" placeholder="nazwa" value="<?php
                            load_name();
                        ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input required type="email" class="form-control" id="email" name="email" placeholder="email" value="<?php
                            load_email();
                        ?>"/>
                    </div>
                    <input  required type="hidden" name="zmiendane" value="XD">
                    <button type="submit" class="btn btn-primary mt-3">Zapisz zmiany</button>
                </form>

                <form method="POST" >
                    <!-- Pozostałe pola formularza -->
                    <div class="form-group">
                        <label for="opis">Hasło</label>
                        <input required  type="password" class="form-control" id="opis" name="password" placeholder="Hasło">
                    </div>
                    <div class="form-group">
                        <label for="opis">Powtórz hasło</label>
                        <input required  type="password" class="form-control" id="opis" name="password2" placeholder="Powtórz hasło">
                    </div>
                    <input type="hidden" name="zmienhaslo" value="XD">
                    <button type="submit" class="btn btn-primary mt-3">Zmień hasło</button>
                </form>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/editPage.js"></script>
</body>
</html>