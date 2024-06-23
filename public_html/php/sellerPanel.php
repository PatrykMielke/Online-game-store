
<?php
      function load_games(){
    include 'config.php';
    $stmt = $conn->prepare("SELECT * FROM `{$prefix}produkty` where id_wydawcy = ?");
    $stmt -> bind_param("i",$id);
    $id = $_SESSION["id"];

    if($stmt->execute())
    {
        $result = $stmt -> get_result();
        if($result -> num_rows == 0){
            echo '<tr>
            <td colspan="4" class="text-center">
            Brak sprzedawanych gier
            </td></tr>';
        }
        else{
            $i = 1;
            while ($row = $result -> fetch_assoc()){
                echo '
                <tr>
                    <td>'.$i.'</td>
                    <td>'.$row['nazwa'].'</td>
                    <td>'.$row['cena'].'</td>
                    <td>
                    <a href="edytujGre.php?id='.$row['id_produktu'].'">
                        <button
                            class="btn btn-primary"
                        >
                            Edytuj
                        </button></a>
                        <button
                            class="btn btn-danger"
                            name="submit"
                            data-toggle="modal"
                            data-target="#deleteProductModal"
                            data-id="'.$row['id_produktu'].'" 
                            type="button"
                        >
                            Usuń
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