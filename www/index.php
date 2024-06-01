<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nowoczesna Strona Główna</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/MainPage.css"> <!-- Dodajemy link do pliku CSS -->
 
</head>

<body class="body-main">

  <!-- Pierwszy navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light custom-navbar">
    <!-- Zastąpienie tekstu logo własnym zdjęciem -->
    <a class="navbar-brand custom-navbar-brand" href="#"><img src="../zdj/stadia_controller_FILL0_wght400_GRAD0_opsz24.png" alt="Logo" style="max-width: 100px;"></a>
    
   

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
      
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse custom-navbar-nav" id="navbarSupportedContent1">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link custom-nav-link" href="../html/userPage.html">Strona 1</a>
        </li>
        <li class="nav-item">
          <a class="nav-link custom-nav-link" href="#">Strona 2</a>
        </li>
        <li class="nav-item">
          <a class="nav-link custom-nav-link" href="#">Strona 3</a>

        </li>
        <li>  <a href="../html/login.html"><img src="../zdj/login_FILL0_wght400_GRAD0_opsz24.png" alt="Logowanie"></a></li>
      </ul>
    </div>
    </nav>


  <!-- Główny obszar -->
  <header class="jumbotron jumbotron-fluid text-white text-center custom-jumbotron">
    <div class="container">
      <h1 class="display-4 custom-jumbotron-heading">TRITON</h1>
    </div>
  </header>
  <!-- Drugi navbar -->
  <div class="navbar second-navbar">
    <a class="nav-link" href="#najnowsze-oferty">Najnowsze oferty</a>
   
    <a class="nav-link" href="#nowosci-i-aktualnosci">O zespole</a>
    <a class="nav-link" href="#przyszlosciowe-plany">Przyszlościowe plany</a>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
  <section id="najnowsze-oferty" class="container my-5 custom-section">
    <h2 class="text-center mb-4">Najnowsze oferty</h2><br>

    <div class="row justify-content-center"> <!-- Dodaliśmy justify-content-center -->
      <div class="col-md-3">
        <div class="card">
          <div class="content">
            <div class="back">
              <div class="back-content">
                <svg stroke="#ffffff" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" height="50px" width="50px" fill="#ffffff">
                  <!-- Tutaj SVG ikony -->
                </svg>
                <strong>Hover Me</strong>
              </div>
            </div>
            <div class="front">
              <div class="img">
                <div class="circle"></div>
                <div class="circle" id="right"></div>
                <div class="circle" id="bottom"></div>
              </div>
              <div class="front-content">
                <small class="badge">Pasta</small>
                <div class="description">
                  <div class="title">
                    <p class="title"><strong>Spaguetti Bolognese</strong></p>
                    <svg fill-rule="nonzero" height="15px" width="15px" viewBox="0,0,256,256" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g style="mix-blend-mode: normal" text-anchor="none" font-size="none" font-weight="none" font-family="none" stroke-dashoffset="0" stroke-dasharray="" stroke-miterlimit="10" stroke-linejoin="miter" stroke-linecap="butt" stroke-width="1" stroke="none" fill-rule="nonzero" fill="#20c997"><g transform="scale(8,8)"><path d="M25,27l-9,-6.75l-9,6.75v-23h18z"></path></g></g></svg>
                  </div>
                  <p class="card-footer">30 Mins &nbsp; | &nbsp; 1 Serving</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Druga karta -->
      <div class="col-md-3">
        <div class="card">
          <div class="content">
            <div class="back">
              <div class="back-content">
                <svg stroke="#ffffff" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" height="50px" width="50px" fill="#ffffff">
                  <!-- Tutaj SVG ikony -->
                </svg>
                <strong>Hover Me</strong>
              </div>
            </div>
            <div class="front">
              <div class="img">
                <div class="circle"></div>
                <div class="circle" id="right"></div>
                <div class="circle" id="bottom"></div>
              </div>
              <div class="front-content">
                <small class="badge">Pasta</small>
                <div class="description">
                  <div class="title">
                    <p class="title"><strong>Spaguetti Bolognese</strong></p>
                    <svg fill-rule="nonzero" height="15px" width="15px" viewBox="0,0,256,256" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g style="mix-blend-mode: normal" text-anchor="none" font-size="none" font-weight="none" font-family="none" stroke-dashoffset="0" stroke-dasharray="" stroke-miterlimit="10" stroke-linejoin="miter" stroke-linecap="butt" stroke-width="1" stroke="none" fill-rule="nonzero" fill="#20c997"><g transform="scale(8,8)"><path d="M25,27l-9,-6.75l-9,6.75v-23h18z"></path></g></g></svg>
                  </div>
                  <p class="card-footer">30 Mins &nbsp; | &nbsp; 1 Serving</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Trzecia karta -->
      <div class="col-md-3">
        <div class="card">
          <div class="content">
            <div class="back">
              <div class="back-content">
                <svg stroke="#ffffff" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" height="50px" width="50px" fill="#ffffff">
                  <!-- Tutaj SVG ikony -->
                </svg>
                <strong>Hover Me</strong>
              </div>
            </div>
            <div class="front">
              <div class="img">
                <div class="circle"></div>
                <div class="circle" id="right"></div>
                <div class="circle" id="bottom"></div>
              </div>
              <div class="front-content">
                <small class="badge">Pasta</small>
                <div class="description">
                  <div class="title">
                    <p class="title"><strong>Spaguetti Bolognese</strong></p>
                    <svg fill-rule="nonzero" height="15px" width="15px" viewBox="0,0,256,256" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g style="mix-blend-mode: normal" text-anchor="none" font-size="none" font-weight="none" font-family="none" stroke-dashoffset="0" stroke-dasharray="" stroke-miterlimit="10" stroke-linejoin="miter" stroke-linecap="butt" stroke-width="1" stroke="none" fill-rule="nonzero" fill="#20c997"><g transform="scale(8,8)"><path d="M25,27l-9,-6.75l-9,6.75v-23h18z"></path></g></g></svg>
                  </div>
                  <p class="card-footer">30 Mins &nbsp; | &nbsp; 1 Serving</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Czwarta karta -->
      <div class="col-md-3">
        <div class="card">
          <div class="content">
            <div class="back">
              <div class="back-content">
                <svg stroke="#ffffff" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" height="50px" width="50px" fill="#ffffff">
                  <!-- Tutaj SVG ikony -->
                </svg>
                <strong>Hover Me</strong>
              </div>
            </div>
            <div class="front">
              <div class="img">
                <div class="circle"></div>
                <div class="circle" id="right"></div>
                <div class="circle" id="bottom"></div>
              </div>
              <div class="front-content">
                <small class="badge">Pasta</small>
                <div class="description">
                  <div class="title">
                    <p class="title"><strong>Spaguetti Bolognese</strong></p>
                    <svg fill-rule="nonzero" height="15px" width="15px" viewBox="0,0,256,256" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g style="mix-blend-mode: normal" text-anchor="none" font-size="none" font-weight="none" font-family="none" stroke-dashoffset="0" stroke-dasharray="" stroke-miterlimit="10" stroke-linejoin="miter" stroke-linecap="butt" stroke-width="1" stroke="none" fill-rule="nonzero" fill="#20c997"><g transform="scale(8,8)"><path d="M25,27l-9,-6.75l-9,6.75v-23h18z"></path></g></g></svg>
                  </div>
                  <p class="card-footer">30 Mins &nbsp; | &nbsp; 1 Serving</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
  <div></div>

  <!-- Sekcja Nowości i aktualności -->
  <div class="wallpaper">
  <section id="nowosci-i-aktualnosci" class="container my-5 custom-section">
    <h2 class="text-center mb-4">O zespole</h2><br
    <div class="row">
      <div class="col-md-4">
        <img src="../zdj/person_FILL0_wght400_GRAD0_opsz24.png" class="img-fluid rounded-circle" alt="Członek zespołu 1">
        <h4>Członek zespołu 1</h4>
        <p>Jestem członkiem zespołu, odpowiedzialnym za... Opis mojej roli w zespole.</p>
      </div>
      <div class="col-md-4">
        <img src="../zdj/person_FILL0_wght400_GRAD0_opsz24.png" class="img-fluid rounded-circle" alt="Członek zespołu 2">
        <h4>Członek zespołu 2</h4>
        <p>Jestem członkiem zespołu, odpowiedzialnym za... Opis mojej roli w zespole.</p>
      </div>
      <!-- Dodany trzeci członek zespołu -->
      <div class="col-md-4">
        <img src="../zdj/person_FILL0_wght400_GRAD0_opsz24.png" class="img-fluid rounded-circle" alt="Członek zespołu 3">
        <h4>Członek zespołu 3</h4>
        <p>Jestem członkiem zespołu, odpowiedzialnym za... Opis mojej roli w zespole.</p>
      </div>
    </div>
  </section>

  <section id="przyszlosciowe-plany" class="container my-5 custom-section">
    <h2 class="text-center mb-4">Przyszłościowe plany platformy</h2>
    <div class="row">
      <div class="col-md-12">
        <p>Nasza platforma ma ambitne cele na przyszłość. Planujemy wprowadzić... Tutaj opisz przyszłościowe plany i cele platformy.</p>
        <p>Jednym z naszych głównych celów jest... Opisz tutaj główny cel lub cele przyszłościowe platformy.</p>
        <p>Wierzymy, że nasze działania przyniosą korzyści dla użytkowników, zapewniając im... Opisz tutaj korzyści, jakie przyniesie realizacja przyszłościowych planów.</p>
      </div>
    </div>
  </section>
  <!-- Tutaj możesz umieścić treść dotyczącą nowości i aktualności -->
</section>
<footer class="bg-dark text-light text-center py-3 custom-footer">
  <p>© 2024 Your Company. All rights reserved.</p>
</footer>

<!-- Skrypty JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
 