<?php
$host='localhost';
$user='root';
$password='';
$dbname='steam';
$prefix='gfsdgsd';
$conn = mysqli_connect($host, $user, $password, $dbname);

# konfiguracja aplikacji
$base_url='x';
$nazwa_aplikacji='x';
$data_powstania='x';
$wersja='x';
$brand='x';
$adres1='x';
$adres2='x';
$adres3='x';
$admin_login='x';
$admin_password='$2y$10$F4aUQocjqgyH2fiivji1y.q493KMtnSiuzhNLpzDrj//dVD3Dci1u';

                if (.$conn->connect_error) {
                die('Connection failed: ' .$conn->connect_error);
                header('location: install.php');
                }
                ?>
