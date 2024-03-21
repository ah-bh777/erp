<?php

include('index.php');

$article = $_GET['article'];

echo $code ;

$result = mysqli_query($conn,"SELECT * FROM article where article='$article'");
                    $i=1;
                    $row = mysqli_fetch_array($result);
						
					$code = $row["code"];
					$prix_ht = $row["prix_ht"];
					$unite = $row["unite"];

  					$tva = $row["tva"];
	ob_clean();
   echo json_encode(array("code"=>"$code", "unite"=>"$unite", "prix"=>"$prix_ht", "tva"=>"$tva"));


?>
