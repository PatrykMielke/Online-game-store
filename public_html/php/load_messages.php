<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['submit'])){
        
        $stmt = $conn->prepare("INSERT INTO `odpowiedzi_od_supportu`(`id_wiadomosci`, `odpowiedz`) VALUES (?,?)");
        $stmt -> bind_param("is",$_POST['submit'],$_POST['odpowiedz']);

        if ($stmt->execute()){
            echo "git";
            header('Location: wiadomosci.php');
        }
        else{
            echo "chuj";
        }
        
    }
}

function load_messages(){
    include 'config.php';
    $stmt = $conn->prepare("SELECT id_wiadomosci, nazwa,temat,wiadomosci_od_uzytkownikow.opis o FROM `wiadomosci_od_uzytkownikow` inner join uzytkownicy on uzytkownicy.id_uzytkownik = wiadomosci_od_uzytkownikow.id_uzytkownik where id_wiadomosci not in(select id_wiadomosci from odpowiedzi_od_supportu);;");

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
                            data-id="'.$row['id_wiadomosci'].'"
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