<?php
session_start();
include_once(dirname(__DIR__, 1)."/includes/config.inc.php");
$logged_in = !(empty($_SESSION["loggedInAs"]));
if($logged_in){
    echo '<form action="/foszk_donation/logicals/uploadAttempt.php" method="post" enctype="multipart/form-data">
    <label for="file">Select image to upload:</label>  
    <input type="file" name="image_to_upload" id="image_to_upload" required>
    <input type="submit" value="Upload Image" name="submit">
    </form>';
}


?>