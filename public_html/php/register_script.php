<?php
session_start();

// Check if the user is already logged in, if yes, redirect to home page


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = password_hash(trim($_POST["password"]), PASSWORD_BCRYPT);

    if(empty($name) or empty($email) or empty($_POST["password"])){
        echo 'Przesłano formularz z pustymi danymi';
        return;
    }

    require_once "config.php";

    // Check if user or email already exists
    $stmt = $conn->prepare("select email from uzytkownicy where email = ? or nazwa = ?;");
    $stmt ->bind_param("ss", $emailXD,$nameXD);
    $nameXD = $name;
    $emailXD = $email;

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0){
        echo "Podana nazwa użytkownika lub hasło jest już zajęte.";
        return;
    }


    $stmt = $conn->prepare("INSERT INTO `uzytkownicy`( `nazwa`, `email`, `haslo`, `rola`, `saldo`, `czy_aktywny`) VALUES (?,?,?,'kupujący',0,1)
    ");
    $stmt -> bind_param("sss", $nameXD, $emailXD, $passwordXD);

    $nameXD = $name;
    $emailXD = $email;
    $passwordXD = $password;

    if($stmt->execute())
    {
        echo "Zarejestrowano pomyślnie, teraz można się zalogować";
    }
    else {
        echo 'Błąd';
    }
}

?>
