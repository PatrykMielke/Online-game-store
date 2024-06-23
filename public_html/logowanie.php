<?php

   // Redirect if user is already logged in
   if (isset($_SESSION["zalogowany"])){
      header('location: index.php');
      exit;
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/Login.css">
    <title>Logowanie</title>
</head>
<body class="loginRej">
    <div class="falling-image-container" id="fallingIconsContainer"></div>
    
    <?php 
    include 'templates/navbar.php';
    include 'templates/header.php';
    include 'php/login_script.php';
    ?>
    
    <div class="wrapper">
        <div class="card-switch">
            <label class="switch">
               <input type="checkbox" class="toggle">
               <span class="slider"></span>
               <span class="card-side"></span>
               <div class="flip-card__inner">
                  <div class="flip-card__front">
                     <div class="title">Log in</div>
                     <form id="logowanie" class="flip-card__form" method="post">
                        <input class="flip-card__input" name="email" placeholder="Email" type="email">
                        <input class="flip-card__input" name="password" placeholder="Password" type="password">
                        <input type="hidden" name="action" value="login">
                        <button type="submit" name="submit" class="flip-card__btn">Let's go!</button>
                     </form>
                  </div>
                  <div class="flip-card__back">
                     <div class="title">Sign up</div>
                     <form id="rejestracja" class="flip-card__form" method="post">
                        <input class="flip-card__input" name="name" placeholder="Name" type="text">
                        <input class="flip-card__input" name="email" placeholder="Email" type="email">
                        <input class="flip-card__input" name="password" placeholder="Password" type="password">
                        <input type="hidden" name="action" value="register">
                        <button type="submit" name="submit" class="flip-card__btn">Confirm!</button>
                     </form>
                  </div>
               </div>
            </label>
        </div>   
    </div>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/register.js"></script>
</body>
</html>
