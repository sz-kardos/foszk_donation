<?php
$logged_in = !(empty($_SESSION["logged_in_as"]));
$action = $LOGICAL_LINKS['upload_attempt'];
if($logged_in){
    echo "<form action=${action} method='post' enctype='multipart/form-data'>
    <label for='file'>Válassz ki a feltöltendő képet:</label>  
    <input type='file' name='image_to_upload' id='image_to_upload' required>
    <input type='submit' value='Kép feltöltése' name='submit'>
    </form>";
}

$paths = glob($IMAGES_PATH . "/*");
echo "<div class='gallery'>";
foreach ($paths as $path){
    if(checkIfImage($path)){
        $filename = basename($path);
        $link = $IMAGES_ROOT_LINK."/".$filename;
        echo sprintf("<img class='gallery-item' src='%s' height='256px'>", $link);
    }
}
echo "</div>";
?>