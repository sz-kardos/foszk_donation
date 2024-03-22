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

//Connect to db
try {
    connectDB($PDO, $HOST, $DBNAME, $DBUSERNAME, $DBPASSWORD);
} catch (PDOException $e) {
    //Nem sikerult csatlakozni a dbhez
    closeDB($PDO);
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
    die();
}

//Letezik-e a user
try {
    $validUsername = usernameExists($PDO, $username);
//User létezik->password check
    if ($validUsername) {
        $passwordHash = getPasswordHash($PDO, $username);
    }
}catch (PDOException $e) {
    //Nem sikerult csatlakozni a dbhez
    //$message = $e->getMessage();
    closeDB($PDO);
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
    die();
} finally {
    closeDB($PDO);
}

$passwordMatch = password_verify($password, $passwordHash);

if ($validUsername && $passwordMatch) {
    $_SESSION["loggedInAs"] = $username;
    $_SESSION["message"] = "Bejelentkezve mint ".$_SESSION["loggedInAs"];
} else {
    $_SESSION["message"] = "Felhasználónév vagy jelszó hibás.";
}
header("Location:".$RESULT["link"]);

?>