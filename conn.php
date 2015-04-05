<?php
$host = "localhost";
$dbusername = "";
$dbpassword = "";
$dbname = "";

# If you change the below line, you will need to change the sql import file prefix too.
$prefix = "a6-";

if (empty($dbusername)) {
    die("Error: Please setup your configuration at conn.php.");
}

$db = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
if ($db->connect_error) {
    die("Connection Failed". $db->connect_error);
}

function install() {
    # Import SQL into the database. Buggy.
    global $db, $prefix, $dbname, $dbusername, $dbpassword;
    $cmd = "mysql -u" . $dbusername . " -p" . $dbpassword . " " . $dbname . " < a6.sql";
    shell_exec($cmd);
    echo 'Installed';
}

function isInstalled() {
    global $db, $prefix;
    $sql = "SELECT * FROM `" . $prefix . "puser`";
    $test = $db->query($sql);
    if ($test === false) {
        install();
    }
}

isInstalled();

?>
