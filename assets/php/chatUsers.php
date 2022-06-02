<?php
session_start();
include_once './config.php';
$msg = mysqli_real_escape_string($conn, $_POST['msg']);
$outgoing = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
$incoming = mysqli_real_escape_string($conn, $_POST['incoming_id']);
if (!empty($msg)) {
    $sql = mysqli_query($conn, "INSERT INTO messages (msg, outgoing_msg_id, incoming_msg_id) VALUES('{$msg}','{$outgoing}','{$incoming}')") or die();
} else {
    echo "Fuck you";
}
