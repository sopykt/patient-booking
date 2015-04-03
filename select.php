<?php
session_start();
print_r($_SESSION['level']);
if (!(isset($_SESSION['level']))) {
    header("location:index.php");
}

if($_SESSION['level'] == 'patient' ) {
    header("location:patient.php");
}
else if($_SESSION['level'] == 'employee' ) {
    header("location:employee.php");
}
else {
    header("location:index.php");
}
?>
