<?php 
include('index.php');
$id = $_POST['id'];

$result = mysqli_query($conn, "DELETE FROM vente_article where id = '$id'");

if ($result) {
    echo "deleted succefully";
}else{
    echo mysqli_error($conn);
}

?>