<?php
echo "<pre>";
$json = file_get_contents('php://input');
$obj = json_decode($json);

# DEBUG
if ($obj->username == "hlx98007" and $obj->password == "123")
{
    session_start();

    $_SESSION['user'] = "hlx98007";
    $_SESSION['level'] = "patient";

}
?>
