<?php
session_start();
include_once("../includes/config.inc.php");
include_once("../includes/funcs.inc.php");

$username = $_POST["username"];
$password = $_POST["password"];
$allSet = isset($username) && isset($password);

if (!($allSet)) {
    $_SESSION["message"] = "A megadott belépési adatok hiányosak.";
    header("Location:".$RESULT["link"]);
    die();
}

$passwordHash = $test_pdo->select_query("SELECT password_hash FROM users WHERE username = ?", $username);

$passwordMatch = false;
if (isset($passwordHash)) {
    $passwordHash = $passwordHash[0]["password_hash"];
    $passwordMatch = password_verify($password, $passwordHash);
} 

if ($passwordMatch){
    $_SESSION["loggedInAs"] = $username;
    $_SESSION["message"] = "Bejelentkezve mint ".$_SESSION["loggedInAs"];    
} else {
    $_SESSION["message"] = "Felhasználónév vagy jelszó hibás.";
}

header("Location:".$RESULT["link"]);

?>