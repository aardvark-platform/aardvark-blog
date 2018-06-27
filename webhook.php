<?php

$sig = $_SERVER["HTTP_X_HUB_SIGNATURE"];
$ref = file_get_contents("./secret");
$ref = substr($ref, 0, strpos( $ref, "\n" ) );


if(strcmp($sig, $ref) == 0) {
    system("git pull origin master");    
}


?>
