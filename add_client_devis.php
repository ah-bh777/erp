<?php

include('index.php');


if(isset($_POST['client'], $_POST['num'], $_POST['projet'], $_POST['categorie'], $_POST['description'])) {
    
    $client = $_POST['client'];
    $num = $_POST['num'];
    $projet = $_POST['projet'];
    $categorie = $_POST['categorie'];
    $description = $_POST['description'];
    $user = $_POST['user'];
    $devis = "devis";

   
    date_default_timezone_set('Africa/Casablanca');
    $date = date('Y-m-d');

   
    $result = mysqli_query($conn, "INSERT INTO vente (`client`, `num`, `projet`, `categorie`, `description`, `statut`, `user`, `date_creation`) 
                                    VALUES ('$client', '$num', '$projet', '$categorie', '$description', '$devis', '$user', '$date')");

    
    if($result) {
        echo "good";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Error: Required fields are not set";
}
?>
