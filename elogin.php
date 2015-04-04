<?php
# Patient login file
require_once("conn.php");
session_start();
$json = file_get_contents('php://input');
$obj = json_decode($json, true);

$sql = 'SELECT * FROM `' . $prefix . 'employee` WHERE username="' . strtolower(htmlspecialchars($obj['username'])) . '" AND password="' . htmlspecialchars($obj['password']) . '"'; print_r($sql);
$result = $db->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $_SESSION['user'] = strtolower($obj['username']);
    $_SESSION['first'] = $row['first'];
    $_SESSION['last'] = $row['last'];
    $_SESSION['addr'] = $row['addr'];
    $_SESSION['phone'] = $row['phone'];
    $_SESSION['id'] = $row['id'];
    $_SESSION['rate'] = $row['rate'];
    $_SESSION['level'] = 'employee';
}
else {
    echo "Something is wrong.";
    die();
}
?>
