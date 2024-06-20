<?php
session_start();

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = trim($_POST["email"]);
    $password =trim($_POST["password"]);
     
    if(empty($email) or empty($password)){
        echo 'Przesłano formularz z pustymi danymi';
        return;
    }
    
    include 'conn_string.php';


    $password = password_hash($password, PASSWORD_BCRYPT);
    
    $stmt = $conn->prepare("select * from uzytkownicy where email = ? and haslo = ?");
    $stmt -> bind_param("ss", $emailXD, $passwordXD);

    $emailXD = $email;
    $passwordXD = $password;

    if($stmt->execute()){
        $result = $stmt->get_result();

        if ($result->num_rows > 0){
    
          
        }

            if($password === )


            $_SESSION["zalogowany"] = true;
            $_SESSION["id"] = $id;
            $_SESSION["email"] = $email;                            
            $_SESSION["rola"] = $rola;
            $_SESSION["nazwa"] = $nazwa;
            header("location: gamestore/Online-game-store/public_html/index.php");
            
        }
        else{
            echo "Błędne dane logowania.";
            return;
        }
    }
    else{
        echo 'Błąd';
    }

?>