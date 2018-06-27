<?php

$sig = $_SERVER["HTTP_X_HUB_SIGNATURE"];
$ref = file_get_contents("./secret");
$ref = substr($ref, 0, strpos( $ref, "\n" ) );

shell_exec("/usr/bin/git pull origin master");


?>
