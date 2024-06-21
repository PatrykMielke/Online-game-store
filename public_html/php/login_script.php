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

                header("location: ../index.php");
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
?>