<?php

include('index.php');

$code = $_GET['code'];

echo $code ;

$result = mysqli_query($conn,"SELECT * FROM article where code='$code'");
                    
                    $row = mysqli_fetch_array($result);
						
					$article = $row["article"];
					$prix_ht = $row["prix_ht"];
					$unite = $row["unite"];

  					$tva = $row["tva"];
	ob_clean();
   echo json_encode(array("article"=>"$article", "unite"=>"$unite", "prix"=>"$prix_ht", "tva"=>"$tva"));


?>
