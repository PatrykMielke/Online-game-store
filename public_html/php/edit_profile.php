<?php

function load_description(){
    include 'config.php';
    // Check if user or email already exists
    $stmt = $conn->prepare("select opis from uzytkownicy where id_uzytkownika = ?");
    $stmt ->bind_param("i", $id);
    $id = $_SESSION['id'];

    if($stmt->execute()){
      $result = $stmt->get_result();

      if ($result->num_rows > 0){
          $row = $result -> fetch_assoc();
          $opis = $row['opis'];
          echo $opis;
      }
      else{
          echo "";
      }
    }
    else{
      echo "";
    }
}




    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $opis = $_POST['description'];
        $uploadDir = '../img/avatars/';


        $uploadedFiles = array();
        $errors = array();
var_dump($_FILES) ;
        foreach ($_FILES['profilePic']['name'] as $key => $name) {
            $tmp_name = $_FILES['profilePic']['tmp_name'][$key];
            $target_file = $uploadDir . basename($name);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
            // Check if image file is a actual image or fake image
            $check = getimagesize($tmp_name);
            if ($check === false) {
                $errors[] = "File {$name} is not an image.";
                continue;
            }
    
            // Check file size (5MB limit)
            if ($_FILES['profilePic']['size'][$key] > 5000000) {
                $errors[] = "Sorry, file {$name} is too large.";
                continue;
            }
    
            // Allow certain file formats
            $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
            if (!in_array($imageFileType, $allowedTypes)) {
                $errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed for {$name}.";
                continue;
            }
    
            // Move uploaded file to specified directory
            $newFileName = "product-img_" . uniqid() . ".$imageFileType"; // Generate a unique filename
            $target_file = $uploadDir . $newFileName;
            if (move_uploaded_file($tmp_name, $target_file)) {
                $uploadedFiles[] = $target_file;
            } else {
                $errors[] = "Sorry, there was an error uploading file {$name}.";
            }
        }
        
        if (!empty($uploadedFiles)) {
            include 'config.php';
    
            // Prepare product insertion query
            $sql = 'update uzytkownicy set opis = ? , avatar = ? where id_uzytkownika = ?';
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssi", $opis, $newFileName, $_SESSION['id']);
            var_dump($newFileName);
            if (!$stmt) {
                echo "Error preparing statement: " . $conn->error;
                exit;
            }
            if (!$stmt->execute()) {
                echo "Error updating data: " . $stmt->error;
                exit;
            }
        }
       

    }
?>