<?php
session_start();
include_once("../includes/config.inc.php");
include_once("../includes/funcs.inc.php");

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$password_repeat = $_POST["password_repeat"];

$allSet = isset($username) && isset($email) && isset($password) && isset($password_repeat);

//Beadott adatok ellenorzese
if ($allSet) {
    $username_valid = checkUsername($username);
    $password_valid = checkPassword($password);
} else {
    //Hiányos regisztrációs adatok.
    $_SESSION["message"] = "A megadott regisztrációs adatok hiányosak.";
    header("Location:".$RESULT["link"]);
    die();
}

if ($username_valid && $password_valid){
    $password_match = matchPasswords($password, $password_repeat);
} else {
    //Felhasználónév, vagy jelszó nem felel meg a követelményeknek.
    $invalid = $username_valid ? "jelszó" : "felhasználónév";
    $_SESSION["message"] = "A megadott ${invalid} nem felel meg a követelményeknek.";
    header("Location:".$RESULT["link"]);
    die();
}

//Jelszoegyezes ellenorzese
if($password_match){
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
} else {
    //Nem egyeznek a jelszavak.
    $_SESSION["message"] = "A megadott jelszavak nem egyeznek.";
    header("Location:".$RESULT["link"]);
    die();
}

$emailExists = $database_connection->select_query("SELECT username FROM users WHERE username = ?", $username);
$usernameExists = $database_connection->select_query("SELECT email FROM users WHERE email = ?", $email);

if ($emailExists || $usernameExists) {
    $taken = $emailExists ? "az e-mail cím" : "a felhasználónév";
    $_SESSION["message"] = "Ez ${taken} már foglalt.";
    header("Location:".$RESULT["link"]);
    die();
}

$database_connection->insert_query("INSERT INTO users(username, email, password_hash) VALUES(?, ?, ?)", $username, $email, $password_hash);
$_SESSION["message"] = "Sikeres regisztráció mint ".$username.", ".$email." címmel.";
header("Location:".$RESULT["link"]);
?>