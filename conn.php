<?php
$host = "db.luxing.im";
$dbusername = "a6";
$dbpassword = "JtsTuDe6SFKVxUvF";
$dbname = "a6";
$prefix = "a6-";

$db = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
if ($db->connect_error) {
    die("Connection Failed". $db->connect_error);
}

function install() {
    # Import SQL into the database.
    global $db;
    echo 'install()';
}

function isInstalled() {
    global $db, $prefix;
    $sql = "SELECT * FROM " . $prefix . "puser";
    $result = $db->query($sql);
    if ($result == NULL) {
        install();
    }
}

isInstalled();

?>
