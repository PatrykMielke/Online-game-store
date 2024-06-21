<!-- Pierwszy navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light custom-navbar">
    <!-- Zastąpienie tekstu logo własnym zdjęciem -->
    <a class="navbar-brand custom-navbar-brand" href="index.php"><img src="zdj/stadia_controller_FILL0_wght400_GRAD0_opsz24.png" alt="Logo" style="max-width: 100px;"></a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
      
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse custom-navbar-nav" id="navbarSupportedContent1">
      <ul class="navbar-nav mr-auto">
        
        
        
        
        <li class="nav-item">
          <a class="nav-link custom-nav-link" href="index.php">Strona główna</a>
        </li>
        <li class="nav-item">
          <a class="nav-link custom-nav-link" href="regulamin.php">Regulamin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link custom-nav-link" href="sklepGier.php">Sklep gier</a>
        </li>
        
        
        

        <?php
          // niezalogowany
          if (!isset($_SESSION['zalogowany'])){
            echo '<li>  <a href="logowanie.php"><img src="zdj/login_FILL0_wght400_GRAD0_opsz24.png" alt="Logowanie"></a></li> ';
          }
        ?>   
        
        <?php
        // zalogowany
          if (isset($_SESSION['zalogowany']) and $_SESSION['zalogowany']){
            echo '<li class="nav-item">
                    <a class="nav-link custom-nav-link" href="profil.php">Mój profil</a>
                 </li>';
            
            echo '<li class="nav-item">
                    <a class="nav-link custom-nav-link" href="wyslijWiadomosc.php">Pomoc</a>
                  </li>';

            echo '<li class="nav-item">
          <a class="nav-link custom-nav-link" href="dodajSaldo.php">Dodaj środki</a>
        </li>';

            echo '<li class="nav-item">
          <a class="nav-link custom-nav-link" href="edytujProfil.php">Edycja Profilu</a>
        </li>';

            echo '<li> <a href="wyloguj.php"><img src="zdj/logout_24dp_FILL0_wght400_GRAD0_opsz24.png" alt="wyloguj"></a></li> ';
          
          

          // sprzedający

          if(isset($_SESSION['zalogowany']) and $_SESSION['rola'] == "sprzedajacy"){
            echo '<li class="nav-item">
          <a class="nav-link custom-nav-link" href="sprzedajacy.php">Panel sprzedaży</a>
        </li>';
        echo '<li class="nav-item">
          <a class="nav-link custom-nav-link" href="dodajGre.php">Dodaj nową Gre</a>
        </li>';
          }


          //support 

          if (isset($_SESSION['zalogowany']) and $_SESSION['rola'] == "support" or $_SESSION['rola'] == "administrator"){
            echo '<li class="nav-item">
                      <a class="nav-link custom-nav-link" href="wiadomosci.php">Wiadomości</a>
                  </li> ';
            
          }



          //admin

          if (isset($_SESSION['zalogowany']) and $_SESSION['rola'] == "administrator"){
            echo '<li>  <a href="logowanie.php"><img src="zdj/login_FILL0_wght400_GRAD0_opsz24.png" alt="Logowanie"></a></li> ';

            echo '<li class="nav-item">
          <a class="nav-link custom-nav-link" href="panelAdmina.php">Panel Admina</a>
        </li>';
          }
        }




        ?>
    
      </ul>
    </div>
    </nav>
