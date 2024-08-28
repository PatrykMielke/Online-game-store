<?php
$host='localhost';
$user='root';
$password='';
$dbname='steam';
$prefix='CHUJ__';
$conn = mysqli_connect($host, $user, $password, $dbname);

# konfiguracja aplikacji
$base_url='http://localhost/Online-game-store/public_html/';
$nazwa_aplikacji='x';
$data_powstania='x';
$wersja='x';
$brand='x';
$adres1='x';
$adres2='x';
$adres3='x';
$admin_login='x@x.x';
$admin_password='$2y$10$fpbKPu6nfZ9sBDJ/tF7yeOH0WNz9CM7sp7rUZUKPFOsx2jYJAJB.q';

                if ($conn->connect_error) {
                die('Connection failed: ' .$conn->connect_error);
                header('location: install.php');
                }
                ?>
