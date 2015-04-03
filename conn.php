<?php
$host = "db.luxing.im";
$dbusername = "db";
$dbpassword = "password";
$dbname = "a6";

$db = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
if ($db->connect_error) {
    die("Connection Failed". $db->connect_error);
}

?>
