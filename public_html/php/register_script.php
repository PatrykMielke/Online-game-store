<?php
session_start();

// Check if the user is already logged in, if yes, redirect to home page
if(isset($_SESSION["zalogowany"]) && $_SESSION["zalogowany"] === true){
    header("location: index.php");
    exit;
}

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    //$name = trim($_POST["name"]);
    $name = "admin";
    $email = trim($_POST["email"]);
    $password = password_hash(trim($_POST["password"]), PASSWORD_BCRYPT);
    // Prepare a select statement
    require_once "conn_string.php";

    $stmt = $conn->prepare("select 1 from uzytkownicy");

    $stmt = $conn->prepare("INSERT INTO `uzytkownicy`( `nazwa`, `email`, `haslo`, `rola`, `saldo`, `czy_aktywny`) VALUES (?,?,?,'kupujący',0,1)
    ");
    $stmt ->bind_param("sss", $nameXD, $emailXD, $passwordXD);

    $nameXD = $name;
    $emailXD = $email;
    $passwordXD = $password;

    if($stmt->execute())
    {
        $_SESSION["zalogowany"] = true;
        $_SESSION["id"] = $id;
        $_SESSION["email"] = $email;                            
        $_SESSION["rola"] = $rola;
        $_SESSION["nazwa"] = $nazwa;
        header("location: /index.php");
    }
    else {
        echo 'Błąd';
    }
}

?>
