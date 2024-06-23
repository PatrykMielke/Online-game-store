<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['submit'])){

        $status = send_message();
        if ($status == 1){
            echo "Wiadomość wysłana.";
        }
        else{
            echo "Błąd przy przesyłaniu formularza";
        }
    }
}


function send_message(){
    if( isset($_POST['subject']) and isset($_POST['message'])){

        include 'config.php';
        $stmt = $conn->prepare("INSERT INTO `{$prefix}wiadomosci_od_uzytkownikow` ( id_uzytkownik, temat, opis) VALUES (?,?,?)
        ");
        $stmt -> bind_param("iss", $id, $tematXD, $opisXD);
    
        $id= $_SESSION['id'];
        $tematXD =trim($_POST['subject']);
        $opisXD = trim($_POST['message']);

        if($stmt->execute())
        {
            return 1;
        }
        else {
            return 0;
        }
    }
}

?>