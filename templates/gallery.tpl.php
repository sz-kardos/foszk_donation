<?php
$logged_in = !(empty($_SESSION["loggedInAs"]));
$action = $LOGICAL_LINKS['upload_attempt'];
if($logged_in){
    echo "<form action=${action} method='post' enctype='multipart/form-data'>
    <label for='file'>Válassz ki a feltöltendő képet:</label>  
    <input type='file' name='image_to_upload' id='image_to_upload' required>
    <input type='submit' value='Kép feltöltése' name='submit'>
    </form>";
}


?>