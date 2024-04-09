<?php

function matchPasswords($password, $passwordRepeat){
    
    /* Ellenőrzi, hogy a jelszó és az azt megerősítő karaktersor megegyezik-e.
    Ha igen, igaz értéket ad vissza, ha nem, akkor hamisat. */

    $match = (strcmp($password, $passwordRepeat) == 0);
    return $match;
}

function checkPassword($password){

    // Igazat ad vissza, ha a jelszó csak ! és ~ közötti ASCII karakterekből áll és minimum 8 karakter hosszú, egyébként hamisat.

    $valid_chars = "/^[!-~]{8,}$/";
    $match = preg_match($valid_chars, $password);
    return (bool)$match;
}

function checkUsername($username){

    // Igazat ad vissza, ha a felhasználónév csak számokból, betűkből vagy _-ból áll, egyébként hamisat.

    $valid_chars = "/^\w+$/";
    $match = preg_match($valid_chars, $username);
    return (bool)$match;
}

function checkName($name){

    // Igazat ad vissza, ha a név csak a magyar ABC betűiből áll, egyébként hamisat.
    
    $valid_chars = "/^[A-z\x{00c1}-\x{0171}]+$/u";
    $match = preg_match($valid_chars, $name);
    return (bool)$match;
}

function checkMessage($message){

    /* Lenyírja a szóközöket a bevitt üzenet két végéről, majd ellenőrzi, hogy:
     - az így kapott karakterláncban van-e nem szóköz karakter,
     - rövidebb-e, mint a megengedett hossz.
    Ha igen, akkor igazat ad vissza, egyébként hamisat. */

    $message = trim($message);
    $messagePattern = "/\S+/";
    $messageLength = strlen($message);
    $maxLength = 1024;
    $lsEqMax = $messageLength <= $maxLength;
    $validMessage = preg_match($messagePattern, $message) && $lsEqMax;
    return $validMessage;
}

function checkFileSize($file){

    // Ha a megadott fájl kisebb, mint 300kb, akkor igazat ad vissza, egyébként hamisat.

    $MAX_SIZE = 300000;
    $is_valid_size = $file["size"] < $MAX_SIZE;
    return $is_valid_size;
}

function checkIfImage($file){

    // Ellenőrzni, hogy a fájl a megengedett képfájltípusok egyike-e, ha igen, akkor igazat ad vissza, egyébként hamisat.

    $VALID_TYPES = array(IMAGETYPE_GIF=>"imagecreatefromgif",
                        IMAGETYPE_JPEG=>"imagecreatefromjpeg",
                        IMAGETYPE_PNG=>"imagecreatefrompng",
                        IMAGETYPE_BMP=>"imagecreatefrombmp",
                        IMAGETYPE_WEBP=>"imagecreatefromwebp");
    $file_type = exif_imagetype($file["tmp_name"]); // Exif adatból kiolvassa a fájltípust
    $is_valid_type = in_array($file_type, array_keys($VALID_TYPES)); // Megnézi az érvényes típusok egyike-e
    if($is_valid_type){
        $is_valid_type = $VALID_TYPES[$file_type]($file["tmp_name"]); // Ha érvényes, akkor megpróbál az adott típusnak megfelelő képet előállítani a fájl tartalma alapján, ha sikerül, akkor valóban az adott típusú fájl az 
    }
    return $is_valid_type;
}

function isValidSizeImage($file){

    // Ellenőrzi, hogy megengedett méretű és típusú képfájl-e a megadott fájl. Ha igen, igazat ad vissza, egyébként hamisat.

    $is_valid_file = checkFileSize($file);
    $is_valid_file = $is_valid_file ? checkIfImage($file) : $is_valid_file;
    return $is_valid_file;
}

?>