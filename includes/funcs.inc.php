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

?>