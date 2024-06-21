<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['submit'])){
        $stmt = $conn->prepare("SELECT id_wiadomosci, nazwa,temat,wiadomosci_od_uzytkownikow.opis FROM `wiadomosci_od_uzytkownikow` inner join uzytkownicy on uzytkownicy.id_uzytkownik = wiadomosci_od_uzytkownikow.id_uzytkownik where id_wiadomosci=?;");
        $stmt -> bind_param("i",$_POST['id']);

        if ($stmt->execute()){
            $result = $stmt ->get_result();
            $row = $result -> fetch_assoc();
            
            

        }
        
    }
}

function load_messages(){
    include 'config.php';
    $stmt = $conn->prepare("SELECT id_wiadomosci, nazwa,temat,wiadomosci_od_uzytkownikow.opis o FROM `wiadomosci_od_uzytkownikow` inner join uzytkownicy on uzytkownicy.id_uzytkownik = wiadomosci_od_uzytkownikow.id_uzytkownik;");

    if($stmt->execute())
    {
        $result = $stmt -> get_result();
        if($result -> num_rows == 0){
            echo '<tr>
            <td colspan="4" class="text-center">
            Brak wiadomości oczekujących na odpowiedź
            </td></tr>';
        }
        else{
            $i = 1;
            while ($row = $result -> fetch_assoc()){
                echo '
                <tr>
                    <td>'.$i.'</td>
                    <td>'.$row['nazwa'].'</td>
                    <td>'.$row['temat'].'</td>
                    <td>
                        <button
                            class="btn btn-primary"
                            name="submit"
                            data-toggle="modal"
                            data-target="#messageModal"
                            data-subject="'.$row['temat'].'"
                            data-name="'.$row['nazwa'].'"
                            data-message="'.$row['o'].'"
                            value="'.$row['id_wiadomosci'].'"
                            type="button"
                        >
                            Odpowiedz
                        </button>
                    </td>
                </tr>
                ';
                $i++;
            }
        }
    }
    else {
        echo "Błąd";
    }
}

?>