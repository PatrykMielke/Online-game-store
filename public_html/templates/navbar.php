<!-- Pierwszy navbar -->
<script>
  function confirmLogout() {
    return confirm("Czy na pewno chcesz się wylogować?");
}
</script>
  <nav class="navbar navbar-expand-lg navbar-light bg-light custom-navbar">
    <!-- Zastąpienie tekstu logo własnym zdjęciem -->
    <a class="navbar-brand custom-navbar-brand" href="index.php"><img src="img/stadia_controller_FILL0_wght400_GRAD0_opsz24.png" alt="Logo" style="max-width: 100px;"></a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
      
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse custom-navbar-nav" id="navbarSupportedContent1">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item">
          <a class="nav-link custom-nav-link" href="regulamin.php">Regulamin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link custom-nav-link" href="sklepGier.php">Sklep gier</a>
        </li>

        <?php
          // niezalogowany
          if (!isset($_SESSION['zalogowany'])){
            echo '<li>  <a href="logowanie.php"><img src="img/login_FILL0_wght400_GRAD0_opsz24.png" alt="Logowanie" style="max-width: 100px;""></a></li> ';
          }
        ?>   
        
        <?php
        // zalogowany
          if (isset($_SESSION['zalogowany']) and $_SESSION['zalogowany']){
            echo '<li class="nav-item">
                    <a class="nav-link custom-nav-link" href="profil.php'.'?id='.$_SESSION['id'].'">Mój profil</a>
                 </li>';
            
            echo '<li class="nav-item">
                    <a class="nav-link custom-nav-link" href="wyslijWiadomosc.php">Pomoc</a>
                  </li>';
                  echo '<li class="nav-item">
                  <a class="nav-link custom-nav-link" href="wiadomoscOdSup.php">Odpowiedzi</a>
              </li> ';
            include 'php/saldo.php';
            $navbar = pokazSaldoNavbar(); 
            echo '<li class="nav-item">
              <a class="nav-link custom-nav-link" href="dodajSaldo.php">Saldo:'.$navbar.'zł</a>
            </li>';
            
          // sprzedający
          if(isset($_SESSION['zalogowany']) and $_SESSION['rola'] == "sprzedajacy"){
            echo '<li class="nav-item">
          <a class="nav-link custom-nav-link" href="sprzedajacy.php">Panel sprzedaży</a>
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
            

            echo '<li class="nav-item">
          <a class="nav-link custom-nav-link" href="panelAdmina.php">Panel Admina</a>
        </li>';
          }
          echo '<li> <a href="wyloguj.php" onclick="return confirmLogout();"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#e8eaed"><path d="M216-144q-29.7 0-50.85-21.15Q144-186.3 144-216v-528q0-29.7 21.15-50.85Q186.3-816 216-816h264v72H216v528h264v72H216Zm432-168-51-51 81-81H384v-72h294l-81-81 51-51 168 168-168 168Z"/></svg></a></li>';
        }
        ?>
    
      </ul>
    </div>
    </nav>
