<?php
$host='localhost';
$user='root';
$password='';
$dbname='onlineGameStore';
$prefix='';
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
$admin_login='admin1@onet.pl';
$admin_password='$2y$10$nxwBvcxTpO9zFtwPkDQ/R.kweF2oGMqrz0rD9X0wLBgt0pUl2UdKm';

                if ($conn->connect_error) {
                die('Connection failed: ' .$conn->connect_error);
                header('location: install.php');
                }
                ?>
