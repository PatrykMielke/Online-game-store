<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wylogowywanie</title>
    <link rel="stylesheet" href="css/wyloguj.css" />
</head>
<body class="wylogujBody">
    <div class="container">
        <h1>Wylogowywanie...</h1>
        <div class="loader">
            <svg width="100" height="100" viewBox="0 0 100 100">
                <circle cx="50" cy="50" r="45" fill="none" stroke="#000" stroke-width="10" stroke-linecap="round">
                    <animateTransform attributeName="transform"
                                      type="rotate"
                                      from="0 50 50"
                                      to="360 50 50"
                                      dur="2s"
                                      repeatCount="1" />
                </circle>
            </svg>
        </div>
        <?php
        session_start();
        include 'php/logout.php';
        ?>
        <p>Zostaniesz automatycznie przekierowany do strony głównej po zakończeniu animacji.</p>
    </div>

    <script src="js/wyloguj.js">
      
    </script>
</body>
</html>
