<?php
echo "<pre>";
$json = file_get_contents('php://input');
print_r($json);
print_r($_SERVER);
?>
