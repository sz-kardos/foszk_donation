<?php
session_start();
include_once(dirname(__DIR__, 1)."/includes/config.inc.php");
if (isset($_SESSION["message"])){
    include($RESULT["link"]);
} else if(isset($_GET["page"])){
    $requested_page = $_GET["page"];
} else {
    $requested_page = "/";
}

if(isset($requested_page)){
    $page_exists = in_array($requested_page, array_keys($ALL));
    if($page_exists){
        include($ALL[$requested_page]["link"]);
    } else {
        $_SESSION["message"] = "A keresett oldal nem található";
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
        include($RESULT["link"]);
    }
}
?>