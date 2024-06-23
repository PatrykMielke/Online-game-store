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

function load_games() {
  include 'config.php';
  $id = $_GET['id'];

  // Prepare SQL query to fetch products with condition on ocena
  $stmt = $conn->prepare("
      SELECT p.id_produktu, p.nazwa, pp.ocena, pr.ikona
      FROM `{$prefix}produkty` p
      INNER JOIN `{$prefix}posiadane_programy` pp ON pp.id_produktu = p.id_produktu
      LEFT JOIN `{$prefix}produkty` pr ON pr.id_produktu = p.id_produktu
      WHERE pp.id_uzytkownika = ?;
  ");
  $stmt->bind_param("i", $id);

  if ($stmt->execute()) {
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo '<div class="col-md-6 col-lg-4 mb-3">';
              echo '<div class="card">';      
              echo '<div class="card-body">';
              echo '<a href="stronaGry.php?id='.$row['id_produktu'].'">';
              
              // Display custom image path from produkty table
              $imgSrc = isset($row['ikona']) ? './img/products/'.$row['ikona'] : 'https://picsum.photos/200?image=1005';
              echo '<img src="'.$imgSrc.'" style="width: 100%; height: 80%;" alt="Gra" />';
              
              echo '<p>'.$row['nazwa'].'</p>';
              echo '</a>';

              // Render the rating form only when ocena is NULL
              if (is_null($row['ocena'])) {
                  echo '<form method="post" action="php/ocen_gre.php">';
                  echo '<input type="hidden" name="id_produktu" value="'.$row['id_produktu'].'">';
                  echo '<label for="rating'.$row['id_produktu'].'">Oceń grę:</label>';
                  echo '<input type="number" id="rating'.$row['id_produktu'].'" name="rating" min="0" max="5" step="1" required>';
                  echo '<button type="submit">Oceń</button>';
                  echo '</form>';
              }
              else {
                  echo '<div>Twoja ocena: '.$row['ocena'].'</div>';
              }

              echo '</div>'; // card-body
              echo '</div>'; // card
              echo '</div>'; // col
          }
      } else {
          echo "Brak danych";
      }
  } else {
      echo "Błąd zapytania: " . $stmt->error;
  }

  $stmt->close();
  $conn->close();
}


?>