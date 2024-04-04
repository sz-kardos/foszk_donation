<?php
session_start();
include_once("../includes/config.inc.php");
$_SESSION["loggedInAs"] = false;
$_SESSION["message"] = "Sikeresen kijelentkezett.";
header("Location:".$RESULT["link"]);
?>