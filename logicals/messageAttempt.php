<?php
session_start();
include_once(dirname(__DIR__, 1)."/includes/config.inc.php");
$username = $_SESSION["loggedInAs"];
$message = $_POST["message"];
$sender = $username ? $username : "Vendég";
$all_set = isset($username, $message);

if (!($all_set)) {
    $_SESSION["message"] = "Hiányos kapcsolati űrlapadatok.";
    header("Location:".$FRONTEND_LINK);
    die();
}

$message = trim($_POST["message"]);
$valid_message = checkMessage($message);

if (!($valid_message)) {
    $_SESSION["message"] = "Az üzenetnek legalább 1, maximum 1024 karakter hosszúnak kell lennie. Az üzenet nem lehet csupa szóköz.";
    header("Location:".$FRONTEND_LINK);
    die();
}

$user_id = $database_connection->select_query("SELECT user_id FROM users WHERE username = ?", $username);
$user_id = $user_id ? $user_id[0]["user_id"] : $user_id;
$database_connection->insert_query("INSERT INTO messages(user_id, message_text) VALUES(?, ?)", $user_id, $message);

$_SESSION["message"] = "Küldő: ".$sender."<br>"."Üzenet: ".$message;
header("Location:".$FRONTEND_LINK);
?>