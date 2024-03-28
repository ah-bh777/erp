<?php

include('index.php');

$code = $_POST['code']; 
$article = $_POST['designation']; 
$prix_ht = $_POST['prix_th']; 
$unite = $_POST['unite']; 
$tva = $_POST['tva']; 
$categorie = $_POST['categorie'];


if(isset($code, $article, $prix_ht, $unite, $tva, $categorie)) {

    
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

