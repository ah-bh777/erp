<?php

include('index.php');

if(isset($_POST['code'], $_POST['article'], $_POST['prix_ht'], $_POST['unite'], $_POST['tva'], $_POST['categorie'])) {
    $code = $_POST['code']; 
    $article = $_POST['article']; 
    $prix_ht = $_POST['prix_ht']; 
    $unite = $_POST['unite']; 
    $tva = $_POST['tva']; 
    $categorie = $_POST['categorie'];

   
    
    $sql = "INSERT INTO `article`(`code`,`article`,`unite`,`categorie`,`prix_ht`,`tva`) 
            VALUES ('$code','$article','$unite','$categorie','$prix_ht','$tva')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    
} else {
  
    echo "Error: POST data is not set.";
}
?>

