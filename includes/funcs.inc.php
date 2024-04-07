<?php

function matchPasswords($password, $passwordRepeat){
    
    /*Ellenőrzi, hogy a jelszó és az azt megerősítő karaktersor megegyezik-e.
    Ha igen, igaz értéket ad vissza, ha nem, akkor hamisat.*/

    $match = (strcmp($password, $passwordRepeat) == 0);
    return $match;
}

function checkPassword($password){

    //Igazat ad vissza, ha a jelszó csak ! és ~ közötti ASCII karakterekből áll és minimum 8 karakter hosszú, egyébként hamisat.

    $valid_chars = "/^[!-~]{8,}$/";
    $match = preg_match($valid_chars, $password);
    return (bool)$match;
}

function checkUsername($username){

    //Igazat ad vissza, ha a felhasználónév csak számokból, betűkből vagy _-ból áll, egyébként hamisat.

    $valid_chars = "/^\w+$/";
    $match = preg_match($valid_chars, $username);
    return (bool)$match;
}

function checkMessage($message){

    // Lenyírja a szóközöket a bevitt üzenet két végéről, majd ellenőrzi, hogy:
    // - az így kapott karakterláncban van-e nem szóköz karakter,
    // - rövidebb-e, mint a megengedett hossz.
    // Ha igen, akkor igazat ad vissza, egyébként hamisat.

    $message = trim($message);
    $messagePattern = "/\S+/";
    $messageLength = strlen($message);
    $maxLength = 1024;
    $lsEqMax = $messageLength <= $maxLength;
    $validMessage = preg_match($messagePattern, $message) && $lsEqMax;
    return $validMessage;
}

function checkFileSize($file){
    $MAX_SIZE = 300000;
    $is_valid_size = $file["size"] < $MAX_SIZE;
    return $is_valid_size;
}

function checkIfImage($file){
    $VALID_TYPES = array(IMAGETYPE_GIF=>"imagecreatefromgif",
                        IMAGETYPE_JPEG=>"imagecreatefromjpeg",
                        IMAGETYPE_PNG=>"imagecreatefrompng",
                        IMAGETYPE_BMP=>"imagecreatefrombmp",
                        IMAGETYPE_WEBP=>"imagecreatefromwebp");
    $file_type = exif_imagetype($file["tmp_name"]);
    $is_valid_type = in_array($file_type, array_keys($VALID_TYPES));
    if($is_valid_type){
        $is_valid_type = $VALID_TYPES[$file_type]($file["tmp_name"]);
    }
    return $is_valid_type;
}

function isValidSizeImage($file){
    $is_valid_file = checkFileSize($file);
    $is_valid_file = $is_valid_file ? checkIfImage($file) : $is_valid_file;
    return $is_valid_file;
}

?>