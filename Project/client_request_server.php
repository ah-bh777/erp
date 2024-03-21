<?php
include("index.php");

$user = $_POST['user'];
$categorie = $_POST['categorie'];
$client = $_POST['client'];
$num = $_POST['num'];
$projet = $_POST['projet'];
$statut = $_POST['statut'];
$description = $_POST['description'];
$date_creation = date("Y-m-d");

$sql = "INSERT INTO vente (`user`,`categorie` ,`client`,`statut`,`num`,`projet`,`description`,`date_creation`) 
VALUES ('$user','$categorie','$client','$statut','$num','$projet','$description','$date_creation')";

$result = mysqli_query($conn, $sql);

if($result) {
    $result1 = mysqli_query($conn, "SELECT * FROM vente WHERE user = '$user' ORDER BY id DESC LIMIT 1"); 
    $row = mysqli_fetch_array($result1);
    $lastInsertedId = $row['id'];

    $resultUpdate = mysqli_query($conn, "UPDATE vente_article SET id_vente = '$lastInsertedId' , statut = 'associe' WHERE statut = 'selection' AND user ='$user'");

    header('Content-Type: application/json');
    echo json_encode(array("success"=>true , "message"=>"$lastInsertedId"));

} 



?>
