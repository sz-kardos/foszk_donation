<?php
session_start();
include_once("../includes/config.inc.php");
$_SESSION["message"] = "Küldő: ".$_POST["username"]."<br>"."Üzenet: ".$_POST["message"];
header("Location:".$RESULT["link"]);
?>