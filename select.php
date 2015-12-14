<?php
session_start();
if (!(isset($_SESSION['level']))) {
    header("location:index.php");
}

if($_SESSION['level'] == 'patient' ) {
    header("location:patient.php");
}
else if($_SESSION['level'] == 'employee' ) {
    header("location:manage.php");
}
else {
    header("location:index.php");
}
?>
