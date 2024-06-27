<?php
$host='localhost';
$user='root';
$password='';
$dbname='test';
$prefix='xd_';
$conn = mysqli_connect($host, $user, $password, $dbname);

# konfiguracja aplikacji
$base_url='https://manticore.uni.lodz.pl/~patrykm/';
$nazwa_aplikacji='Triton';
$data_powstania='23.06.2024';
$wersja='1';
$brand='PMM';
$adres1='Przykładowa';
$adres2='Łódź';
$adres3='123456789';
$admin_login='x';
$admin_password='$2y$10$OB0u7vWV5yY.wQfYiVF8vuNouhulIaqg1So6uqJ23ZCyIA5TJ4lh.';

                if ($conn->connect_error) {
                die('Connection failed: ' .$conn->connect_error);
                header('location: install.php');
                }
                ?>
