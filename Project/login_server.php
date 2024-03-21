<?php
    include('index.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn,"SELECT * FROM users where login = '$email' and mp = '$password'");

    if(mysqli_num_rows($result) > 0){
//    header('Content-Type: application/json');
    echo "found" ;
    }else{
     echo "nope" ;
    }
?>
