<?php
/* Adatbázis kezeléshez használt hitelesítési és egyéb adatok,
illetve az egyetlen fennálló kapcsolat biztosításához használt $PDO változó*/
session_start();
$PDO = NULL;
$HOST = 'localhost';
$DBNAME = 'webprog1';
$DBUSERNAME = 'root';
$DBPASSWORD = '';
if (!isset($_SESSION["loggedInAs"])){
    $_SESSION["loggedInAs"] = NULL;
}
// Oldalak, egyesével

$MAIN = array(
    "text"=>"Főoldal",
);

$ABOUT = array(
    "text"=>"Rólunk"
);

$FINDOWNER = array(
    "text"=>"Gazdikereső"
);

$GOODTOKNOW = array(
    "text"=>"Jó tudni"
);

$BLOG = array(
    "text"=>"Blog"
);

$CONTACTUS = array(
    "text"=>"Kapcsolat",
    "link"=>"/foszk_donation/sendMessage.php"
);

$LOGIN = array(
    "text"=>"Belépés",
    "link"=>"/foszk_donation/login.html"
);

$SIGNUP = array(
    "text"=>"Regisztráció",
    "link"=>"/foszk_donation/signUp.html"
);

$LOGOUT = array(
    "text"=>"Kijelentkezés",
    "link"=>"/foszk_donation/logicals/logout.php"
);

$PROFILE = array(
    "text"=>"",
    "link"=>""
);

$RESULT = array(
    "text"=>"",
    "link"=>"/foszk_donation/result.php"
);

$ALWAYS = array(
    $MAIN,
    $ABOUT,
    $FINDOWNER,
    $GOODTOKNOW,
    $BLOG,
    $CONTACTUS
); // Azok az oldalak, amik midig elérhetőek a felhasználó kezdeményezésére

$LOGGEDIN = array(
    $LOGOUT,
    $PROFILE
); // Azok az oldalak, amik csak akkor érhetőek el a felhasználó kérésére, ha be van jelentkezve

$LOGGEDOUT = array(
    $LOGIN,
    $SIGNUP
); // Azok az oldalak, amik csak akkor érhetőek el a felhasználó kérésére, ha a ki van jelentkezve

$NEVER = array(
    $RESULT,
); // Azok az oldalok, amik sose jelenhetnek meg felhasználói kérésre, elsősorban logikai oldalak

$ALL = array_merge($ALWAYS, $LOGGEDIN, $LOGGEDOUT); // Az összes oldal, ami valamilyen helyzetben a felhasználó kérésére elérhető
?>