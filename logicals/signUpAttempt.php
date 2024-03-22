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
    $passwordsMatch = matchPasswords($password, $passwordRepeat);
} else {
    //Hiányos regisztrációs adatok.
    $_SESSION["message"] = "A megadott regisztrációs adatok hiányosak.";
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
echo $passwordsHash;
//Connect to db
try {
    connectDB($PDO, $HOST, $DBNAME, $DBUSERNAME, $DBPASSWORD);
} catch (PDOException $e) {
    //Nem sikerult csatlakozni a dbhez
    //$message = $e->getMessage();
    closeDB($PDO);
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
    die();
}

//Check if email or username exists
try {
    $emailExists = emailExists($PDO, $email);
    $usernameExists = usernameExists($PDO, $username);
} catch (PDOException $e) {
    //Nem sikerult csatlakozni a dbhez
    //$message = $e->getMessage();
    closeDB($PDO);
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
    die();
}

//Email vagy username foglalt
if ($emailExists || $usernameExists) {
    $taken = $emailExists ? "az e-mail cím" : "a felhasználónév";
    closeDB($PDO);
    $_SESSION["message"] = "Ez ${taken} már foglalt.";
    header("Location:".$RESULT["link"]);
    die();
}

//Add user
try {
    addUser($PDO, $username, $email, $passwordHash);
}  catch (PDOException $e) {
    //Nem sikerult csatlakozni a dbhez
    //$message = $e->getMessage();
    closeDB($PDO);
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
    die();
} finally {
    closeDB($PDO);
    assert($PDO == NULL);
    $_SESSION["message"] = "Sikeres regisztráció mint ".$username.", ".$email." címmel.";
    header("Location:".$RESULT["link"]);
}
//Close db
?>