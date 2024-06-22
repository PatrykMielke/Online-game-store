<?php
session_start();

// Krok 1
$config_file = 'config.php';


if (file_exists($config_file)) {

    $file = fopen($config_file, 'w'); 
    if ($file) {
        fwrite($file,"");
        fclose($file);
    }




}
else {

    if($file = fopen($config_file, 'w')){
        echo 'utworzono plik config.php <br>';
        fclose($file);
    }
    else{
        echo 'Utwórz plik
        config.php
        (touch config.php)';
    }


}




// Krok instalacji
$step = isset($_GET['step']) ? (int)$_GET['step'] : 1;

function form_install_1() {
    echo '<form method="POST" action="install.php?step=2">';
    
    echo '<h2>Krok 1: Konfiguracja bazy danych</h2>';

    echo '<label for="servername">Nazwa lub adres serwera</label><br>';
    echo '<input type="text" id="servername" name="servername"><br>';

    echo '<label for="database">Nazwa bazy danych</label><br>';
    echo '<input type="text" id="database" name="database"><br>';

    echo '<label for="username">Nazwa użytkownika</label><br>';
    echo '<input type="text" id="username" name="username"><br>';

    echo '<label for="password">Hasło bazy danych</label><br>';
    echo '<input type="password" id="password" name="password"><br>';

    echo '<label for="prefix">Prefix tabel</label><br>';
    echo '<input type="text" id="prefix" name="prefix"><br>';

    echo '<br><input type="submit" value="Dalej">';
    echo '</form>';
}

function form_install_2() {
    echo '<form method="POST" action="install.php?step=3">';
    echo '<h2>Krok 2: Konfiguracja aplikacji</h2>';
    echo '<label for="base_url">Adres bazowy aplikacji:</label><br>';
    echo '<input type="text" id="base_url" name="base_url" value="' . htmlspecialchars($_SESSION['base_url']) . '"><br>';
    echo '<input type="submit" value="Instaluj">';
    echo '</form>';
}

function save_config($config) {
    global $config_file;
    $content = "<?php\n";
    foreach ($config as $key => $value) {
        $content .= "\$$key = '" . addslashes($value) . "';\n";
    }
    $content .= "?>";
    return file_put_contents($config_file, $content);
}

if (file_exists($config_file)) {
    if (is_writable($config_file)) {
        if ($step == 1) {
            form_install_1();
        } elseif ($step == 2) {
            // Zapisz dane z formularza do sesji
            $_SESSION['servername'] = $_POST['servername'];
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];
            $_SESSION['database'] = $_POST['database'];

            // Sprawdzenie połączenia z bazą danych
            $conn = mysqli_connect($_SESSION['servername'], $_SESSION['username'], $_SESSION['password'], $_SESSION['database']);
            if (!$conn) {
                die("Połączenie nieudane: " . mysqli_connect_error());
            } else {
                // Ustawienie base_url
                $_SESSION['base_url'] = pathinfo(full_url($_SERVER))['dirname'] . '/';
                form_install_2();
            }
        } elseif ($step == 3) {
            $config = [
                'servername' => $_SESSION['servername'],
                'username' => $_SESSION['username'],
                'password' => $_SESSION['password'],
                'database' => $_SESSION['database'],
                'base_url' => $_POST['base_url'],
            ];

            if (save_config($config)) {
                echo "<p>Instalacja zakończona sukcesem! Plik konfiguracyjny został zapisany.</p>";
            } else {
                echo "<p>Błąd podczas zapisywania pliku konfiguracyjnego.</p>";
            }
        }
    } else {
        echo "<p>Zmień uprawnienia do pliku <code>{$config_file}</code><br>np. <code>chmod o+w {$config_file}</code></p>";
        echo '<p><button class="btn btn-info" onClick="window.location.href=window.location.href">Odśwież stronę</button></p>';
    }
} else {
    echo "<p>Stwórz plik <code>{$config_file}</code><br>np. <code>touch {$config_file}</code></p>";
    echo '<p><button class="btn btn-info" onClick="window.location.href=window.location.href">Odśwież stronę</button></p>';
}

function full_url($s, $use_forwarded_host = false) {
    return url_origin($s, $use_forwarded_host) . $s['REQUEST_URI'];
}

function url_origin($s, $use_forwarded_host = false) {
    $ssl = !empty($s['HTTPS']) && $s['HTTPS'] == 'on';
    $sp = strtolower($s['SERVER_PROTOCOL']);
    $protocol = substr($sp, 0, strpos($sp, '/')) . ($ssl ? 's' : '');
    $port = $s['SERVER_PORT'];
    $port = (!$ssl && $port == '80') || ($ssl && $port == '443') ? '' : ':' . $port;
    $host = $use_forwarded_host && isset($s['HTTP_X_FORWARDED_HOST']) ? $s['HTTP_X_FORWARDED_HOST'] : (isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : null);
    $host = isset($host) ? $host : $s['SERVER_NAME'] . $port;
    return $protocol . '://' . $host;
}
?>