<?php

function load_description(){
    include 'config.php';
    // Check if user or email already exists
    $stmt = $conn->prepare("select opis from uzytkownicy where id_uzytkownik = ?");
    $stmt ->bind_param("i", $id);
    $id = $_GET['id'];

    if($stmt->execute()){
      $result = $stmt->get_result();

      if ($result->num_rows > 0){
          $row = $result -> fetch_assoc();
          $opis = $row['opis'];
          echo $opis;
      }
      else{
          echo "błąd";
      }
    }
    else{
      echo "błąd";
    }
}

function load_avatar(){
  include 'config.php';
    // Check if user or email already exists
    $stmt = $conn->prepare("select avatar from uzytkownicy where id_uzytkownik = ?");
    $stmt ->bind_param("i", $id);
    $id = $_GET['id'];

    if($stmt->execute()){
      $result = $stmt->get_result();

      if ($result->num_rows > 0){
          $row = $result -> fetch_assoc();
          $avatar = $row['avatar'];
          echo $avatar;
          echo '<img
								src="https://picsum.photos/200?image=1027"
								alt="Zdjęcie profilowe"
								class="profile-image"
								id="profileImage"
							/>';
      }
      else{
          echo "błąd";
      }
    }
    else{
      echo "błąd";
    }
}
function load_name(){
  include 'config.php';
    // Check if user or email already exists
    $stmt = $conn->prepare("select nazwa from uzytkownicy where id_uzytkownik = ?");
    $stmt ->bind_param("i", $id);
    $id = $_GET['id'];

    if($stmt->execute()){
      $result = $stmt->get_result();

      if ($result->num_rows > 0){
          $row = $result -> fetch_assoc();
          $avatar = $row['nazwa'];
          echo $avatar;
      }
      else{
          echo "błąd";
      }
    }
    else{
      echo "błąd";
    }
}
function load_friends(){
    include 'config.php';
      $stmt = $conn->prepare("SELECT id_uzytkownik2, nazwa, avatar FROM znajomi z inner join uzytkownicy u on id_uzytkownik2 = u.id_uzytkownik where id_uzytkownik1 = ?;");
      $stmt ->bind_param("i", $id);
      $id = $_GET['id'];;
  
      if($stmt->execute()){
        $result = $stmt->get_result();
  
        if ($result->num_rows > 0){
            while($row = $result -> fetch_assoc()){
                echo '<div class="friend">
                <a href="profil.php?id='.$row['id_uzytkownik2'].'">
                    <img src="https://picsum.photos/200?image=1005" alt="Znajomy" />
                    <p>'.$row['nazwa'].'</p></a>
                </div>';
            }
        }
        
      }
      else{
        echo "błąd";
      }
}

function load_games(){
    include 'config.php';
      $stmt = $conn->prepare("SELECT produkty.id_produktu, nazwa, ikona FROM `produkty` inner join posiadane_programy on 
      posiadane_programy.id_produkt = produkty.id_produktu where posiadane_programy.id_uzytkownik = ?;");
      $stmt ->bind_param("i", $id);
      $id = $_GET['id'];;
  
      if($stmt->execute()){
        $result = $stmt->get_result();
  
        if ($result->num_rows > 0){
            while($row = $result -> fetch_assoc()){
                echo '<div class="friend">
                <a href="stronaGry.php?id='.$row['id_produkt'].'">
                    <img src="https://picsum.photos/200?image=1005" alt="Gra" />
                    <p>'.$row['nazwa'].'</p></a>
                </div>';
            }
        }
        
      }
      else{
        echo "błąd";
      }
}




?>