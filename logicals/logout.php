<?php
session_start();
include_once(dirname(__DIR__, 1)."/includes/config.inc.php");
$_SESSION["loggedInAs"] = false;
$_SESSION["message"] = "Sikeresen kijelentkezett.";
header("Location:".$FRONTEND_LINK);
?>