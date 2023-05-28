<?php

define ('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'gravekeeper');

// NOTE: HEADS UP - do not commit to repo!
define('HOST_EMAIL', "himlayangpilipinomemorialpark@gmail.com");
define('HOST_APP_PW', "rjmhsdtwtnyigaoo");

$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($mysqli == false) {
    die("ERROR: Could not connect." . $mysqli->connect_error);
}

?>