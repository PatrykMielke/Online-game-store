<?php
session_start();

function url_origin($s, $use_forwarded_host = false)
{
    $ssl = (!empty($s['HTTPS']) && $s['HTTPS'] == 'on');
    $sp = strtolower($s['SERVER_PROTOCOL']);
    $protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
    $port = $s['SERVER_PORT'];
    $port = ((!$ssl && $port == '80') || ($ssl && $port == '443')) ? '' : ':' . $port;
    $host = ($use_forwarded_host && isset($s['HTTP_X_FORWARDED_HOST'])) ? $s['HTTP_X_FORWARDED_HOST'] : (isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : null);
    $host = isset($host) ? $host : $s['SERVER_NAME'] . $port;
    return $protocol . '://' . $host;
}

function full_url($s, $use_forwarded_host = false)
{
    return url_origin($s, $use_forwarded_host) . $s['REQUEST_URI'];
}

$url = pathinfo(full_url($_SERVER));
$base_url = $url['dirname'] . "/";

$config_file = 'php/config.php';
$step = isset($_GET['step']) ? (int)$_GET['step'] : 0;

switch ($step) {
    case 2:
        step2();
        break;

    case 3:
        step3();
        break;

    case 4:
        step4();
        break;

    case 5:
        step5();
        break;

    case 6:
        step6();
        break;

    default:
        check_config();
        break;
}

function check_config() {
    global $config_file, $base_url;

    if(file_exists($config_file)){
        if(is_writable($config_file)){
                $step = 1;
                form_install_1();
        } else {
            echo "<p>Zmień uprawnienia do pliku <code>".$config_file."</code><br>np. <code>chmod o+w ".$config_file."</code></p>";
            echo "<p><button class='btn-info' onClick='window.location.href=window.location.href'>Odśwież stronę</button></p>";
        }
    }else{
        echo "<p>Stwórz plik <code>".$config_file."</code><br>np. <code>touch ".$config_file."</code></p>";
        echo "<p><button class='btn-info' onClick='window.location.href=window.location.href'>Odśwież stronę</button></p>";
    }
}

function can_connect_db() {
    require 'php/config.php';
    return isset($conn) && $conn;
}

function form_install_1() {
    global $base_url;
    echo '<div class="container">
            <form method="post" action="install.php?step=2">
                <label for="host">Host:</label>
                <input type="text" id="host" name="host" required>
                <label for="user">User:</label>
                <input type="text" id="user" name="user" required>
                <label for="passwd">Password:</label>
                <input type="password" id="passwd" name="passwd">
                <label for="dbname">Database Name:</label>
                <input type="text" id="dbname" name="dbname" required>
                <label for="prefix">Table Prefix(np. tbl_):</label>
                <input type="text" id="prefix" name="prefix">
                <button type="submit">Next</button>
            </form>
          </div>';
}

function step2() {
    global $config_file;

    $file = fopen($config_file, "w");
    $config = "<?php\n";
    $config .= "\$host='" . $_POST['host'] . "';\n";
    $config .= "\$user='" . $_POST['user'] . "';\n";
    $config .= "\$password='" . $_POST['passwd'] . "';\n";
    $config .= "\$dbname='" . $_POST['dbname'] . "';\n";
    $config .= "\$prefix='" . $_POST['prefix'] . "';\n";
    $config .= "\$conn = mysqli_connect(\$host, \$user, \$password, \$dbname);\n";

    if (!fwrite($file, $config)) {
        echo "<div class='container'>Nie mogżna zapisać do pliku ($config_file)</div>";
        exit;
    }

    echo "<div class='container'><p>Krok 2 zakoczony: Plik konfiguracyjny utworzony</p>";
    fclose($file);

    echo '<p><a href="install.php?step=3"><button class="btn-dark">Przejdź do kroku 3</button></a></p></div>';
}

function step3() {
    require_once 'php/config.php';

    if ($conn) {
        echo "<div class='container'><p>Połączono z bazą danych</p>";
        echo '<p><a href="install.php?step=4"><button class="btn-dark">Przejdź do kroku 4</button></a></p></div>';
    } else {
        echo "<div class='container'><p>Nie można połączyć się z bazą danych</p>";
        echo '<p><a href="install.php?step=2"><button class="btn-dark">Powrót do kroku 2</button></a></p></div>';
    }
}

function step4() {
    require_once 'php/config.php';

    $prefix = $prefix ? $prefix : '';

    $create = [];
    $create[] = "CREATE TABLE IF NOT EXISTS `${prefix}odpowiedzi_od_supportu` (
        `id_odpowiedzi` int(11) NOT NULL,
        `id_wiadomosci` int(11) NOT NULL,
        `odpowiedz` mediumtext NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;";

    $create[] = "CREATE TABLE IF NOT EXISTS `${prefix}posiadane_programy` (
        `id_uzytkownika` int(11) NOT NULL,
        `id_produktu` int(11) NOT NULL,
        `data_zakupu` date NOT NULL,
        `cena` decimal(10,2) DEFAULT NULL,
        `ocena` int(11) DEFAULT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;";

    $create[] = "CREATE TABLE IF NOT EXISTS `${prefix}produkty` (
        `id_produktu` int(11) NOT NULL,
        `nazwa` varchar(255) NOT NULL,
        `id_wydawcy` int(11) DEFAULT NULL,
        `ikona` varchar(255) DEFAULT NULL,
        `cena` decimal(10,2) NOT NULL,
        `czy_dostepny` tinyint(1) DEFAULT 1,
        `opis` mediumtext DEFAULT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;";

    $create[] = "CREATE TABLE IF NOT EXISTS `${prefix}tagi` (
        `id_tag` int(11) NOT NULL,
        `nazwa` varchar(255) NOT NULL,
        `id_produktu` int(11) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;";

    $create[] = "CREATE TABLE IF NOT EXISTS `${prefix}uzytkownicy` (
        `id_uzytkownika` int(11) AUTO_INCREMENT primary key NOT NULL,
        `nazwa` varchar(255)  NULL,
        `email` varchar(255)  NULL,
        `haslo` varchar(255)  NULL,
        `rola` varchar(255) DEFAULT NULL,
        `saldo` decimal(10,2) DEFAULT NULL,
        `obraz_w_tle` varchar(255) DEFAULT NULL,
        `avatar` varchar(255) DEFAULT NULL,
        `czy_aktywny` tinyint(1) DEFAULT NULL,
        `opis` varchar(255) DEFAULT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;";

    $create[] = "CREATE TABLE IF NOT EXISTS `${prefix}wiadomosci_od_uzytkownikow` (
        `id_wiadomosci` int(11) NOT NULL,
        `id_uzytkownika` int(11) NOT NULL,
        `temat` varchar(255) NOT NULL,
        `opis` varchar(2000) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;";


    $create[] = "ALTER TABLE `${prefix}odpowiedzi_od_supportu`
  ADD PRIMARY KEY (`id_odpowiedzi`),
  ADD KEY `id_wiadomosci` (`id_wiadomosci`);";
    $create[] = "ALTER TABLE `${prefix}posiadane_programy`
  ADD PRIMARY KEY (`id_uzytkownika`,`id_produktu`),
  ADD KEY `id_produkt` (`id_produktu`);
";
    $create[] = "ALTER TABLE `${prefix}produkty`
  ADD PRIMARY KEY (`id_produktu`);";
    $create[] = "ALTER TABLE `${prefix}tagi`
  ADD PRIMARY KEY (`id_tag`)";
//,ADD KEY `fk_tagi_produkty` (`id_produktu`);


    $create[] = "ALTER TABLE `${prefix}wiadomosci_od_uzytkownikow`
  ADD PRIMARY KEY (`id_wiadomosci`);";
    $create[] = "ALTER TABLE `${prefix}odpowiedzi_od_supportu`
  MODIFY `id_odpowiedzi` int(11) NOT NULL AUTO_INCREMENT";
    $create[] = "ALTER TABLE `${prefix}produkty`
  MODIFY `id_produktu` int(11) NOT NULL AUTO_INCREMENT";
    $create[] = "ALTER TABLE `${prefix}tagi`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT";
  
    $create[] = "ALTER TABLE `${prefix}wiadomosci_od_uzytkownikow`
  MODIFY `id_wiadomosci` int(11) NOT NULL AUTO_INCREMENT;
";


    //$create[] = "ALTER TABLE `{$prefix}tagi`
 // ADD CONSTRAINT `fk_tagi_produkty` FOREIGN KEY (`id_produktu`) REFERENCES `${prefix}produkty` (`id_produktu`);";

    echo "<div class='container'>";
    foreach ($create as $query) {
        if (mysqli_query($conn, $query)) {
            echo "<p>Wykonano: <code>$query</code></p>";
        } else {
            echo "<p>błąd: " . mysqli_error($conn) . "</p>";
        }
    }
    
    echo '<p><a href="install.php?step=5"><button class="btn-dark">Przejdź do kroku 5</button></a></p></div>';
}

function step5() {
    
    global $config_file, $base_url;
    echo '<div class="container">
            <p>Base URL: ' . $base_url . '</p>
            <form method="post" action="install.php?step=6">
                <label for="base_url">Adres serwisu (base url):</label>
                <input type="text" id="base_url" name="base_url" required>
                <label for="nazwa_aplikacji">Nazwa aplikacji:</label>
                <input type="text" id="nazwa_aplikacji" name="nazwa_aplikacji" required>
                <label for="data_powstania">Data powstania:</label>
                <input type="text" id="data_powstania" name="data_powstania" required>
                <label for="wersja">Wersja:</label>
                <input type="text" id="wersja" name="wersja" required>
                <label for="brand">Nazwa firmy:</label>
                <input type="text" id="brand" name="brand" required>
                <label for="adres1">Ulica:</label>
                <input type="text" id="adres1" name="adres1" required>
                <label for="adres2">Miasto, kod:</label>
                <input type="text" id="adres2" name="adres2" required>
                <label for="adres3">Telefon:</label>
                <input type="text" id="adres3" name="adres3" required>
                <label for="admin_login">Login (e-mail) administratora:</label>
                <input type="email" id="admin_login" name="admin_login" required>
                <label for="passwd">Hasło administratora:</label>
                <input type="password" id="passwd" name="passwd" required>
                <label for="passwd_confirm">Potwierdź hasło:</label>
                <input type="password" id="passwd_confirm" name="passwd_confirm" required>
                <button type="submit">Next</button>
            </form>
          </div>';
}

function step6() {
    global $config_file;
    require_once 'php/config.php';


    $config = "\n# konfiguracja aplikacji\n";
    $config .= "\$base_url='".$_POST['base_url']."';\n";
    $config .= "\$nazwa_aplikacji='".$_POST['nazwa_aplikacji']."';\n";
    $config .= "\$data_powstania='".$_POST['data_powstania']."';\n";
    $config .= "\$wersja='".$_POST['wersja']."';\n";
    $config .= "\$brand='".$_POST['brand']."';\n";
    $config .= "\$adres1='".$_POST['adres1']."';\n";
    $config .= "\$adres2='".$_POST['adres2']."';\n";
    $config .= "\$adres3='".$_POST['adres3']."';\n";
    $config .= "\$admin_login='".$_POST['admin_login']."';\n";
    $config .= "\$admin_password='".password_hash($_POST['passwd'], PASSWORD_BCRYPT)."';\n";

    $config .= "
                if (".'$conn->connect_error'.") {
                die('Connection failed: ' .".'$conn->connect_error'.");
                header('location: install.php');
                }
                ?>
";

    if (is_writable($config_file)) {
        if (!$uchwyt = fopen($config_file, 'a')) {
            echo "<div class='container'>Nie można otworzyć pliku ($config_file)</div>";
            exit;
        }
        if (fwrite($uchwyt, $config) === FALSE) {
            echo "<div class='container'>Nie można zapisać do pliku ($config_file)</div>";
            exit;
        }
        echo "<div class='container'>Sukces, zapisano (kod konfiguracji) do pliku ($config_file).</div>";
        fclose($uchwyt);
    } else {
        echo "<div class='container'>Plik $config_file nie jest zapisywalny</div>";
    }


        $stmt = $conn->prepare("INSERT INTO {$dbname}.{$prefix}uzytkownicy (nazwa, email, haslo, rola, saldo, czy_aktywny) VALUES (?,?,?,?,0,1);");

        if ($stmt === false) {
            die("Statement preparation failed: " . $conn->error);
        }
    
        if($stmt){
            $stmt -> bind_param("ssss",$nazwa,$email,$haslo,$rola);
            $nazwa = trim($_POST['admin_login']);
            $email = trim($_POST['admin_login']);
            $haslo = trim(password_hash($_POST['passwd'], PASSWORD_BCRYPT));
            $rola = trim('administrator');
    
            if($stmt->execute()){
                echo "dodano admina";
            }
            else{
                echo "bład przy dodawaniu admina". $stmt->error;
            }
        }
        else{
            echo "blad przy poleceniu". $stmt->error;
        }
        
        echo '<p>Instalacja zakończona</p>';
        echo '<p>Usuń plik install.php i zmień prawa dostępu do config.php</p>';
        echo '<p><a href="index.php"><button class="btn-dark">Przejdź do strony głównej(index.php)</button></a></p></div>';
    }

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instalacja</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        button {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #272727;
            color: white;
            cursor: pointer;
            border: none;
            margin-top: 20px;
        }

        button:hover {
            background-color: #0056b3;
        }

        p {
            margin: 10px 0;
            color: #666;
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn-info, .btn-dark {
            background-color: #293c3f;
            border: none;
            padding: 10px 20px;
            color: white;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn-info:hover, .btn-dark:hover {
            background-color: #293536;
        }

        .btn-dark {
            background-color: #272727;
        }

        .btn-dark:hover {
            background-color: #1b1b1b;
        }

        @media (max-width: 600px) {
            .container {
                width: 100%;
                padding: 10px;
            }

            button {
                padding: 10px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
</body>
</html>
