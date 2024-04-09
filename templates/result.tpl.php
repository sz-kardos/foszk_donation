<?php
if (isset($_SESSION["message"])){
    echo $_SESSION["message"];
}
unset($_SESSION["message"]);
echo "<meta http-equiv='refresh' content='5;url=${FRONTEND_LINK}'>";
?>