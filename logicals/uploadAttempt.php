<?php
session_start();
include_once(dirname(__DIR__, 1)."/includes/config.inc.php");

$image = $_FILES["image_to_upload"];
if($image["error"]>0){
    $_SESSION["message"] = "Valami hiba történt a fájl feltöltése közben.";
    header("Location:".$FRONTEND_LINK);
    die();
}

$valid_image = isValidSizeImage($image);
if(!$valid_image){
    $_SESSION["message"] = "Az adott fájl mérete túl nagy, vagy nem megengedett típusó képfájl.";
    header("Location:".$FRONTEND_LINK);
    die();
}
$target_dir = "../images/";
$dir_exists = is_dir($target_dir);

if(!$dir_exists){
    $create_success = mkdir($target_dir);
    if(!$create_success){
        $_SESSION["message"] = "A megadott mappa nem létezik és nem is sikerült létrehozni.";
        header("Location:".$FRONTEND_LINK);
        die();
    }
}

$target_file = $target_dir . basename($image["name"]);
$filename_exists = file_exists($target_file);
echo $filename_exists?"y":"n";
if ($filename_exists) {
    $_SESSION["message"] = "Ezzel a névvel már létezik fájl a célhelyen.";
    header("Location:".$FRONTEND_LINK);
    die();
}

$upload_success = move_uploaded_file($image["tmp_name"], $target_file);

if ($upload_success) {
    $_SESSION["message"] = "A megadott fájl feltöltése sikeres.";
    header("Location:".$FRONTEND_LINK);
} else {
    $_SESSION["message"] = "Nem sikerült feltölteni a megadott fájlt";
    header("Location:".$FRONTEND_LINK);
}
?>