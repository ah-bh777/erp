<?php
include("index.php");


$idd = $_POST['idd'];
$user = $_POST['user'];
$categorie = $_POST['categorie'];
$client = $_POST['client'];
$num = $_POST['num'];
$projet = $_POST['projet'];
$statut = $_POST['statut'];
$description = $_POST['description'];


$sql = "UPDATE vente 
        SET categorie='$categorie', client='$client', num='$num', projet='$projet', statut='$statut', description='$description' 
        WHERE id='$idd' and user = '$user'";

// Execute the SQL query
if (mysqli_query($conn, $sql)) {
    echo "Data updated successfully"; // Return a success message
} else {
    echo "Error updating data: " . mysqli_error($conn); // Return an error message
}

// Close the database connection
mysqli_close($conn);
?>
