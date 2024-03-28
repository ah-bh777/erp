<?php 
session_start();
$modification_id = $_SESSION['procced_id'];
if (!empty($_SESSION['procced_id'])) {
   echo $modification_id;
   session_destroy();
}else{
    echo "there is none";
}
?>