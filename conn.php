<?php
$host = "db.luxing.im";
$dbusername = "a6-test";
$dbpassword = "JtsTuDe6SFKVxUvF";
$dbname = "a6-test";

$db = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
if ($db->connect_error) {
    die("Connection Failed". $db->connect_error);
}

function install() {
    # Import SQL into the database.
    global $db;
}

function isInstalled() {
    global $db;
    $sql = "SELECT * FROM puser";
    $result = $db->query($sql);
    if ($result == NULL) {
        install();
    }
}

isInstalled();

?>
