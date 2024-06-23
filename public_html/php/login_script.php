<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        if ($_POST['action'] == "login") {
            login();
        } elseif ($_POST['action'] == "register") {
            register();
        } else {
            exit;
        }
    }
}

function login()
{
    $email = trim($_POST["email"]);
    // $password = trim($_POST["password"]);
    
    if (empty($email)) {
        echo 'Please enter both email and password.';
        return;
    }
    
    include 'config.php';
    
    $stmt = $conn->prepare(`SELECT * FROM {$prefix}uzytkownicy WHERE email = ?`);
    $stmt->bind_param("s", $email);
    
    
    if ($stmt->execute()) {
        // echo $stmt;
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo trim($_POST["password"]);
            // Debugging print statements
            echo "Input password: " . trim($_POST["password"]) . "<br>";
            echo "Hashed password from database: " . $row['haslo'] . "<br>";

            if (password_verify(trim($_POST["password"]), $row['haslo'])) {
                
                $_SESSION["zalogowany"] = true;
                $_SESSION["id"] = $row['id_uzytkownika'];
                $_SESSION["email"] = $row['email'];                      
                $_SESSION["rola"] = $row['rola'];
                $_SESSION["nazwa"] = $row['nazwa'];
                $_SESSION["saldo"] = $row['saldo'];

                $result->free_result();

                header("location: ../index.php");
                exit;
            } else {
                echo "Incorrect password.";
            }
        } else {
            echo "Email not found.";
        }
    } else {
        echo 'Error executing query.';
    }
}

function register()
{
    require_once "config.php";
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (empty($name) || empty($email) || empty($_POST["password"])) {
        echo 'Please fill in all fields.';
        return;
    }
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Check if user or email already exists
    $stmt = $conn->prepare(`SELECT email FROM {$prefix}uzytkownicy WHERE email = ?`);
    $stmt->bind_param("s", $email);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Username or email already exists.";
        return;
    }

    $stmt = $conn->prepare(`INSERT INTO {$prefix}uzytkownicy(nazwa, email, haslo, rola, saldo, czy_aktywny) VALUES (?,?,?,'kupujacy',0,1)`);
    $stmt->bind_param("sss", $name, $email, $hashed_password);

    if ($stmt->execute()) {
        echo "Registered successfully, you can now log in.";
    } else {
        echo 'Error registering user.';
    }
}
?>
