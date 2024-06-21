<?php

if(isset($_POST['submit'])){
    send_message();
}

function send_message(){
    if( !isset($_POST['email']) or !isset($_POST['subject']) or !isset($_POST['message'])){

        include 'conn_string.php';
        $stmt = $conn->prepare("INSERT INTO `wiadomosci`( `email`, `temat`, `opis`) VALUES (?,?,?)
        ");
        $stmt -> bind_param("sss", $emailXD, $tematXD, $opisXD);
    
        $emailXD= trim($_POST['email']);
        $tematXD =trim($_POST['subject']);
        $opisXD = trim($_POST['message']);

        if($stmt->execute())
        {
            echo "Wiadomość wysłana.";
        }
        else {
            echo 'Błąd';
        }
    }
    else{
        echo "blad przysylania danych formularza";
    }
}

?>