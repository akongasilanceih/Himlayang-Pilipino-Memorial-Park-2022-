<?php
// EDITED
// 1. yung dalawwang uanang require_once kulang ng isa pang ../
// 2. yung dalawang unang header tinanggal ko yung "login" dumodoble kasi
require_once("../../../include/initialize.php");
require_once("../../../include/config.php");
 
	// if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false){
    //     header("location: ../../login.php");
    //     exit;
    // }
	// if ($_SESSION["user_type"] == "user") {
	// 	header("location: ../../login.php");
    //     exit;
	// }
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false){
        header("location: ../../index.php");
        exit;
    }
	if ($_SESSION["user_type"] == "user") {
		header("location: ../../index.php");
        exit;
	}
 
if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "admin") {
    $content='record.php';
    $view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
    switch ($view) {
        case 'dashboard' :
            $title="Dashboard - Himlayang Pilipino Memorial Park";
            $content='dashboard.php';
            $dashboard='active';
            break;
        case 'profile' :
            $title="Profile - Himlayang Pilipino Memorial Park";
            $content='profile.php';
            $profile='active';
            break;
        case 'record' :
            $title="Record - Himlayang Pilipino Memorial Park";
            $content='record.php';
            $record='active';
            break;
        case 'employee' :
            $title="Employee - Himlayang Pilipino Memorial Park";
            $content='employee.php';
            $employee='active';
            break;
        case 'map' :
            $title="Map - Himlayang Pilipino Memorial Park";
            $content='map.php';
            $map='active';
            break;
        case 'activity' :
            $title="Activity - Himlayang Pilipino Memorial Park";
            $content='activity.php';
            $activity='active';
            break;
        // FUNCTION CONNECTOR
        case 'add' :
            $title="New Record - Himlayang Pilipino Memorial Park";
            $content='function/add.php';
            break;
        case 'merge' :
            $title="Merge Record - Himlayang Pilipino Memorial Park";
            $content='function/merge.php';
            break;
        // END CONNECTOR
 
        // TABS
        case 'add_employee' :
            $title="New Employee - Himlayang Pilipino Memorial Park";
            $content='tabs/add_employee.php';
            $employee='active';
            break;
    // TABS END
 
        // OTHER
        case 'insert' :
            $title="New Record - Himlayang Pilipino Memorial Park";
            $content='tabs/insert_record.php';
            $record='active';
            break;
        case 'merge_record' :
            $title="Merge Record - Himlayang Pilipino Memorial Park";
            $content='tabs/merge_record.php';
            $record='active';
            break;
        case 'new_record' :
            $title="New Record - Himlayang Pilipino Memorial Park";
            $content='tabs/new_record.php';
            $record='active';
            break;
        case 'contact_person':
            $title="Contact Person - Himlayang Pilipino Memorial Park";
            $content='tabs/contact_person.php';
            $record='active';
        break;
        case 'edit_record':
            $title="Update Record - Himlayang Pilipino Memorial Park";
            $content='tabs/edit_record.php';
            $record='active';
        break;
        case 'account':
            $title="Account - Himlayang Pilipino Memorial Park";
            $content='tabs/account.php';
            $account='active';
        break;
        //
 
        default :
            $title="Dashboard - Himlayang Pilipino Memorial Park";
            $content ='dashboard.php';
            $dashboard='active';
    }
    require_once("template/admin_template.php");
}
 
elseif (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "clerk") {
    $content='record.php';
    $view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
    switch ($view) {
        case 'dashboard' :
            $title="Dashboard - Himlayang Pilipino Memorial Park";
            $content='dashboard.php';
            $dashboard='active';
            break;
        case 'record' :
            $title="Record - Himlayang Pilipino Memorial Park";
            $content='record.php';
            $record='active';
            break;
        case 'map' :
            $title="Map - Himlayang Pilipino Memorial Park";
            $content='map.php';
            $map='active';
            break;
        // FUNCTION CONNECTOR
        case 'add' :
            $title="New Record - Himlayang Pilipino Memorial Park";
            $content='function/add.php';
            break;
        case 'merge' :
            $title="Merge Record - Himlayang Pilipino Memorial Park";
            $content='function/merge.php';
            break;
        // END CONNECTOR
 
        // TABS
        case 'add_employee' :
            $title="New Employee - Himlayang Pilipino Memorial Park";
            $content='tabs/add_employee.php';
            $employee='active';
            break;
    // TABS END
 
        // OTHER
        case 'insert' :
            $title="New Record - Himlayang Pilipino Memorial Park";
            $content='tabs/insert_record.php';
            $record='active';
            break;
        case 'merge_record' :
            $title="Merge Record - Himlayang Pilipino Memorial Park";
            $content='tabs/merge_record.php';
            $record='active';
            break;
        case 'new_record' :
            $title="New Record - Himlayang Pilipino Memorial Park";
            $content='tabs/new_record.php';
            $record='active';
            break;
        case 'add_img' :
            $title="Insert img - Himlayang Pilipino Memorial Park";
            $content='tabs/add_img.php';
            $map='active';
        break;
        case 'contact_person':
            $title="Contact Person - Himlayang Pilipino Memorial Park";
            $content='tabs/contact_person.php';
            $record='active';
        break;
        case 'edit_record':
            $title="Update Record - Himlayang Pilipino Memorial Park";
            $content='tabs/edit_record.php';
            $record='active';
        break;
        //
 
        default :
            $title="Dashboard - Himlayang Pilipino Memorial Park";
            $content ='dashboard.php';
            $dashboard='active';
    }
    require_once("template/admin_template.php");
}
?>
 