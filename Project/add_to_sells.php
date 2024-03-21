<?php 

include('index.php');

$id = $_POST['id'];
$code = $_POST['code'];
$article = $_POST['article'];
$unite = $_POST['unite'];
$prix_ht = $_POST['Prix_HT'];
$quantite = $_POST['quantity']; 
$tva = $_POST['TVA'];
$prix_total_ht = $_POST['Prix_Total_HT'];
$prix_ttc = $_POST['Prix_TTC'];
$statut = 'selection';
$user = $_POST['user'];


if (empty($id) || $id <= 0) {

    $sql = "INSERT INTO `vente_article` (`code`, `article`, `unite`, `quantite`, `prix_ht`, `tva`, `statut`, `user`) 
            VALUES ('$code', '$article', '$unite', '$quantite', '$prix_ht', '$tva', '$statut', '$user')";
    $result = mysqli_query($conn, $sql);
} else {
 
    $sql = "UPDATE `vente_article` 
            SET `code`='$code', `article`='$article', `unite`='$unite', `quantite`='$quantite', 
                `prix_ht`='$prix_ht', `tva`='$tva' 
            WHERE id='$id' and user = '$user'";
    $result = mysqli_query($conn, $sql);
}


if ($result) {
    echo $id;
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);

?>
