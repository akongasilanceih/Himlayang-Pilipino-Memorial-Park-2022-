<?php
// EDITED
// 1. nilagyan ko ng acc yung switch
require_once("../../include/initialize.php");
require_once("../../include/config.php");
 
	if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false){
        header("location: ../../login/index.php");
        exit;
    }
	elseif ($_SESSION["user_type"] == "admin") {
		header("location: ../../login/index.php");
        exit;
	} elseif ($_SESSION["user_type"] == "clerk") {
		header("location: ../../login/index.php");
        exit;
	}
 
$content='user_template.php';
$view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
switch ($view) {
    case 'map' :
        $title="User Panel";
        $content='map.php';
        $map='active';
        break;
}
require_once("template/user_template.php");
?>
 