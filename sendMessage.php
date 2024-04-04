<?php
session_start();
$username = $_SESSION["loggedInAs"] ? $_SESSION["loggedInAs"] : "Vendég";
?>
<script src="./js/checks.js"></script>
<form id="message_form" action="/foszk_donation/logicals/messageAttempt.php" method="post">
    <fieldset>
        <legend>Üzenjen nekünk</legend>
        <label for="message">Üzenet</label>
        <textarea name="message" id="message" cols="30" rows="10" maxlength=1024 required></textarea>
        <button type="button" onclick="submitMessage('message_form', 'message')">Küldés</button>
    </fieldset>
</form>
