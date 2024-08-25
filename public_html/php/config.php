<?php
$host='localhost';
$user='root';
$password='';
$dbname='steam';
$prefix='tab_';
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
$admin_login='administrator@admin.pl';
$admin_password='$2y$10$l871zUIjMWSPoFjg/83FI.V.SehuU6VcDVvM0Q9t7I7JyFpUivQTy';

                if ($conn->connect_error) {
                die('Connection failed: ' .$conn->connect_error);
                header('location: install.php');
                }
                ?>
