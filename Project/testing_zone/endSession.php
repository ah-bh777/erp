<?php 
session_start();
if (!empty($_SESSION['procced_id'])) {
   echo "there is a session";
   session_destroy();
}else{
    echo "there is none";
}
?>