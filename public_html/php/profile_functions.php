<?php

function load_description(){
    include 'config.php';
    // Check if user or email already exists
    $stmt = $conn->prepare("select opis from `{$prefix}uzytkownicy` where id_uzytkownika = ?");
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
    $stmt = $conn->prepare("select avatar from `{$prefix}uzytkownicy` where id_uzytkownika = ?");
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
    $stmt = $conn->prepare("select nazwa from `{$prefix}uzytkownicy` where id_uzytkownika = ?");
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
      $stmt = $conn->prepare("SELECT id_uzytkownik2, nazwa, avatar FROM `{$prefix}znajomi` z inner join `{$prefix}uzytkownicy` u on id_uzytkownik2 = u.id_uzytkownika where id_uzytkownik1 = ?;");
      $stmt ->bind_param("i", $id);
      $id = $_GET['id'];;
  
      if($stmt->execute()){
        $result = $stmt->get_result();
       
        if ($result->num_rows > 0){
          
            while($row = $result -> fetch_assoc()){
               

              echo '<div class="col-md-6 col-lg-4 mb-3">';
              echo '<div class="card">';      
                
                echo '<div class="card-body">';
                echo '<a href="profil.php?id='.$row['id_uzytkownik2'].'">
                                <img src="https://picsum.photos/200?image=1005" alt="Znajomy" />
                                <p>'.$row['nazwa'].'</p></a>';
                echo '</div>';
                
     echo '</div>';
            echo '</div>
                      ';
        }
        
      }
      else{
        echo "błąd";
      }
}
}

function load_games(){
    include 'config.php';
      $stmt = $conn->prepare("SELECT p.id_produktu, nazwa, ikona FROM `{$prefix}produkty` p inner join `{$prefix}posiadane_programy` pp on 
      pp.id_produktu = p.id_produktu where pp.id_uzytkownika = ?;");
      $stmt ->bind_param("i", $id);
      $id = $_GET['id'];;
  
      if($stmt->execute()){
        $result = $stmt->get_result();
  
        if ($result->num_rows > 0){
            while($row = $result -> fetch_assoc()){
           
                
              echo '<div class="col-md-6 col-lg-4 mb-3">';
              echo '<div class="card">';      
                
                echo '<div class="card-body">
                <a href="stronaGry.php?id='.$row['id_produktu'].'">
                    <img src="https://picsum.photos/200?image=1005" alt="Gra" />
                    <p>'.$row['nazwa'].'</p></a>
                </div>';
                echo '</div>';
                echo '</div>';
            }
        }
        
      }
      else{
        echo "błąd";
      }
}




?>