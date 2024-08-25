<?php

function load_description(){
    include 'config.php';
    // Check if user or email already exists
    $stmt = $conn->prepare("select opis from `{$prefix}uzytkownicy` where id_uzytkownika = ?");
    $stmt ->bind_param("i", $id);
    $id = $_SESSION['id'];

    if($stmt->execute()){
      $result = $stmt->get_result();

      if ($result->num_rows > 0){
          $row = $result -> fetch_assoc();
          $opis = $row['opis'];
          echo $opis;
      }
      else{
          echo "";
      }
    }
    else{
      echo "";
    }
}

function load_name(){
    include 'config.php';
    // Check if user or email already exists
    $stmt = $conn->prepare("select nazwa from `{$prefix}uzytkownicy` where id_uzytkownika = ?");
    $stmt ->bind_param("i", $id);
    $id = $_SESSION['id'];

    if($stmt->execute()){
      $result = $stmt->get_result();

      if ($result->num_rows > 0){
          $row = $result -> fetch_assoc();
          $opis = $row['nazwa'];
          echo $opis;
      }
      else{
          echo "";
      }
    }
    else{
      echo "";
    }
}

function load_email(){
    include 'config.php';
    // Check if user or email already exists
    $stmt = $conn->prepare("select email from `{$prefix}uzytkownicy` where id_uzytkownika = ?");
    $stmt ->bind_param("i", $id);
    $id = $_SESSION['id'];

    if($stmt->execute()){
      $result = $stmt->get_result();

      if ($result->num_rows > 0){
          $row = $result -> fetch_assoc();
          $opis = $row['email'];
          echo $opis;
      }
      else{
          echo "";
      }
    }
    else{
      echo "";
    }
}


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["zmiendane"])){

            if(empty($_POST['nazwa']) or empty($_POST['email'])){
                echo "przesłano formularz z pustymi danymi";
                exit;
            }
            include 'config.php';


            // Check if user or email already exists
            $id_query = $_GET['id'];

            $stmt = $conn->prepare("SELECT email FROM `{$prefix}uzytkownicy` WHERE email = ? and id_uzytkownika not in (?)");
            $stmt->bind_param("s", $email);
            $stmt->bind_param("s", $id_query);

            $email = trim($_POST['email']);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "Username or email already exists.";
                return;
            }



            $sql = "UPDATE `{$prefix}uzytkownicy` SET nazwa = ?, opis = ?, email = ? WHERE id_uzytkownika = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $_POST['nazwa'], $_POST['opis'], $_POST['email'], $_SESSION['id']);
           
            if($stmt->execute()){
                $id_sesji = $_SESSION['id'];
                header("location: profil.php?id=$id_sesji");
            }
            else{
                echo "blad";
            }

            
        }
        else if (isset($_POST["zmienhaslo"])){
            
            if(empty($_POST['password']) or empty($_POST['password2'])){
                echo 'hasla';
                echo $_POST['password'];
                echo $_POST['password2'];
                echo 'hasla';
                echo "przesłano formularz z pustymi danymi";
                exit;
            }
            if($_POST['password'] != $_POST['password2']){
                echo "Hasła nie są identyczne";
                exit;
            }
            include 'config.php';
            



            $noweHaslo = password_hash($_POST['password'],PASSWORD_BCRYPT);
            $sql = "UPDATE `{$prefix}uzytkownicy` SET haslo = ? WHERE id_uzytkownika = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $noweHaslo,$id);
            $noweHaslo = password_hash(trim($_POST['password']),PASSWORD_BCRYPT) ;
            $id = $_SESSION['id'];
            if($stmt->execute()){
                $id_sesji = $_SESSION['id'];
                header("location: profil.php?id=$id_sesji");
            }
            else{
                echo "blad";
            }
        }



    }
        
?>