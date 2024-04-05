<?php
session_start();
include_once("../includes/config.inc.php");
unset($_SESSION["loggedInAs"]);
$_SESSION["message"] = "Sikeresen kijelentkezett.";
header("Location:".$RESULT["link"]);
?>