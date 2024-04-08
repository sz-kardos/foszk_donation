<?php
session_start();
$INCLUDES_PATH = __DIR__;
$ROOT_PATH = dirname(__DIR__, 1);
$JS_PATH = $ROOT_PATH."/js";
$LOGICALS_PATH = $ROOT_PATH."/logicals";
$TEMPS_PATH = $ROOT_PATH."/templates";
$FRONTEND = "/foszk_donation/index.php";
include_once($INCLUDES_PATH."/classes.inc.php");

$database_connection = new DataBaseConnection(); // Adatbázis kapcsolat

if (!isset($_SESSION["loggedInAs"])){
    $_SESSION["loggedInAs"] = false;
}

// Oldalak, egyesével

$MAIN = array(
    "text"=>"Főoldal",
    "link"=>$TEMPS_PATH."/index.tpl.php"
);

$ABOUT = array(
    "text"=>"Rólunk",
    "link"=>""
);

$FINDOWNER = array(
    "text"=>"Gazdikereső",
    "link"=>""
);

$GOODTOKNOW = array(
    "text"=>"Jó tudni",
    "link"=>""
);

$BLOG = array(
    "text"=>"Blog",
    "link"=>""
);

$CONTACTUS = array(
    "text"=>"Kapcsolat",
    "link"=>$TEMPS_PATH."/sendMessage.tpl.php"
);

$LOGIN = array(
    "text"=>"Belépés",
    "link"=>$TEMPS_PATH."/login.tpl.php"
);

$REGISTER = array(
    "text"=>"Regisztráció",
    "link"=>$TEMPS_PATH."/register.tpl.php"
);

$LOGOUT = array(
    "text"=>"Kijelentkezés",
    "link"=>$LOGICALS_PATH."/logout.php"
);

$GALLERY = array(
    "text"=>"Galéria",
    "link"=>$TEMPS_PATH."/gallery.tpl.php"
);

$RESULT = array(
    "text"=>"",
    "link"=>$TEMPS_PATH."/result.tpl.php"
);

$ALWAYS = array(
    "/"=>$MAIN,
    "about"=>$ABOUT,
    "findowner"=>$FINDOWNER,
    "goodtoknow"=>$GOODTOKNOW,
    "blog"=>$BLOG,
    "contact"=>$CONTACTUS,
    "gallery"=>$GALLERY
); // Azok az oldalak, amik mindig elérhetőek a felhasználó kezdeményezésére

$LOGGEDIN = array(
    "logout"=>$LOGOUT,
); // Azok az oldalak, amik csak akkor érhetőek el a felhasználó kérésére, ha be van jelentkezve

$LOGGEDOUT = array(
    "login"=>$LOGIN,
    "register"=>$REGISTER
); // Azok az oldalak, amik csak akkor érhetőek el a felhasználó kérésére, ha ki van jelentkezve

$ALL = array_merge($ALWAYS, $LOGGEDIN, $LOGGEDOUT); // Az összes oldal, ami valamilyen helyzetben a felhasználó kérésére elérhető
?>