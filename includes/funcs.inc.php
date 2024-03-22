<?php

function matchPasswords($password, $passwordRepeat){
    
    /*Ellenőrzi, hogy a jelszó és az azt megerősítő karaktersor megegyezik-e.
    Ha igen, igaz értéket ad vissza, ha nem, akkor hamisat.*/

    $match = (strcmp($password, $passwordRepeat) == 0);
    return $match;
}

function connectDB(&$pdo, $host, $dbname, $username, $dbpassword){
    
    /*Létrehozza az adatbázis kapcsolatot és hozzárendeli a cím szerint átadott változóhoz.*/

    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

function closeDB(&$pdo){
    
    /*Bezárja az adatbázis-kapcsolatot.*/

    $pdo = NULL;
}

function selectQuery($pdo, $query, ...$params){
    
    /*A SELECT típusú lekérdezések végrehajtását egyszerűsítő funkció.
    Vissza adja az összes találatot, ha van, egyébként NULL értéket.*/
    
    $statement = $pdo->prepare($query);
    $statement->execute($params);
    if ($statement->rowCount() > 0)
    {
        $results = $statement->fetchAll();
    } else {
        $results = NULL;
    }
    $statement->closeCursor();
    return $results;
}

function emailExists($pdo, $email){
    
    /*Ellenőrzi, hogy az e-mail már létezik-e az adatbázisban.
    Ha létezik, akkor az e-mailt adja vissza, ha nem, akkor hamis értéket.*/
    
    $query = "SELECT email FROM users WHERE email = ?";
    $result = selectQuery($pdo, $query, $email);
    if($result){
        return $result[0]["email"];
    } else {
        return false;
    }
}

function usernameExists($pdo, $username){

    /*Ellenőrzi, hogy a felhasználónév már létezik-e az adatbázisban.
    Ha létezik, akkor a felhasználónevet adja vissza, ha nem, akkor hamis értéket.*/

    $query = "SELECT username FROM users WHERE username = ?";
    $result = selectQuery($pdo, $query, $username);
    if($result){
        return $result[0]["username"];
    } else {
        return false;
    }
}

function getPasswordHash($pdo, $username){

    /*Visszaadja a felhasználónévhez tartozó hashelt jelszót.
    Ha nem létezik, akkor pedig hamis értéket.*/

    $query = "SELECT password_hash FROM users WHERE username = ?";
    $result = selectQuery($pdo, $query, $username);
    if($result){
        return $result[0]["password_hash"];
    } else {
        return false;
    }
}

function addUser($pdo, $username, $email, $passwordHash){

    /*Hozzáadja a felhasználó táblához
    a felhasználónévből, e-mail címből és hashelt jelszóból álló felhasználó-rekordot.*/

    $add_user = "INSERT INTO users(username, email, password_hash) VALUES(?, ?, ?)";
    $statement = $pdo->prepare($add_user);
    $statement->execute([$username, $email, $passwordHash]);
    $statement->closeCursor();
}

?>