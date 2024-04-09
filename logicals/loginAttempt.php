<?php
session_start();
include_once(dirname(__DIR__, 1)."/includes/config.inc.php");

$username = $_POST["login_username"];
$password = $_POST["login_password"];
$all_set = isset($username, $password);

if (!($all_set)) {
    $_SESSION["message"] = "A megadott belépési adatok hiányosak.";
    header("Location:".$FRONTEND_LINK);
    die();
}

$password_hash = $database_connection->select_query("SELECT password_hash FROM users WHERE username = ?", $username);

$password_match = false;
if (isset($password_hash)) {
    $password_hash = $password_hash[0]["password_hash"];
    $password_match = password_verify($password, $password_hash);
} 

if ($password_match){
    $_SESSION["loggedInAs"] = $username;
    $_SESSION["message"] = "Bejelentkezve mint ".$_SESSION["loggedInAs"];    
} else {
    $_SESSION["message"] = "Felhasználónév vagy jelszó hibás.";
}

header("Location:".$FRONTEND_LINK);

?>