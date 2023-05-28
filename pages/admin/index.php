<?php
include("../../include/initialize.php");
// include("../../include/config.php");
	if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false){
        header("location: ../../login.php");
        exit;
    }
	if ($_SESSION["user_type"] == "user") {
		header("location: ../../login.php");
        exit;
	}
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false){
        header("location: ../../login/index.php");
        exit;
    }
	if ($_SESSION["user_type"] == "user") {
		header("location: ../../login/index.php");
        exit;
	}

if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "admin") {
    $content='record.php';
    $view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
    switch ($view) {
        case 'home' :
            $title="Home - Himlayang Pilipino";
            $content='home.php';
            $home='active';
            break;
        case 'profile' :
            $title="Profile - Himlayang Pilipino";
            $content='profile.php';
            $profile='active';
            break;
        case 'record' :
            $title="Record - Himlayang Pilipino";
            $content='record.php';
            $record='active';
            break;
        case 'employee' :
            $title="Employee - Himlayang Pilipino";
            $content='employee.php';
            $employee='active';
            break;
        case 'map' :
            $title="Map - Himlayang Pilipino";
            $content='map.php';
            $map='active';
            break;
        case 'activity' :
            $title="Activity - Himlayang Pilipino";
            $content='activity.php';
            $activity='active';
            break;


        // FUNCTION CONNECTOR
        case 'add' :
            $title="New Record - Himlayang Pilipino";
            $content='function/add.php';
            break;
        case 'merge' :
            $title="Merge Record - Himlayang Pilipino";
            $content='function/merge.php';
            break;
        // END CONNECTOR

        // TABS
        case 'add_employee' :
            $title="New Employee - Himlayang Pilipino";
            $content='tabs/add_employee.php';
            $employee='active';
            break;
    // TABS END

        // OTHER
        case 'insert' :
            $title="New Record - Himlayang Pilipino";
            $content='tabs/insert_record.php';
            $record='active';
            break;
        case 'merge_record' :
            $title="Merge Record - Himlayang Pilipino";
            $content='tabs/merge_record.php';
            $record='active';
            break;
        case 'new_record' :
            $title="New Record - Himlayang Pilipino";
            $content='tabs/new_record.php';
            $record='active';
            break;
        case 'add_img' :
            $title="Insert img - Himlayang Pilipino";
            $content='tabs/add_img.php';
            $map='active';
        break;
        case 'contact_person':
            $title="Contact Person - Himlayang Pilipino";
            $content='tabs/contact_person.php';
            $record='active';
        break;
        case 'edit_record':
            $title="Update Record - Himlayang Pilipino";
            $content='tabs/edit_record.php';
            $record='active';
        break;
        case 'del_record':
            $title="Delete Record - Himlayang Pilipino";
            $content='tabs/del_record.php';
            $record='active';
        break;
        case 'account':
            $title="Account - Himlayang Pilipino";
            $content='tabs/account.php';
            $account='active';
        break;
        //

        default :
            $title="Home - Himlayang Pilipino";
            $content ='home.php';
            $home='active';
    }
    require_once("template/admin_template.php");
}

elseif (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "clerk") {
    $content='record.php';
    $view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
    switch ($view) {
        case 'home' :
            $title="Home - Himlayang Pilipino";
            $content='home.php';
            $home='active';
            break;
        case 'record' :
            $title="Record - Himlayang Pilipino";
            $content='record.php';
            $record='active';
            break;
        case 'order' :
            $title="Order - Himlayang Pilipino";
            $content='order.php';
            $order='active';
            break;
        case 'map' :
            $title="Map - Himlayang Pilipino";
            $content='map.php';
            $map='active';
            break;
        case 'receipt' :
            $title="Receipt - Himlayang Pilipino";
            $content='receipt.php';
            $order='active';
            break;



        // FUNCTION CONNECTOR
        case 'add' :
            $title="New Record - Himlayang Pilipino";
            $content='function/add.php';
            break;
        case 'merge' :
            $title="Merge Record - Himlayang Pilipino";
            $content='function/merge.php';
            break;
        case 'payment' :
            $title="Check out - Himlayang Pilipino";
            $content='payment.php';
            break;
        // END CONNECTOR

        // TABS
        case 'update_service' :
            $title="Update Service - Himlayang Pilipino";
            $content='tabs/update_service.php';
            $shop='active';
            break;
        case 'add_service' :
            $title="New Service - Himlayang Pilipino";
            $content='tabs/add_service.php';
            $shop='active';
            break;
        case 'add_employee' :
            $title="New Employee - Himlayang Pilipino";
            $content='tabs/add_employee.php';
            $employee='active';
            break;
    // TABS END

        // OTHER
        case 'insert' :
            $title="New Record - Himlayang Pilipino";
            $content='tabs/insert_record.php';
            $record='active';
            break;
        case 'merge_record' :
            $title="Merge Record - Himlayang Pilipino";
            $content='tabs/merge_record.php';
            $record='active';
            break;
        case 'new_record' :
            $title="New Record - Himlayang Pilipino";
            $content='tabs/new_record.php';
            $record='active';
            break;
        case 'add_order' :
            $title="New Order - Himlayang Pilipino";
            $content='tabs/add_order.php';
            $order='active';
            break;
        case 'select_order' :
            $title="Select Order - Himlayang Pilipino";
            $content='tabs/select_order.php';
            $order='active';
        break;
        case 'insert_plot' :
            $title="New plot - Himlayang Pilipino";
            $content='tabs/new_plot.php';
            $map='active';
        break;
        case 'add_img' :
            $title="Insert img - Himlayang Pilipino";
            $content='tabs/add_img.php';
            $map='active';
        break;
        case 'service_history':
            $title="Service History - Himlayang Pilipino";
            $content='tabs/service_history.php';
            $record='active';
        break;
        case 'contact_person':
            $title="Contact Person - Himlayang Pilipino";
            $content='tabs/contact_person.php';
            $record='active';
        break;
        case 'order_details':
            $title="Order Details - Himlayang Pilipino";
            $content='tabs/order_details.php';
            $order='active';
        break;
        case 'edit_record':
            $title="Update Record - Himlayang Pilipino";
            $content='tabs/edit_record.php';
            $record='active';
        break;
        //

        default :
            $title="Home - Himlayang Pilipino";
            $content ='home.php';
            $home='active';
    }
    require_once("template/admin_template.php");
}
?>
