<?php
 $host = "localhost";
 $db_user = "root";
 $db_password = "";
 $db_name = "steam";

// Create connection
$conn = new mysqli($host, $db_user, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  header('location: install.php');
}
?>