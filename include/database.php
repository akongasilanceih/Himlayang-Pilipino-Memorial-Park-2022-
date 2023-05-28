<?php
    defined('server') ? null : define("server", "localhost");
    defined('user') ? null : define ("user", "root") ;
    defined('pass') ? null : define("pass","");
    defined('database_name') ? null : define("database_name", "gravekeeper") ;

    error_log("This seems to be something that replaces the document root...");

    // $this_file = str_replace('\\', '/', __File__) ;
    $this_file = __FILE__; // ...maybe they're on a Linux machine?
    $doc_root = $_SERVER['DOCUMENT_ROOT'];

    $web_root =  str_replace (array($doc_root, "include/database.php") , '' , $this_file);
    $server_root = str_replace ('database/database.php' ,'', $this_file);

    // Guard condition - some file is referencing this twice
    if (!defined('web_root')) define('web_root' , $web_root);
    if (!defined('server_root')) define('server_root' , $server_root);
    
    // $con = mysqli_connect("localhost", "root", "" , "gravekeeper");
    // if(mysqli_connect_errno())
    // {
    //     echo "Failed to connect to MySQL: " . mysqli_connect_error();
    // }
?>