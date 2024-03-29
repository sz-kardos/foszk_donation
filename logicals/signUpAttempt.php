<?php
session_start();
include_once("../includes/config.inc.php");
include_once("../includes/funcs.inc.php");

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$passwordRepeat = $_POST["passwordRepeat"];

$allSet = isset($username) && isset($email) && isset($password) && isset($passwordRepeat);

//Beadott adatok ellenorzese
if ($allSet) {
    $usernameValid = checkUsername($username);
    $passwordValid = checkPassword($password);
} else {
    //Hiányos regisztrációs adatok.
    $_SESSION["message"] = "A megadott regisztrációs adatok hiányosak.";
    header("Location:".$RESULT["link"]);
    die();
}

if ($usernameValid && $passwordValid){
    $passwordsMatch = matchPasswords($password, $passwordRepeat);
} else {
    //Felhasználónév, vagy jelszó nem felel meg a követelményeknek.
    $invalid = $usernameValid ? "jelszó" : "felhasználónév";
    $_SESSION["message"] = "A megadott ${invalid} nem felel meg a követelményeknek.";
    header("Location:".$RESULT["link"]);
    die();
}

//Jelszoegyezes ellenorzese
if($passwordsMatch){
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
} else {
    //Nem egyeznek a jelszavak.
    $_SESSION["message"] = "A megadott jelszavak nem egyeznek.";
    header("Location:".$RESULT["link"]);
    die();
}

$emailExists = $test_pdo->select_query("SELECT username FROM users WHERE username = ?", $username);
$usernameExists = $test_pdo->select_query("SELECT email FROM users WHERE email = ?", $email);

if ($emailExists || $usernameExists) {
    $taken = $emailExists ? "az e-mail cím" : "a felhasználónév";
    $_SESSION["message"] = "Ez ${taken} már foglalt.";
    header("Location:".$RESULT["link"]);
    die();
}

$test_pdo->insert_query("INSERT INTO users(username, email, password_hash) VALUES(?, ?, ?)", $username, $email, $passwordHash);
echo "Hello";
$_SESSION["message"] = "Sikeres regisztráció mint ".$username.", ".$email." címmel.";
header("Location:".$RESULT["link"]);
?>