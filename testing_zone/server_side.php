<?php
// Include index.php file
include("../index.php");

// Get the processing_id from the POST request, suppressing errors if the parameter is not set
$processing_id = @$_POST['processing_id'];

// Get other parameters from the POST request, suppressing errors if the parameters are not set
$articles_ids = @$_POST['articles'];
$user = @$_POST['user'];
$categorie = @$_POST['categorie'];
$client = @$_POST['client'];
$num = @$_POST['num'];
$projet = @$_POST['projet'];
$statut = @$_POST['statut'];
$description = @$_POST['description'];

// Get the current date
$date_creation = date("Y-m-d");

// Set the response header to indicate JSON content type
header('Content-Type: application/json');

// Check if processing_id is not empty
if (!empty($processing_id)) {
    // If processing_id is not empty, update vente_article records
    foreach ($articles_ids as $key => $value) {
        $resultUpdate = mysqli_query($conn, "UPDATE vente_article SET id_vente = '$processing_id' , statut = 'associe' WHERE statut = 'selection' AND user ='$user' and id='$value'");
    }

    // Fetch the remaining rows with statut = 'selection'
    $result = mysqli_query($conn, "SELECT * FROM vente_article WHERE user = '$user' and statut = 'selection' ");
    
    // Check if there are still rows with statut = 'selection'
    if (mysqli_num_rows($result) > 0) {
        // If there are still rows with statut = 'selection', set session variable and return JSON response
        $_SESSION['procced_id'] = $processing_id;
        
        echo json_encode(array("rows" => "There are still " . mysqli_num_rows($result) . " rows.", "holderId" => $_SESSION['procced_id']));
    } else {
        // If all rows are updated, echo "All updated"
        echo json_encode(array("rows" => "all updated"));
    }
} else {
    // If processing_id is empty, insert new records into vente table
    $sql = "INSERT INTO vente (`user`,`categorie` ,`client`,`statut`,`num`,`projet`,`description`,`date_creation`) 
    VALUES ('$user','$categorie','$client','$statut','$num','$projet','$description','$date_creation')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        // If insertion into vente table is successful, get the last inserted ID
        $result1 = mysqli_query($conn, "SELECT * FROM vente WHERE user = '$user' ORDER BY id DESC LIMIT 1"); 
        $row = mysqli_fetch_array($result1);
        $lastInsertedId = $row['id'];

        // Update vente_article records with the last inserted ID
        foreach ($articles_ids as $key => $value) {
            $resultUpdate = mysqli_query($conn, "UPDATE vente_article SET id_vente = '$lastInsertedId' , statut = 'associe' WHERE statut = 'selection' AND user ='$user' and id='$value'");
        }

        // Fetch the remaining rows with statut = 'selection'
        $result = mysqli_query($conn, "SELECT * FROM vente_article WHERE user = '$user' and statut = 'selection' ");

        // Check if there are still rows with statut = 'selection'
        if (mysqli_num_rows($result) > 0) {
            // If there are still rows with statut = 'selection', set session variable and return JSON response
            session_start();
            $_SESSION['procced_id'] = $lastInsertedId;
            echo json_encode(array("rows" => "There are still " . mysqli_num_rows($result) . " rows.", "holderId" => $_SESSION['procced_id']));
        } else {
            session_start();
            $_SESSION['procced_id'] = $lastInsertedId;
            echo json_encode(array("rows" => "There are still " . mysqli_num_rows($result) . " rows."));
        }
    }
}
?>
