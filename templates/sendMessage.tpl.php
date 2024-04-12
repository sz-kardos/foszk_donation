<?php
$username = $_SESSION["loggedInAs"] ? $_SESSION["loggedInAs"] : "Vendég";
$action = $LOGICAL_LINKS['message_attempt'];
?>

<form id="message_form" action=<?php echo "${action}";?> method="post">
    <fieldset>
        <legend>Üzenjen nekünk</legend>
        <label for="message">Üzenet</label>
        <textarea name="message" id="message" cols="30" rows="10" maxlength=1024 required></textarea>
        <button type="button" onclick="submitMessage('message_form', 'message')">Küldés</button>
    </fieldset>
</form>
