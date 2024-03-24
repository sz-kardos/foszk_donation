<?php
session_start();
$username = $_SESSION["loggedInAs"] ? $_SESSION["loggedInAs"] : "Vendég";
?>
<!--
A negyedik oldalon legyen egy kapcsolat űrlap, amelynek segítségével e-mailt lehet küldeni az oldal tulajdonosa számára,
de az e-mail küldése helyett jelenítse meg az adatokat egy új (ötödik) oldal tartalmaként.
Ellenőrizze megfelelően az űrlap helyes kitöltését.
Az ellenőrzést végezze el kliens- és szerveroldalon is (JavaScript, PHP).
A HTML kódban ne ellenőrizze az úrlap adatait. Az elküldött Űrlap adatokat ezen kívül mentse le adatbázisba is.-->

<form action="/foszk_donation/logicals/messageAttempt.php" method="post">
    <fieldset>
        <legend>Üzenjen nekünk</legend>
        <label for="username">Felhasználónév</label>
        <input type="text" id="username" name="username" value=<?php echo $username; ?> readonly required >
        <label for="message">Üzenet</label>
        <textarea name="message" id="message" cols="30" rows="10" required></textarea>
        <button type="submit">Küldés</button>
    </fieldset>
</form>
