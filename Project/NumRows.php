<?php
include("index.php");

$theUser = $_POST['theUser'];

$resultUser = mysqli_query($conn, "SELECT * FROM vente_article WHERE id_vente = 0 AND user = '$theUser'");

$NumRows = mysqli_num_rows($resultUser);

echo $NumRows;

mysqli_close($conn); 
?>
