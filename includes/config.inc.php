<?php
/* Adatbázis kezeléshez használt hitelesítési és egyéb adatok,
illetve az egyetlen fennálló kapcsolat biztosításához használt $PDO változó*/
$PDO = NULL;
$HOST = 'localhost';
$DBNAME = 'webprog1';
$DBUSERNAME = 'root';
$DBPASSWORD = '';

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

$CONTACT = array(
    "text"=>"Kapcsolat"
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
    $CONTACT
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