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
    
  ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3 form-container">
                <!-- Dodanie klasy form-container -->
                <form>
                    <!-- Pozostałe pola formularza -->
                    <div class="form-group">
                        <label for="opis">Opis</label>
                        <input type="text" class="form-control" id="opis" placeholder="Opis" />
                    </div>


                    <!-- Zdjęcie profilowe -->
                    <div class="profile-image-section">
                        <label for="profilePic" class="d-block">Avatar</label>
                        <img id="profileImage" src="img/default_profile.png" alt="Zdjęcie profilowe" class="img-thumbnail mb-2" />
                        <input type="file" class="form-control-file" id="profilePic" accept="image/*" onchange="previewProfileImage(event)" />
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Zapisz zmiany</button>
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