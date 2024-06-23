<?php
$host='localhost:3308';
$user='root';
$password='';
$dbname='steam';
$prefix='';
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
$admin_password='$2y$10$wQClOL4fY0rb2IRQhx7dweJVqbVJtTK667Hq2/aaUs7uBoTysB.By';

if ($conn->connect_error) {
    die('Connection failed: ' .$conn->connect_error);
    header('location: install.php');
}
?>
