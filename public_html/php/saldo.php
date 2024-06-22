<?php

function pokazSaldo(){

    include 'config.php';
      // Check if user or email already exists
      $stmt = $conn->prepare("select saldo from uzytkownicy where id_uzytkownik = ?");
      $stmt ->bind_param("s", $id);
      $id = $_SESSION['id'];
  
      if($stmt->execute()){
        $result = $stmt->get_result();
  
        if ($result->num_rows > 0){
            $row = $result -> fetch_assoc();
            $saldo = $row['saldo'];
            echo $saldo;
        }
        else{
            echo "błąd";
        }
      }
      else{
        echo "błąd";
      }
}

function pokazSaldoNavbar(){

    include 'config.php';
      // Check if user or email already exists
      $stmt = $conn->prepare("select saldo from uzytkownicy where id_uzytkownik = ?");
      $stmt ->bind_param("s", $id);
      $id = $_SESSION['id'];
  
      if($stmt->execute()){
        $result = $stmt->get_result();
  
        if ($result->num_rows > 0){
            $row = $result -> fetch_assoc();
            $saldo = $row['saldo'];
            return $saldo;
        }
        else{
            echo "błąd";
        }
      }
      else{
        echo "błąd";
      }
}

function dodajSaldo(){

    $wartosc = doubleval($_POST['wartosc']) ;

    if ($wartosc > 0 && gettype($wartosc) == "double"){

        include 'config.php';

        $stmt = $conn->prepare("update uzytkownicy set saldo = saldo + ? where id_uzytkownik = ?");
        $stmt->bind_param("ss", $wartoscXD,$idXD);
        $wartoscXD = $wartosc;
        $idXD = $_SESSION['id'];
        // Execute the statement
        if ($stmt->execute()) {
            header("Refresh:0");
        } else {
            echo json_encode(["message" => "Error updated data."]);
        }
    
        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
    else{
        // zrobić to jako modal
        echo '<script> alert(Nieprawidłowa wartość doładowania)</script>';
    }

    


}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['submit']))
    {
        dodajSaldo();
    } 
}
?>