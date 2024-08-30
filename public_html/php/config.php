<?php
$host='localhost';
$user='2025_patrykm';
$password='405651';
$dbname='2025_patrykm';
$prefix='14';
$conn = mysqli_connect($host, $user, $password, $dbname);

# konfiguracja aplikacji
$base_url='https://manticore.uni.lodz.pl/~patrykm/';
$nazwa_aplikacji='x';
$data_powstania='x';
$wersja='x';
$brand='x';
$adres1='x';
$adres2='x';
$adres3='x';
$admin_login='adminek@admin.pl';
$admin_password='$2y$10$jNzeznwX/5hV8gzmanvrWOymf584D9fO.0Bm4M1IfVJLLA.dV2vcu';

                if ($conn->connect_error) {
                die('Connection failed: ' .$conn->connect_error);
                header('location: install.php');
                }
                ?>
