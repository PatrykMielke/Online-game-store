<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['submit']))
    {
        if($_POST['action'] == "login"){
           
           
           
           echo '<script> alert("Please enter"); </script>';    
            
            
            login();
        }
        else if($_POST['action'] == "register"){
            register();
        }
        else{
            exit;
        }
    }
}
function login(){
    $email = trim($_POST["email"]);
    $password =trim($_POST["password"]);
     
    if(empty($email) or empty($password)){
        echo 'Przesłano formularz z pustymi danymi';
        return;
    }
    
    include 'config.php';

    $stmt = $conn->prepare("select * from uzytkownicy where email = ?");
    $stmt -> bind_param("s", $emailXD);

    $emailXD = $email;
    
    if($stmt->execute()){
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0){
            $row = $result -> fetch_assoc();
            if(password_verify($password, $row['haslo']))
            {
                $_SESSION["zalogowany"] = true;
                $_SESSION["id"] = $row['id_uzytkownik'];
                $_SESSION["email"] = $row['email'];                      
                $_SESSION["rola"] = $row['rola'];
                $_SESSION["nazwa"] = $row['nazwa'];
                $_SESSION["saldo"] = $row['saldo'];

                $result -> free_result();

                header("location: index.php");
                exit;
            }
        }
        else{
            echo "Błędne dane logowania.";
            return;
        }
    }
    else{
        echo 'Błąd';
    }
}

function register(){
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
        echo "Podana nazwa użytkownika lub adres e-mail jest już zajęty.";
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

// Processing form data when form is submitted

?>