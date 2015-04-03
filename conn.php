<?php
$host = "db.luxing.im";
$dbusername = "a6";
$dbpassword = "JtsTuDe6SFKVxUvF";
$dbname = "a6";

$db = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
if ($db->connect_error) {
    die("Connection Failed". $db->connect_error);
}

function isInstalled() {
    $sql = "SELECT * FROM puser";
    $db->query($sql);
    var_dump($db);
}

isInstalled();

?>
