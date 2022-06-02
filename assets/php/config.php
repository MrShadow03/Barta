<?php

$host = 'localhost';
$des = 'root';
$pass = "";
$db_name = 'barta';

$conn = mysqli_connect($host, $des, $pass, $db_name);

if (!$conn) {
    echo "Connection failed" . mysqli_connect_error();
}
